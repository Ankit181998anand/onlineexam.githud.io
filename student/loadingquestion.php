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
 ?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  </head>
  <body>

  </body>
</html>
<?php
date_default_timezone_set("Asia/Calcutta");
$date =date("Y-m-d H:i:s");
include_once './includes/api.php';
if (isset($_REQUEST['submit'])) {
  $name=mysqli_real_escape_string($link,$_REQUEST['name']);
  $roll=mysqli_real_escape_string($link,$_REQUEST['roll']);
  $ex_id=mysqli_real_escape_string($link,$_REQUEST['ex_id']);
  $username="testing";
  $sqli =$link->query("SELECT * FROM `exam_details` WHERE  ex_id='$ex_id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   $noofmcq =  noofmcq($link,$data['ex_id']);
   $noofque_ans=noofque_ans($link,$data['ex_id']);
   $student_id=studentdetails($link,$date,$roll,$name,$username,$ex_id);
   $asdfghjklqwertyuiop=$data['date_of_exam'].' '.$data['end_time'];
 }
 if ($student_id!="false") {
   addquestion($link,$ex_id,$student_id);
   setcookie("ex_id",base64_encode($ex_id));
   setcookie("student_id",base64_encode($student_id));
   setcookie("asdfghjklqwertyuiop",base64_encode($asdfghjklqwertyuiop)); ///end time
   header('location:exam_section.php');
 }if($student_id=="false"){
?>
<script>
setTimeout(function() {
  swal({
    title: "You are already attend the exam",
    text: "",
    type: "error",
    confirmButtonText: "Ok"
  }, function() {
    window.close();
  }, 1000);
});
</script>
<?php
 }
}
 ?>
