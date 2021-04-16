<?php
include_once './conn/dbcon.php';
 ?>

 <!DOCTYPE html>

 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <title>IIT Patna | Online Exam Portal</title>

   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="./dist/css/adminlte.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
 </head>
 <body class="hold-transition sidebar-collapse layout-top-nav">
 <div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand-md navbar-light navbar-information">
     <div class="container">
       <a href="../../index3.html" class="navbar-brand">
         <img src="dist/img/logo.jpg" alt="IITP-logo" class="brand-image img-circle elevation-4"
              style="opacity: .8">
         <span class="brand-text font-weight-light"><b>Indian Institute of Technology Patna| Online Exam Portal</b></span>
       </a>



       <div class="collapse navbar-collapse order-3" id="navbarCollapse">

         <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
           <li class="nav-item">
             <a href="./" class="nav-link"><b>Login</b></a>
           </li>
           <li class="nav-item dropdown">
             <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="nav-link dropdown-toggle"><b>Register</b></a>
             <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
               <li><a href="register_student.php" class="dropdown-item">Register as Student </a></li>
               <li><a href="register_faculty.php" class="dropdown-item">Register as Faculty</a></li>

             </ul>
           </li>
         </ul>


       </div>

     </div>
   </nav>
   <!-- /.navbar -->
 </div>
