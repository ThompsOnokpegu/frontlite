<?php
require "../config.php";
require "../common.php";
$success=False;
if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $customer_id = getCustomerId($_POST['firstname']);
    $new_customer = array(
      "customer_id" => $customer_id,
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "email"     => $_POST['email'],
      "phone"     => $_POST['phone'],
      "dob_month" => $_POST['month'],
      "dob_day" => $_POST['day'],
      "country"  => $_POST['country'],
      "city" => $_POST['city'],
      "address_line1" => $_POST['address'],
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
      "calve" => $_POST['pant_calve']

    );

    $sql = sprintf(
  "INSERT INTO %s (%s) values (%s)",
  "customers",
  implode(", ", array_keys($new_customer)),
  ":" . implode(", :", array_keys($new_customer))
      );

      $statement = $connection->prepare($sql);
      if($statement->execute($new_customer)){
        $success = True;
        header("Location: ../customers/customer.php?customer_id=".escape($customer_id));
      }
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
    
}
?>