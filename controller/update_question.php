<?php
require('db.php');
session_start();


if(isset($_POST['update'])){
	$id = mysqli_escape_string($conn,$_POST['q_id']);
	$category = mysqli_escape_string($conn, $_POST['category']);
	$question = mysqli_escape_string($conn,$_POST['question']);
	$choices = mysqli_escape_string($conn,implode(",",$_POST['choices']));
	$final_answer = mysqli_escape_string($conn,$_POST['final_answer']);

	$choices_arr = explode(",", $choices);

	

	if(in_array($final_answer,$choices_arr)){
		$update = "UPDATE question SET 
		category = '$category',
		question = '$question',
		choices = '$choices',
		final_answer = '$final_answer'
		WHERE id = '$id'
		";
		$qry = $conn->query($update) or trigger_error(mysqli_error($conn)." ".$update);

		if($qry){
			$_SESSION['update'] = "Updated successfully";
			header("location:../question.php");
			exit();
		}

	}
	else{
		$_SESSION['err'] = "None of the choices above match the final answer entered.";
		header("location:../question.php");
		exit();
	}
}
