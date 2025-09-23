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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="img/srclogo.png" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
 
</head>
<body class="d-flex align-items-center justify-content-center">

  <div class="login-card text-center">
    <div class="logo-circle">
      <img src="assets/img/Santa_Rita_Pampanga.png" alt="Logo">
    </div>
    <h4 class="mb-4 text-dark fw-semibold">Welcome Back</h4>
    <p class="text-muted mb-4">Sign in to continue</p>

    <?php if (!empty($error_message)) { ?>
      <div class="alert alert-danger py-2">
        <?php echo $error_message; ?>
      </div>
    <?php } ?>

    <form method="POST" action="">
      <div class="mb-3 text-start">
        <label class="form-label">Username or Email</label>
        <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter your username or email" required>
      </div>
      <div class="mb-3 text-start">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter your password" required>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Keep me signed in</label>
        </div>
        <a href="#" class="text-success small">Forgot password?</a>
      </div>
      <button type="submit" name="login" class="btn btn-success w-100 btn-lg">Sign In</button>
    </form>

    <div class="mt-4">
      <span class="text-muted">Don't have an account?</span>
      <a href="register.html" class="text-success fw-semibold">Create</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
