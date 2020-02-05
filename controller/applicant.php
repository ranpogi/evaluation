<?php

require('db.php');

	if(isset($_POST['register'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$bday = $_POST['bday'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$date = date("Y-m-d");
		$insrt = "
		INSERT INTO applicant 
		(
			fname,
			lname,
			bday,
			contact,
			address,
			email,
			date_register
		) 
		VALUES 
		(
			'$fname',
			'$lname',
			'$bday',
			'$contact',
			'$address',
			'$email',
			'$date'
		)";

		$qry = $conn->query($insrt) or trigger_error(mysqli_error($conn)." ".$insrt);

		

		if($qry){
			session_start();
			$_SESSION['name'] = $fname." ".$lname;
			$_SESSION['email'] = $email;
			echo $_SESSION['name'];
			header("location:../questionnaire.php");
			exit();
		}
		else{
			session_start();
			$_SESSION['err'] = "Error in register";
			header("location:../index.php");
			exit();
		}
	}