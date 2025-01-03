<?php
session_start();
require_once 'koneksi.php';

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = mysqli_query($konek,"SELECT * from User WHERE username = '$username' AND password = '$password' ");


  if(mysqli_num_rows($query ) > 0) {
    $result = mysqli_fetch_assoc($query);

    $_SESSION['user'] = $result;

    if($result['role'] == 'admin') {
      header("Location: dashboard.php");
    } else if ($result['role'] == 'user'){
      header('Location: User.php');
    }
    
  }


  $error = 'password atau username salah';

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1>Login Es Teh Solo</h1> 
    <!-- <img src="./asset/logo.jpeg " alt="" width="100 "> -->

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <?php if(isset($error)) : ?>
          <div class="alert alert-danger text-center"><?= $error ?></div>
      <?php endif; ?>


      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name='password'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
                   </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block " name="login">Masuk </button>
          </div>
          <!-- /.col -->
        </div>
      </form>

 
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
