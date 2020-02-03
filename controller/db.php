<?php 

	$server = "localhost";
	$user = "root";
	$pw = "";
	$db = "pylon_evaluation";

	$conn = mysqli_connect($server,$user,$pw,$db);

	if($conn){
		
	}
	else{
		die("Connection failed". mysqli_connect_error());
	}