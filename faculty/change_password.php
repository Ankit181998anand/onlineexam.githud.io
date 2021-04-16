<?php
include_once './includes/header.php';
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                Enter your new Password
              </div>
              <form class="" action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" name="pass" required class="form-control" placeholder="Enter your new Password">
                </div>
                  <div class="form-group">
                <label>Confrim Password</label>
                <input type="password" name="c_pass" required class="form-control" placeholder="Enter your new Password">
              </div>
              </div>
              <div class="card-footer">
                <input type="submit" class="btn btn-secondary" name="submit" value="Change Password">
              </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </section>

    <?php
     if (isset($_POST['submit'])) {

  $pass = mysqli_real_escape_string($link,$_REQUEST['pass']);
  $c_pass = mysqli_real_escape_string($link,$_REQUEST['c_pass']);
  function checklen($data){
    $len=strlen($data);
    if ($len>=6) {
      return true;
    }
    else {
      return false;
    }
  }
  if ($pass == $c_pass) {
    if (checklen($pass)=='true') {

    $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    $sqlii="UPDATE `registerpage` SET `paswd`='$password' WHERE id='$idd'";
    if(mysqli_query($link, $sqlii)){
    ?>
    <script>
  setTimeout(function() {
  swal({
  title: "Congratulaions!",
  text: "Password changes successfully",
  type: "success",
  confirmButtonText: "Ok"
  }, function() {
  window.location = "./";
  }, 1000);
  });
  </script>
    <?php
    }
  }else {
    ?>
    <script>
  setTimeout(function() {
  swal({
  title: "Error!",
  text: "Password must be greater than 6 digits",
  type: "error",
  confirmButtonText: "Ok"
  }, function() {
  window.location = "";
  }, 1000);
  });
  </script> <?php
  }
}
else{
  ?>
  <script>
setTimeout(function() {
swal({
title: "Error!",
text: "Password don't match.",
type: "error",
confirmButtonText: "Ok"
}, function() {
window.location = "";
}, 1000);
});
</script> <?php
}
}

  include_once './includes/footer.php';

   ?>
