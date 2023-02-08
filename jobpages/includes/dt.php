<?php

require "../../config.php";
require "../../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM orders JOIN customers WHERE orders.customer = customers.customer_id ORDER BY orders.order_id DESC";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $results = $statement->fetchAll();
  $jobpages = array();
  foreach ($results as $jobpage) {
      $jobpage['client'] = $jobpage['firstname']." ".$jobpage['lastname'];
      array_push($jobpage,'<a type="button" class="btn btn-info btn-xs viewme" href="factory.php?order_id='.$jobpage[0].'&customer_id='.$jobpage['customer'].'">View Jobpage</a>'); 
      $jobpages[] = $jobpage;
  }
  echo json_encode($jobpages);
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>