<?php
session_start();
require('db.php');


	if(isset($_POST['log-in'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$check = "SELECT * FROM admin WHERE username ='$username' AND password ='$password'";
		$qry = $conn->query($check) or trigger_error(mysqli_error($conn)." ".$check);

		if(mysqli_num_rows($qry) > 0){
			$_SESSION['username'] = $username;
			header("location:../dashboard.php");
			exit();
		}
		else{
			$_SESSION['login_first'] = "Invalid Username and Password combination";
			header("location:../admin.php");
		}
	}