<?php

session_start();
if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	header("location:Log in.php");
}else{
	header("location:Log in.php");
}

?>