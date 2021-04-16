<?php
ob_start();
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
date_default_timezone_set("Asia/Calcutta");
$date =date("Y-m-d H:i:s");
if (isset($_REQUEST)) {
$student_id=base64_decode($_REQUEST['id']);
include_once './includes/api.php';
if (isset($_COOKIE['asdfghjklqwertyuiop'])) {
  $exam_ends=base64_decode($_COOKIE['asdfghjklqwertyuiop']);
}
else {
  ?>
  <center>
    <br><br><br><br>
    <h1>Wrong navigation</h1>
  <a href="#" style="color:red;" class="btn btn-primary" onclick="window.close(); refreshParent(); return false;">Back to Homepage</a>
</center>
  <?php
}
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
  <script>
   var countDownDate = new Date("<?php echo $exam_ends; ?>").getTime();
   var x = setInterval(function() {
     var now = new Date().getTime();
     var distance = countDownDate - now;
     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
     var seconds = Math.floor((distance % (1000 * 60)) / 1000);
     document.getElementById("demo").innerHTML = days + "d " + hours + "h "
     + minutes + "m " + seconds + "s ";
     if (distance < 0) {
       clearInterval(x);
       document.getElementById("demo").innerHTML = "";
       window.close();
       window.opener.location.reload();
      window.open('examcompleted.php');
     }
   }, 1000);
 </script>
</head>
<body>

    <section class="content">
       <div class="container-fluid">

        <div class="row">
          <div class="col-lg-12 ">
            <div class="card bg-info">
              <div class="card-body">
                <div class="text-center">
                  <h3 class="text-light "><img src="../dist/img/logo.jpg" style="width:50px;">   Indian Institute of Technology Patna | Online Exam Portal</h3>
                </div>
                <div class="float-right">
                  <a href="exam_section.php" class="btn btn-light" >Back to Section</a>
                </div>
              <p id="demo" class="btn btn-danger"></p>


              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="card ">
              <div class="card-header bg-warning">
                <h3 class="card-title">Question</h3>
              </div>

              <?php if (isset($_REQUEST['q_id'])) {
                $q_id=base64_decode($_REQUEST['q_id']);
                $sqli = $link->query("SELECT * FROM `response` WHERE  student_id='$student_id' AND type='mcq' AND id=$q_id");
              }else {
              $sqli = $link->query("SELECT * FROM `response` WHERE  student_id='$student_id' AND type='mcq'");
                }
             if ($sqli->num_rows > 0) {
               $data = $sqli->fetch_assoc();
               $c_id=$data['id'];
             }

             $sq = $link->query("SELECT id FROM `response` WHERE id = (select max(id) from response where id < '$c_id') AND  student_id='$student_id' AND type='mcq' ");
             if ($sq->num_rows > 0) {
               $pre = $sq->fetch_assoc();
               $pre_btn=$pre['id'];
             }
             else {
               $pre_btn="";
             }
               ?>
              <div class="card-body">
                <h5 class="card-title text-danger"> <?php echo $data['question'] ?></h5>
                <div class="float-right">
                  <?php echo $data['mark']." "."marks" ?>
                </div>
                <br>
                <form role="form" action="" method="post">
                  <div class="radio">
                  <label ><input type="radio" <?php if ($data['answer']==$data['o1']): ?>checked<?php endif; ?>  value="<?php echo $data['o1']; ?>"  name="ans"  > <?php echo $data['o1']; ?></label>
                </div>
                <div class="radio">
                <label ><input type="radio"  <?php if ($data['answer']==$data['o2']): ?>checked<?php endif; ?>  value="<?php echo $data['o2']; ?>" name="ans"> <?php echo $data['o2']; ?></label>
              </div>
              <div class="radio">
              <label ><input type="radio"  <?php if ($data['answer']==$data['o3']): ?>checked<?php endif; ?>  value="<?php echo $data['o3']; ?>"  name="ans">  <?php echo $data['o3']; ?></label>
            </div>
            <div class="radio">
            <label ><input type="radio"  <?php if ($data['answer']==$data['o4']): ?>checked<?php endif; ?>  value="<?php echo $data['o4']; ?>"  name="ans">  <?php echo $data['o4']; ?></label>
          </div>
          <?php if ($data['o5']!=""): ?>
            <div class="radio">
            <label ><input type="radio"   <?php if ($data['answer']==$data['o5']): ?>checked<?php endif; ?> value="<?php echo $data['o5']; ?>" name="ans">  <?php echo $data['o5']; ?></label>
          </div>
          <?php endif; ?>

          <input type="hidden" name="que" value="<?php echo $data['id']; ?>">
                <hr>
                <div class="float-left">
                  <?php if($pre_btn!="") {
                  ?>
                  <a href="?id=<?php echo base64_encode($student_id); ?>&q_id=<?php echo base64_encode($pre['id']); ?>" class="btn btn-primary">Pervious</a>
                  <?php
                  }
                  else {
                  } ?>

                </div>
                <div class="float-right">
                  <?php
                  $sql = $link->query("SELECT id FROM `response` WHERE id = (select min(id) from response where id > '$c_id') AND  student_id='$student_id' AND type='mcq' ");
                  if ($sql->num_rows > 0) {
                    $next = $sql->fetch_assoc();
                    $next_btn=$next['id'];
                  }
                  else {
                    $next_btn="";
                  }
                     ?>
                     <input type="submit" name="submit" class="btn btn-primary" value="Save & Next">
                           </form>
                </div>

              </div>
            </div>
          </div>
          <?php
          if (isset($_REQUEST['submit'])) {
            $q_id=mysqli_real_escape_string($link,$_POST['que']);
            if (!isset($_POST['ans'])) {
              $answer="Not-attempt";
            }else {
              $answer=mysqli_real_escape_string($link,$_POST['ans']);
            }
            $res= updateanswer($link,$q_id,$answer,$student_id);
             if ($res=="yes") {
               if ($next_btn!="") {
                 header('location:?id='.base64_encode($student_id).'&q_id='.base64_encode($next['id']));
               }
               else {
                 header('location:exam_section.php');
               }
                  }
          }
           ?>



          <div class="col-lg-4">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-danger">
                  <h3 class="card-title">Instruction</h3>
                  <div class="float-right">
                  More info <i type="button" class="fas fa-info" data-toggle="modal" data-target="#exampleModal">
                    </i>
                  </div>
                </div>
                <center>
                <div class="card-body">
                <?php
                $sql =$link->query("SELECT * FROM `studentdetails` WHERE   student_id='$student_id'") ;
               if ($sql->num_rows > 0) {
                 $s_det = $sql->fetch_assoc();
               }
                 ?>
                 <div class="card-body table-responsive p-0">
                   <table class="table table-hover table-bordered">
                     <thead>
                       <tbody>
                         <tr>
                           <th>Name</th>
                           <th><?php echo $s_det['name']; ?></th>
                         </tr>
                         <tr>
                           <th>Roll No</th>
                           <th><?php echo $s_det['roll']; ?></th>
                         </tr>
                         <tr>
                           <th>Username</th>
                           <th><?php echo $s_det['username']; ?></th>
                         </tr>
                         <tr>
                           <th>Exam ID</th>
                           <th><?php echo $s_det['ex_id']; ?></th>
                         </tr>
                         <tr>
                           <th colspan="2">
                             <button type="button" class="btn btn-app" name="button">Not Answer</button>
                             <button type="button" class="btn btn-app bg-green" name="button">Answer</button>
                             <button type="button" class="btn btn-app bg-dark" name="button">Current</button>
                           </th>

                         </tr>
                       </tbody>
                       </thead>
                     </table>
                   </div>
                </div>
              </center>
                <!-- /.card-body -->
              </div>

            </div>
            <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                  <h3 class="card-title">Details</h3>
                </div>
                <center>
                <div class="card-body">
                  <?php
                  $count=0;
                  $sqli =" SELECT * FROM `response` WHERE student_id ='$student_id' AND type='mcq'" ;
                  $data = $link->query($sqli);
                  if($data->num_rows>0){
                       while ($row = $data->fetch_assoc()) {
                         $count++;
                  ?>
                <a href="examportal_quizbased.php?id=<?php echo base64_encode($student_id); ?>&q_id=<?php echo base64_encode($row['id']); ?>" class="btn btn-app <?php if ($row['answer']!="") {
                  echo "bg-green";
                }elseif (isset($_REQUEST['q_id'])) {
                  if (base64_decode($_REQUEST['q_id'])==$row['id']) {
                    echo "bg-dark";
                  }
                }
                else{
                  echo "bg-white";
                } ?>">
                   <b>  <?php echo $count; ?> </b>
                  </a>
                  <?php
                }
              }
                   ?>
                </div>
              </center>
                <!-- /.card-body -->
              </div>

            </div>
          </div>

        </div>
      </div>

      </section>
