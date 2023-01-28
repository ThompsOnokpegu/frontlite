<?php

/**
 * List all users with a link to edit
 */
require "../config.php";
require "../common.php";

if(isset($_GET['order_id']))   {
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
} else {
    echo "Something went wrong!";
    exit;
}

if(isset($_GET['customer_id']))   {
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
