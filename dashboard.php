<?php
require_once("connect.php");
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: index.php");
  exit();
}
?>

<?php include'startup.php'; ?>

    <div class="container">

      <?php if (isset($_SESSION['msg'])) : ?>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
          <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header <?php echo $_SESSION['class']; ?>">
              <strong class="me-auto">Success</strong>
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

      <div style="opacity: 0.9;" class="row justify-content-center">
        <h2 class="pt-4">Welcome , <?php echo $_SESSION['login_active']['0']; ?></h2>

        <div class="col-md-6">
          <div class="card m-5 p-3">
            <div class="card-body">
              <h3 class="card-title py-2">Start taking Quiz</h3>
              <a href="quiz.php" class="btn btn-warning m-2">Start the Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>