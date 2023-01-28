<?php include "../customers/scripts/read.php";?>
<?php include "../templates/header.php";
$_SESSION['customer_id'] = $_GET['customer_id'];
//MEASUREMENT
$_SESSION['agbada_length'] = $customer['agbada_length'];
$_SESSION['agbada_width'] = $customer['agbada_width'];
$_SESSION['agbada_head'] = $customer['agbada_head'];
$_SESSION['top_neck'] = $customer['top_neck'];
$_SESSION['top_sh'] = $customer['top_sh'];
$_SESSION['top_al1'] = $customer['top_al1'];
// "top_al2" = $customer['top_al2'];
$_SESSION['top_bl1'] = $customer['top_bl1'];
// "top_bl2" = $customer['top_bl2'];
// "top_bl3" = $customer['top_bl3'];
$_SESSION['top_burst1'] = $customer['top_burst1'];
// "top_burst2" = $customer['top_burst2'];
// "top_burst3" = $customer['top_burst3'];
$_SESSION['top_ra1'] = $customer['top_ra1'];
// "top_ra2" = $customer['top_ra2'];
// "top_ra3" = $customer['top_ra3'];
$_SESSION['top_cuffs'] = $customer['top_cuffs'];
$_SESSION['top_alunder'] = $customer['top_alunder'];
$_SESSION['top_burstburst'] = $customer['top_burstburst'];
$_SESSION['top_wrist'] = $customer['top_wrist'];
$_SESSION['top_armhole'] = $customer['top_armhole'];
$_SESSION['top_sidejoining'] = $customer['top_sidejoining'];
$_SESSION['pant_waist'] = $customer['pant_waist'];
$_SESSION['pant_lap'] = $customer['pant_lap'];
$_SESSION['pant_tl'] = $customer['pant_tl'];
$_SESSION['pant_knee'] = $customer['pant_knee'];
$_SESSION['pant_ankle'] = $customer['pant_ankle'];
$_SESSION['pant_hips'] = $customer['pant_hips'];
$_SESSION['pant_wk'] = $customer['pant_wk'];
$_SESSION['pant_frontcrotch'] = $customer['pant_frontcrotch'];
$_SESSION['pant_backcrotch'] = $customer['pant_backcrotch'];
$_SESSION['pant_inseam'] = $customer['pant_inseam'];
$_SESSION['calve'] = $customer['calve']
?>
<style>
  label{
    font-size: small;
  }
  span{
    font-weight: 500;
    font-size: medium;
  }
