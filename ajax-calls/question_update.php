<?php
require('../controller/db.php');
	if(isset($_POST['id'])){
		$id =  $_POST['id'];

		$question = "SELECT * FROM question WHERE id ='$id'";
		$qry = $conn->query($question) or trigger_error(mysqli_error($conn)." ".$question);
		$a = mysqli_fetch_assoc($qry);?>
<div class="row">
	<div class="col col-md-6">
		<input type="hidden" value="<?php echo $a['id'] ?>" name="q_id">
		<div class="form-group">
			<select name="category" class="form-control">
				<option value=""></option>
				<option value="English Proficiency" <?php echo ($a['category'] === 'English Proficiency') ? 'selected' : ''; ?> > English Proficiency</option>
				<option value="IQ Test" <?php echo ($a['category'] === 'IQ Test') ? 'selected' : ''; ?> > IQ Test</option>
				<option value="Digital Marketing" <?php echo ($a['category'] === 'Digital Marketing') ? 'selected' : ''; ?> > Digital Marketing</option>
			</select>
		</div>
	</div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="form-group">
            <label>Question</label>
            <textarea name="question" rows="3" class="form-control"><?php echo $a['question'] ?></textarea>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <h4>Choices</h4>
    </div>
</div>
<div class="row justify-content-center">
		<?php
			$choices = explode(",",$a['choices']);
			foreach($choices as $choice){?>
				<div class="col col-md-6 mt-3">
					<input type="text" class="form-control" value="<?php echo $choice ?>" name="choices[]">
				</div>
		<?php } ?>
</div>
<hr>
<div class="row">
          <div class="col">
            <h5>Final Answer</h5>
          </div>
        </div>
<div class="row mb-3 justify-content-center">
    <div class="col col-md-6">
        <input type="text" name="final_answer" value="<?php echo $a['final_answer']; ?>" class="form-control" placeholder="Final Answer">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" name="update" class="btn btn-info">Update</button>
</div>
<?php } ?>