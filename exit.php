<?php
session_start();
	if(isset($_SESSION['ans_submit'])){
		echo $_SESSION['ans_submit'];
		echo "<a href='session_out.php'>Log-out</a>";
	}