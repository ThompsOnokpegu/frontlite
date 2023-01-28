<?php
//include required scripts 
include "scripts/read.php";
include "scripts/update.php";
include "../templates/header.php";

/*passing customer_id via AJAX caused error on the invoice & jobpage
datatable ajax queries. That's why I'm using SESSION to pass the variable to the customer datatable query.*/
$_SESSION['my_customer'] = $customer['customer_id'];
$cus= $customer['customer_id'];

//identify jobpages that are selected for invoice creation.
$count = 1;
$invoice_jobpages = [];
if(isset($_POST['submit_multiple_jobpages'])){
  $found = 0;
  for ($i=0; $i < $_SESSION['customer_jobpages_count']; $i++) {
    if(isset($_POST['jobpage'.$i])){
      array_push($invoice_jobpages,$_POST['jobpage'.$i]);
      $found++;
    }
    continue; 
  }
  $count = $found;
  if(!$count==0){
    $_SESSION['jobpages_for_invoice'] = $invoice_jobpages;
    
    echo("<script>location.href = '"."../invoices/create.php?order_ids=".implode(",",$invoice_jobpages)."&customer_id=$cus';</script>");
  }
}

?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="../dist/img/user-avatar.png"
                   alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"><?php echo $customer['firstname']." ".$customer['lastname']; ?></h3>
            <p class="text-muted text-center"><?php echo $customer['customer_id'] ?></p>
            <hr>
            <div class="text-center">
              <strong><i class="fas fa-address-card mr-1"></i> Contact</strong>
              <p class="text-muted">
              <?php echo $customer['phone']; ?><br>
              <?php echo $customer['email']; ?><br>
              <?php echo $customer['address_line1']; ?>
              <?php echo $customer['city'].", ".$customer['country']."."; ?>
              </p>
              <hr>
              <strong><i class="fas fa-palette mr-1"></i> Color Dislikes</strong>
              <p class="text-muted">
                <span class="tag tag-danger">Blue</span>
                <span class="tag tag-success">Yellow</span>
                <span class="tag tag-info">Gold</span>
              </p>
            </div>
            <hr>
            <a href=<?php echo "single.php?customer_id=".$customer['customer_id']; ?> class="btn btn-primary btn-block"><span class="nav-icon fas fa-plus-circle"></span> New Jobpage</a>
            
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->   
      </div>
      <!-- /.col -->
      <div class="col-md-12 col-lg-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#jobpages" data-toggle="tab">Job Pages</a></li>
              <li class="nav-item"><a class="nav-link" href="#measurement" data-toggle="tab">Measurement</a></li>
              <li class="nav-item"><a class="nav-link" href="#editinfo" data-toggle="tab">Edit Info</a></li>
            </ul>
           
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="jobpages">
                <!-- /.my-orders-table -->
                <?php if (!$count) { ?> 
                  
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <i class="fas fa-check-double">You need to select one or more jobpages to continue.</i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  </div>
                <?php } ?>
                <div class="card-body table-responsive">
                  
                  <form method="POST" name="multiple_jobs_invoice"> 
                    <table id="my_job_pages" class="table table-sm">
                        <thead>
                            <tr><th>Select</th>
                                <th>JobID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>View Details</th> 
                            </tr>
                        </thead>
                    </table>
                   <input type="submit" name="submit_multiple_jobpages" class="btn btn-primary btn-block" value="Create Invoice">
                  </form>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="measurement">
              <div class="row">
                    <style>
                      #header{
                        font-size: 15px;
                        background:#f9f9f9;
                        color:#333333; 
                        padding:2px;
                        font-weight:500;
                      }
                      tr>th{
                        font-weight: 400;
                        font-size: 14;
                      }
                    </style>
                    <div class="col-sm-6 col-md-4">
                        <table class="table table-sm">
                        <thead>
                            <th id="header" colspan="2">TOP</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Neck</th>
                                <td><?php echo fraformat($customer['top_neck']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>SH</th>
                                <td><?php echo fraformat($customer['top_sh']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>AL</th>
                                <td><?php if($customer['top_al1']){echo fraformat($customer['top_al1']);}else{echo "";} ?></td>                                        
                            </tr>
                            <tr>
                                <th>BL</th>
                                <td><?php if($customer['top_bl1']){echo fraformat($customer['top_bl1']);}else{echo "";} ?></td>
                            </tr>
                            <tr>
                                <th>Burst</th>
                                <td><?php if($customer['top_burst1']){echo fraformat($customer['top_burst1']);}else{echo "";} ?></td>
                            </tr>
                            <tr>
                                <th>RA</th>
                                <td><?php if($customer['top_ra1']){echo fraformat($customer['top_ra1']);}else{echo "";} ?></td>
                            </tr> 
                            <tr>
                                <th>Cuff</th>
                                <td><?php echo fraformat($customer['top_cuffs']); ?></td>                           
                            </tr> 
                            <tr>
                                <th>AL (Under)</th>
                                <td><?php echo fraformat($customer['top_alunder']); ?></td>                          
                            </tr> 
                            <tr>
                                <th>Burst - Burst</th>
                                <td><?php echo fraformat($customer['top_burstburst']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Wrist</th>
                                <td><?php echo fraformat($customer['top_wrist']); ?></td>                         
                            </tr> 
                            <tr>
                                <th>Arm Hole</th>
                                <td><?php echo fraformat($customer['top_armhole']); ?></td>                           
                            </tr> 
                            <tr>
                                <th>Side Joining</th>
                                <td><?php echo fraformat($customer['top_sidejoining']); ?></td>                          
                            </tr>                                    
                        </tbody>
                        </table>
                 
                        
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table table-sm">
                        <thead>
                            <th id="header" colspan="2">TROUSER</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Waist</hd>
                                <td><?php echo fraformat($customer['pant_waist']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>Lap</th>
                                <td><?php echo fraformat($customer['pant_lap']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>TL</th>
                                <td><?php echo fraformat($customer['pant_tl']); ?></td>                                        
                            </tr>
                            <tr>
                                <th>Knee</th>
                                <td><?php echo fraformat($customer['pant_knee']); ?></td>                                       
                            </tr>
                            <tr>
                                <th>Ankle</th>
                                <td><?php echo fraformat($customer['pant_ankle']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Hips</th>
                                <td><?php echo fraformat($customer['pant_hips']); ?></td>                           
                            </tr>
                            <tr>
                                <th>WK</th>
                                <td><?php echo fraformat($customer['pant_wk']); ?></td>                          
                            </tr>
                            <tr>
                                <th>Front Crotch</th>
                                <td><?php echo fraformat($customer['pant_frontcrotch']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Back Crotch</th>
                                <td><?php echo fraformat($customer['pant_backcrotch']); ?></td>                           
                            </tr>
                            <tr>
                                <th>Inseam</th>
                                <td><?php echo fraformat($customer['pant_inseam']); ?></td>                         
                            </tr> 
                            <tr>
                                <th>Calve</th>
                                <td><?php echo fraformat($customer['calve']); ?></td>                         
                            </tr>                                   
                        </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 col-md-4">
                    <table class="table table-sm">
                        <thead>
                            <th id="header" colspan="2">AGBADA</th>
                        </thead>  
                        <tbody>
                            <tr>
                                <th>Length</hd>
                                <td><?php echo fraformat($customer['agbada_length']); ?></td>                                     
                            </tr>
                            <tr>
                                <th>Width</th>
                                <td><?php echo fraformat($customer['agbada_width']); ?></td>                                      
                            </tr>
                            <tr>
                                <th>Head</th>
                                <td><?php echo fraformat($customer['agbada_head']); ?></td>                                        
                            </tr>
                                                              
                        </tbody>
                        </table>
                    </div>
                    <a href="<?php echo 'single.php?customer_id='.$customer['customer_id']; ?>" type="button" class="btn btn-primary btn-block"><i class="nav-icon fas fa-edit"></i> Edit Measurement</a>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="editinfo">
                <form method="POST" class="form-horizontal">
                  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                  <input type="hidden" name="customer_id" value="<?php echo escape($customer["customer_id"]); ?>"> 
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="firstname" value='<?php echo $customer['firstname'] ?>' class="form-control" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="lastname" value='<?php echo $customer['lastname'] ?>' class="form-control" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" value='<?php echo $customer['phone'] ?>' class="form-control" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" value='<?php echo $customer['email'] ?>'class="form-control" placeholder="Email">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input name="address_line1" value="<?php echo $customer['address_line1']; ?>" class="form-control" placeholder="Address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" name="city" value='<?php echo $customer['city'] ?>'class="form-control" placeholder="City">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                      <input type="text" name="country" value='<?php echo $customer['country'] ?>'class="form-control" placeholder="Country">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                    <input type="submit" name="update_customer_info" value="Update Info" class="btn btn-primary">
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- Main content -->

</div>
<!-- /.content-wrapper -->
<?php include "../templates/footer.php"; ?>


                    
