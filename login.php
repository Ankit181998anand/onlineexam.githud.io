<?php
include_once 'includes\dbcon.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IIT Patna | Online Exam Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <style media="screen">
    img{
      height: 80px;
      width: 80px;
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <img src="dist/img/logo.jpg" alt="IITP-logo" class="brand-image img-circle elevation-3" style="opacity: .8" >
    <a href="#"><b>Indian Institute of Technology Patna</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg"><b></b>Login</p>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

        <div class="input-group mb-3">
          <input type="email" name="user_name"  class="form-control" placeholder="Email id">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="password">
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4">

            <button type="submit" name="submit" id="submit" class="btn btn-danger btn-block">Login</button>

          </div>
          <!-- /.col -->
        </div>
      </form>




    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php

session_start();
if(isset($_SESSION['student']))
{
 header('location:student/index.php');
}
if(isset($_SESSION['faculty']))
{
 header('location:faculty/index.php');
}
if(isset($_SESSION['admin']))
{
 header('location:admin/index.php');
}
if (isset($_POST['submit'])) {
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


  $user = mysqli_real_escape_string($link,$_POST['user_name']);
  $pass = mysqli_real_escape_string($link,$_POST['password']);
$user_name=test_input($user);

  $qry=$link->query("SELECT * FROM `registerpage` WHERE `email_id`='$user_name'");
  if ($qry->num_rows> 0) {
             $data = $qry->fetch_array();
            if (password_verify($password, $data['paswd'])) {
               $id=$data['id'];
               if ($data['type']=='student') {
                 echo $data['type'];
                 $_SESSION['student']=$id;
                 header('location:student\index.php');
               }
               if ($data['type']=='faculty') {
                 $_SESSION['faculty']=$id;
                 header('location:faculty\index.php');
               }
               if ($data['type']=='admin') {
                 $_SESSION['admin']=$id;
                 header('location:admin\index.php');
               }

             }
             else {
               ?>
               <script>
               setTimeout(function() {
            swal({
            type: 'error',
            title: 'Oops...',
            text: 'Username and Password doesnot match!',
            confirmButtonText: "Ok"
            },  function() {
            window.location = "login.php";
            }, 1000);
            });
         </script>
         <?php
           }
         }
   ?>
   <script>
swal({
type: 'error',
title: 'Oops...',
text: 'You are not register Yet!',
confirmButtonText: "Ok"
},  function() {
window.location = "login.php";
}, 1000);
       </script>
       <?php
 }



  ?>
