<?php
require "../config.php";

if(isset($_GET['token'])){
    $response = array();
    try{    
        $connection = new PDO($dsn,$username,$password,$options);
        //localhost/login/auth/verify.php?token=0f456faf6e2b715cb2a4779c14d13bbf76f78fc255961403a41e09264d6e9d087ef9813e0c566060e78cb08ba24396bf2d39
        $token = $_GET['token'];
        $params = [
            ":verified"=> 1,
            ":token" => $token
        ];
        $sql = "UPDATE users SET verified=:verified WHERE token = :token";
        $statement = $connection->prepare($sql);
        $statement->execute($params);

        if($statement->rowCount()==1){
            $response['status'] = True;
        }else{
            $response['status'] = False;
        }

    }catch(PDOException $error){
        echo $error->getMessage();
    }
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <?php if($response['status']){ ?>
                    <div class="card text-center">
                        <div class="card-header">
                            <h2>User Authorization</h2>
                        </div>
                        <div class="card-body alert-success">
                            <h6 class="card-title">User account has been successfully verified. The user now has access to E-DESK backend.</h6>
                           
                            <a href="#" class="btn btn-success">Click Here to Login</a>
                        </div>
                        <div class="card-footer alert-warning">
                            <p style="color:#990000;">If you had mistakenly clicked on the verification link or not sure of the user's identity, contact the Administrator on 08068125034 immediately. </p>
                        </div>
                    </div>
                    <?php } else{ ?>
                        <div class="card text-center">
                        <div class="card-header">
                            <h2>User Authorization</h2>
                        </div>
                        <div class="card-body alert-warning">
                            <h6 class="card-title">User account verification failed.</h6>
                        </div>
                       
                    <?php } ?>
                </div>    
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>