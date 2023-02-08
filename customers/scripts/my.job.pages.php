<?php

require "../../config.php";
require "../../common.php";

//$cus = "NLA210820";

$customer = $_SESSION['my_customer'];
// $customer=$_GET['customer_id'];
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM orders WHERE customer='$customer' ORDER BY order_id DESC";

    $statement = $connection->prepare($sql);
    
    $statement->execute();

    $results = $statement->fetchAll();
   
    $jobpages = array();
    $count=0;
    foreach ($results as $jobpage) {
        //GET JOB PROGRESS
        $order_id = $jobpage['order_id'];
        try {
            $sqltodo = "SELECT initiated,parts,assemble,fitting,finishing,delivery,rework FROM todos WHERE jobpage = :jobpage";
        
            $stmt = $connection->prepare($sqltodo);
            $stmt->bindValue(':jobpage', $order_id);
            $stmt->execute();
            $todo_status = $stmt->fetch(PDO::FETCH_ASSOC);
          
        } catch(PDOException $error) {
          echo $sqltodo . "<br>" . $error->getMessage();
        }
      
        //identify jobpages that already have invoice
        $disabled ="";
        $invoice_status = $jobpage['has_invoice'];
        if($invoice_status == 1){
          $disabled = "disabled";
        }
        $progress = job_progress($todo_status);
        array_push($jobpage,'<div class="progress-bar bg-info progress-bar-striped" role="progressbar"
        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: '.$progress.'%">
        <span class="sr-onl">'.$progress.'%</span></div>');
        array_push($jobpage,'<div class="icheck-success d-inline ml-2"><input type="checkbox" value="'.$jobpage["order_id"].'" name="jobpage'.$count.'" id="jobpageCheck'.$count.'" '.$disabled.'><label for="jobpageCheck'.$count.'"></label></div>');
        array_push($jobpage,'<a style="color:#fafafa;" type="button" class="btn btn-info btn-xs viewme" href="../jobpages/jobpage.php?order_id='.$jobpage[0]."&customer_id=".$customer.'"><i class="fas fa-eye"></i> View Jobpage</a>'); 
        // array_push($jobpage,'<a type="button" class="btn btn-warning btn-xs viewme" href="#">View Jobpage</a>');
        $jobpages[] = $jobpage;
        $count++;
    }
    $_SESSION['customer_jobpages_count'] = $count;
    echo json_encode($jobpages);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
?>