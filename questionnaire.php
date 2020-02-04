<?php
session_start();
	if(isset($_SESSION['name'])){?>
	<a href="session_out.php">Log-out</a>
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
          <form action="controller/applicant_answer.php" method="post">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <?php 
                  date_default_timezone_set("Asia/Manila");
                  $date = date("F j, Y");
                ?>
                  <h5>Date Today: <u><?php echo $date; ?></u></h5>
              </div>
            </div>

            <?php
                require('controller/db.php');
                $email = $_SESSION['email'];
                $applicant = "SELECT * FROM applicant WHERE email = '$email'";
                $qry_a = $conn->query($applicant) or trigger_error(mysqli_error($conn)." ".$applicant);
                $user = mysqli_fetch_assoc($qry_a);
                ?>
                <input type="hidden" value="<?php echo $user['id'] ?>" name="user_id">
              <?php
                $question = "SELECT * FROM question WHERE category = 'English Proficiency'";
                $qry = $conn->query($question) or trigger_error(mysqli_error($conn)." ".$question);
                $counter = 0;
                while($a = mysqli_fetch_assoc($qry)){  $counter ++; ?>
                <div class="row">
                  <div class="col mt-3">
                    <div class="form-group">
                      <label><?php echo $counter." .  ".$a['question'] ?></label>
                      <?php
                        $choices = explode(",", $a['choices']);
                        foreach($choices as $choice){?>
                          <div class="form-check">
                          <input type="radio" name="choice[<?php echo $a['id'] ?>]" value="<?php echo $choice ?>" class="form-check-input">
                          <label class="form-check-label" for="exampleRadios1">
                            <?php echo $choice; ?>
                          </label>
                        </div>
                       <?php }
                      ?>
                    </div>
                  </div>
                </div>
            <?php  }
            ?>
            <div class="row justify-content-center">
              <div class="col col-md-6">
                <button type="submit" name="submit" class="btn btn-success btn-block p-2">Proceed to IQ Test</button>
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

<?php include('layouts/footer.php'); ?>

<?php } else{
	$_SESSION['no_access'] = "Please register first";
	header("location:index.php");
} ?>