<?php
$error = False;
$infoError=False;

if (isset($_POST['update_measurements'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $customer =[
        "customer_id" => $_POST['customer_id'],
        // "firstname" => $_POST['firstname'],
        // "lastname"  => $_POST['lastname'],
        // "email"     => $_POST['email'],
        // "phone"     => $_POST['phone'],
        // "country"  => $_POST['country'],
        // "city" => $_POST['city'],
        // "address_line1" => $_POST['address'],
        "agbada_length" => $_POST['agbada_length'],
        "agbada_width" => $_POST['agbada_width'],
        "agbada_head" => $_POST['agbada_head'],
        "top_neck" => $_POST['top_neck'],
        "top_sh" => $_POST['top_sh'],
        "top_al1" => $_POST['top_al1'],
        // "top_al2" => $_POST['top_al2'],
        "top_bl1" => $_POST['top_bl1'],
        // "top_bl2" => $_POST['top_bl2'],
        // "top_bl3" => $_POST['top_bl3'],
        "top_burst1" => $_POST['top_burst1'],
        // "top_burst2" => $_POST['top_burst2'],
        // "top_burst3" => $_POST['top_burst3'],
        "top_ra1" => $_POST['top_ra1'],
        // "top_ra2" => $_POST['top_ra2'],
        // "top_ra3" => $_POST['top_ra3'],
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
        "date" => $_POST['date']
    ];

    $sql = "UPDATE customers 
            SET 
              -- firstname = :firstname, 
              -- lastname = :lastname, 
              -- email = :email, 
              -- phone = :phone, 
              -- country = :country, 
              -- city = :city,
              -- address_line1 = :address_line1,
              agbada_length = :agbada_length,
              agbada_width = :agbada_width,
              agbada_head = :agbada_head,
              top_neck = :top_neck,
              top_sh = :top_sh,
              top_al1 = :top_al1,
              -- top_al2 = :top_al2,
              top_bl1 = :top_bl1,
              -- top_bl2 = :top_bl2,
              -- top_bl3 = :top_bl3,
              top_burst1 = :top_burst1,
              -- top_burst2 = :top_burst2,
              -- top_burst3 = :top_burst3,
              top_ra1 = :top_ra1,
              -- top_ra2 = :top_ra2,
              -- top_ra3 = :top_ra3,
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
              date = :date
            WHERE customer_id = :customer_id";

    $statement = $connection->prepare($sql);

    if($statement->execute($customer)){
      header("Location: ../jobpages/create.php?customer_id=".escape($customer['customer_id']));
    }else{
      $error = True;
    }
    
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
  

if (isset($_POST['update_customer_info'])) {

  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    
    $connection = new PDO($dsn, $username, $password, $options);

    $customer =[
        "customer_id" => $_POST['customer_id'],
        "firstname" => $_POST['firstname'],
        "lastname"  => $_POST['lastname'],
        "email"     => $_POST['email'],
        "phone"     => $_POST['phone'],
        "country"  => $_POST['country'],
        "city" => $_POST['city'],
        "address_line1" => $_POST['address_line1'],
    ];

    $sql = "UPDATE customers 
            SET
              firstname = :firstname, 
              lastname = :lastname, 
              email = :email, 
              phone = :phone, 
              country = :country, 
              city = :city,
              address_line1 = :address_line1
            WHERE customer_id = :customer_id";

    $statement = $connection->prepare($sql);

    
    if($statement->execute($customer)){
      //redirect to referesh page
      header("Location: ../customers/customer.php?customer_id=".escape($customer['customer_id']));
    }else{
      $infoEerror = True;
    }
    
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
