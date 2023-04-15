<?php
include "../config.php";
//universal function for checking session status-php manual
function is_session_started(){
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}
//check status
if ( is_session_started() === FALSE ) session_start();

if(!isset($_SESSION['loggedIn'])){
    header("Location: ../");
}
function dob_days_left(string $date) : int  {
    if(empty($date))          
    {
        return -1;
    }
    
    if($date == '0000-00-00') 
    {
        return -1;
    }
  
    $ts = strtotime($date.' 00:00:00');
    $bY = date('Y',$ts);
    $bm = date('m',$ts);
    $bd = date('d',$ts);
  
    $nowY = date('Y');
    $nowm = date('m');
    $nowd = date('d');
  
                            
    if($bm == $nowm && $bd >= $nowd)                        
    {
        return $bd - $nowd;
    }
  
    if( ($bm == $nowm && $bd < $nowd) || ($bm < $nowm) )
    {
        $nextBirth = ($nowY+1).'-'.$bm.'-'.$bd;
        $nextBirthTs = strtotime($nextBirth);
        $diff = $nextBirthTs - time();
        return floor($diff/(60*60*24));
    }
  
    if($bm > $nowm )                        
    {              
        $nextBirth = $nowY.'-'.$bm.'-'.$bd.'00:00:00';
        $diff = strtotime($nextBirth) - time();
        return floor($diff/(60*60*24));
    }
  
    return -1;                                      
  }
  function calendar_mon($month){
    $months = array(
      "01" => "January",
      "02" => "February",
      "03" => "March",
      "04" => "April",
      "05" => "May",
      "06" => "June",
      "07" => "July",
      "08" => "August",
      "09" => "September",
      "10" => "October",
      "11" => "November",
      "12" => "December"
    );
    foreach ($months as $key => $value) {
      if($key==$month){
        return $value;
      }
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Front Desk | Ebewele Brown</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="../dist/img/LOGO.jpg" type="image/x-icon">
  <link rel="icon" href="../dist/img/LOGO.jpg" type="image/x-icon">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!--MY CSS-->
  <link rel="stylesheet" href="../style/style.css">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
  <style>
    @media print { 
    .table th { 
        background-color: transparent !important; 
        } 
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Send Email</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php
            $dobconnection = new PDO($dsn, $username, $password, $options);
            $dobsql = "SELECT customer_id,firstname,lastname,dob_month,dob_day FROM customers";
            $dobstatement = $dobconnection->prepare($dobsql);
            $dobstatement->execute();

            $customers_dob = $dobstatement->fetchAll(PDO::FETCH_ASSOC);
        ?>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="margin-right:1rem!important;" class="far fa-bell"></i>
          <?php
            $dob_count = 0;
            foreach($customers_dob as $customer_dob){
                $days = dob_days_left("2000-".$customer_dob['dob_month']."-".$customer_dob['dob_day']);
                if($days <= 10){
                    $dob_count++;
                }
            }
          ?>
          <span class="badge badge-danger navbar-badge"><?php echo $dob_count; ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <?php
                foreach($customers_dob as $customer_dob){
                    $days_left = dob_days_left("2000-".$customer_dob['dob_month']."-".$customer_dob['dob_day']);
                    if($days_left <= 10){?>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                            <img class="img-size-50 mr-3 img-circle"
                                src="../dist/img/user-avatar.png"
                                alt="User profile picture">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                <?php echo $customer_dob['firstname']." ".$customer_dob['lastname']; ?>
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">has birthday</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1 text-warning"></i> <?php echo "in ".$days_left." days (".calendar_mon($customer['dob_month'])." ".$customer['dob_day'].")"; ?></p>
                            </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>    
                    <?php }
                }
            ?> 
            <a href="#" class="dropdown-item dropdown-footer text-center">See All Birthdays</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i style="margin-right:1rem!important;" class="fas fa-comments"></i>
          <span class="badge badge-warning navbar-badge">0</span>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index" class="brand-link" style="text-decoration:none;">
      <img src="../dist/img/LOGO.jpg" alt="EB Logo" class="brand-image img-circle elevation-2"
           style="opacity: 1">
      <span class="brand-text" style ="color:gold;">FrontLITE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/woman.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-decoration:none;"><?php echo strtoupper($_SESSION['loggedIn']);?></a>
        </div>
      </div>
         <!-- Sidebar Menu -->
         <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
                     
            <a href="/customers" class="nav-link office" aria-disabled="true">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jobpages" class="nav-link factory">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Job Pages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/invoices" class="nav-link office">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Invoice & Receipts
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/auth/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->