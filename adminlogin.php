<?php
session_start();

require_once("connect.php");
require_once("function.php");

if (isset($_SESSION['login_active'])) {
  header("Location: dashboard.php");
  exit();
} else {

  if (isset($_POST['login'])) 
  {
  

    $userid= $_POST['userid'];
     $pass= $_POST['pass'];




    if ($userid=='kshitiz' && $pass=='Ranchi')
     {
      
        $_SESSION['login_active'] = [$name, $mobile,$user_id];
        $_SESSION['msg'] = "Welcome to Dashboard";
        $_SESSION['class'] = "text-bg-success";
        header("Location: admin/admin/dashboard.php");
      
    } 
    else {
      $_SESSION['msg'] = "Check User ID & Password";
      $_SESSION['class'] = "text-bg-danger";
      header("Location: adminlogin.php");
      exit();
    }
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">

  <script>
  function validateForm() {
    // Get the mobile number value from the form
    var mobile = document.forms["quizForm"]["mobile"].value;
    
    // Regular expression to check if the mobile number is valid (10 digits)
    var mobilePattern = /^[6-9]\d{9}$/;

    if (!mobilePattern.test(mobile)) {
      alert("Please enter a valid 10-digit mobile number starting with 6, 7, 8, or 9.");
      return false; // Prevent the form from submitting
    }
    return true; // Form is valid, submit it
  }
</script>


</head>

<body>
  <section class="main-section">
    <div class="container">

      <?php if (isset($_SESSION['msg'])) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
          <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header <?php echo $_SESSION['class']; ?>">
              <strong class="me-auto">Message</strong>
              <button type="button" class="btn-close text-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
              <?php
              $message = $_SESSION['msg'];
              unset($_SESSION['msg']);
              echo $message;
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-7 col-lg-4">
          <div class="box rounded">
            <div class="img"></div>
            <div class="login-box p-5">
              <h2 class="pb-4">Admin Panel Login</h2>
             <form name="quizForm" action="" method="post" onsubmit="return validateForm()">
              <div class="mb-4">
                <input type="text" class="form-control" placeholder="Enter User Id" name="userid" required>
              </div>
              <div class="mb-4">
                <input type="password" class="form-control" placeholder="Enter Password" name="pass">
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="login">Login Now</button>
              </div>
            </form>

          

            
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>