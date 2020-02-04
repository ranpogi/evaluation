<?php
require('db.php');
session_start();
	if(isset($_POST['submit'])){
		$user_id = $_POST['user_id'];
		$answer = $_POST['choice'];
		$date_exam = date("Y-m-d");

		

		foreach($answer as $question => $answers){
			$question_id = mysqli_escape_string($conn,$question);
			$answer = mysqli_escape_string($conn,$answers);
			$insert = "INSERT INTO applicant_answer 
			(
				user_id,
				question_id,
				answer,
				date_exam

			)
			VALUES
			(
				'$user_id',
				'$question_id',
				'$answer',
				'$date_exam'
			)
			";

			$qry = $conn->query($insert) or trigger_error(mysqli_error($conn)." ".$insert);
			if($qry){
				$_SESSION['ans_submit'] = "Answer submitted successfully!";
				header("location:../exit.php");
			}
		}

}