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
//$customer['dob_month'] = "04"; $customer['dob_day']="25";
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
            <p class="text-muted text-center"><?php echo calendar_month($customer['dob_month'])." ".$customer['dob_day'];
              echo ' <small class="badge badge-secondary"><i class="far fa-clock"></i> '.days_to_birth("2000-".$customer['dob_month']."-".$customer['dob_day']).' Days Left</small>';
            ?></p>
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
              <li class="nav-item"><a class="nav-link" href="#invoices" data-toggle="tab">Invoices</a></li>
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
                    <label class="col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-10">
                      <div class="form-row">
                        <div class="col-6">
                          
                          <select name="month" class="custom-select">
                            <option <?php if(escape($customer['dob_month'])=="01") echo "selected='selected'";?> value="01">January</option>
                            <option <?php if(escape($customer['dob_month'])=="02") echo "selected='selected'";?> value="02">February</option>
                            <option <?php if(escape($customer['dob_month'])=="03") echo "selected='selected'";?> value="03">March</option>
                            <option <?php if(escape($customer['dob_month'])=="04") echo "selected='selected'";?> value="04">April</option>
                            <option <?php if(escape($customer['dob_month'])=="05") echo "selected='selected'";?> value="05">May</option>
                            <option <?php if(escape($customer['dob_month'])=="06") echo "selected='selected'";?> value="06">June</option>
                            <option <?php if(escape($customer['dob_month'])=="07") echo "selected='selected'";?> value="07">July</option>
                            <option <?php if(escape($customer['dob_month'])=="08") echo "selected='selected'";?> value="08">August</option>
                            <option <?php if(escape($customer['dob_month'])=="09") echo "selected='selected'";?> value="09">September</option>
                            <option <?php if(escape($customer['dob_month'])=="10") echo "selected='selected'";?> value="10">October</option>
                            <option <?php if(escape($customer['dob_month'])=="11") echo "selected='selected'";?> value="11">November</option>
                            <option <?php if(escape($customer['dob_month'])=="12") echo "selected='selected'";?> value="12">December</option>
                          </select> 
                        </div>
                        <div class="col-6">
                          <select name="day" class="custom-select">
                            <option <?php if(escape($customer['dob_day'])=="01") echo "selected='selected'";?> value="01">1</option>
                            <option <?php if(escape($customer['dob_day'])=="02") echo "selected='selected'";?> value="02">2</option>
                            <option <?php if(escape($customer['dob_day'])=="03") echo "selected='selected'";?> value="03">3</option>
                            <option <?php if(escape($customer['dob_day'])=="04") echo "selected='selected'";?> value="04">4</option>
                            <option <?php if(escape($customer['dob_day'])=="05") echo "selected='selected'";?> value="05">5</option>
                            <option <?php if(escape($customer['dob_day'])=="06") echo "selected='selected'";?> value="06">6</option>
                            <option <?php if(escape($customer['dob_day'])=="07") echo "selected='selected'";?> value="07">7</option>
                            <option <?php if(escape($customer['dob_day'])=="08") echo "selected='selected'";?> value="08">8</option>
                            <option <?php if(escape($customer['dob_day'])=="09") echo "selected='selected'";?> value="09">9</option>
                            <option <?php if(escape($customer['dob_day'])=="10") echo "selected='selected'";?> value="10">10</option>
                            <option <?php if(escape($customer['dob_day'])=="11") echo "selected='selected'";?> value="11">11</option>
                            <option <?php if(escape($customer['dob_day'])=="12") echo "selected='selected'";?> value="12">12</option>
                            <option <?php if(escape($customer['dob_day'])=="13") echo "selected='selected'";?> value="13">13</option>
                            <option <?php if(escape($customer['dob_day'])=="14") echo "selected='selected'";?> value="14">14</option>
                            <option <?php if(escape($customer['dob_day'])=="15") echo "selected='selected'";?> value="15">15</option>
                            <option <?php if(escape($customer['dob_day'])=="16") echo "selected='selected'";?> value="16">16</option>
                            <option <?php if(escape($customer['dob_day'])=="17") echo "selected='selected'";?> value="17">17</option>
                            <option <?php if(escape($customer['dob_day'])=="18") echo "selected='selected'";?> value="18">18</option>
                            <option <?php if(escape($customer['dob_day'])=="19") echo "selected='selected'";?> value="19">19</option>
                            <option <?php if(escape($customer['dob_day'])=="20") echo "selected='selected'";?> value="20">20</option>
                            <option <?php if(escape($customer['dob_day'])=="21") echo "selected='selected'";?> value="21">21</option>
                            <option <?php if(escape($customer['dob_day'])=="22") echo "selected='selected'";?> value="22">22</option>
                            <option <?php if(escape($customer['dob_day'])=="23") echo "selected='selected'";?> value="23">23</option>
                            <option <?php if(escape($customer['dob_day'])=="24") echo "selected='selected'";?> value="24">24</option>
                            <option <?php if(escape($customer['dob_day'])=="25") echo "selected='selected'";?> value="25">25</option>
                            <option <?php if(escape($customer['dob_day'])=="26") echo "selected='selected'";?> value="26">26</option>
                            <option <?php if(escape($customer['dob_day'])=="27") echo "selected='selected'";?> value="27">27</option>
                            <option <?php if(escape($customer['dob_day'])=="28") echo "selected='selected'";?> value="28">28</option>
                            <option <?php if(escape($customer['dob_day'])=="29") echo "selected='selected'";?> value="29">29</option>
                            <option <?php if(escape($customer['dob_day'])=="30") echo "selected='selected'";?> value="30">30</option>
                            <option <?php if(escape($customer['dob_day'])=="31") echo "selected='selected'";?> value="31">31</option>
                          </select>
                        </div>
                      </div>
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
              <div class="tab-pane" id="invoices">
                <!-- /.customer-invoices-table -->
                <div class="card-body table-responsive">
                    <table id="customer_invoices" class="table table-sm">
                      <thead>
                        <tr>
                          <th>Invoice ID</th>
                          <th>Amount</th>
                          <th>Deposit</th>
                          <th>Print</th>
                          <th>Edit</th>
                        </tr>
                      </thead>
                    </table>
                </div>
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


                    
