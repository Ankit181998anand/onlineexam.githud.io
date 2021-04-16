<?php
include_once './includes/header.php';
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
               <h3 class="card-title">Register As Student</h3>
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
                 <input type="text" class="form-control" name="roll_no" id="roll_no" placeholder="Roll No">
               </div>
             </div>

             <div class="form-group">
               <div class="col-md-6 mb-3">
                 <select class="form-control" required name="branch" id="branch" >
                            <option>Select your branch</option>
                            <option value="Chemical & Biochemical Engineering">Chemical & Biochemical Engineering</option>
                            <option value="Civil Engineering">Civil Engineering</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                            <option value="Electrical Engineering"> Electrical Engineering</option>
                            <option value="Humanities & Social Sciences">Humanities & Social Sciences</option>
                            <option value="Mechanical Engineering"> Mechanical Engineering</option>
                            <option value="Metallurgical & Materials Engineering">Metallurgical & Materials Engineering</option>
                            <option value="Maths">Maths</option>
                            <option value="Physics">Physics</option>
                          </select>
             </div>
           </div>

           <div class="form-group">
              <div class="col-md-6 mb-3">
              <input type="number" class="form-control" name="contact" id="contact" placeholder="Contact No">
               </div>
            </div>


             <div class="form-group">
                <div class="col-md-6 mb-3">
                <input type="password" class="form-control" name="pass" id="password" placeholder="Password">
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

$name = mysqli_real_escape_string($link,$_POST['name']);
$email = mysqli_real_escape_string($link,$_POST['email']);
$rollno = mysqli_real_escape_string($link,$_POST['roll_no']);
$branch = mysqli_real_escape_string($link,$_POST['branch']);
$contact = mysqli_real_escape_string($link,$_POST['contact']);
$password=password_hash($_POST['pass'], PASSWORD_BCRYPT);
$type = 'student';
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
$name=test_input($name);
$email=test_input($email);
$rollno=test_input($rollno);
$contact=test_input($contact);

$sqli="SELECT   `name`, `email_id`, `roll_no`FROM `registerpage` WHERE `name`='$name' OR `email_id`='$email'OR`roll_no`='$rollno'";
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
$sqli="INSERT INTO `registerpage`( `name`, `email_id`, `roll_no`, `phone_no`, `branch`, `paswd`, `type`)
        VALUES ('$name','$email','$rollno','$contact','$branch','$password','$type')";
if(mysqli_query($link,$sqli)){
  ?>
  <script>
  setTimeout(function() {
    swal({
  title: "Congratulaions!",
  text: "You are registered successfully",
  type: "success",
  confirmButtonText: "Ok"
  }, function() {
  window.location = "index.php";
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
         text: "Something went wrong.",
         type: "error",
         confirmButtonText: "Ok"
       }, function() {
         window.location = "";
       }, 1000);
     });
     </script> <?php
}

}else {
  ?>
    <script>
    setTimeout(function() {
      swal({
        title: "Error!",
        text: "<?php echo "Password should be more than 6 digits." ?>",
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
