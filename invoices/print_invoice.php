<?php include "includes/print.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Front Desk | Ebewele Brown</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Theme style -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <style>
    @media print { 
    .table th { 
        background-color: transparent !important; 
        } 
    }
    .teehead,.account{background:#3C7DA5; color:#444444;}
    table,address{font-size:18px;}
    td,th{border-top:1px solid #AAAAAA!important;}
    @page { margin: .5cm } /* All margins set to .5cm */
    @page :first {
        margin-top: 1cm /* Top margin on first page 1cm */
    }
    
    </style>
</head>
<body class="hold-transition">
<div class="wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <?php
            $ribbon_balance = 1;
            if($ribbon_balance==0){
          ?>
          <div class="position-relative">
            <div class="ribbon-wrapper ribbon-xl">
              <div class="ribbon bg-success text-xl">
                Paid
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
              <div class="col-md-12 d-flex justify-content-center">
                <div class="row">
                  <div class="col-sm-12" style="text-align:center;">
                    <img src="../dist/img/ebewele.jpg" alt="Ebewele Brown" width="450px">
                  </div>
                  <div class="col-sm-12" style="text-align:center;padding-bottom:1rem;">
                  <address class="addy">
                    <span style="font-weight: 400;font-size:medium; color:#555555;"><i class="fas fa-map-marker-alt"></i> 41 Durban Street, Abuja | <i class="fas fa-phone-alt"></i></i> +234-818-559-3669 | <i class="far fa-envelope"></i></i> customerservice@ebewelebrown.com </span>
                    <!-- customerservice@ebewelebrown.com -->
                  </address>
                  </div>
                </div>   
              </div>
                <!-- /.col -->
              </div>
              <br>
              <div class="row invoice-info">
                
                <!-- /.col -->
                <div class="col-sm-6 invoice-co">
                  <?php
                    if(isset($_GET['order_id'])){
                      $_SESSION['jobpages'] = $_GET['order_id'];
                    }
                  ?>
                  
                  <h3 style="font-weight:400!important;"><?php echo $invoice['firstname']." ".$invoice['lastname'];?></h3>
                  <address>
                    <?php echo $invoice['address_line1'].", ";?>
                    <?php echo $invoice['city']." ".$invoice['country'];?><br>
                    <?php echo $invoice['phone'];?><br>
                    <?php echo $invoice['email'];?>
                  </address>
                  <h3 style="font-weight:300!important;font-size:medium;" ><?php echo "Job Ref: ".$_SESSION['jobpages']; unset($_SESSION['jobpages']);?></h3>
                </div>
                <!-- /.col -->
                
                <div class="col-sm-6 invoice-col">
                
                  <address style="text-align: right;">
                    <h3>PAYMENT</h3>
                     Ebewele Brown Nigeria Ltd.<br>
                     Guarantee Trust Bank PLC.<br>
                     0301688887<br> 
                    <h3 style="font-weight:300!important;"><?php echo "Invoice # ".$invoice['invoice_id'];?></h3>
                    <?php echo $invoice['issued_date'] ?><br>
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                    <br>
                  <table class="table">
                    <thead class="teehea">
                    <tr style="background:#eeeeee;padding:2px;color:black;">
                      <th>#</th>
                      <th>Description</th>
                      <th>Item Owner</th>
                      <th>Qty</th>
                      <th>Amount</th>                    
                      <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      $des = json_decode($invoice['descriptions'], true);
                      $price = json_decode($invoice['prices'],true);
                      $owner = json_decode($invoice['owners'],true);
                      $qty = json_decode($invoice['quantities'],true);
                      
                      
                      $count = 0;
                      $sum_ln_total = 0;
                      foreach ($des as $key => $value) {
                        if($value==""){
                          break;
                        }
                        $count +=1;
                      }
                      for ($i=1; $i <= $count; $i++) { 
                        $sum_ln_total += $qty['qty'.$i] * $price['price'.$i];
                        echo "<tr class='invoice-row'><td>".$i."</td><td>".$des['des'.$i]."</td><td>".$owner['owner'.$i]."</td><td>".$qty['qty'.$i]."</td><td>"."₦".number_format($price['price'.$i],2)."</td><td>"."₦".number_format($qty['qty'.$i] * $price['price'.$i],2)."</td></tr>";
                        
                      }
                      $bbf = json_decode($invoice['bbf'],true);
                      $bbf_balance = 0;
                      if(!$bbf==0){
                        $bbf_balance = $bbf['balance'];
                        $bbf_invoice = $bbf['invoice'];
                        echo "<tr class='invoice-row'><td></td><td colspan='3' class='text-muted'>Balance Brought Forward - Ref: ".$bbf_invoice."</td><td class='text-muted'>₦".number_format($bbf_balance,2)."</td><td class='text-muted'>₦".number_format($bbf_balance,2)."</td></tr>";
                      }

                  
                 
                    ?>
                    <tr>
                      <td colspan="6">&nbsp;</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Method Used:</p>
                 
                  <h3 class="text-muted well well-sm shadow-none" style="margin-top: 10px; padding-left:10px;">
                   <?php echo $invoice['mode_of_payment']; ?>
                  </h3>
                </div>
                
                <!-- /.col -->
                <div class="col-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php
                        $sub_total =  $sum_ln_total;
                        echo "₦".number_format($sub_total,2);
                        ?></td>
                      </tr>
                      <tr>
                        <th><?php if($invoice['vat']=="0.00"){ echo "VAT-Free";} else{ echo "VAT (7.5%)";}?></th>
                        <td><?php echo "₦".number_format(str_replace(',','',$invoice['vat']),2);?></td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td><?php echo "₦".number_format($invoice['shipping'],2);?></td>
                      </tr>
                      <tr class="account" style="color:black;background:#eeeeee;border-top: 2px solid #072F5F;">
                        <th>Grand Total:</th>
                        <th><?php 
                        $grand_total = $sub_total + $invoice['shipping'] + $invoice['vat'] + $bbf_balance;
                        //used for ribbon display
                        $ribbon_balance = $grand_total - $invoice['deposit'] - $invoice['discount'];
                        echo "₦".number_format(str_replace( ',', '',$grand_total ),2);?></th>
                      </tr>
                      <tr>
                        <th>Discount:</th>
                        <td><?php echo "₦".number_format($invoice['discount'],2);?></td>
                      </tr>
                      <tr>
                        <th>Deposit:</th>
                        <td><?php echo "₦".number_format($invoice['deposit'],2);?></td>
                      </tr>
                      <tr class="accoun" style="border-top: 2px solid #888888;">
                        <th>Balance:</th>
                        <th><?php echo "₦".number_format(str_replace( ',', '', $grand_total - $invoice['deposit'] - $invoice['discount']),2);?></th>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <br>
              <br>
              <div class="row">
                <div class="col-12">
                  <table>
                      <thead class="table table-striped">
                          <tr>
                              <td><strong>TERMS & CONDITIONS</strong></td>
                          </tr>
                          <tr>
                              <td>We require every client to come for fitting on the scheduled date given to them, as alterations and adjustments must be made on the same day. This is important because failure to make it for your fitting, will delay your order almost indefinitely.<br>
                              Please ensure to make <strong>FULL PAYMENT</strong> at delivery date. Failure to do so gives the company the right to withhold your order until payment is made. 
                            </td>
                          </tr>
                          <tr>
                              <td style="font-size:18px;"><strong>PLEASE ALL FABRICS SHOULD BE DRY CLEANED</strong></td>
                          </tr>
                      </thead>
                  </table>
                </div>
              </div>
              <div class="row">
                  <div class="col-12 text-center"><strong><br><em>THANK YOU FOR YOUR PATRONAGE</em></strong><br></div>
              </div>
            </div>
            <!-- /.invoice -->
            
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </section>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
