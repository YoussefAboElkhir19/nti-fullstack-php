<?php
require_once "includes/ConnectDb.php";
require_once "includes/navBar.php";

$connect = new ConnectDb;

// تسجيل الخروج
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    session_unset();
    session_destroy();
    header("location:register.php?logged_out=true");
    exit;
}
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg rounded-4">
        <div class="card-body p-4">

     

          <?php if (isset($_SESSION['name'])) : ?>
            <h3>✅ Hello , You Already Login <strong><?= $_SESSION['name'] ?></strong></h3>
            <a href="<?= BASE_PATH ?>/auth/login" class="btn btn-danger my-3">تسجيل الخروج</a>

          <?php else : ?>

            <?php
            // عند إرسال النموذج
            if (isset($_POST['name']) && isset($_POST['email'])) {
              $name = $_POST['name'];
              $email = $_POST['email'];

              $existingUser = $connect->checkIfUserExists($name, $email);

              if ($existingUser) {
                // حدد ما هو المكرر
                if ($existingUser['name'] === $name && $existingUser['email'] === $email) {
                  $msg = "❌ UserName And Email Already Taken Try Again!!!";
                } elseif ($existingUser['name'] === $name) {
                  $msg = "❌ Name Only Already Taken Try Again!!!.";
                } else {
                  $msg = "❌ Email Only Already Taken Try Again!!!.";
                }

                echo "<div class='alert alert-danger'>$msg</div>";
              } else {
                // إدخال المستخدم
                $smt = $connect->insert($_POST, 'users');
                if ($smt) {
                  $_SESSION['name'] = $_POST['name'];
                  echo "<div class='alert alert-success'>✅ تم التسجيل بنجاح.</div>";
                header("Location: " . BASE_PATH . "/auth/login"); 
                  exit;
                } else {
                  echo "<div class='alert alert-danger'>❌ فشل في التسجيل، حاول مرة أخرى.</div>";
                }
              }
            }
            ?>

            <h2 class="text-center mb-4">Register Now</h2>

            <form method="POST">
              <div class="mb-3">
                <label class="form-label"><i class="fas fa-user"></i> Name</label>
                <input name="name" type="text" class="form-control" required />
              </div>

              <div class="mb-3">
                <label class="form-label"><i class="fas fa-envelope"></i> Email address</label>
                <input name="email" type="email" class="form-control" required />
              </div>

              <div class="mb-4">
                <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input name="password" type="password" class="form-control" required />
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Register</button>
              </div>
            </form>

          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once "includes/Footer.php";
?>
