<?php 
$title = "Pylon's Global Solution";
session_start();
include ('layouts/header.php'); 
?>
<div class="container-fluid">
  <?php
      if(isset($_SESSION['err'])): ?>
        <div class="row mt-5 justify-content-center">
          <div class="col col-md-5">
            <div class="alert alert-danger text-center">
              <p>
                <?php 
                echo $_SESSION['err']; 
                unset($_SESSION['err']);
                ?>
            </p>
          </div>
        </div>
      </div>
  <?php endif ?>
   <?php
      if(isset($_SESSION['no_access'])): ?>
        <div class="row mt-5 justify-content-center">
          <div class="col col-md-5">
            <div class="alert alert-danger text-center">
              <p>
                <?php 
                echo $_SESSION['no_access']; 
                unset($_SESSION['no_access']);
                ?>
            </p>
          </div>
        </div>
      </div>
  <?php endif ?>
  <div class="row justify-content-center mt-5">
    <div class="col col-md-5">
      <div class="card">
          <div class="card-header text-center">
            <h4> Welcome to Pylon's Global Solution </h4>
          </div>
          <form action="controller/applicant.php" method="post">
          <div class="card-body">
           <div class="row">
            <div class="col">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Birthdate</label>
                <input type="date" name="bday" class="form-control">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control">
              </div>
            </div>
          </div>
             <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col col-md-6">
              <button type="submit" name="register" class="btn btn-block btn-success">Register</button>
            </div>
          </div>
        </div>
      </form>
          <div class="card-footer text-muted text-center">
            © Pylon's Global Solution
          </div>
        </div>
        </div>
  </div>
</div>

<?php include('layouts/footer.php'); ?>