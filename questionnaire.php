<?php
session_start();
	if(isset($_SESSION['name'])){?>
	<!--<a href="session_out.php">Log-out</a>-->
<?php 
$title = "Questionnaire";
include('layouts/header.php'); 
?>
 <div class="row justify-content-center mt-5">
    <div class="col col-md-5">
      <div class="card">
          <div class="card-header text-center">
            <h4> Welcome <?php echo ucwords($_SESSION['name']) ?> </h4>
          </div>
          <form action="controller/applicant.php" method="post">
          <div class="card-body">
          <div class="row justify-content-center">
          </div>
        </div>
      </form>
          <div class="card-footer text-muted text-center">
            ©<?php echo date("Y"); ?> Pylon's Global Solution
          </div>
        </div>
        </div>
  </div>

<?php include('layouts/footer.php'); ?>

<?php } else{
	$_SESSION['no_access'] = "Please register first";
	header("location:index.php");
} ?>