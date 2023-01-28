<?php

require "../config.php";

//order details
if(isset($_GET['order_id'])){
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['order_id'];
    
        $sql = "SELECT * FROM orders WHERE order_id = :order_id";
    
        $statement = $connection->prepare($sql);
        $statement->bindValue(':order_id', $id);
        $statement->execute();
        $design = $statement->fetch(PDO::FETCH_ASSOC);
      
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
}

//factory TODO status

if(isset($_GET['order_id'])){
  try {
      $connection = new PDO($dsn, $username, $password, $options);
      $tid = $_GET['order_id'];
  
      $sqltodo = "SELECT initiated,parts,assemble,fitting,finishing,delivery,rework FROM todos WHERE jobpage = :jobpage";
  
      $stmt = $connection->prepare($sqltodo);
      $stmt->bindValue(':jobpage', $tid);
      $stmt->execute();
      $todo_status = $stmt->fetch(PDO::FETCH_ASSOC);
    
  } catch(PDOException $error) {
    echo $sqltodo . "<br>" . $error->getMessage();
  }
}

//customer information

if(isset($_GET['customer_id'])){
  try {
      $connection = new PDO($dsn, $username, $password, $options);
      $cus = $_GET['customer_id'];
  
      $sqltodo = "SELECT customer_id,firstname,lastname FROM customers WHERE customer_id = :customer_id";
  
      $stmt = $connection->prepare($sqltodo);
      $stmt->bindValue(':customer_id', $cus);
      $stmt->execute();
      $customer = $stmt->fetch(PDO::FETCH_ASSOC);
    
  } catch(PDOException $error) {
    echo $sqltodo . "<br>" . $error->getMessage();
  }
}


?>