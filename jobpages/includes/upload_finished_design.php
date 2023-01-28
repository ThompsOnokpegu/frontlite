<?php
require "../config.php";
   if(isset($_POST['upload_design'])){
    try{
        //UPDATE IMAGES
        $connection = new PDO($dsn, $username, $password, $options); 
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Get file info 
        $order_id = $_POST['order'];
        $customer = $_POST['customer'];
         
        $finished_design = basename($_FILES["finished_design"]["name"]); 
        $tmp_design = $_FILES['finished_design']['tmp_name'];
        
        $folder = "../auth/order_images/" .$order_id."-".$finished_design;
        

        $designType = strtolower(pathinfo($finished_design, PATHINFO_EXTENSION)); 

        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg');
        //UPDATE STATEMENT 
        $update_value = array(
            "finished_product_image" => $folder,
            "jobpage" => $order_id
        );

        $sql = "UPDATE images SET finished_product_image = :finished_product_image WHERE jobpage= :jobpage";
        $statetment = $connection->prepare($sql);
        $errorCode = 0;
        $error="";
        if(!in_array($designType, $allowTypes)){ 
            $error = "Only JPG, JPEG, PNG files are allowed.";
            $errorCode = 1; 
        }
        if($errorCode==0){
            if(move_uploaded_file($tmp_design, $folder)){
                if($statetment->execute($update_value)){
                    header("Location: ../jobpages/factory.php?order_id=".$order_id."&customer_id=".$customer);
                }

            }   
        }
    }catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
    
}
?>