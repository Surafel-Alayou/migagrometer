<!DOCTYPE html>
<html>
<head>
	<title>Create account</title>
	<link rel="stylesheet" type="text/css" href="CSS/Register.css">
</head>
<body>
	<?php

	require_once("Connection.php");

	if(isset($_POST['register'])){
		$user_name=$_POST['user_name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$phone_number=$_POST['phone_number'];

		if($first_name!="" or $email!="" or $password!="" or $phone_number!=""){

			$sql="INSERT INTO Registered (ID,Username,Email,Password,Phone_number)  VALUES ('', '".$user_name."','".$email."','".$password."','".$phone_number."') ";

			if(mysqli_query($connection,$sql)){
				header("location:Log in.php");
			}else{
				echo "Not registered";
			}

		}else{
			echo "Please fill all the boxes";
		}

	}

	?>
	<div class="form-container">
			<h1>Create account</h1>
			<form method="post" autocomplete="on">
				<fieldset>
					<legend>User Name</legend>
					<input type="text" name="user_name" required="">
				</fieldset>

				<fieldset>
					<legend>Email</legend>
					<input type="email" name="email" required="">
				</fieldset>

				<fieldset>
					<legend>Password</legend>
					<input type="password" name="password"  required="">
				</fieldset>

				<fieldset>
					<legend>Phone number</legend>
					<input type="text" name="phone_number" required="">
				</fieldset>
				<input type="submit" name="register" value="Register" class="btn1">
				<br>
				<a href="Log in.php">Already have an account?</a>


			</form>
	</div>

</body>
</html>