<?php
	
	require('../controller/db.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];

		$del = "SELECT * FROM question WHERE id = '$id'";
		$qry = $conn->query($del) or trigger_error(mysqli_error($conn)." ".$del);
		$a = mysqli_fetch_assoc($qry);
		$data['id'] = $a['id'];

		echo json_encode($data);
	}