<?php 
include "../jobpages/includes/process_jobpage_images.php";
include "../customers/scripts/read.php";
include "../jobpages/includes/read.php";
include "../jobpages/includes/update.php";
include "../templates/header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-header">
              <?php echo strtoupper($customer["firstname"]).' '.strtoupper($customer["lastname"]) ?>
              </div>
              <div class="card-body">
                <div class="row">         
                 <div class="col-sm-12">
                  <form method="post">
                  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                  <input name="customer" type="hidden" value="<?php echo escape($_GET['customer_id']); ?>">
                  <input name="order_id" type="hidden" value="<?php echo $design['order_id']; ?>">

                    <div class="form-row">
                        <!-- select -->
                        <div class="form-group col-md-4 col-sm-12">
                          <label>SLEEVE</label>
                          <select class="custom-select" name="sleeve">
                            <option <?php if(escape($design['sleeve'])=="") echo "selected='selected'";?> value="" selected></option>
                            <option <?php if(escape($design['sleeve'])=="Double") echo "selected='selected'";?>value="Double">Double</option>
                            <option <?php if(escape($design['sleeve'])=="Single") echo "selected='selected'";?>value="Single">Single</option>
                            <option <?php if(escape($design['sleeve'])=="Free Hand Cuff") echo "selected='selected'";?>value="Free Hand Cuff">Free Hand Cuff</option>
                            <option <?php if(escape($design['sleeve'])=="Free Hand") echo "selected='selected'";?>value="Free Hand">Free Hand</option>
                            <option <?php if(escape($design['sleeve'])=="SH") echo "selected='selected'";?>value="SH">SH</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>NECK</label>
                          <select class="custom-select" name="neck">
                            <option <?php if(escape($design['neck'])=="") echo "selected='selected'";?> value="" selected></option>
                            <option <?php if(escape($design['neck'])=="Turning") echo "selected='selected'";?> value="Turning">Turning</option>
                            <option <?php if(escape($design['neck'])=="Pipping") echo "selected='selected'";?>value="Pipping">Pipping</option>
                            <option <?php if(escape($design['neck'])=="Turtle Neck") echo "selected='selected'";?>value="Turtle Neck">Turtle Neck</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>EMBROIDERY</label>
                          <select class="custom-select" name="embroy">
                            <option <?php if(escape($design['embroy'])=="") echo "selected='selected'";?>value="" selected></option>
                            <option <?php if(escape($design['embroy'])=="Flap/Pocket") echo "selected='selected'";?>value="Flap/Pocket">Flap/Pocket</option>
                            <option <?php if(escape($design['embroy'])=="Round Flap") echo "selected='selected'";?>value="Round Flap">Round Flap</option>
                            <option <?php if(escape($design['embroy'])=="Cape") echo "selected='selected'";?>value="Cape">Cape</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                          <label>UNDERLAY</label>
                          <!-- radio -->
                          <div class="form-group clearfix">
                            <div class="icheck-success">
                              <input type="radio" <?php if(escape($design['underlay'])=="Yes") echo "checked";?> value="Yes" id="underlay1" name="underlay" required>
                              <label for="underlay1">
                                YES
                              </label>
                            </div>
                            <div class="icheck-warning">
                              <input type="radio" <?php if(escape($design['underlay'])=="No") echo "checked";?> value="Subtle" id="underlay2" name="underlay" required>
                              <label for="underlay2">
                                SUBTLE
                              </label>
                            </div>
                            <div class="icheck-danger">
                              <input type="radio" <?php if(escape($design['underlay'])=="Subtle") echo "checked";?> value="No" id="underlay3" name="underlay" required>
                              <label for="underlay3">
                                NO
                              </label>
                            </div>
                          </div>
                          
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>PANT TYPE</label>
                          <!-- radio -->
                          <div class="form-group clearfix">
                            <div class="icheck-success">
                              <input type="radio" <?php if(escape($design['pant'])=="Sokoto") echo "checked";?> value="Sokoto" id="pant1" name="pant" required>
                              <label for="pant1">
                                SOKOTO
                              </label>
                            </div>
                            <div class="icheck-success">
                              <input type="radio" <?php if(escape($design['pant'])=="Proper") echo "checked";?> value="Proper" id="pant2" name="pant" required>
                              <label for="pant2">
                                PROPER
                              </label>
                            </div>
                            <div class="icheck-success">
                              <input type="radio" <?php if(escape($design['pant'])=="Joggers") echo "checked";?> value="Joggers" id="pant3" name="pant" required>
                              <label for="pant3">
                                JOGGERS
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>BACK POCKET</label>
                          <!-- radio -->
                          <div class="form-group clearfix">
                            <div class="icheck-success">
                              <input type="radio" <?php if(escape($design['back_pocket'])=="Yes") echo "checked";?> value="Yes" id="back_pocket1" name="back_pocket" required>
                              <label for="back_pocket1">
                                YES
                              </label>
                            </div>
                            <div class="icheck-danger">
                              <input type="radio" <?php if(escape($design['back_pocket'])=="No") echo "checked";?> value="No" id="back_pocket2" name="back_pocket" require>
                              <label for="back_pocket2">
                                NO
                              </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-row">
                        <!-- select -->
                        <div class="form-group col-md-3 col-sm-12">
                          <label>BACK DETAILING</label>
                          <select class="custom-select" name="back_detailing">
                            <option <?php if(escape($design['back_detailing'])=="") echo "selected='selected'";?> value=""selected></option>
                            <option <?php if(escape($design['back_detailing'])=="Inner") echo "selected='selected'";?> value="Inner">Inner</option>
                            <option <?php if(escape($design['back_detailing'])=="Outer") echo "selected='selected'";?> value="Outer">Outer</option>
                            <option <?php if(escape($design['back_detailing'])=="None") echo "selected='selected'";?> value="None">None</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                          <label>CHEST POCKET</label>
                          <select class="custom-select" name="chest_pocket">
                            <option <?php if(escape($design['chest_pocket'])=="") echo "selected='selected'";?> value=""selected></option>
                            <option <?php if(escape($design['chest_pocket'])=="Patch") echo "selected='selected'";?> value="Patch">Patch</option>
                            <option <?php if(escape($design['chest_pocket'])=="Suit") echo "selected='selected'";?> value="Suit">Suit</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                          <label>SIDE POCKET</label>
                          <select class="custom-select" name="side_pocket">
                            <option <?php if(escape($design['side_pocket'])=="") echo "selected='selected'";?> value=""selected></option>
                            <option <?php if(escape($design['side_pocket'])=="Patch") echo "selected='selected'";?> value="Patch">Patch</option>
                            <option <?php if(escape($design['side_pocket'])=="Inner") echo "selected='selected'";?> value="Inner">Inner</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                          <label>B/L</label>
                          <input type="text" value="<?php echo escape($design['bl']);?>" name="bl" class="form-control" placeholder="Body Length">
                        </div>
                      </div>
                      <div class="form-row">
                        <!-- <div class="form-group col-md-2 col-sm-12">
                          <label>B/L</label>
                          <input type="text" value="<?php //echo escape($design['bl']);?>" name="bl" class="form-control" placeholder="Body Length">
                        </div> -->
                        <!-- <div class="form-group col-md-4 col-sm-12">
                          <label>DESIGN</label>
                          <input type="text" value="<?php //echo escape($design['design']);?>" name="design" class="form-control" placeholder="e.g EB105">
                        </div> -->
                        <!-- <div class="form-group col-md-4 col-sm-12">
                          <label>COLOR DISLIKE</label>
                          <input type="text" value="<?php //echo escape($design['color_dislike']);?>" name="color_dislike" class="form-control" placeholder="e.g Red,Blue,Yellow">
                        </div> -->
                        <?php
                                  // $search = "../";
                                  // $replace = "";
                                  // $subject1 = $images['design_image'];
                                  // $subject2 = $images['thread_and_fabric_image'];
                                  // $design_image = str_replace($search,$replace,$subject1);
                                  // $fabric_and_thread = str_replace($search,$replace,$subject2);
                                ?>
                        <!-- <div class="form-group col-md-5 col-sm-12">
                          <div class="form-group">
                            <label for="jobpageDesign1">FABRIC & THREAD IMAGE</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="thread_and_fabric_image" class="custom-file-input" id="jobpageDesign1">
                                <label class="custom-file-label input-group-text" for="jobpageDesign1">Choose file</label>
                              </div>
                            </div>
                            <div class="holder">
                              <img class="img-fluid mb-3" src="<?php // if(!$no_image_found) echo "../".$fabric_and_thread; ?>" alt="Photo" width="150">
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-5 col-sm-12">
                          <div class="form-group">  
                            <label for="jobpageDesign2">DESIGN IMAGE</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <span id="fileTypeError"></span>
                                <input type="file" name="design_image" class="custom-file-input" id="jobpageDesign2">
                                <label class="custom-file-label input-group-text" for="jobpageDesign2">Choose file</label>
                              </div>
                            </div>
                            <div class="holder">
                              <img class="img-fluid" src="<?php // if(!$no_image_found) echo "../".$design_image; ?>" alt="Photo" width="200">
                            </div>
                          </div>
                        </div>
                      </div> -->
                      
                  </div> <!--DESIGN-->
                  
                </div><!--DESIGN ROW-->
                <div class="row">
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
                    <input type="text" name="top_neck" class="form-control" value="<?php echo escape($design["top_neck"]); ?>">
                  </div>
                  <div class="col-6">
                  <label for="top_sh">SH</label>
                    <input type="text" name="top_sh" class="form-control" value="<?php echo escape($design["top_sh"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_al1">AL</label>
                    <input type="text" name="top_al1" class="form-control" value="<?php echo escape($design["top_al1"]); ?>">
                  </div>
                  <!-- <div class="col-6">
                    <label for="top_al2">AL</label>
                    <input type="text" name="top_al2" class="form-control" value="<?php echo escape($design["top_al2"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_bl1">BL</label>
                    <input type="text" name="top_bl1" class="form-control" value="<?php echo escape($design["top_bl1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_bl2">BL</label>
                    <input type="text" name="top_bl2" class="form-control" value="<?php echo escape($design["top_bl2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_bl3">BL</label>
                    <input type="text" name="top_bl3" class="form-control" value="<?php echo escape($design["top_bl3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_burst1">Burst</label>
                    <input type="text" name="top_burst1" class="form-control" value="<?php echo escape($design["top_burst1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_burst2">Burst</label>
                    <input type="text" name="top_burst2" class="form-control" value="<?php echo escape($design["top_burst2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_burst3">Burst</label>
                    <input type="text" name="top_burst3" class="form-control" value="<?php echo escape($design["top_burst3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-12">
                    <label for="top_ra1">RA</label>
                    <input type="text" name="top_ra1" class="form-control" value="<?php echo escape($design["top_ra1"]); ?>">
                  </div>
                  <!-- <div class="col-4">
                    <label for="top_ra2">RA</label>
                    <input type="text" name="top_ra2" class="form-control" value="<?php echo escape($design["top_ra2"]); ?>">
                  </div>
                  <div class="col-4">
                    <label for="top_ra3">RA</label>
                    <input type="text" name="top_ra3" class="form-control" value="<?php echo escape($design["top_ra3"]); ?>">
                  </div> -->
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_cuffs">Cuffs</label>
                    <input type="text" name="top_cuffs" class="form-control" value="<?php echo escape($design["top_cuffs"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_alunder">AL Under</label>
                    <input type="text" name="top_alunder" class="form-control" value="<?php echo escape($design["top_alunder"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_burstburst">Burst to Burst</label>
                    <input type="text" name="top_burstburst" class="form-control" value="<?php echo escape($design["top_burstburst"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_wrist">Wrist</label>
                    <input type="text" name="top_wrist" class="form-control" value="<?php echo escape($design["top_wrist"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="top_armhole">Arm Hole</label>
                    <input type="text" name="top_armhole" class="form-control" value="<?php echo escape($design["top_armhole"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="top_sidejoining">Side Joining</label>
                    <input type="text" name="top_sidejoining" class="form-control" value="<?php echo escape($design["top_sidejoining"]); ?>">
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
                    <input type="text" name="pant_waist" class="form-control" placeholder="Waist" value="<?php echo escape($design["pant_waist"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_lap">Lap</label>
                    <input type="text" name="pant_lap" class="form-control" placeholder="Lap" value="<?php echo escape($design["pant_lap"]); ?>">
                  </div>
                  
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_tl">TL</label>
                    <input type="text" name="pant_tl" class="form-control" placeholder="TL" value="<?php echo escape($design["pant_tl"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_knee">Knee</label>
                    <input type="text" name="pant_knee" class="form-control" placeholder="Knee" value="<?php echo escape($design["pant_knee"]); ?>">
                  </div> 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_ankle">Ankle</label>
                    <input type="text" name="pant_ankle" class="form-control" placeholder="Ankle" value="<?php echo escape($design["pant_ankle"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_hips">Hips</label>
                    <input type="text" name ="pant_hips" class="form-control" placeholder="Hips" value="<?php echo escape($design["pant_hips"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_wk">WK</label>
                    <input type="text" name ="pant_wk" class="form-control" placeholder="WK" value="<?php echo escape($design["pant_wk"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_frontcrotch">Front Crotch</label>
                    <input type="text" name="pant_frontcrotch" class="form-control" placeholder="Front Crotch" value="<?php echo escape($design["pant_frontcrotch"]); ?>">
                  </div>                                    
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="pant_backcrotch">Back Crotch</label>
                    <input type="text" name="pant_backcrotch" class="form-control" placeholder="Back Crotch" value="<?php echo escape($design["pant_backcrotch"]); ?>">
                  </div>
                  <div class="col-6">
                    <label for="pant_inseam">Inseam</label>
                    <input type="text" name="pant_inseam" class="form-control" placeholder="Inseam" value="<?php echo escape($design["pant_inseam"]); ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="calve">Calve</label>
                    <input type="text" name="calve" class="form-control" placeholder="Calve" value="<?php echo escape($design["calve"]); ?>">
                  </div>
                  <div class="col-6">
                    <input type="hidden" name="date" class="form-control" value="<?php echo escape($design["date"]); ?>">
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
                    <input type="text" id="agbada_length" name="agbada_length" class="form-control" placeholder="Length" value="<?php echo escape($design["agbada_length"]); ?>">
                  </div>
                  <div class="col-4">
                  <label for="agbada_width">Agbada Width</label>
                    <input type="text" id="agbada_width" name="agbada_width" class="form-control" placeholder="Width" value="<?php echo escape($design["agbada_width"]); ?>">
                  </div>
                  <div class="col-4">
                  <label for="agbada_head">Agbada Head</label>
                    <input type="text" id="agbada_head" name="agbada_head" class="form-control" placeholder="Head" value="<?php echo escape($design["agbada_head"]); ?>">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card  agbada--> 
                </div><!--MEASUREMENT ROW-->
                <div class="form-row">
                          <input type="submit" name="update_jobpage" value="Save Changes" class="btn btn-block bg-primary">
                      </div>
              </div><!--CARD BODY-->
            </div><!--CARD-->
            <!-- /.form-row -->
            </form>
          </div>
          <!-- /.col-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include "../templates/footer.php"; ?>