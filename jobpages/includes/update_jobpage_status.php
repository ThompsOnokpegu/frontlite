<?php
require "../config.php";
require "../common.php";
    $success = false;
    $error = "";
    $count = 1;
    if(isset($_POST['update_jobpage_status'])){
      $connection = new PDO($dsn, $username, $password, $options);
    
      $todo_list = [];
      $checked = 0;
      for ($i=1; $i < 8; $i++) {
        if(isset($_POST['todo'.$i])){
          $todo_list[$i]= 1;
          $checked++;
        }else{
          $todo_list[$i]= 0;
        }
        continue; 
      }
      $count = $checked;
      //echo implode(", ",$todo_list);
      // echo $todo_list['1'];
      // exit;
     
      if($count>0){
        try{
          $jobpage = [
            "jobpage" => $_GET['order_id'],
            "todo1" => $todo_list['1'],
            "todo2" => $todo_list['2'],
            "todo3" => $todo_list['3'],
            "todo4" => $todo_list['4'],
            "todo5" => $todo_list['5'],
            "todo6" => $todo_list['6'],
            "todo7" => $todo_list['7']
          ];

          $sql = "UPDATE todos 
              SET
                initiated = :todo1, 
                parts = :todo2, 
                assemble = :todo3, 
                fitting = :todo4, 
                finishing = :todo5,
                delivery = :todo6,
                rework = :todo7
              WHERE jobpage = :jobpage";
  
          $statement = $connection->prepare($sql);
          if($statement->execute($jobpage)){
            $success = true;
            echo("<script>location.href = '"."../jobpages/factory.php?customer_id=".$_GET['customer_id'].";</script>");
          }else{
            $error = "Job status could not be updated.";
          }
  
        } catch (PDOException $error) {
          echo $sql . "<br>" . $error->getMessage();
        }
      }{
        $error = "You need to select one or more completed tasks!";
      }


    }
    


?>