<?php

	if(isset($_GET['q'])){
		$id = $_GET['q'];
		require('controller/db.php');
		$applicant_answer = "SELECT CONCAT(a.fname,' ',a.lname) as applicant, app_s.date_exam as date_exam FROM applicant_answer app_s LEFT JOIN applicant a ON a.id = app_s.user_id WHERE app_s.user_id = '$id'";
		$qry = $conn->query($applicant_answer) or trigger_error(mysqli_error($conn)." ".$applicant_answer);
		$a = mysqli_fetch_assoc($qry);?>

<?php 
$title = "Applicant Test Result";
$currentPage = "Applicant Test Result";
include ('layouts/header.php'); 
?>
<div class="row justify-content-center mt-5">
	<div class="col col-md-5">
		<?php include('layouts/menu-tabs.php'); ?>
	</div>
</div>
   <div class="row justify-content-center mt-5">
    <div class="col col-md-5">
      <div class="card">
          <div class="card-header text-center">
            <h4> Applicant Name: <u><?php echo ucwords($a['applicant']); ?></u> </h4>
          </div>
         <div class="card-body">
         	<div class="row">
         		<div class="col">
         			<?php 
         				date_default_timezone_set("Asia/Manila");
         				$date_exam = date("F j, Y", strtotime($a['date_exam']));
         			?>
         			<h5>Date Exam taken: <u><?php echo $date_exam; ?></u></h5>
         		</div>
         	</div>
         	
         		<?php
         			$question = "SELECT q.question as question, (SELECT COUNT(*) FROM applicant_answer WHERE user_id = '$id') as total_question, q.choices as choices, app_s.answer as applicant_answer, q.final_answer as final_answer FROM question q LEFT JOIN applicant_answer app_s ON app_s.question_id = q.id WHERE app_s.user_id = '$id'";
         			$qry_1 = $conn->query($question) or trigger_error(mysqli_error($conn)." ".$question);
         			$counter = 0;
         			$wrong = 0;
         			$correct = 0;
         			$percentage = 60;

         			while($row = mysqli_fetch_assoc($qry_1)){ $counter++;?>
         				<?php $total_question = $row['total_question']; 
         					$formula = ($percentage / 100) * $total_question;
         					$passing = round($formula);
         				?>
         				<div class="row mt-3">
         					<div class="col">
         						<div class="form-group">
         						<label><?php echo $counter.". ".$row['question']; ?></label>
         						<?php
         							if($row['applicant_answer'] == $row['final_answer']) { ?>
         								<span><b class="text-success ml-2">Correct</b></span>
         								<?php $correct++; ?>
								<?php }
								else { ?>
										<span><b class="text-danger ml-2">Wrong</b></span>
										<?php $wrong++; ?>
								<?php } ?>
         					</div>
         				</div>
         				</div>
         				<div class="row mt-2">
         					<div class="col">
         						<div class="form-group">
         							<label class="text-primary"><b>Applicant Answer</b></label>
         							<input type="text" class="form-control" value="<?php echo $row['applicant_answer'] ?>">
         						</div>
         					</div>
         					<div class="col">
         						<div class="form-group">
         							<label class="text-success"><b>Correct Answer</b></label>
         							<input type="text" class="form-control" value="<?php echo $row['final_answer'] ?>">
         						</div>
         					</div>
         				</div>
         		<?php	}
         		?>
         </div>
         </div>
          <div class="card-footer text-muted text-center">
            © Pylon's Global Solution
          </div>
        </div>
        <div class="col col-md-2">
	        <div class="card">
	        	<div class="card-header text-center">Test Results</div>
	        	<div class="card-body">
	        		<b>Total items:<span class="text-primary ml-2"><?php echo $total_question; ?></span></b>
	        		<br>
	        		<b>Total Correct:<span class="text-success ml-2"><?php echo $correct; ?></span></b>
	        		<br>
	        		<b>Total Wrong:<span class="text-danger ml-2"><?php echo $wrong; ?></span></b>
	        		<br>
	        		<b>Passing Score:<span class="text-warning ml-2"><?php echo $passing; ?></span></b>
	        		<br>
	        		<b>Applicant Status:
	        			<?php
	        				if($correct >= $passing){
	        					echo "<span class='text-success ml-2'>Passed</span>";
	        				}
	        				else{
	        					echo "<span class='text-danger ml-2'>Failed</span>";
	        				}
	        			?>
	        		</b>
	        	</div>
	        </div>
	    </div>
       </div>

<?php include ('layouts/footer.php'); ?>
<?php }

?>