<?php

/**
  * Escapes HTML for output
  *
  */
session_start();

function escape($html) {
  return htmlspecialchars($html, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
}


if (empty($_SESSION['csrf'])) {
  if (function_exists('random_bytes')) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
  } else if (function_exists('mcrypt_create_iv')) {
    $_SESSION['csrf'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
  } else {
    $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
  }
}


function getOrderId(){
    require "config.php";
    $id_range = 10000;
    //order details
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    
        $sql = "SELECT MAX(id) as maxid FROM orders";
    
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $max_id = $result['maxid'];
      
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
    
    // $_hr = date("H");
    // $_sec = date("s");
    // $_min = date("i");
    // $_mon = date("m");
    // $_day = date('d');
    // return "REF-".$_sec."".$_min."".$_hr."".$_day;  
    if($max_id){
        return $id_range + $max_id + 1;
    }else{
        return $id_range + 1;
    }
}


function getInvoiceId($customer_id){
//   $_hr = date("H");
//   $_sec = date("s");
//   $_min = date("i");
//   $_mon = date("m");
//   $_day = date('d');
//   $_yr = date("Y");
//   return substr($customer_id,0,3)."".$_sec."".$_min."".$_hr."".$_day."-IN";
    require "config.php";
    $id_range = 50000;
    //order details
    try {
        $connection = new PDO($dsn, $username, $password, $options);
    
        $sql = "SELECT MAX(id) as maxid FROM invoices";
    
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $max_id = $result['maxid'];
      
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
    if($max_id){
        return $id_range + $max_id + 1;
    }else{
        return $id_range + 1;
    }
}


// function getStrValue($value){
//   if($value){
//     return "Yes";
//   }else{
//     return "No";
//   }
// }

function getCustomerId($name){
  $_mon = date("m");
  $_day = date('d');
  $_yr = date("Y");
  return strtoupper(substr($name,1,1)).strtoupper(substr($name,-2,2)).$_day.$_mon.substr($_yr,0,2);
}

function getPaymentStatus($balance){
  if($balance==0){
    return 1;
  }else{
    return 0;
  }
}
function getInvoiceStatus($value){
  if($value){
    return "Paid";
  }else{
    return "Unpaid";
  }
}

function fraformat($measurement){
  $mea2 = str_replace("1/2","<sup>1</sup>&frasl;<sub>2</sub>",$measurement);
  $mea3 = str_replace("1/4","<sup>1</sup>&frasl;<sub>4</sub>",$mea2);
  $mea4 = str_replace("3/4","<sup>3</sup>&frasl;<sub>4</sub>",$mea3);
  return str_replace(","," / ",$mea4);
}

function job_progress($job_status){
  $values=[];
  $level = 0;
  foreach($job_status as $status){
    array_push($values,$status);
  
  }

  for ($i=0; $i <= 6; $i++) { 
    switch ($i) {
      case 0:
        if($values[$i]==1){
          $level += 5;
        }
        break;
      case 5:
        if($values[$i]==1){
          $level += 14;
        }
        break;  
      case 6:
        if($values[$i]==1){
          $level += 1;
        }
        break;  
      default:
        if($values[$i]==1){
          $level += 20;
        }
        break;
    }
  }
  return $level;
}


function days_to_birth(string $date) : int  {
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

function calendar_month($month){
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
