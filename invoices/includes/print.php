<?php

require "../config.php";
require "../common.php";
//FETCH all invoices belonging to a customer
if(isset($_GET['invoice_ref']))   {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['invoice_ref'];

        $sql = "SELECT * FROM invoices JOIN customers ON invoices.customer = customers.customer_id WHERE invoices.invoice_id = :invoice_id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':invoice_id', $id);
        $statement->execute();
        
        $invoice = $statement->fetch(PDO::FETCH_ASSOC);
          
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>
