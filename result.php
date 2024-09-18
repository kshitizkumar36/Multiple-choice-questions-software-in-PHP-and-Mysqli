<?php
require_once("connect.php");
require_once("function.php");
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: index.php");
  exit();
}
?>

<?php
 $user_id= $_SESSION['login_active'][2];
 $current_time= $_SESSION['current_time'];

?>
<?php include'startup.php'; ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <?php if ($_SESSION['score'] == 0) : ?>
            <div class="card my-2 p-3 text-center">
              <div class="card-body">
                <h5 class="card-title py-2 text-center">No Question Attempted</h5>
                <button class="btn btn-warning">You Score is : <?php echo $score= $_SESSION['score']; ?></button>
              </div>
            </div>

          <?php else : ?>
            <div class="card my-2 p-3 text-center">
              <div class="card-body">
                <h5 class="card-title py-2 text-center">You have attempted <?php echo $_SESSION['attempted']; ?> out of <?php echo $total_question= totalquestion($conn); ?></h5>
                <button class="btn btn-warning">You Score: <?php echo $score= $_SESSION['score']; ?></button>
                <br><br><span class="badge text-bg-primary">Answered <?php echo $score= $_SESSION['score']; ?> Questions Successfully!</span>
              </div>
            </div>

 
            ?>

          <?php endif ?>

          <div class="card my-2 p-3 text-center">
            <div class="card-body">
              <a class="btn btn-info" href="quiz.php">Reattempt Quiz</a>
            </div>
          </div>
        </div>

      </div>
    </div>
    </form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

           <?php  

// Your current time, which is a specific string value

// Get the current time using the PHP date function
$now_time = date("H:i:s");

// Convert both times into Unix timestamps (seconds since January 1, 1970)
$current_timestamp = strtotime($current_time);
$now_timestamp = strtotime($now_time);

// Calculate the difference in seconds
$time_difference = $now_timestamp - $current_timestamp;

// Convert the difference into a readable format (hours:minutes:seconds)
$hours = floor($time_difference / 3600);
$minutes = floor(($time_difference % 3600) / 60);
$seconds = $time_difference % 60;

 $time_taken= "$hours hours, $minutes minutes, $seconds seconds"; 







            $query_2="UPDATE `users` SET `total_question`='$total_question',`score`='$score',`time_taken`='$time_taken' WHERE `user_id`='$user_id'";
            $run_2= mysqli_query($conn,$query_2);

?>


</html>