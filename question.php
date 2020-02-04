<?php
	session_start();
	$title = "Question";
	$currentPage = "Question";
	include ('layouts/header.php'); 
?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-10">
		<?php include('layouts/menu-tabs.php'); ?>
		<button type="button" class="btn btn-primary" id="add_question">Add Question</button>
	</div>
</div>
<?php if(isset($_SESSION['err'])):?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-8">
		<div class="alert alert-danger">
			<p class="text-center">
				<?php 
					echo $_SESSION['err']; 
					unset($_SESSION['err']);
				?>
			</p>
		</div>
	</div>
</div>
<?php endif ?>
<?php if(isset($_SESSION['update'])):?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-8">
		<div class="alert alert-info">
			<p class="text-center">
				<?php 
					echo $_SESSION['update']; 
					unset($_SESSION['update']);
				?>
			</p>
		</div>
	</div>
</div>
<?php endif ?>
<?php if(isset($_SESSION['del'])):?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-8">
		<div class="alert alert-danger">
			<p class="text-center">
				<?php 
					echo $_SESSION['del']; 
					unset($_SESSION['del']);
				?>
			</p>
		</div>
	</div>
</div>
<?php endif ?>
<?php if(isset($_SESSION['succ'])):?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-8">
		<div class="alert alert-success">
			<p class="text-center">
				<?php 
					echo $_SESSION['succ']; 
					unset($_SESSION['succ']);
				?>
			</p>
		</div>
	</div>
</div>
<?php endif ?>
 <div class="row justify-content-center mt-4">
    <div class="col col-md-10">
      <div class="card">
          <div class="card-header text-center">
          	<div class="row">
          		<div class="col">
            		<h4> Questionaire </h4>
           		</div>
       		 </div>
          </div>
         <div class="card-body">
	         	<div class="row justify-content-center">
	         		<div class="col">
	         			<div class="table table-responsive">
	         				<table class="table table-striped table-bordered">
								  <thead>
								    <tr>
								      <th scope="col" class="text-center">No.</th>
								      <th scope="col" class="text-center">Question</th>
								      <th scope="col" class="text-center">Choices</th>
								      <th scope="col" class="text-center">Final Answer</th>
								      <th scope="col" class="text-center">Category</th>
								       <th scope="col" class="text-center">Action</th>
								    </tr>
								  </thead>
								  <tbody>
									<?php
										require('controller/db.php');
										$question = "SELECT * FROM question ORDER BY id ASC";
										$qry = $conn->query($question) or trigger_error(mysqli_error($conn)." ".$question);
										$counter = 0;
										while($a = mysqli_fetch_assoc($qry)){
										$counter++;
									?>
									<tr>
										<td class="text-center"><?php echo $counter; ?></td>
										<td class="text-center"><?php echo $a['question']; ?></td>
										<td class="text-center"><?php echo $a['choices']; ?></td>
										<td class="text-center"><?php echo $a['final_answer']; ?></td>
										<td class="text-center"><?php echo $a['category']; ?></td>
										<td class="text-center">
											<button type="button" id="<?php echo $a['id'] ?>" class="btn btn-info update_question">
												Update
											</button>
											<button type="button" id="<?php echo $a['id'] ?>" class="btn btn-danger delete_question">
												Delete
											</button>
										</td>
									</tr>
									<?php }
									?>
								  </tbody>
							</table>
	         			</div>
	         		</div>
	         	</div>
         	</div>
         </div>
          <div class="card-footer text-muted text-center">
            © Pylon's Global Solution
          </div>
        </div>
        </div>
<?php
	include('layouts/add_question_modal.php');
	include('layouts/update_question_modal.php');
	include('layouts/delte_question_modal.php');
?>
<?php
	include('layouts/footer.php');

?>