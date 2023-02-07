<?php
if (isset($_POST['save_invoice'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);
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
  

    //get deposit amount
    $new_deposit = $_POST['deposit'];
    $needs_update = False;
    $bbf=$invoice['bbf'];//bbf when this invoice was created
    $bbf_outstanding = 0; //balance
    if($bbf!=0){
      $bbf = json_decode($invoice['bbf']);
      $bbf_invoice_id = $bbf['invoice'];
      $bbf_outstanding = $bbf['balance']; 
      //deposit > outstanding balance?
      if($new_deposit > $bbf_outstanding){
        //set outstanding balance and the associated invoice_id to the new invoice->bbf
        $bbf = array("balance"=>$bbf_outstanding,"invoice"=>$bbf_invoice_id);
        $bbf_outstanding = json_encode($bbf);
      }else{
        //deposit < outstanding balance?
        //raise alert: deposit is not enough to settle outstanding balance
        $bbf_error = True;
        $bbf_message = "The deposited amount is not enough to settle outstanding balance.";
      } 
    }

    /*end ground work*/
    
    $invoice = array(
      "invoice_id" => escape($_GET["invoice_ref"]),
      "customer"  => $invoice['customer_id'],//read from print.php
      "descriptions" => $description,
      "owners" => $owner,
      "quantities" => $quantity,
      "prices" => $price,
      "amount" => str_replace( ',', '', $_POST['grand_total']),
      "bbf" => $bbf_outstanding,
      "deposit"  => $_POST['deposit'],
      "discount"     => $_POST['discount'],
      "shipping" => $_POST['shipping'],
      "vat" => $_POST['tax'],
      "mode_of_payment" => $_POST['mode_of_payment'],
      "paid" => getPaymentStatus($_POST['balance'])
    );
    $sql = "UPDATE invoices 
      SET invoice_id = :invoice_id, 
        customer = :customer, 
        descriptions = :descriptions, 
        owners = :owners, 
        quantities = :quantities, 
        prices = :prices, 
        amount = :amount,
        bbf = :bbf,
        deposit = :deposit,
        discount = :discount,
        shipping = :shipping,
        vat = :vat,
        mode_of_payment = :mode_of_payment,
        paid = :paid
      WHERE invoice_id = :invoice_id";
  
  $update_statement = $connection->prepare($sql);
  $update_statement->execute($invoice);
  } catch(PDOException $error) {
     displayError($error->getMessage());
  }
}
  
function displayError($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>
