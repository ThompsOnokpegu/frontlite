<?php
require "../config.php";
require "../common.php";

$errors = array();
$postuser = "";

if(isset($_POST['add_user'])){
    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
    $postuser = $_POST['username'];
    $pass = $_POST['password'];
    $passwordConf = $_POST['passwordconfirm'];

    //VALIDATION
    if(empty($postuser)){
        $errors['username'] = "Username required!";
    }

    if(empty($pass)){
        $errors['password'] = "Password required!";
    }
    if ($pass != $passwordConf) {
        $errors['confirmpass'] = "Passwords must match!";
    }

    //check if user exist
    $conn = new PDO($dsn,$username,$password,$options);
    
    $query = "SELECT username FROM users WHERE username=:username";
    $st = $conn->prepare($query);
    $st->bindValue(':username',$postuser);
    $st->execute();
    if($st->rowCount()>0){
        $errors['userexist'] = "Username already exist";
    }

    //SAVE USER
    $sql = "";
    if(count($errors)===0){
        echo "no errors";
        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = 0;

        try {
            $connect = new PDO($dsn, $username, $password, $options);

            $user = array(
            "username" => $postuser,
            "verified" => $verified,
            "token" => $token,
            "passw" => $pass
            );

            $sql = sprintf(
        "INSERT INTO %s (%s) values (%s)",
        "users",
        implode(", ", array_keys($user)),
        ":" . implode(", :", array_keys($user))
            );

            $stm = $connect->prepare($sql);
            $stm->execute($user);
            if($stm->rowCount()==1){
                $to = "management@ebewelebrown.com";
                $subject = "E-DESK New User Verification";
                $message = "A new user was created on E-Desk!
            The new account will not be active until you verify the authenticity of the user.
                    ----------------------------------
                    Username: ".$postuser."
                    Password: ".$_POST['password']."
                    ----------------------------------
            Please click the link below to activate this account or IGNORE to prevent unauthorized access:
                https://frontdesk.ebewelebrown.com/auth/verify?token=".$token;
                $headers = "From:noreply@ebewelebrown.com"."\r\n";
                try{
                    mail($to,$subject,$message,$headers);
                    echo "verification email sent!";
                    header("Location: ../index.php");
                }catch(PDOException $error){
                    echo $error->getMessage();
                }
            }  
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}
?>