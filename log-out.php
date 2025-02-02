<?php

session_start();
if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	header("location:log-in.php");
}else{
	header("location:log-in.php");
}

?>