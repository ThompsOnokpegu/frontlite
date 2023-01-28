<?php
require "../common.php";
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
?>