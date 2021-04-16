<?php
include_once './includes/header.php';
 ?>
<br>
 <section class="content">
     <div class="container-fluid">
       <div class="row">
         <div class="col-md-3">
          </div>
         <!-- left column -->
         <div class="col-md-6">
           <!-- general form elements -->
           <div class="card card-secondary">
             <div class="card-header">
               <h3 class="card-title"><b>Register As Faculty</b></h3>
             </div>
             <!-- /.card-header -->
             <!-- form start -->
             <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
               <center>
               <div class="card-body">
                 <div class="form-group">
                   <div class="col-md-6 mb-3">
                   <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                 </div>

               </div>
                 <div class="form-group">
                   <div class="col-md-6 mb-3">
                   <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                 </div>
               </div>

               <div class="form-group">
                 <div class="col-md-6 mb-3">
                 <input type="text" class="form-control" name="employ_id" id="employ_id" placeholder="Employ Id">
               </div>
             </div>

             <div class="form-group">
                <div class="col-md-6 mb-3">
                <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact No">
                 </div>
              </div>


             <div class="form-group">
                <div class="col-md-6 mb-3">
                <input type="password" class="form-control" name="pass" id="Password" placeholder="Password">
                 </div>
              </div>

               </div>
               <!-- /.card-body -->
             </center>
               <div class="card-footer">
                 <center>
                 <button type="submit" name="register" class="btn btn-danger">Register</button>
               </center>
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

if(isset($_POST['register'])){
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$employid = mysqli_real_escape_string($link,$_POST['employ_id']);
$contact = mysqli_real_escape_string($link,$_POST['contact']);
$password=password_hash($_POST['pass'], PASSWORD_BCRYPT);
$type = 'faculty';
$name=test_input($name);
$email=test_input($email);
$employid=test_input($employid);
$contact=test_input($contact);

$sqli="SELECT  `name`, `email_id`,  `employ_id` FROM `registerpage` WHERE `name`='$name' OR `email_id`='$email' OR `employ_id`='$employid'";
$row = $link->query($sqli);
if($row->num_rows>0){
                  ?>
                  <script>
                  setTimeout(function() {
                    swal({
                      title: "Error",
                      text: "This Account already exist.",
                      type: "error",
                      confirmButtonText: "Ok"
                    }, function() {
                      window.location = "";
                    }, 1000);
                  });
                  </script> <?php
                }
else {

function checklen($data){
  $len=strlen($data);
  if ($len>=6) {
    return true;
  }
  else {
    return false;
  }
}
if (checklen($_POST['pass'])=='true') {
$sqli="INSERT INTO `registerpage`( `name`, `email_id`,`employ_id`, `phone_no`, `paswd`, `type`)
        VALUES ('$name','$email','$employid','$contact','$password','$type')";

if(mysqli_query($link,$sqli)){

 ?>
  <script>
  setTimeout(function() {
    swal({
  title: "Congratulaions!",
  text: "You are registered successfully.",
  type: "success",
  confirmButtonText: "Ok"
  }, function() {
  window.location = "./";
  }, 1000);
  });
      </script>
      <?php
}
 else{
   ?>
     <script>
     setTimeout(function() {
       swal({
         title: "Error!",
         text: "Something went wrong",
         type: "error",
         confirmButtonText: "Ok"
       }, function() {
         window.location = "";
       }, 1000);
     });
     </script> <?php
}

}else{

  ?>
    <script>
    setTimeout(function() {
      swal({
        title: "Error!",
        text: "<?php echo "Password should be more than 6 digits."  ?>",
        type: "error",
        confirmButtonText: "Ok"
      }, function() {
        window.location = "";
      }, 1000);
    });
    </script> <?php
}
}


}



 ?>
