<?php

	require('db.php');
	if(isset($_POST['delete'])){
		$id = $_POST['q_id'];

		$del  = "DELETE from question WHERE id ='$id'";
		$qry = $conn->query($del) or trigger_error(mysqli_error($conn)." ".$del);

		if($qry){
			session_start();
			$_SESSION['del'] = "Question deleted successfully";
			header("location:../question.php");
		}
	}