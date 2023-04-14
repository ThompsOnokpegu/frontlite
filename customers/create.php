<?php include "scripts/store.php"; 
?>

<?php include "../templates/header.php"; ?>
     <!-- Main content -->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
            
            
          <!-- left column -->
          <div class="col-md-6">
                  <?php if ($success) { ?> 
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_POST['firstname']; ?> successfully added.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                      </div>
                  <?php } ?>
            <!-- general form elements -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Customer Information </h3>
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                <div class="card-body">
                     <div class="form-row">
                          <div class="form-group col-md-6 col-sm-12">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="Thompson" required>
                          </div>
                          <div class="form-group col-md-6 col-sm-12">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Onoriode" required>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="sayhi@ajthompson.me">
                          <!-- <input type="file" accept="image/*" capture="camera" /> -->
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6 col-sm-12">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="08068125034">
                          </div>
                          <div class="form-group col-md-6 col-sm-12">
                          <label for="phone">Date of Birth</label>
                            <div class="form-row">
                              <div class="col-6">
                                <select name="month" class="custom-select">
                                  <option value="01">January</option>
                                  <option value="02">February</option>
                                  <option value="03">March</option>
                                  <option value="04">April</option>
                                  <option value="05">May</option>
                                  <option value="06">June</option>
                                  <option value="07">July</option>
                                  <option value="08">August</option>
                                  <option value="09">September</option>
                                  <option value="10">October</option>
                                  <option value="11">November</option>
                                  <option value="12">December</option>
                                </select> 
                              </div>
                              <div class="col-6">
                                <select name="day" class="custom-select">
                                  <option value="01">1</option>
                                  <option value="02">2</option>
                                  <option value="03">3</option>
                                  <option value="04">4</option>
                                  <option value="05">5</option>
                                  <option value="06">6</option>
                                  <option value="07">7</option>
                                  <option value="08">8</option>
                                  <option value="09">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                                  <option value="16">16</option>
                                  <option value="17">17</option>
                                  <option value="18">18</option>
                                  <option value="19">19</option>
                                  <option value="20">20</option>
                                  <option value="21">21</option>
                                  <option value="22">22</option>
                                  <option value="23">23</option>
                                  <option value="24">24</option>
                                  <option value="25">25</option>
                                  <option value="26">26</option>
                                  <option value="27">27</option>
                                  <option value="28">28</option>
                                  <option value="29">29</option>
                                  <option value="30">30</option>
                                  <option value="31">31</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6 col-sm-12">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="country" placeholder="Nigeria">
                          </div>
                          <div class="form-group col-md-6 col-sm-12">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Abuja">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="41 Durban Street, Wuse2.">
                        </div> 
                </div>
                <!-- /.card-body -->
             
            </div>
            <!-- /.card -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Agbada Measurement</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-4">
                    <input type="text" name="agbada_length" class="form-control" placeholder="Length">
                  </div>
                  <div class="col-4">
                    <input type="text" name="agbada_width" class="form-control" placeholder="Width">
                  </div>
                  <div class="col-4">
                    <input type="text" name="agbada_head" class="form-control" placeholder="Head">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Top Measurement</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <input type="text" name="top_neck" class="form-control" placeholder="Neck">
                  </div>
                  <div class="col-6">
                    <input type="text" name="top_sh" class="form-control" placeholder="SH">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="text" name="top_al1" class="form-control" placeholder="AL">
                  </div>
                  <!-- <div class="col-6">
                    <input type="hidden" name="top_al2" class="form-control" placeholder="AL">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="text" name="top_bl1" class="form-control" placeholder="BL">
                  </div>
                  <!-- <div class="col-4">
                    <input type="text" name="top_bl2" class="form-control" placeholder="BL">
                  </div>
                  <div class="col-4">
                    <input type="text" name="top_bl3" class="form-control" placeholder="BL">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="text" name="top_burst1" class="form-control" placeholder="Burst">
                  </div>
                  <!-- <div class="col-4">
                    <input type="text" name="top_burst2" class="form-control" placeholder="Burst">
                  </div>
                  <div class="col-4">
                    <input type="text" name="top_burst3" class="form-control" placeholder="Burst">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <input type="text" name="top_ra1" class="form-control" placeholder="RA">
                  </div>
                  <!-- <div class="col-4">
                    <input type="text" name="top_ra2" class="form-control" placeholder="RA">
                  </div>
                  <div class="col-4">
                    <input type="text" name="top_ra3" class="form-control" placeholder="RA">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="text" name="top_cuffs" class="form-control" placeholder="Cuffs">
                  </div>
                  <div class="col-6">
                    <input type="text" name="top_alunder" class="form-control" placeholder="AL Under">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="text" name="top_burstburst" class="form-control" placeholder="Burst Burst">
                  </div>
                  <div class="col-6">
                    <input type="text" name="top_wrist" class="form-control" placeholder="Wrist">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="text" name="top_armhole" class="form-control" placeholder="Arm Hole">
                  </div>
                  <div class="col-6">
                    <input type="text" name="top_sidejoining" class="form-control" placeholder="Side Joining">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Pant Measurement</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <input type="text" name="pant_waist" class="form-control" placeholder="Waist">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_lap" class="form-control" placeholder="Lap">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_tl" class="form-control" placeholder="TL">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_knee" class="form-control" placeholder="Knee">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <input type="text" name="pant_ankle" class="form-control" placeholder="Ankle">
                  </div>
                  <div class="col-3">
                    <input type="text" name ="pant_hips" class="form-control" placeholder="Hips">
                  </div>
                  <div class="col-3">
                    <input type="text" name ="pant_wk" class="form-control" placeholder="WK">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_frontcrotch" class="form-control" placeholder="Front Crotch">
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <input type="text" name="pant_backcrotch" class="form-control" placeholder="Back Crotch">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_inseam" class="form-control" placeholder="Inseam">
                  </div>
                  <div class="col-3">
                    <input type="text" name="pant_calve" class="form-control" placeholder="Calve">
                  </div>
                  
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <input type="submit" value="Submit Customer Details" class="btn btn-success" name="submit">
                </div>
              </form>
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
  <?php include "../templates/footer.php"; ?>