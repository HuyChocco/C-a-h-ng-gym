<?php
session_start();
include("controller/c_gymstore.php");
$c_gymstore=new C_GYMSTORE();

$signup=$c_gymstore->signup($_POST['hoten'],$_POST['email'],md5($_POST['pass']));

if($signup!=null)
{
	$_SESSION["signup"] = "signup_ok";
	 header("Location: main.php");
}
else
	{
		$_SESSION["signup"] = "signup_fail";
		 header("Location: main.php");
	}

?>