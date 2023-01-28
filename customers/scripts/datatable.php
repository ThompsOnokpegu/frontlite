<?php

require "../../config.php";
require "../../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT customer_id,firstname,lastname,email,phone FROM customers";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
  $customers = array();
  foreach ($result as $customer) {
      array_push($customer,'<a type="button" class="btn btn-info btn-xs" href="customer.php?customer_id='.$customer[0].'">View Details</a>');
      $customers[] = $customer;
  }
  echo json_encode($customers);
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>