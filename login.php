<?php
session_start();
include("controller/c_gymstore.php");
$c_gymstore=new C_GYMSTORE();

$login=$c_gymstore->login($_POST['email'],md5($_POST['pass']));

if($login>0)
{
    $_SESSION["login"] = "login_ok";
    $_SESSION["user"] = $login->hoten;
     header("Location: main.php");
}
else
    {
        $_SESSION["login"] = "login_fail";
         header("Location: main.php");
    }

?>