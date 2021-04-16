
<?php
session_start();

     if(isset($_SESSION['student']))
     {
          include_once '../conn/dbcon.php';
           $idd=$_SESSION['student'];
           $sq = $link->query("SELECT * FROM registerpage WHERE id='$idd' AND aprove=1");
           $dat = $sq->fetch_array();
           $email= $dat['email_id'];
           $name= $dat['name'];
           $roll_no=$dat['roll_no'];
     }
 else{
     header('location:../');
 }
setcookie("ex_id","");
setcookie("student_id","");
setcookie("asdfghjklqwertyuiop","");

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
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <section class="content">
       <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card bg-info">
              <div class="card-body">
                <div class="text-center">
                  <h3 class="text-light"><img src="../dist/img/logo.jpg" style="width:50px;">   Indian Institute of Technology Patna | Online Exam Portal</h3>
                </div>


              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <center>
            <div style="font-size: 150px; color:#26F610">
            <i class="far fa-check-circle"></i>
            </div>

            <br>
            <h2 class="text-green">Thank You for attend the Exam.</h2>
            <br><br>
            <button type="button" class="btn btn-warning" onclick="window.close();window.opener.location.reload();" name="button">Close</button>
            </center>
          </div>
        </div>
      </div>

      </section>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
