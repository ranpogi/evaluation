<?php
	require('db.php');

	if(isset($_POST['submit'])){
		$category = mysqli_escape_string($conn,$_POST['category']);
		$question = mysqli_escape_string($conn,$_POST['question']);
		$choices = mysqli_escape_string($conn,implode(",",$_POST['choices']));
		$final_answer = mysqli_escape_string($conn,$_POST['final_answer']);

		$question_arr = explode(',',$question);

		if(in_array($final_answer,$question_arr)){
			echo "success";
		}
		else{
			echo "choices not match";
		}

	}