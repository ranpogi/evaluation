<?php
session_start();
	if(isset($_SESSION['username'])){ ?>
<?php 
$title = "Dashboard";
$currentPage = "List of Applicants";
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
            <h4> Welcome to Pylon's Global Solution </h4>
          </div>
         <div class="card-body">
         	<div class="row">
         		<div class="col">
         			<h5>List of Applicants :</h5>
         		</div>
         	</div>
         	<ul>
         	<?php
         		require('controller/db.php');
         		$applicant = "SELECT * FROM applicant ORDER BY id DESC";
         		$qry = $conn->query($applicant) or trigger_error(mysqli_error($conn)." ".$applicant);
         		while($a = mysqli_fetch_assoc($qry)){?>
         			<li>
                <a href="test_result.php?q=<?php echo $a['id']; ?>">
                  <?php echo $a['fname']." ".$a['lname'] ?>
                </a>
              </li>
         	<?php }	

         	?>
         	<ul>
         	</div>
         </div>
          <div class="card-footer text-muted text-center">
            © Pylon's Global Solution
          </div>
        </div>
        </div>
 

<?php include ('layouts/footer.php'); ?>

<?php }  else {
		$_SESSION['err_login'] = "Please log in to the system first";
		header("location:admin.php");
	}
?>