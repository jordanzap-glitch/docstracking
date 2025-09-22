<?php
ob_start();
session_start();
error_reporting(0);
ini_set('display_errors', 1);
include 'includes/dbcon.php';

$error_message = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Super Admin check
  $query_superadmin = "SELECT * FROM tbl_superadmin WHERE username = '$username' AND password = '$password'";
  $rs_superadmin = $conn->query($query_superadmin);

  if ($rs_superadmin->num_rows > 0) {
    $row = $rs_superadmin->fetch_assoc();
    $_SESSION['userId'] = $row['id'];
    $_SESSION['fullname'] = $row['fullname'];
    $_SESSION['user_type'] = 'superadmin';
    header('Location:SuperAdmin/index.php');
    exit();
  }

  // Admin check
  $query_admin = "SELECT * FROM tbl_admin WHERE (email = '$username' OR username = '$username') AND password = '$password'";
  $rs_admin = $conn->query($query_admin);

  if ($rs_admin->num_rows > 0) {
    $row = $rs_admin->fetch_assoc();
    $_SESSION['userId'] = $row['id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_type'] = 'admin';
    header('Location:Admin/index.php');
    exit();
  }

  // Customer check
  $query_customer = "SELECT * FROM tbl_customer WHERE (email = '$username' OR username = '$username') AND password = '$password'";
  $rs_customer = $conn->query($query_customer);

  if ($rs_customer->num_rows > 0) {
    $row = $rs_customer->fetch_assoc();
    $_SESSION['userId'] = $row['id'];
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['lastname'] = $row['lastname'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['user_type'] = 'customer';
    header('Location:Customer/index.php');
    exit();
  }

  $error_message = "Invalid Username/Password!";
}
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Log-In</title>
  <link rel="stylesheet" href="assets/static/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/static/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/static/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/static/css/vertical-layout-light/style.css">
  <link rel="shortcut icon" href="img/srclogo.png" />
  <style>
    body {
      background: #f5f7ff;
    }
    .logo-circle {
      width: 100px;
      height: 100px;
      background-color: #ffffff;
      border-radius: 50%;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: -60px auto 20px;
      position: relative;
      z-index: 2;
    }
    .logo-circle img {
      max-width: 60%;
      height: auto;
    }
    .auth-form-light {
      position: relative;
      padding-top: 80px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      background: #fff;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <!-- Circle for Logo -->
              <div class="logo-circle">
                <img src="img/srclogo.png" alt="logo">
              </div>

              <h6 class="font-weight-light text-center">Sign in to continue.</h6>

              <?php if (!empty($error_message)) { ?>
                <div class="alert alert-danger text-center mt-3">
                  <?php echo $error_message; ?>
                </div>
              <?php } ?>

              <form class="pt-3" method="POST" action="">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username or Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN IN
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/static/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/static/js/off-canvas.js"></script>
  <script src="assets/static/js/hoverable-collapse.js"></script>
  <script src="assets/static/js/template.js"></script>
  <script src="assets/static/js/settings.js"></script>
  <script src="assets/static/js/todolist.js"></script>
</body>
</html>
