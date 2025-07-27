<?php
require_once "includes/ConnectDb.php";
require_once "includes/navBar.php";
require_once __DIR__ . '/../../includes/config.php';

$connect = new ConnectDb;

// // Handle logout
// if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
//     session_unset();
//     session_destroy();
//     header("Location: login.php?logged_out=true");
//     exit;
// }
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg rounded-4">
        <div class="card-body p-4">

          <!-- Show message if logged out -->
          <?php if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true') : ?>
            <div class='alert alert-warning' role='alert'>
              ❗ Logout 
              <a href="<?= BASE_PATH ?>/auth/register" class='alert-link'>register now ???</a>
            </div>
          <?php endif; ?>

          <?php if (isset($_SESSION['name'])) : ?>
            <!-- If already logged in -->
            <h1 class='mb-3'>✅ Hello , <?= $_SESSION['name'] ?> <br> You Login Now </h1>
            <a href="<?= BASE_PATH ?>/auth/logout" class='btn btn-danger'>Logout</a>

          <?php else : ?>
            <?php
            // Handle form submit: check user exists or not
            if (isset($_POST['name'])) {
                $row = $connect->checkUser($_POST['name'], $_POST['password']);
                if ($row) {
                    $_SESSION["name"] = $row['name'];
                    $_SESSION["user_id"] = $row['id'];
                    header("Location: " . BASE_PATH . "/student/home");
                    exit;
                } else {
                    ?>
                    <div class='alert alert-danger' role='alert'>
                      ❌ User Not Found. Please Register First!!!
                      <a href="<?= BASE_PATH ?>/auth/register" class='alert-link'>Register</a>
                    </div>
                    <?php
                }
            }
            ?>

            <!-- Login form -->
            <h2 class="text-center mb-4">Login Now</h2>
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
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
              </div>
            </form>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once "includes/Footer.php"; ?>
