<?php // 
include "includes/process_jobpage_images.php";
include "includes/update_jobpage_status.php";
include "includes/upload_finished_design.php";
include "../templates/header.php";
include "includes/read.php";


//include "read orders table"//do not use measurement from customers table:

    
?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <div class="row">
              <div class="col-md-7">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#editinfo" data-toggle="tab">Job Description</a></li>
                  <li class="nav-item"><a class="nav-link" href="#measurement" data-toggle="tab">Measurement</a></li>
                  <li class="nav-item"><a class="nav-link" href="#todo" data-toggle="tab">Tasks</a></li>
                </ul>
              </div>
              <div class="col-md-5">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a href="#" class="nav-link" style="font-weight:500;"><?php echo $customer['firstname']." ".$customer['lastname']; ?> <?php echo $design['order_id'] ?></a></li>
                </ul>  
              </div>
            </div> 
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
                <?php if (!$count) { ?> 
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="fas fa-exclamation-triangle"> <?php echo $error;?></i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  </div>
                <?php } ?>
                <?php if ($success) { ?> 
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <i class="fas fa-check-double">Job status update was successful!</i>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  </div>
                <?php } ?>
              <div class="tab-pane" id="todo">
                <div class="progress active">
                  <?php
                      $values = [];
                      $level = 0;
                      $level = job_progress($todo_status);
                      // foreach($todo_status as $status){
                      //   array_push($values,$status);
                      
                      // }

                      // for ($i=0; $i <= 6; $i++) { 
                      //   switch ($i) {
                      //     case 0:
                      //       if($values[$i]==1){
                      //         $level += 5;
                      //       }
                      //       break;
                      //     case 5:
                      //       if($values[$i]==1){
                      //         $level += 14;
                      //       }
                      //       break;  
                      //     case 6:
                      //       if($values[$i]==1){
                      //         $level += 1;
                      //       }
                      //       break;  
                      //     default:
                      //       if($values[$i]==1){
                      //         $level += 20;
                      //       }
                      //       break;
                      //   }
                      // }
                  ?>
                  <div class="progress-bar bg-info progress-bar-striped" role="progressbar"
                       aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $level."%";?>">
                    <span class="sr-onl"><?php echo "Progress ".$level."%";?></span>
                  </div>
                </div>
                <!-- TO DO List -->
                <form method="POST">
               
                <ul class="todo-list" data-widget="todo-list">
                  <li>
                    <!-- drag handle -->
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <!-- checkbox -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1" <?php if($todo_status['initiated']==1) echo "checked" ?>>
                      <label for="todoCheck1"></label>
                    </div>
           
                    <!-- todo text -->
                    <span class="text">Initiated</span>
                    <!-- Emphasis label -->
                    <!-- <small class="badge badge-info"><i class="far fa-clock"></i> 7 January, 2023.</small> -->
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" <?php if($todo_status['parts']==1) echo "checked" ?>>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make Parts.</span>
                    <!-- <small class="badge badge-info"><i class="far fa-user"></i> Richard, Lekan</small> -->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3" <?php if($todo_status['assemble']==1) echo "checked" ?>>
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Joining/Locking</span>
                    <!-- <small class="badge badge-info"><i class="far fa-user"></i> Richard, Lekan</small> -->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4" <?php if($todo_status['fitting']==1) echo "checked" ?>>
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Fitting</span>
                    <!-- <small class="badge badge-info"><i class="far fa-user"></i> Richard, Lekan</small> -->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5" <?php if($todo_status['finishing']==1) echo "checked" ?>>
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Finishing/Stoning</span>
                    <!-- <small class="badge badge-info"><i class="far fa-user"></i> Denis</small> -->
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6" <?php if($todo_status['delivery']==1) echo "checked" ?>>
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Ready for Delivery</span>
                    <small class="badge badge-info"><i class="fas fa-shipping-fast"></i></small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <!-- <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span> -->
                    <div  class="icheck-success d-inline ml-2">
                      <input type="checkbox" value="" name="todo7" id="todoCheck7" <?php if($todo_status['rework']==1) echo "checked"?> >
                      <label for="todoCheck7"></label>
                    </div>
                    <span class="text">Re-work (on request)</span>
                    <small class="badge badge-info"><i class="fas fa-undo"></i></small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>

                <div class="card-footer clearfix">
                    <!-- <button type="button" class="btn btn-info float-right"><i class="fas fa-shipping-fast"></i> Ready for Delivery</button> -->
                    <div class="row no-print">
                        <div class="col-12">
                            <style>
                                .jpage{
                                    text-decoration: none!important;
                                    color:#ffffff!important;
                                }
                                .print:hover{
                                    color:#117A8B!important;
                                }
                            </style>
                            <input type="submit" name="update_jobpage_status" class="btn btn-info jpage float-right" value="Update Status">
                          
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /TODO-->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="measurement">
                <div class="row"> 
                <div class="col-sm-12">
                    <div class="table-responsive">  
                     <table class="table table-sm">   
                        <tr>  
                            <td width="40%">
                            <label style="font-weight: 500!important;">TOP</label><br>
                            <span>Neck-----</span><small><?php echo fraformat($design["top_neck"]); ?></small><br>
                            <span>SH-----</span><small><?php echo fraformat($design["top_sh"]); ?></small><br>
                            <span>AL-----</span><small><?php echo fraformat($design["top_al1"]); ?></small><br>
                            <span>BL-----</span><small><?php echo fraformat($design["top_bl1"]); ?></small><br>
                            <span>Burst-----</span><small><?php echo fraformat($design["top_burst1"]); ?></small><br>
                            <span>RA-----</span><small><?php echo fraformat($design["top_ra1"]); ?></small><br>
                            <span>Cuff-----</span><small><?php echo fraformat($design["top_cuffs"]); ?></small><br>
                            <span>AL (under)-----</span><small><?php echo fraformat($design["top_alunder"]); ?></small><br>
                            <span>Burst-Burst-----</span><small><?php echo fraformat($design["top_burstburst"]); ?></small><br>
                            <span>Wrist-----</span> <small><?php echo fraformat($design["top_wrist"]); ?></small><br>
                            <span>Arm Hole-----</span><small><?php echo fraformat($design["top_armhole"]); ?></small><br>
                            <span>Side Joining-----</span><small><?php echo fraformat($design["top_sidejoining"]); ?></small>
                            </td>
                            <td width="60%">
                            <label style="font-weight: 500!important;">TROUSER</label><br>
                            <span>Waist-----</span><small><?php echo fraformat($design["pant_waist"]); ?></small><br>
                            <span>Lap-----</span><small><?php echo fraformat($design["pant_lap"]); ?></small><br>
                            <span>TL-----</span><small><?php echo fraformat($design["pant_tl"]); ?></small><br>
                            <span>Knee-----</span><small><?php echo fraformat($design["pant_knee"]); ?></small><br>
                            <span>Ankle-----</span><small><?php echo fraformat($design["pant_ankle"]); ?></small><br>
                            <span>Hips-----</span><small><?php echo fraformat($design["pant_hips"]); ?></small><br>
                            <span>WK-----</span><small><?php echo fraformat($design["pant_wk"]); ?></small><br>
                            <span>Front Crotch-----</span><small><?php echo fraformat($design["pant_frontcrotch"]); ?></small><br>
                            <span>Back Crotch-----</span><small><?php echo fraformat($design["pant_backcrotch"]); ?></small><br>
                            <span>Inseam-----</span><small><?php echo fraformat($design["pant_inseam"]);?></small><br>
                            <span>Calve-----</span><small><?php echo fraformat($design["calve"]);?></small>
                            </td>  
                        </tr> 
                        <td colspan="4" width="100%">
                        <label style="font-weight: 500!important;">AGBADA</label><br>
                        <span>Length-----</span><small><?php echo fraformat($design["agbada_length"]); ?></small><br>
                        <span>Width-----</span><small><?php echo fraformat($design["agbada_width"]); ?></small><br>
                        <span>Head-----</span><small><?php echo fraformat($design["agbada_head"]); ?></small><br>
                        </td>             
                    </table>
                  </div>
                </div>
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="editinfo">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th style="width: 40px">Design</th>                              
                                <th style="width: 50px">Style</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>Sleeve</td>
                                    <td><span class="badge bg-info"><?php echo $design['sleeve'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Neck</td>
                                    <td><span class="badge bg-info"><?php echo $design['neck'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Embroidery</td>
                                    <td><span class="badge bg-info"><?php echo $design['embroy'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Underlay</td>
                                    <td><span class="badge bg-info"><?php echo $design['underlay'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Pant Type</td>
                                    <td><span class="badge bg-info"><?php echo $design['pant'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Back Detailing</td>
                                    <td><span class="badge bg-info"><?php echo $design['back_detailing'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td>Back Pocket</td>
                                    <td><span class="badge bg-info"><?php echo $design['back_pocket'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td>Chest Pocket</td>
                                    <td><span class="badge bg-info"><?php echo $design['chest_pocket'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td>Side Pocket</td>
                                    <td><span class="badge bg-info"><?php echo $design['side_pocket'] ;?></span></td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td>Color Dislikes</td>
                                    <td>
                                    <?php 
                                      $colors = explode(",",$design['color_dislike']); 
                                      foreach($colors as $color){ ?>
                                       <i style="color:<?php echo $color;?>" class="fas fa-square"></i><span> </span>
                                     <?php }
                                    ?>
                                    </td>
                                </tr>
                                <?php 
                                  if(!$no_image_found){
                                    $search = "../";
                                    $replace = "";
                                    $subject1 = $images['design_image'];
                                    $subject2 = $images['thread_and_fabric_image'];
                                    $subject3 = $images['finished_product_image'];
                                    $design_image = str_replace($search,$replace,$subject1);
                                    $fabric_and_thread = str_replace($search,$replace,$subject2);
                                    $finished_product_image = str_replace($search,$replace,$subject3);
                                  }  
                                  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row-mt-4">
                  <form method="POST" enctype="multipart/form-data">
                    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
                    <input type="hidden" name="order" value="<?php echo $_GET['order_id']; ?>">
                    <input type="hidden" name="customer" value="<?php echo $_GET['customer_id']; ?>">
                    <div class="form-group">
                      <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="finished_design" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <input type="submit" name="upload_design" class="input-group-text btn btn-secondary" value="Upload Final Design" <?php $role = 0; if($role==1) echo "disabled" ?>>
                          </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img class="img-fluid mb-3" src="<?php if(!$no_image_found) echo "../".$fabric_and_thread; ?>" alt="Photo">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-secondary text-lg">
                          Thread & Fabric
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative">
                    <img class="img-fluid" src="<?php if(!$no_image_found) echo "../".$design_image; ?>" alt="Photo">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-secondary text-lg">
                          Chosen Design
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                     <img class="img-fluid" src="<?php if(!$no_image_found) echo "../".$finished_product_image; ?>" alt="Photo">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-secondary text-lg">
                          Final Design
                        </div>
                      </div>
                    </div>
                  </div>
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


                    
