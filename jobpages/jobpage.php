<?php 
//include "includes/print.php"; 
//include "../customers/scripts/read.php";
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

<?php include "../templates/header.php"; ?>
<style>
    table.table-bordered > thead > tr > th{
  border:1px solid black;
}
table.table-bordered > tbody > tr >td,table.table-bordered > tbody > tr > th{
    border:1px solid black;
}
@media print {
   * { color: black; }
   th,tr,td,thead { font-size: 22px; border:1px solid black; }
   h4,h5{
    background:#00004d;color:gold; padding:4px;
   }
   thead>tr>th{
       background:#00004d;
   }
}
</style>
<!-- Main content -->
<section class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="callout callout-info">
                    <div class="row no-print">
                        <div class="col-12">
                            <style>
                                .jpage{
                                    text-decoration: none!important;
                                    color:#ffffff!important;
                                }
                                .print{
                                    background-color: #F7F7F7!important;
                                    text-decoration: none!important;
                                }
                                .print:hover{
                                    color:#117A8B!important;
                                }
                            </style>
                            <a href=<?php echo "./print_jobpage.php?order_id=".$design['order_id']."&customer_id=".$customer['customer_id']; ?> target="_blank" class="btn btn-default print"><i class="fas fa-print"></i> Print</a>
                            <a href=<?php echo "edit.php?order_id=".$design['order_id']."&customer_id=".$customer['customer_id']; ?> class="btn btn-success float-right jpage"><i class="far fa-edit"></i> Edit design
                            </a>
                            <?php if($design['has_invoice']==0){ ?>
                                <a href=<?php echo "../invoices/create.php?order_id=".$design['order_id']."&customer_id=".$customer['customer_id']; ?> class="btn btn-primary float-right jpage" style="margin-right: 5px;">
                                    <i class="fas fa-file-invoice-dollar"></i> Generate Invoice
                                </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
          <!-- /.card-header -->
            
          <div class="card-body">
          <div class="container">
                
                <div class="row" style="padding-top:10px;padding-bottom:10px;">
                     <div class="col-6">    
                        <h5><?php echo strtoupper($customer['firstname']." ".$customer['lastname'])."<br><small><strong>".$design['order_id']."<br>Date: ".$design['order_date'];?></strong></small></strong></h3>     
                    </div>
                    <div class="col-6" style="text-align: right">                     
                        <img src="../dist/img/ebewele.jpg" alt="Ebewele Brown" width="350px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                       <h4 style="background:#3C7DA5;color:white; padding:4px;">JOB DESCRIPTION</h4>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <table class="table">
                        <tbody>
                            <tr>
                                <th>BL</hd>
                                <td><?php echo fraformat($design['bl']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>Sleeve</th>
                                <td><?php echo fraformat($design['sleeve']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>Neck</th>
                                <td><?php echo fraformat($design['neck']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>Embroidery</th>
                                <td><?php echo fraformat($design['embroy']); ?></td>                                       
                            </tr>
                            <tr>
                                <th>Underlay</th>
                                <td><?php echo fraformat($design['underlay']); ?></td>                           
                            </tr>                                   
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table table">
                        <tbody>
                            <tr>
                                <th>Pant Type</hd>
                                <td><?php echo fraformat($design['pant']); ?></td>                                   
                            </tr>
                            <tr>
                                <th>Back Detailing</th>
                                <td><?php echo fraformat($design['back_detailing']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>Back Pocket</th>
                                <td><?php echo fraformat($design['back_pocket']); ?></td>                                        
                            </tr>
                            <tr>
                                <th>Chest Pocket</th>
                                <td><?php echo fraformat($design['chest_pocket']); ?></td>                                       
                            </tr>
                            <tr>
                                <th>Side Pocket</th>
                                <td><?php echo fraformat($design['side_pocket']); ?></td>                           
                            </tr>                                   
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table table">  
                        <tbody>
                            <tr>
                                <th>Verified</hd>
                                <td>&nbsp;</td>                                     
                            </tr>
                            <tr>
                                <th>Color Dislike</th>
                                <td><?php echo $design['color_dislike']; ?></td>                                      
                            </tr>
                            <tr>
                                <th>Design</th>
                                <td><?php echo $design['design']; ?></td>                                       
                            </tr>
                                                              
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <br>
                        <thead>
                            <tr class="text-center account"><h4 style="background:#3C7DA5;color:white; padding:4px;">MEASUREMENT</h4></tr>
                        </thead>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <table class="table">
                        <thead>
                            <th colspan="2" style="font-size:20px;">TOP</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Neck</hd>
                                <td><?php echo fraformat($design['top_neck']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>SH</th>
                                <td><?php echo fraformat($design['top_sh']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>AL</th>
                                <td><?php if($design['top_al1']){echo fraformat($design['top_al1']);}else{echo "";} ?></td>                                        
                            </tr>
                            <tr>
                                <th>BL</th>
                                <td><?php if($design['top_bl1']){echo fraformat($design['top_bl1']);}else{echo "";} ?></td>
                            </tr>
                            <tr>
                                <th>Burst</th>
                                <td><?php if($design['top_burst1']){echo fraformat($design['top_burst1']);}else{echo "";} ?></td>
                            </tr>
                            <tr>
                                <th>RA</th>
                                <td><?php if($design['top_ra1']){echo fraformat($design['top_ra1']);}else{echo "";} ?></td>
                            </tr> 
                            <tr>
                                <th>Cuff</th>
                                <td><?php echo fraformat($design['top_cuffs']); ?></td>                           
                            </tr> 
                            <tr>
                                <th>AL (Under)</th>
                                <td><?php echo fraformat($design['top_alunder']); ?></td>                          
                            </tr> 
                            <tr>
                                <th>Burst - Burst</th>
                                <td><?php echo fraformat($design['top_burstburst']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Wrist</th>
                                <td><?php echo fraformat($design['top_wrist']); ?></td>                         
                            </tr> 
                            <tr>
                                <th>Arm Hole</th>
                                <td><?php echo fraformat($design['top_armhole']); ?></td>                           
                            </tr> 
                            <tr>
                                <th>Side Joining</th>
                                <td><?php echo fraformat($design['top_sidejoining']); ?></td>                          
                            </tr>                                    
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table">
                        <thead>
                            <th colspan="2" style="font-size:20px;">TROUSER</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Waist</hd>
                                <td><?php echo fraformat($design['pant_waist']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>Lap</th>
                                <td><?php echo fraformat($design['pant_lap']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>TL</th>
                                <td><?php echo fraformat($design['pant_tl']); ?></td>                                        
                            </tr>
                            <tr>
                                <th>Knee</th>
                                <td><?php echo fraformat($design['pant_knee']); ?></td>                                       
                            </tr>
                            <tr>
                                <th>Ankle</th>
                                <td><?php echo fraformat($design['pant_ankle']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Hips</th>
                                <td><?php echo fraformat($design['pant_hips']); ?></td>                           
                            </tr>
                            <tr>
                                <th>WK</th>
                                <td><?php echo fraformat($design['pant_wk']); ?></td>                          
                            </tr>
                            <tr>
                                <th>Front Crotch</th>
                                <td><?php echo fraformat($design['pant_frontcrotch']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Back Crotch</th>
                                <td><?php echo fraformat($design['pant_backcrotch']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Inseam</th>
                                <td><?php echo fraformat($design['pant_inseam']); ?></td>                         
                            </tr> 
                            <tr>
                                <th>Calve</th>
                                <td><?php echo fraformat($design['calve']); ?></td>                         
                            </tr>                                   
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table">
                        <thead>
                            <th colspan="2" style="font-size:20px;">AGBADA</th>
                        </thead>  
                        <tbody>
                            <tr>
                                <th>Length</hd>
                                <td><?php echo fraformat($design['agbada_length']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>Width</th>
                                <td><?php echo fraformat($design['agbada_width']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>Head</th>
                                <td><?php echo fraformat($design['agbada_head']); ?></td>                                        
                            </tr>
                                                              
                        </tbody>
                        </table>
                    </div>

                </div>
                <div class="row">
                <div class="col-12">
                        <thead>
                            <tr class="text-center"><h5 style="background:#3C7DA5;color:white; padding:4px 6px;">BROWN'S NOTE</h5></tr>
                        </thead>
                    </div>
                <table class="table table-sm">
                        <tbody>
                            <tr>
                                <th>&nbsp;</hd>                                     
                            </tr>
                            <tr>
                                <td>&nbsp;</td>                                      
                            </tr> 
                            <tr>
                                <th>&nbsp;</hd>                                     
                            </tr>
                            <tr>
                                <th>&nbsp;</hd>                                     
                            </tr>
                            <tr>
                                <td>&nbsp;</td>                                      
                            </tr>               
                            <tr>
                                <th>&nbsp;</hd>                                     
                            </tr>
                            <tr>
                                <td>&nbsp;</td>                                      
                            </tr>                                
                        </tbody>
                        </table>
                        <br><br>
                        <h3>Customer's Signature:_______________________________</h3>
                </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "../templates/footer.php"; ?>