<!-- jQuery -->
<script type='text/javascript'>
var isCtrl = false;
document.onkeyup=function(e)
{
if(e.which == 17)
isCtrl=false;
}
document.onkeydown=function(e)
{
if(e.which == 123)
isCtrl=true;
if (((e.which == 85) || (e.which == 65) || (e.which == 88) || (e.which == 67) || (e.which == 86) || (e.which == 2) || (e.which == 3) || (e.which == 123) || (e.which == 83)) && isCtrl == true)
{
alert('Attention on the test');
return false;
}
}
// right click code
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
function mischandler(){
alert('Attention on the test');
return false;
}
function mousehandler(e){
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if((eventbutton==2)||(eventbutton==3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;

function killCopy(e){
return false
}
function reEnable(){
return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
document.onmousedown=killCopy
document.onclick=reEnable
}
</script>
<script type="text/javascript">

document.onkeydown = function()
{
    switch (event.keyCode)
    {
        case 116 : //F5 button
            event.returnValue = false;
            event.keyCode = 0;
            return false;
        case 82 : //R button
            if (event.ctrlKey)
            {
                event.returnValue = false;
                event.keyCode = 0;
                return false;
            }
    }
}

</script>
<script>
document.onkeydown = function(e) {
if(event.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){
return false;
}
}
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php

 }else {

}
 ob_end_flush();?>
