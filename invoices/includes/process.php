<?php

if (isset($_POST['submit_invoice'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
/**
  * Use an HTML form to create a new entry in the
  * users table.
  *
  */
  try {
    $connection = new PDO($dsn, $username, $password, $options);    
    
    //get deposit amount
    $new_deposit = $_POST['deposit'];
    
    $needs_update = False;
    if(!$bbf_outstanding == 0){
      //deposit > outstanding balance?
      if($new_deposit > $bbf_outstanding){
        //set outstanding balance and the associated invoice_id to the new invoice->bbf
        $bbf = array("balance"=>$bbf_outstanding,"invoice"=>$bbf_invoice);
        $bbf_outstanding = json_encode($bbf);
        //set whether invoice needs update
        $needs_update = True;    
      }else{
        //deposit < outstanding balance?
        //raise alert: deposit is not enough to settle outstanding balance
        $bbf_error = True;
        $bbf_message = "The deposited amount is not enough to settle outstanding balance.";
      }
    }
    /*ground work*/

    //DESCRIPTIONS
    $d1 = $_POST['des1'];
    $d2 = $_POST['des2'];
    $d3 = $_POST['des3'];
    $d4 = $_POST['des4'];
    $d5 = $_POST['des5'];
    $d6 = $_POST['des6'];
    $d7 = $_POST['des7'];
    //OWNERS
    $o1 = $_POST['owner1'];
    $o2 = $_POST['owner2'];
    $o3 = $_POST['owner3'];
    $o4 = $_POST['owner4'];
    $o5 = $_POST['owner5'];
    $o6 = $_POST['owner6'];
    $o7 = $_POST['owner7'];
    //QUANTITIES
    $q1 = $_POST['qty1'];
    $q2 = $_POST['qty2'];
    $q3 = $_POST['qty3'];
    $q4 = $_POST['qty4'];
    $q5 = $_POST['qty5'];
    $q6 = $_POST['qty6'];
    $q7 = $_POST['qty7'];
    //UNIT PRICES
    $p1 = $_POST['price1'];
    $p2 = $_POST['price2'];
    $p3 = $_POST['price3'];
    $p4 = $_POST['price4'];
    $p5 = $_POST['price5'];
    $p6 = $_POST['price6'];
    $p7 = $_POST['price7'];

    $descriptions = array("des1"=>$d1,"des2"=>$d2,"des3"=>$d3,"des4"=>$d4,"des5"=>$d5,"des6"=>$d6,"des7"=>$d7);
    $quantities = array("qty1"=>$q1,"qty2"=>$q2,"qty3"=>$q3,"qty4"=>$q4,"qty5"=>$q5,"qty6"=>$q6,"qty7"=>$q7);
    $prices = array("price1"=>$p1,"price2"=>$p2,"price3"=>$p3,"price4"=>$p4,"price5"=>$p5,"price6"=>$p6,"price7"=>$p7);
    $owners = array("owner1"=>$o1,"owner2"=>$o2,"owner3"=>$o3,"owner4"=>$o4,"owner5"=>$o5,"owner6"=>$o6,"owner7"=>$o7);

    $description = json_encode($descriptions);
    $quantity = json_encode($quantities);
    $price = json_encode($prices);
    $owner = json_encode($owners);
  
    /*end ground work*/
    $jobpages = $_SESSION['jobpages'];
    $invoice_id = getInvoiceId($_GET["customer_id"]);
    $invoice = array(
      "invoice_id" => $invoice_id,
      "order_id" => $jobpages,
      "customer"  => $customer['customer_id'],//read from read.php in create.php
      "descriptions" => $description,
      "owners" => $owner,
      "quantities" => $quantity,
      "prices" => $price,
      "amount" => str_replace( ',', '', $_POST['grand_total']),
      "deposit"  => $_POST['deposit'],
      "discount"     => $_POST['discount'],
      "shipping" => $_POST['shipping'],
      "vat" => $_POST['tax_total'],
      "mode_of_payment" => $_POST['mode_of_payment'],
      "paid" => getPaymentStatus($_POST['balance']),
      "bbf" => $bbf_outstanding
    );


    $sql = sprintf(
  "INSERT INTO %s (%s) values (%s)",
  "invoices",
  implode(", ", array_keys($invoice)),
  ":" . implode(", :", array_keys($invoice))
      );

    $statement = $connection->prepare($sql);
    
    //IF INVOICE IS CREATED SUCCESSFULLY
    if($statement->execute($invoice)){
    
      //CLEAR OLD BALANCE:There can only be one outstanding balance in a customer's invoices.
      try{
        if($needs_update){
          //update the invoice that had the outstanding balance: mark balance as paid
          $paid = array(
            "paid"=>1,
            "invoice_id"=>$bbf_invoice
          );
          $paid_sql = "UPDATE invoices SET paid = :paid WHERE invoice_id = :invoice_id";
          $update_statement = $connection->prepare($paid_sql);
          if($update_statement->execute($paid)){
           $message="success";
          }
           
        }
      }catch(PDOException $error) {
        echo $paid_sql . "<br>" . $error->getMessage();
      }
      
      //UPDATE orders has_invoice: prevent creating multiple invoices for a single order
      //get order_id(s)
      try{
        $jobcount = $_SESSION['jobcount'];
        
        if($jobcount>1){
          //multiple jobpages found in this invoice
          foreach(explode(",",$jobpages) as $order_id){
            $inv = array("order_id"=>$order_id,"has_invoice"=>1);
            $sq = "UPDATE orders SET has_invoice = :has_invoice WHERE order_id = :order_id";
            $ustmt = $connection->prepare($sq);
            if($ustmt->execute($inv)){
              $multiple_jobpages_updated = True; 
            }

            $jobinv = ["order_id"=>$order_id,"invoice_id"=>$invoice_id];
            //$sql = sprintf("INSERT INTO %s (%s) values (%s)","orders_invoice",implode(", ", array_keys($jobinv)),":" . implode(", :", array_keys($jobinv)));
            $sq = "INSERT INTO orders_invoice (order_id,invoice_id) values(:order_id,:invoice_id)";
            $istmt = $connection->prepare($sq);
            if($istmt->execute($jobinv)){
              $multiple_jobpages_inserted = True; 
            }
            //TODO: on delete:UPDATE orders SET has_invoice = 0 where order_id = order_id
          } 
        }else{
          //single jobpage found in this invoice
          $inv = array("order_id"=>$jobpages,"has_invoice"=>1);
          $sq = "UPDATE orders SET has_invoice = :has_invoice WHERE order_id = :order_id";
          $ustmt = $connection->prepare($sq);
          if($ustmt->execute($inv)){
            $single_jobpage_updated=True;
          } 

          $jobinv = array("order_id"=>$jobpages,"invoice_id"=>$invoice_id);
          //$sql = sprintf("INSERT INTO %s (%s) values (%s)","orders_invoice",implode(", ", array_keys($jobinv)),":" . implode(", :", array_keys($jobinv)));
          $sq = "INSERT INTO orders_invoice (order_id,invoice_id) values(:order_id,:invoice_id)";
          $istmt = $connection->prepare($sq);
          if($istmt->execute($jobinv)){
            $single_jobpage_inserted=True;
          }

        }
        header("Location: ./invoice.php?invoice_ref=".$invoice['invoice_id']."&order_id=".$jobpages);
      } catch(PDOException $error) {
        echo $sq . "<br>" . $error->getMessage();
      }

      
      
    }
      
    
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
  unset($_SESSION['jobcount']);
  unset($_SESSION['jobpages']);   
}
?>