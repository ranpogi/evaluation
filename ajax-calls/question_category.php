<?php
require('../controller/db.php');

if(isset($_POST['category'])){
	$category = $_POST['category'];

	$question = "SELECT * FROM question WHERE category = '$category' ORDER BY id ASC";
	$qry = $conn->query($question) or trigger_error(mysqli_error($conn)." ".$question);
	$counter = 0;
	if(mysqli_num_rows($qry) > 0){
		while($row = mysqli_fetch_assoc($qry)) { $counter++; ?>
		<tr>
			<td class='text-center'><?php echo $counter; ?></td>
			<td class='text-center'><?php echo $row['question']; ?></td>
			<td class='text-center'><?php echo $row['choices'];; ?></td>
			<td class='text-center'><?php echo $row['final_answer'];; ?></td>
			<td class='text-center'><?php echo $row['category'];; ?></td>
			<td class='text-center'>
				<button type="button" id="<?php echo $row['id'] ?>" class="btn btn-info update_question">
					Update
				</button>
				<button type="button" id="<?php echo $row['id'] ?>" class="btn btn-danger delete_question">
					Delete
				</button>
					
			</td>
		</tr>
	<?php } ?>
	

<?php } else{
	echo "<tr>
			<td class='text-center' colspan='6'>No data input</td>
		</tr>
	";
}} ?>
