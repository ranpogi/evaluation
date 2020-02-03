<?php
session_start();
$title = "Admin Log-in";
include('layouts/header.php');
?>
<?php
	if(isset($_SESSION['err_login'])):?>
		<div class="row justify-content-center mt-5">
			<div class="col col-md-5">
				<div class="alert alert-danger text-center">
					<p>
					<?php
					 echo $_SESSION['err_login'];
					 unset($_SESSION['err_login']);
					 ?>	
					 </p>
				</div>
			</div>
		</div>
<?php endif ?>
<?php
	if(isset($_SESSION['login_first'])):?>
		<div class="row justify-content-center mt-5">
			<div class="col col-md-5">
				<div class="alert alert-danger text-center">
					<p>
					<?php 
						echo $_SESSION['login_first'];
						unset($_SESSION['login_first']);
					?>
					</p>
				</div>
			</div>
		</div>
<?php endif ?>
<div class="row justify-content-center mt-5">
    <div class="col col-md-5">
      <div class="card text-center">
          <div class="card-header text-center">
            <h4> Welcome Admin of Pylon</h4>
          </div>
          <form action="controller/admin_login.php" method="post">
          <div class="card-body">
	          <div class="row justify-content-center">
	          	<div class="col">
	          		<div class="form-group">
	          			<label>Username</label>
	          			<input type="text" name="username" class="form-control">
	          		</div>
	          	</div>
	          	<div class="col">
	          		<div class="form-group">
	          			<label>Password</label>
	          			<input type="password" name="password" class="form-control">
	          		</div>
	          	</div>
	          </div>
	          <div class="row justify-content-center">
	          	<div class="col col-md-6">
	          		<button type="submit" name="log-in" class="btn btn-success btn-block">Log-in</button>
	          	</div>
	          </div>
        </div>
      </form>
          <div class="card-footer text-muted text-center">
            ©<?php echo date("Y"); ?> Pylon's Global Solution
          </div>
        </div>
        </div>
  </div>
<?php
include('layouts/footer.php');