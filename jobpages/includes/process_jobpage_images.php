<?php
require "../config.php";
//factory TODO status
$no_image_found = False;
if(isset($_GET['order_id'])){
    try {

        $connection = new PDO($dsn, $username, $password, $options);
        $iid = $_GET['order_id'];
    
        $sql = "SELECT * FROM images WHERE jobpage = :jobpage";
    
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':jobpage', $iid);
        $stmt->execute();
        if(!$images = $stmt->fetch(PDO::FETCH_ASSOC)){
          $no_image_found = True; 
        }        
      
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }

?>