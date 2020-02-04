<?php
require('db.php');

	if(isset($_POST['submit'])){
		$user_id = $_POST['user_id'];
		$answer = mysqli_escape_string($conn,$_POST['choice']);
		$date = date("Y-m-d");

		echo $date."<br>";

		foreach($answer as $question_id => $answer){
			$q_id = $question_id;
			$ans = $answer;
			echo $q_id." =>".$ans."<br>";
		}

}