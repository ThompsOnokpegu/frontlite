<?php
require "../../config.php";
require "../../common.php";
if (isset($_POST['submit_jp'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $order_id = getOrderId();
    $order = array(
      "order_id" => $order_id,
      "customer"  => $_SESSION['customer_id'],
      "sleeve"     => $_POST['sleeve'],
      "neck"     => $_POST['neck'],
      "embroy"  => $_POST['embroy'],
      "underlay" => $_POST['underlay'],
      "pant" => $_POST['pant'],
      "back_detailing" => $_POST['back_detailing'],
      "back_pocket" => $_POST['back_pocket'],
      "chest_pocket" => $_POST['chest_pocket'],
      "side_pocket" => $_POST['side_pocket'],
      "bl" => $_POST['bl'],
      "color_dislike" => $_POST['color_dislike1'].", ".$_POST['color_dislike2'],
      "design" => $_POST['design'],
      //MEASUREMENT
      "agbada_length" => $_SESSION['agbada_length'],
      "agbada_width" => $_SESSION['agbada_width'],
      "agbada_head" => $_SESSION['agbada_head'],
      "top_neck" => $_SESSION['top_neck'],
      "top_sh" => $_SESSION['top_sh'],
      "top_al1" => $_SESSION['top_al1'],
      // "top_al2" => $_SESSION['top_al2'],
      "top_bl1" => $_SESSION['top_bl1'],
      // "top_bl2" => $_SESSION['top_bl2'],
      // "top_bl3" => $_SESSION['top_bl3'],
      "top_burst1" => $_SESSION['top_burst1'],
      // "top_burst2" => $_SESSION['top_burst2'],
      // "top_burst3" => $_SESSION['top_burst3'],
      "top_ra1" => $_SESSION['top_ra1'],
      // "top_ra2" => $_SESSION['top_ra2'],
      // "top_ra3" => $_SESSION['top_ra3'],
      "top_cuffs" => $_SESSION['top_cuffs'],
      "top_alunder" => $_SESSION['top_alunder'],
      "top_burstburst" => $_SESSION['top_burstburst'],
      "top_wrist" => $_SESSION['top_wrist'],
      "top_armhole" => $_SESSION['top_armhole'],
      "top_sidejoining" => $_SESSION['top_sidejoining'],
      "pant_waist" => $_SESSION['pant_waist'],
      "pant_lap" => $_SESSION['pant_lap'],
      "pant_tl" => $_SESSION['pant_tl'],
      "pant_knee" => $_SESSION['pant_knee'],
      "pant_ankle" => $_SESSION['pant_ankle'],
      "pant_hips" => $_SESSION['pant_hips'],
      "pant_wk" => $_SESSION['pant_wk'],
      "pant_frontcrotch" => $_SESSION['pant_frontcrotch'],
      "pant_backcrotch" => $_SESSION['pant_backcrotch'],
      "pant_inseam" => $_SESSION['pant_inseam'],
      "calve" => $_SESSION['calve'],
      "has_invoice" => 0
    );
    $sql = sprintf(
  "INSERT INTO %s (%s) values (%s)",
  "orders",
  implode(", ", array_keys($order)),
  ":" . implode(", :", array_keys($order))
      );

      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
      $todo = "INSERT INTO todos (jobpage,initiated,parts,assemble,fitting,finishing,delivery,rework) VALUES (
        :jobpage,:initiated,:parts,:assemble,:fitting,:finishing,:delivery,:rework
      )";
      
      $statement = $connection->prepare($sql);
      if($statement->execute($order)){
        $stmt = $connection->prepare($todo);
        if($stmt->execute(
          [
            "jobpage" => $order_id,
            "initiated" =>0,
            "parts" => 0,
            "assemble" => 0,
            "fitting" => 0,
            "finishing" => 0,
            "delivery" => 0,
            "rework" => 1
          ]

        )){
          $success = True;
        }
        

        //UPLOAD IMAGES
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Get file info 
        $design_image = basename($_FILES["design_image"]["name"]); 
        $thread_and_fabric = basename($_FILES["thread_and_fabric_image"]["name"]);
        if(empty($_FILES['design_image']['name']) || empty($_FILES['thread_and_fabric_image']['name'])) {
          header("Location: ../jobpage.php?order_id=".$order_id."&customer_id=".$_SESSION['customer_id']);
        }
        $tmp_design = $_FILES['design_image']['tmp_name'];
        $tmp_fabric = $_FILES['thread_and_fabric_image']['tmp_name']; 
        $folder = "../../auth/order_images/" .$order_id."-".$design_image;  
        $folder2 = "../../auth/order_images/" .$order_id."-".$thread_and_fabric; 
        $designType = strtolower(pathinfo($design_image, PATHINFO_EXTENSION)); 
        $fabricType = strtolower(pathinfo($thread_and_fabric, PATHINFO_EXTENSION));
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg');
        //INSERT STATEMENT 
        $sql="INSERT INTO images(design_image,thread_and_fabric_image,jobpage) 
                            VALUES(:design_image,:thread_and_fabric_image,:jobpage)";
        $query = $connection->prepare($sql);
        $query->bindParam(':design_image',$folder,PDO::PARAM_STR);
        $query->bindParam(':thread_and_fabric_image',$folder2,PDO::PARAM_STR);
        $query->bindParam(':jobpage',$order_id,PDO::PARAM_STR);
        
        $errorCode = 0;
        $error="";
        if(!in_array($designType, $allowTypes) || !in_array($fabricType, $allowTypes)){ 
            $error = "Only JPG, JPEG, PNG files are allowed.";
            $errorCode = 1;
            // Upload image to directory 
        }
        if($errorCode==0){
            move_uploaded_file($tmp_design, $folder); 
            move_uploaded_file($tmp_fabric, $folder2); 
            $query->execute();

            header("Location: ../jobpage.php?order_id=".$order_id."&customer_id=".$_SESSION['customer_id']);
        }
      };


    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
      
}
?>