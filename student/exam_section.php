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
date_default_timezone_set("Asia/Calcutta");
$date =date("Y-m-d H:i:s");
include_once './includes/api.php';
if (isset($_COOKIE['ex_id']) && isset($_COOKIE['student_id'])) {
  $ex_id=base64_decode($_COOKIE['ex_id']);
  $student_id=base64_decode($_COOKIE['student_id']);
  $exam_ends=base64_decode($_COOKIE['asdfghjklqwertyuiop']); /// timer
  $sqli =$link->query("SELECT * FROM `exam_details` WHERE  ex_id='$ex_id'") ;
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   $noofmcq =  noofmcq($link,$data['ex_id']);
   $noofque_ans=noofque_ans($link,$data['ex_id']);
 }
 $sql =$link->query("SELECT * FROM `studentdetails` WHERE  ex_id='$ex_id' AND student_id='$student_id'") ;
if ($sql->num_rows > 0) {
  $s_det = $sql->fetch_assoc();
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
          <div class="col-lg-12">
            <div class="card bg-info">
              <div class="card-body">
                <div class="text-center">
                  <h3 class="text-light"><img src="../dist/img/logo.jpg" style="width:50px;">   Indian Institute of Technology Patna | Online Exam Portal</h3>
                </div>
                <div class="float-left">
                  <a class="btn btn-light" href="examcompleted.php">Submit</a>
                </div>
                <div class="float-right">
                <p id="demo" class="btn btn-danger"></p>


                </div>

              </div>
            </div>
          </div>
          <div class="col-lg-8">
              <div class="col-md-12">
                <?php if ($noofmcq!=0): ?>
                  <div class="card card-success collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">MCQ Based</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: none;">
                    <b>Total question <?php echo $noofmcq ?> &nbsp; &nbsp;
                     <a href="examportal_quizbased.php?id=<?php echo base64_encode($student_id); ?>" class="text-green"> <i class="fas fa-rocket"></i> Attend</a> </b>

                    </div>
                    <!-- /.card-body -->
                  </div>
                    <?php endif; ?>
                  <!-- /.card -->
                </div>
                <div class="col-md-12">
                  <?php if ($noofque_ans!=0): ?>
                    <div class="card card-success collapsed-card">
                      <div class="card-header">
                        <h3 class="card-title">Answer Based question.</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body" style="display: none;">
                      <b>Total question <?php echo $noofque_ans ?> &nbsp; &nbsp;
                       <a href="examportal_answerbased.php?id=<?php echo base64_encode($student_id); ?>" class="text-green"> <i class="fas fa-rocket"></i> Attend</a> </b>
                      </div>
                      <!-- /.card-body -->
                    </div>
                      <?php endif; ?>
                    <!-- /.card -->
                  </div>


          </div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success">
                  <h1 class="card-title text-light">Details</h1>
                  <div class="float-right">
                  Instructions <i type="button" class="fas fa-info" data-toggle="modal" data-target="#exampleModal">
                    </i>
                  </div>
                </div>
                <center>
                <div class="card-body">
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
                            <th><?php echo $ex_id; ?></th>
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
        </div>
      </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Instructions</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo getins($link,$ex_id);
                   ?>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

      </section>
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
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<?php
}
else {
    ?>
    <center>
      <br><br><br><br>
      <h1>Wrong navigation</h1>
    <a href="#" class="btn btn-primary" onclick="window.close(); refreshParent(); return false;">Back to Homepage</a>
  </center>
      <?php
}
 ?>
</body>
</html>
