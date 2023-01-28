
<?php 
include "scripts/read.php";
include "../templates/header.php";

?>
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section> -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
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
            <strong><i class="fas fa-book mr-1"></i> Contact</strong>
            <p class="text-muted">
            <?php echo $customer['phone']; ?><br>
            <?php echo $customer['email']; ?><br>
            <?php echo $customer['address_line1']; ?>
            <?php echo $customer['city'].", ".$customer['country']."."; ?>
            </p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Color Dislikes</strong>
            <p class="text-muted">
              <span class="tag tag-danger">Blue</span>
              <span class="tag tag-success">Yellow</span>
              <span class="tag tag-info">Gold</span>
            </p>
            <hr>
            <a href="#" type="button" class="btn btn-primary btn-block"><span class="nav-icon fas fa-clipboard"></span> New Jobpage</a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->   
      </div>
      <!-- /.col -->
      <div class="col-md-9">
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
                <div class="card-body table-responsive"> 
                    <table id="my_job_pages" class="table table-striped">
                        <thead>
                            <tr>
                                <th>JobID</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="measurement">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Top Measurement</h3>
                            </div>
                            <div class="card-body">
                <div class="row">
                  <div class="col-6">
                  <label for="top_neck">Neck</label>
                    <input type="text" name="top_neck" class="form-control" value="<?php echo escape($customer["top_neck"]); ?>">
                  </div>
                  <div class="col-6">
                  <label for="top_sh">SH</label>
                    <input type="text" name="top_sh" class="form-control" value="<?php echo escape($customer["top_sh"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_al1">AL</label>
                    <input type="text" name="top_al1" class="form-control" value="<?php echo escape($customer["top_al1"]); ?>">
                  </div>
                  <!-- <div class="col-6">
                    <label for="top_al2">AL</label>
                    <input type="text" name="top_al2" class="form-control" value="<?php echo escape($customer["top_al2"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_bl1">BL</label>
                    <input type="text" name="top_bl1" class="form-control" value="<?php echo escape($customer["top_bl1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_bl2">BL</label>
                    <input type="text" name="top_bl2" class="form-control" value="<?php echo escape($customer["top_bl2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_bl3">BL</label>
                    <input type="text" name="top_bl3" class="form-control" value="<?php echo escape($customer["top_bl3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_burst1">Burst</label>
                    <input type="text" name="top_burst1" class="form-control" value="<?php echo escape($customer["top_burst1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_burst2">Burst</label>
                    <input type="text" name="top_burst2" class="form-control" value="<?php echo escape($customer["top_burst2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_burst3">Burst</label>
                    <input type="text" name="top_burst3" class="form-control" value="<?php echo escape($customer["top_burst3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_ra1">RA</label>
                    <input type="text" name="top_ra1" class="form-control" value="<?php echo escape($customer["top_ra1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_ra2">RA</label>
                    <input type="text" name="top_ra2" class="form-control" value="<?php echo escape($customer["top_ra2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_ra3">RA</label>
                    <input type="text" name="top_ra3" class="form-control" value="<?php echo escape($customer["top_ra3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_cuffs">Cuffs</label>
                    <input type="text" name="top_cuffs" class="form-control" value="<?php echo escape($customer["top_cuffs"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_alunder">AL Under</label>
                    <input type="text" name="top_alunder" class="form-control" value="<?php echo escape($customer["top_alunder"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_burstburst">Burst to Burst</label>
                    <input type="text" name="top_burstburst" class="form-control" value="<?php echo escape($customer["top_burstburst"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_wrist">Wrist</label>
                    <input type="text" name="top_wrist" class="form-control" value="<?php echo escape($customer["top_wrist"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_armhole">Arm Hole</label>
                    <input type="text" name="top_armhole" class="form-control" value="<?php echo escape($customer["top_armhole"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_sidejoining">Side Joining</label>
                    <input type="text" name="top_sidejoining" class="form-control" value="<?php echo escape($customer["top_sidejoining"]); ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Pant Measurement</h3>
                            </div>
                            <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label for="pant_waist">Waist</label>
                    <input type="text" name="pant_waist" class="form-control" placeholder="Waist" value="<?php echo escape($customer["pant_waist"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_lap">Lap</label>
                    <input type="text" name="pant_lap" class="form-control" placeholder="Lap" value="<?php echo escape($customer["pant_lap"]); ?>">
                  </div>
                  
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_tl">TL</label>
                    <input type="text" name="pant_tl" class="form-control" placeholder="TL" value="<?php echo escape($customer["pant_tl"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_knee">Knee</label>
                    <input type="text" name="pant_knee" class="form-control" placeholder="Knee" value="<?php echo escape($customer["pant_knee"]); ?>">
                  </div> 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_ankle">Ankle</label>
                    <input type="text" name="pant_ankle" class="form-control" placeholder="Ankle" value="<?php echo escape($customer["pant_ankle"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_hips">Hips</label>
                    <input type="text" name ="pant_hips" class="form-control" placeholder="Hips" value="<?php echo escape($customer["pant_hips"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_wk">WK</label>
                    <input type="text" name ="pant_wk" class="form-control" placeholder="WK" value="<?php echo escape($customer["pant_wk"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_frontcrotch">Front Crotch</label>
                    <input type="text" name="pant_frontcrotch" class="form-control" placeholder="Front Crotch" value="<?php echo escape($customer["pant_frontcrotch"]); ?>">
                  </div>                                    
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_backcrotch">Back Crotch</label>
                    <input type="text" name="pant_backcrotch" class="form-control" placeholder="Back Crotch" value="<?php echo escape($customer["pant_backcrotch"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_inseam">Inseam</label>
                    <input type="text" name="pant_inseam" class="form-control" placeholder="Inseam" value="<?php echo escape($customer["pant_inseam"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="calve">Calve</label>
                    <input type="text" name="calve" class="form-control" placeholder="Calve" value="<?php echo escape($customer["calve"]); ?>">
                  </div>
                  <div class="col-6">
                    <input type="hidden" name="date" class="form-control" value="<?php echo escape($customer["date"]); ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Agbada Measurement</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                  <label for="agbada_length">Agbada Length</label>
                    <input type="text" id="agbada_length" name="agbada_length" class="form-control" placeholder="Length" value="<?php echo escape($customer["agbada_length"]); ?>">
                  </div>
                  <div class="col-4">
                  <label for="agbada_width">Agbada Width</label>
                    <input type="text" id="agbada_width" name="agbada_width" class="form-control" placeholder="Width" value="<?php echo escape($customer["agbada_width"]); ?>">
                  </div>
                  <div class="col-4">
                  <label for="agbada_head">Agbada Head</label>
                    <input type="text" id="agbada_head" name="agbada_head" class="form-control" placeholder="Head" value="<?php echo escape($customer["agbada_head"]); ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="editinfo">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="firstname" value='<?php echo $customer['firstname'] ?>' class="form-control" id="inputName" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="lastname" value='<?php echo $customer['lastname'] ?>' class="form-control" id="inputName" placeholder="First Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                      <input type="text" name="phone" value='<?php echo $customer['phone'] ?>' class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" value='<?php echo $customer['email'] ?>'class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <textarea name="address" value='<?php echo $customer['address_line1'] ?>'class="form-control" id="inputExperience" placeholder="Address"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                      <input type="text" name="city" value='<?php echo $customer['city'] ?>'class="form-control" id="inputExperience" placeholder="City">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Country</label>
                    <div class="col-sm-10">
                      <input type="text" name="country" value='<?php echo $customer['country'] ?>'class="form-control" id="inputExperience" placeholder="Country">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Update Info</button>
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


                    
