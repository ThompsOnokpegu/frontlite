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
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  
</head>
<body class="hold-transition">
    <div class="wrapper">
    <section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- /.card-header -->
        <div class="card-body">
        <div class="container">
              <div class="row">
                  <div class="col-md-12 d-flex justify-content-center">
                      <img src="../dist/img/ebewele.jpg" alt="Ebewele Brown" width="400px">
                  </div>
              </div>
              <div class="row">
                <div class="col md-6">
                    <h5><?php echo strtoupper($customer['firstname']." ".$customer['lastname'])."<br><small><strong>".$customer['customer_id'];?></strong></small></strong></h3>  
                </div>
                <div class="col md-6" style="text-align: right;"> 
                    <span style="font-size:large;"><?php echo $design['order_id']."</span><br><span>".date('d F, Y(l)'); ?></span>
                </div>
              </div>
              <div class="row">
                  <div class="col-12">
                  <br>
                     <h4 style="background:#3C7DA5;color:white; padding:4px;">DESCRIPTION</h4>
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
                      <thead>
                          <tr class="text-center"><h4 style="background:#3C7DA5;color:white; padding:4px;">MEASUREMENT</h4></tr>
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
                              <td><?php if($design['top_al2']){echo fraformat($design['top_al1']);}else{echo "";} ?></td>                                        
                          </tr>
                          <tr>
                              <th>BL</th>
                              <td><?php if($design['top_bl1']){echo fraformat($design['top_bl1']);}else{echo "";} ?></td>
                          </tr>
                          <tr>
                              <th>Burst</th>
                              <td><?php if($design['top_burst1']){echo fraformat($design['top_burst1']);} ?></td>
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
                                       
                                                         
                      </tbody>
                      </table>
                 
                      <label>Customer's Signature:_______________________</label>
              </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div>
</section>
    </div>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>