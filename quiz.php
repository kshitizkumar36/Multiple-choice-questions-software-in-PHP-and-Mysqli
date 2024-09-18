<?php
require_once("connect.php");
require_once("function.php");
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: index.php");
  exit();
}
?>

<?php include'startup.php'; ?>

  <!-- Timer display -->
        <div class="col-md-12 text-center bg-warning">
          <div class="alert alert-info">
           <b> Time Remaining: </b><span class="badge bg-danger" id="timer">5:00</span> <!-- Initial time display -->
          </div>
        </div>


 <script>
  // Countdown Timer function (5 minutes = 300 seconds)
  var timeLeft = 300; // 5 minutes in seconds

  function startTimer() {
    var timerInterval = setInterval(function () {
      var minutes = Math.floor(timeLeft / 60);
      var seconds = timeLeft % 60;

      // Display the countdown in mm:ss format
      document.getElementById("timer").innerHTML = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);

      // Redirect to logout.php when the time is up
      if (timeLeft <= 0) {
        clearInterval(timerInterval);
        // window.location.href = "logout.php";
         document.querySelector('button[name="answer-submit"]').click();
      }

      timeLeft--;
    }, 1000); // Decrease time every second
  }

  // Start the timer when the page loads
  window.onload = startTimer;
</script>





<?php

$current_time=date("H:i:s");
?>

    <form action="checkanswers.php" method="post">

      <input type="hidden" value="<?php echo $current_time; ?>" name="current_time">
      <?php for ($i = 1; $i <= totalquestion($conn); $i++) :
        $sql = "SELECT * FROM questions where qid = $i";
        $result = mysqli_query($conn, $sql);
      ?>

        <div class="container">
          <div class="row justify-content-center">

            <?php while ($row = mysqli_fetch_assoc($result)) :
              $sql = "SELECT * FROM answers where ans_id = $i";
              $result = mysqli_query($conn, $sql);
            ?>
              <div class="col-md-8">
                <div class="card my-2 p-3">
                  <div class="card-body">
                    <h5 class="card-title py-2">Q.<?php echo $row['qid'] . " " . $row["question"];; ?> </h5>

                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="checkanswer[<?php echo $row['ans_id']; ?>]" value="<?php echo $row['aid']; ?>">
                        <?php echo $row['answer']; ?>
                      </div>
                    <?php endwhile ?>

                  </div>
                </div>
              </div>
            <?php endwhile ?>
          <?php endfor ?>

            <div class="col-md-8 mb-5">
              <button type="submit" class="btn btn-success" name="answer-submit">Submit Answers</button>
            </div>
          </div>
        </div>
    </form>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>