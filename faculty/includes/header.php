<?php
ob_start();
   session_start();

        if(isset($_SESSION['faculty']))
        {
             include_once '../conn/dbcon.php';
              $idd=$_SESSION['faculty'];
            	$sq = $link->query("SELECT * FROM registerpage WHERE id='$idd' AND aprove=1");
              $dat = $sq->fetch_array();
              $email= $dat['email_id'];
              $name= $dat['name'];
              $mobile=$dat['phone_no'];
              $fac_id=$dat['employ_id'];
        }
    else{
        header('location:../');
    }

 ?>
<?php

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
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dashboard" class="brand-link">
      <img src="../dist/img/logo.jpg" alt="IITP-logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Online Exam </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $name; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="index.php" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="test_detail.php" class="nav-link ">
              <i class="nav-icon fas fa-pen-fancy "></i>
              <p>
                Add Test Details
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="add-question.php" class="nav-link ">
              <i class="nav-icon fas fa-pen-fancy "></i>
              <p>
                Add Question
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="view-test.php" class="nav-link ">
              <i class="nav-icon fa fa-edit "></i>
              <p>
                View question
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="activate_test.php" class="nav-link ">
              <i class="nav-icon fa fa-edit "></i>
              <p>
                Activate Exam
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="answersheet.php" class="nav-link ">
              <i class="nav-icon fa fa-book "></i>
              <p>
                AnswerSheet
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="change_password.php" class="nav-link ">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Change Password
              </p>
            </a>

          </li>
          <li class="nav-item ">
            <a href="logout.php" class="nav-link ">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Logout
              </p>
            </a>

          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