</style>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <!-- <div class="col-sm-6">
                    <div class="table-responsive">  
                     <table class="table table-sm">  
                        <tr >  
                            <td colspan="4" width="100%">
                              <label style="font-weight:500!important;"><?php //echo strtoupper($customer["firstname"]).' '.strtoupper($customer["lastname"]) ?></label>
                            </td>     
                        </tr> 
                        <tr>  
                            <td width="50%">
                            <label>TOP</label><br>
                            <span>Neck--</span><small><?php //echo $customer["top_neck"] ?></small><br>
                            <span>SH--</span><small><?php //echo $customer["top_sh"] ?></small><br>
                            <span>AL--</span><small><?php //echo $customer["top_al1"]; ?></small><br>
                            <span>BL--</span><small><?php //echo $customer["top_bl1"]; ?></small><br>
                            <span>Burst--</span><small><?php //echo $customer["top_burst1"]; ?></small><br>
                            <span>RA--</span><small><?php //echo $customer["top_ra1"]; ?></small><br>
                            <span>Cuff--</span><small><?php //echo $customer["top_cuffs"] ?></small><br>
                            <span>AL (under)--</span><small><?php //echo $customer["top_alunder"] ?></small><br>
                            <span>Burst-Burst--</span><small><?php //echo $customer["top_burstburst"]; ?></small><br>
                            <span>Wrist--</span> <small><?php //echo $customer["top_wrist"] ?></small><br>
                            <span>Arm Hole--</span><small><?php //echo $customer["top_armhole"] ?></small><br>
                            <span>Side Joining--</span><small><?php //echo $customer["top_sidejoining"]; ?></small>
                            </td>
                            <td width="50%">
                            <label>TROUSER</label><br>
                            <span>Waist--</span><small><?php //echo $customer["pant_waist"] ?></small><br>
                            <span>Lap--</span><small><?php //echo $customer["pant_lap"] ?></small><br>
                            <span>TL--</span><small><?php //echo $customer["pant_tl"]; ?></small><br>
                            <span>Knee--</span><small><?php //echo $customer["pant_knee"] ?></small><br>
                            <span>Ankle--</span><small><?php //echo $customer["pant_ankle"] ?></small><br>
                            <span>Hips--</span><small><?php //echo $customer["pant_hips"]; ?></small><br>
                            <span>WK--</span><small><?php //echo $customer["pant_wk"] ?></small><br>
                            <span>Front Crotch--</span><small><?php //echo $customer["pant_frontcrotch"] ?></small><br>
                            <span>Back Crotch--</span><small><?php //echo $customer["pant_backcrotch"]; ?></small><br>
                            <span>Inseam--</span><small><?php //echo $customer["pant_inseam"];?></small><br>
                            <span>Calve--</span><small><?php //echo $customer["calve"];?></small>
                            </td>  
                        </tr> 
                        <td colspan="4" width="100%">
                        <label>AGBADA</label><br>
                        <span>Length--</span><small><?php //echo $customer["agbada_length"] ?></small><br>
                        <span>Width--</span><small><?php //echo $customer["agbada_width"] ?></small><br>
                        <span>Head--</span><small><?php //echo $customer["agbada_head"] ?></small><br>
                        </td>             
                    </table>
                  </div> -->
                  <!-- /.table-responsive -->
                <!-- </div> -->
                <!-- /.col-sm-6 left column -->
                            
                <div class="col-sm-12">
                <!-- ERROR MESSAGE HERE -->
                  <form method="post" action="includes/store.php" enctype="multipart/form-data">
                  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                  <input name="customer" type="hidden" value="<?php echo escape($id); ?>">
                  <input name="order_id" type="hidden" value="<?php echo getOrderId(); ?>">

                    <div class="form-row">
                        <!-- select -->
                        <div class="form-group col-md-4 col-sm-12">
                          <label>SLEEVE</label>
                          <select class="custom-select" name="sleeve">
                            <option value="" selected></option>
                            <option value="Double">Double</option>
                            <option value="Single">Single</option>
                            <option value="Free Hand Cuff">Free Hand Cuff</option>
                            <option value="Free Hand">Free Hand</option>
                            <option value="SH">SH</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>NECK</label>
                          <select class="custom-select" name="neck">
                            <option value="" selected></option>
                            <option value="Turning">Turning</option>
                            <option value="Pipping">Pipping</option>
                            <option value="Turtle Neck">Turtle Neck</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>EMBROIDERY</label>
                          <select class="custom-select" name="embroy">
                            <option value="" selected></option>
                            <option value="Flap/Pocket">Flap/Pocket</option>
                            <option value="Round Flap">Round Flap</option>
                            <option value="Cape">Cape</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                          <label>UNDERLAY</label>
                          <!-- radio -->
                          <div class="form-group clearfix">
                            <div class="icheck-success">
                              <input type="radio" value="Yes" id="underlay1" name="underlay" required>
                              <label for="underlay1">
                                YES
                              </label>
                            </div>
                            <div class="icheck-warning">
                              <input type="radio" value="Subtle" id="underlay2" name="underlay" required>
                              <label for="underlay2">
                                SUBTLE
                              </label>
                            </div>
                            <div class="icheck-danger">
                              <input type="radio" value="No" id="underlay3" name="underlay" required>
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
                              <input type="radio" value="Sokoto" id="pant1" name="pant" required>
                              <label for="pant1">
                                SOKOTO
                              </label>
                            </div>
                            <div class="icheck-success">
                              <input type="radio" value="Proper" id="pant2" name="pant" required>
                              <label for="pant2">
                                PROPER
                              </label>
                            </div>
                            <div class="icheck-success">
                              <input type="radio" value="Joggers" id="pant3" name="pant" required>
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
                              <input type="radio" value="Yes" id="back_pocket1" name="back_pocket" required>
                              <label for="back_pocket1">
                                YES
                              </label>
                            </div>
                            <div class="icheck-danger">
                              <input type="radio" value="No" id="back_pocket2" name="back_pocket" require>
                              <label for="back_pocket2">
                                NO
                              </label>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="form-row">
                        <!-- select -->
                        <div class="form-group col-md-4 col-sm-12">
                          <label>BACK DETAILING</label>
                          <select class="custom-select" name="back_detailing">
                            <option value=""selected></option>
                            <option value="Inner">Inner</option>
                            <option value="Outer">Outer</option>
                            <option value="No">None</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>CHEST POCKET</label>
                          <select class="custom-select" name="chest_pocket">
                            <option value=""selected></option>
                            <option value="Patch">Patch</option>
                            <option value="Suit">Suit</option>
                          </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                          <label>SIDE POCKET</label>
                          <select class="custom-select" name="side_pocket">
                            <option value=""selected></option>
                            <option value="Patch">Patch</option>
                            <option value="Inner">Inner</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                          <label>BL</label>
                          <input type="text" name="bl" class="form-control" placeholder="Body Length">
                        </div>
                        <!-- <div class="form-group col-md-3 col-sm-12">
                          <label>DESIGN</label>
                          <input type="text" name="design" class="form-control" placeholder="e.g EB105">
                        </div> -->
                        <div class="form-group col-md-8 col-sm-12">
                          <label>COLOR DISLIKES</label>
                          
                           <div class="form-row">
                            <div class="form-group col-md-6">
                              <!-- Color Picker -->
                              <div class="form-group">
                                <div class="input-group my-colorpicker1">
                                  <input name="color_dislike1" type="text" class="form-control">

                                  <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                  </div>
                                </div>
                                <!-- /.input group -->
                              </div>
                            </div>
                            <div class="form-group col-md-6">
                              <!-- Color Picker -->
                              <div class="form-group">
                                <div class="input-group my-colorpicker2">
                                  <input name="color_dislike2" type="text" class="form-control">
                                  <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                  </div>
                                </div>
                                <!-- /.input group -->
                              </div>
                            </div>
                           </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                          <div class="form-group">
                            <label for="jobpageDesign1">FABRIC & THREAD IMAGE</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" name="thread_and_fabric_image" class="custom-file-input" id="jobpageDesign1" required>
                                <label class="custom-file-label input-group-text" for="jobpageDesign1">Choose file</label>
                              </div>
                            </div>
                            <div class="holder">
                                <img id="imgPreview1" width="150"/>
                            </div>
                          </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                          <div class="form-group">  
                            <label for="jobpageDesign2">DESIGN IMAGE</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <span id="fileTypeError"></span>
                                <input type="file" name="design_image" class="custom-file-input" id="jobpageDesign2" required>
                                <label class="custom-file-label input-group-text" for="jobpageDesign2">Choose file</label>
                              </div>
                            </div>
                            <div class="holder">
                                <img id="imgPreview2" width="150"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                          <input type="submit" name="submit_jp" value="Submit Jobpage" class="btn btn-block bg-primary">
                      </div>
                     
                  </div>
                </div>
                <!-- /.col-sm-6 right column --> 
              </div>
              <!-- /.card-body -->
            </div>
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
  <!-- bs-custom-file-input -->

<?php include "../templates/footer.php"; ?>