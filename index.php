<?php
session_start();
if(isset($_SESSION['student']))
{
 header('location:student/');
}
if(isset($_SESSION['faculty']))
{
 header('location:faculty/');
}
if(isset($_SESSION['admin']))
{
 header('location:admin/');
}
include_once './includes/header.php';
 ?>
 <?php

 if (isset($_POST['submit'])) {
   function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
   $user = mysqli_real_escape_string($link,$_POST['user_name']);
   $password = mysqli_real_escape_string($link,$_POST['password']);
   $user_name=test_input($user);

   $qry=$link->query("SELECT * FROM `registerpage` WHERE `email_id`='$user_name'");
   if ($qry->num_rows> 0) {
              $data = $qry->fetch_array();
             if (password_verify($password, $data['paswd'])) {
               if($data['aprove']==1){
                $id=$data['id'];
                if ($data['type']=='student') {
                  echo $data['type'];
                  $_SESSION['student']=$id;
                  header('location:student/');
                }
                if ($data['type']=='faculty') {
                  $_SESSION['faculty']=$id;
                  header('location:faculty/');
                }
                if ($data['type']=='admin') {
                  $_SESSION['admin']=$id;
                  header('location:admin/');
                }
              }else {
                ?>
                <script>
                setTimeout(function() {
             swal({
             type: 'error',
             title: 'Oops...',
             text: 'Your account is not activated.Contact admin',
             confirmButtonText: "Ok"
             },  function() {
             window.location = "";
             }, 1000);
             });
          </script>

                <?php
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
             window.location = "";
             }, 1000);
             });
          </script>
          <?php
            }
          }else {
    ?>
    <script>
 swal({
 type: 'error',
 title: 'Oops...',
 text: 'You are not register Yet!',
 confirmButtonText: "Ok"
 },  function() {
 window.location = "";
 }, 1000);
        </script>
        <?php
  }

}


   ?>
<br>

 <section class="content" align="center">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
          </div>
         <!-- left column -->
         <div class="col-md-6">
           <!-- general form elements -->
           <div class="card card-secondary">
             <div class="card-header">
               <h3 class="card-title">Login</h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="card-body">

              <div class="form-group">
                <label class="float-left">Email</label>
                <input type="email" name="user_name" class="form-control" required placeholder="Enter your email id.">
              </div>
              <div class="form-group">
                <label class="float-left">Password</label>
                <input type="password" name="password" class="form-control" required placeholder="Enter your password.">
              </div>
               <div class="row">
                 <!-- /.col -->
                 <div class="col-4">
                   <button type="submit" name="submit" id="submit" class="btn btn-danger btn-block">Login</button>

                 </div>
                 <!-- /.col -->
               </div>
                   </div>
             </form>

           </div>
           <!-- /.card -->
         </div>
       </div>
     </div>
   </section>
<?php
  include_once './includes/footer.php';
 ?>
