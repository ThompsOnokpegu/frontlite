<?php

require "../../config.php";
require "../../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM invoices JOIN customers WHERE invoices.customer = customers.customer_id";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $results = $statement->fetchAll();
  $invoices = array();
  
  foreach ($results as $invoice) {
      $bbf = $invoice['bbf'];
      
      if(!$bbf==0){
        $bbf = json_decode($invoice['bbf'],true);
        $bbf = $bbf['balance'];
      }
      $amount = str_replace( ',', '', $invoice['amount'] - $bbf );
      
      array_push($invoice,'<a type="button" class="btn btn-info btn-xs" href="print_invoice.php?invoice_ref='.$invoice[0].'&order_id='.$invoice['order_id'].'" target="_blank">Print Invoice</a>');
      array_push($invoice,'<a type="button" class="btn btn-info btn-xs" href="edit_invoice.php?invoice_ref='.$invoice[0].'">Edit Invoice</a>');
      
      $invoice['bbf'] = $bbf;
      $invoice['client'] = $invoice['firstname']." ".$invoice['lastname'];
      $invoice['balance'] = number_format(intval($amount) - intval($invoice['deposit']) - intval($invoice['discount']),2);
      $invoice['amount'] = number_format($amount,2);
      $invoice['deposit'] = number_format($invoice['deposit'],2);
      $invoices[] = $invoice;
      
  }
  echo json_encode($invoices);
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>