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
