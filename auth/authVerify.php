<?php
require "config.php";
require "common.php";

$errors = array();
$errors['verified']="";
$errors['username']="";
$errors['password']="";
$errors['empty']="";

if(isset($_POST['signin'])){
    if(isset($_POST["username"]) && !empty($_POST["username"])){
        $connection = new PDO($dsn,$username,$password,$options);
        $postuser = $_POST["username"];
        $pass = $_POST["password"];
        $query = "SELECT username,verified,passw,role FROM users WHERE username=:username";
    
        $statement = $connection->prepare($query);
        $statement->bindValue(':username',$postuser);
        $statement->execute();
        
        if($statement->rowCount()==1){
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            $dbpass = $user['passw'];
            //username exist
            if(password_verify($pass,$dbpass)){
                //password match
                if($user['verified']==1){
                    //account is verified
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['loggedIn'] = $user['username'];
                    //header("Location: /auth/gateway.php");
                    //Access Routes
                    $role = $_SESSION['role'];
                    if(isset($_SESSION['loggedIn'])){
                        if($role==="office"){
                            header("Location: ../customers");
                        }
                        if($role==="factory"){
                            header("Location: ../jobpages");
                        }
                    }else{
                        header("Location: ../");
                    }
                }else{
                    //This account is not yet verified
                    $errors['verified'] = "account is not verifed";
                }   
            }else{
                //password does not match
                $errors['password'] = "Incorrect password";
                //echo $errors['password'];
            }   
        }else{
            //invalid username
            $errors['username'] = "User does not exist";
            //$errors["username"];
        }
    
    }else{
        //empty fields submitted
        $errors['empty'] = "Enter a username and password";
    }
}

?>