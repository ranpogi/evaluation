<?php
	require('db.php');
	session_start();

	if(isset($_POST['submit'])){
		$category = mysqli_escape_string($conn,$_POST['category']);
		$question = mysqli_escape_string($conn,$_POST['question']);
		$choices = mysqli_escape_string($conn,implode(",",$_POST['choices']));
		$final_answer = mysqli_escape_string($conn,$_POST['final_answer']);

		$question_arr = explode(',',$choices);


		if(in_array($final_answer,$question_arr)){
			$insert = "INSERT INTO question
			(
				category,
				question,
				choices,
				final_answer
			)
			VALUES
			(
				'$category',
				'$question',
				'$choices',
				'$final_answer'
			)
			";
			$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
			if($qry){
				$_SESSION['succ'] = "Question added successfully!";
				header("location:../question.php");
			}
		}
		else{
			$_SESSION['err'] = "None of the choices above match the final answer entered.";
			header("location:../question.php");
		}

	}