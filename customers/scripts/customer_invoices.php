<?php

require "../../config.php";
require "../../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $customer = $_SESSION['my_customer'];
  $sql = "SELECT * FROM invoices WHERE customer = '$customer' ORDER BY invoice_id DESC LIMIT 10";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $customer_invoices = $statement->fetchAll();
  $cus_invoices = array();
  
  foreach ($customer_invoices as $invoice) {
      $bbf = $invoice['bbf'];
      
      if(!$bbf==0){
        $bbf = json_decode($invoice['bbf'],true);
        $bbf = $bbf['balance'];
      }
      $amount = str_replace( ',', '', $invoice['amount'] - $bbf );
      
      array_push($invoice,'<a type="button" class="btn btn-info btn-xs" href="../invoices/invoice.php?invoice_ref='.$invoice[0].'&order_id='.$invoice['order_id'].'">View Invoice</a>');
      array_push($invoice,'<a type="button" class="btn btn-info btn-xs" href="../invoices/edit_invoice.php?invoice_ref='.$invoice[0].'">Edit Invoice</a>');
      
      $invoice['bbf'] = $bbf;
      $invoice['balance'] = number_format(intval($amount) - intval($invoice['deposit']) - intval($invoice['discount']),2);
      $invoice['amount'] = number_format($amount,2);
      $invoice['deposit'] = number_format($invoice['deposit'],2);
      $cus_invoices[] = $invoice;
      
  }
  echo json_encode($cus_invoices);
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>