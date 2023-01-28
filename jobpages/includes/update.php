<?php
//require "../config.php";


if (isset($_POST['update_jobpage'])) {
  if (!hash_equals($_POST['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $order_id = $_POST['order_id'];
    $jobpage=[
       //post values
      "order_id" => $order_id,
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
      // "color_dislike" => $_POST['color_dislike'],
      // "design" => $_POST['design'],
      //MEASUREMENT
      "agbada_length" => $_POST['agbada_length'],
      "agbada_width" => $_POST['agbada_width'],
      "agbada_head" => $_POST['agbada_head'],
      "top_neck" => $_POST['top_neck'],
      "top_sh" => $_POST['top_sh'],
      "top_al1" => $_POST['top_al1'],
      "top_bl1" => $_POST['top_bl1'],
      "top_burst1" => $_POST['top_burst1'],
      "top_ra1" => $_POST['top_ra1'],
      "top_cuffs" => $_POST['top_cuffs'],
      "top_alunder" => $_POST['top_alunder'],
      "top_burstburst" => $_POST['top_burstburst'],
      "top_wrist" => $_POST['top_wrist'],
      "top_armhole" => $_POST['top_armhole'],
      "top_sidejoining" => $_POST['top_sidejoining'],
      "pant_waist" => $_POST['pant_waist'],
      "pant_lap" => $_POST['pant_lap'],
      "pant_tl" => $_POST['pant_tl'],
      "pant_knee" => $_POST['pant_knee'],
      "pant_ankle" => $_POST['pant_ankle'],
      "pant_hips" => $_POST['pant_hips'],
      "pant_wk" => $_POST['pant_wk'],
      "pant_frontcrotch" => $_POST['pant_frontcrotch'],
      "pant_backcrotch" => $_POST['pant_backcrotch'],
      "pant_inseam" => $_POST['pant_inseam'],
      "calve" => $_POST['calve'],
    ];


    $sql = "UPDATE orders 
            SET  
                sleeve = :sleeve,
                neck = :neck,
                embroy = :embroy,
                underlay = :underlay,
                pant = :pant,
                back_detailing = :back_detailing,
                back_pocket = :back_pocket,
                chest_pocket = :chest_pocket,
                side_pocket = :side_pocket,
                bl = :bl,
                -- color_dislike = :color_dislike,
                -- design = :design,
                agbada_length = :agbada_length,
                agbada_width = :agbada_width,
                agbada_head = :agbada_head,
                top_neck = :top_neck,
                top_sh = :top_sh,
                top_al1 = :top_al1,
                top_bl1 = :top_bl1,
                top_burst1 = :top_burst1,
                top_ra1 = :top_ra1,
                top_cuffs = :top_cuffs,
                top_alunder = :top_alunder,
                top_burstburst = :top_burstburst,
                top_wrist = :top_wrist,
                top_armhole = :top_armhole,
                top_sidejoining = :top_sidejoining,
                pant_waist = :pant_waist,
                pant_lap = :pant_lap,
                pant_tl = :pant_tl,
                pant_knee = :pant_knee,
                pant_ankle = :pant_ankle,
                pant_hips = :pant_hips,
                pant_wk = :pant_wk,
                pant_frontcrotch = :pant_frontcrotch,
                pant_backcrotch = :pant_backcrotch,
                pant_inseam = :pant_inseam,
                calve = :calve
            WHERE order_id = :order_id";
  
    $statement = $connection->prepare($sql);
    if($statement->execute($jobpage)){
      echo($_POST['customer']);
      header("Location: ../jobpages/jobpage.php?order_id=".$order_id."&customer_id=".escape($_POST['customer']));
      //echo("<script>location.href = '"."../jobpages/jobpage.php?order_id=".$order_id."&customer_id=".escape($_POST['customer']));
    }
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
  
?>
