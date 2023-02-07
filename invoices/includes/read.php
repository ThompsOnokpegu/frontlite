<?php
require "../config.php";
require "../common.php";
$count = 0;
//get invoice_id
$bbf_invoice = "none";
//get outstanding balance
$bbf_outstanding = 0;
if(isset($_GET["customer_id"]))   {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['customer_id'];
    $sql = "SELECT invoice_id,customer, (amount-discount-deposit) as balance, paid from invoices WHERE (amount-discount-deposit)>0 AND customer = '$id'";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':customer_id', $id);
    $statement->execute();
    
    //check if any results where found
    if($results = $statement->fetch(PDO::FETCH_ASSOC)){
      //balance is > 0 and has not been paid
      if($results['paid']==0){
        $count = 1;
      }
      //get invoice_id
      $bbf_invoice = $results['invoice_id'];
      //get outstanding balance
      $bbf_outstanding = $results['balance'];
    }
    

  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}


//FETCH 1 FROM customers table
if(isset($_GET["customer_id"]))   {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['customer_id'];

    $sql = "SELECT * FROM customers WHERE customer_id = :customer_id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':customer_id', $id);
    $statement->execute();
    
    $customer = $statement->fetch(PDO::FETCH_ASSOC);

  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}


?>