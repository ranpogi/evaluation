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
 <div class="row justify-content-center mt-5">
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
?>
<?php
	include('layouts/footer.php');

?>