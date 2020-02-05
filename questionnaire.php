<?php
session_start();
	if(isset($_SESSION['name'])){?>
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
            <div class="row" id="eng_test">
              <div class="col">
            <?php
                require('controller/db.php');
                $email = $_SESSION['email'];
                $applicant = "SELECT * FROM applicant WHERE email = '$email'";
                $qry_a = $conn->query($applicant) or trigger_error(mysqli_error($conn)." ".$applicant);
                $user = mysqli_fetch_assoc($qry_a);
                ?>
                <input type="hidden" value="<?php echo $user['id'] ?>" name="user_id">
              <?php
                $english = "SELECT * FROM question WHERE category = 'English Proficiency'";
                $qry = $conn->query($english) or trigger_error(mysqli_error($conn)." ".$english);
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
          </div>
        </div>
            <div class="row justify-content-center" id="eng_row">
              <div class="col col-md-6">
                <button type="button" name="submit" id="eng_btn" class="btn btn-success btn-block p-2">Proceed to IQ Test</button>
              </div>
            </div>
            <div class="row" id="iq_test">
              <div class="col">
                <?php
                    $iq_test = "SELECT * FROM question WHERE category ='IQ Test'";
                    $qry_1 = $conn->query($iq_test) or trigger_error(mysqli_error($conn)." ".$iq_test);
                    $counter_1 = 0;
                    while($b = mysqli_fetch_assoc($qry_1)){ $counter_1++;?>
                    <div class="row">
                      <div class="col mt-3">
                        <div class="form-group">
                          <label><?php echo $counter_1.". ".$b['question'] ?></label>
                        </div>
                        <?php
                          $choices_1 = explode(",",$b['choices']);
                          foreach($choices_1 as $choice){?>
                          <div class="form-check">
                          <input type="radio" name="choice[<?php echo $b['id'] ?>]" value="<?php echo $choice ?>" class="form-check-input">
                            <label class="form-check-label" for="exampleRadios1">
                                <?php echo $choice; ?>
                            </label>
                        </div>
                         <?php }
                        ?>
                      </div>
                    </div>
                <?php }
                ?>
              </div>
            </div>
            <!--<div class="row justify-content-center">
              <div class="col col-md-6">
                <button type="submit" name="submit" class="btn btn-success btn-block p-2">Proceed to IQ Test</button>
              </div>
            </div>-->
            <div class="row justify-content-center" id="iq_row">
              <div class="col col-md-6">
                <button type="button" name="submit" id="iq_btn" class="btn btn-success btn-block p-2">Proceed to IQ Test</button>
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