<?php 
include "scripts/read.php"; 
include "scripts/update.php";
include "../templates/header.php"; ?>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <div class="row">
                    <div class="col-md-3">
                    <form method="post">
                    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                    <input type="submit" name="update_measurements" class="btn btn-block bg-primary" value="Click to Continue">
                    <input type="hidden" name="customer_id" value="<?php echo escape($customer["customer_id"]); ?>"> 
                    </div>
                    <div class="col-md-9">
                      <?php if ($error) { ?> 
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo "Changes could not be updated!";?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
              </div>
              <!-- /.card-header -->
             
                  
              <div class="card-body">
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
            <!-- /.card -->
            
              </div>
              <!-- /.col-sm-6 left column -->
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
               <!-- /.card pant-->
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
            <!-- /.card  agbada--> 
            </div>
            <!-- /.card-body main-->
            </div>
            <!-- /.form-row -->
        </form>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "../templates/footer.php"; ?>


