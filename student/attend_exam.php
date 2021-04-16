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
setcookie("ex_id",""); ////exam id
setcookie("student_id",""); // student_id
setcookie("asdfghjklqwertyuiop",""); /// timer

if (isset($_GET['ex_id']) && isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
  $ex_id=base64_decode($_GET['ex_id']);
  $sqli =$link->query("SELECT * FROM `exam_details` WHERE id='$id' AND ex_id='$ex_id'") ;
 if ($sqli->num_rows > 0) {
  $data = $sqli->fetch_assoc();
  $d1=$data['date_of_exam'].' '.$data['time_of_exam'];
  $selectedTime = $data['time_of_exam'];
  $endTime = strtotime("+15 minutes", strtotime($selectedTime)); /// add 15 mintues
  $end_min= date('H:i:s', $endTime);
  $d2=$data['date_of_exam'].' '.$end_min;
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
 </head>
 <body>

  <!-- /.content-header -->
    <section class="content">
         <div class="container-fluid">
           <br>
           <div class="row">
             <div class="col-md-12">
            <div class="card card-info" style="transition: all 0.15s ease 0s; height: inherit; width: inherit;">
              <div class="card-header">
                <h3 class="card-title">Exam ID: <?php echo $ex_id ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <div class="float-right">
                <a href="#" class="btn btn-primary" onclick="window.close(); refreshParent(); return false;">Back</a>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tbody>

                      <tr>
                        <th style="width:250px">Subject Code</th>
                        <th><?php echo $data['sub_code']; ?></th>
                      </tr>
                      <tr>
                        <th>Date of examination</th>
                        <th><?php echo $data['date_of_exam'] ?></th>
                      </tr>
                      <tr >
                        <th>Examination Time</th>
                        <th><?php echo $data['time_of_exam'] ?></th>
                      </tr>
                      <tr class="text-warning">
                        <th>Login time ends on </th>
                        <th><?php echo $end_min ?></th>
                      </tr>
                      <tr>
                        <th>Exam ends on</th>
                        <th><?php echo $data['end_time'] ?></th>
                      </tr>
                      <tr>
                        <th>Full Marks</th>
                        <th><?php echo $data['f_marks'] ?></th>
                      </tr>
                      <tr>
                        <th>Semester</th>
                        <th><?php echo $data['semester'] ?></th>
                      </tr>
                      <tr>
                        <th>Exam Type</th>
                        <th><?php echo $data['exam_type'] ?></th>
                      </tr>

                      <tr>
                        <th colspan="2">  <u>Instruction</u>  <br> <?php echo $data['any_inst']; ?> </th>
                      </tr>

                      <form action="loadingquestion.php" method="post" role="form">
                      <tr>
                        <th>Full Name</th>
                        <th><input type="text" class="form-control" name="name" value="<?php echo $name ?>"  readonly required placeholder="Enter your Full Name"></th>
                      </tr>
                      <tr>
                        <th>Roll No</th>
                        <th><input type="text" class="form-control"  value="<?php echo $roll_no; ?>" readonly name="roll" required placeholder="Enter your Roll No"></th>
                      </tr>
                            <input type="hidden" name="ex_id" value="<?php echo $data['ex_id']; ?>">
                      <tr>
                        <th colspan="2" class="text-center"> <button type="submit" id='show' disabled class="btn btn-success"   name="submit">Submit</button> </th>
                      </tr>


                    </form>
                      <tr class="text-info" >
                        <th colspan="2"  class="text-center"><span style="display: block;" id="extra">Please wait</span><p id="demo"></p></th>
                      </tr>
                      <div class="text-danger">
                      <b>   <p class="text-center" id="demo2"></p></b>
                      </div>

                  </tbody>

                    </thead>

                  </table>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
            </div>

           <!-- /.row -->
         </div><!-- /.container-fluid -->
       </section>
       <script>
        var countDownDate = new Date("<?php echo $d1; ?>").getTime();
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
            document.getElementById('show').disabled = false;
            document.getElementById("extra").style.display = "none";
            document.getElementById("demo").innerHTML = "";
          }
        }, 1000);
      </script>
      <script>
       var countDownDate2 = new Date("<?php echo $d2; ?>").getTime();
       var y = setInterval(function() {
         var now2 = new Date().getTime();
         var distance2 = countDownDate2 - now2;
         var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
         var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
         var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);

         if (distance2 < 0) {
           clearInterval(y);
           document.getElementById('show').disabled = true;
         document.getElementById("demo2").innerHTML = "Sorry! you are too late. Examination Started";
         }
       }, 1000);
     </script>
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
     <script src="plugins/jquery/jquery.min.js"></script>
     <!-- jQuery UI 1.11.4 -->
     <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
     <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
     <script>
     $.widget.bridge('uibutton', $.ui.button)
     </script>
     <!-- Bootstrap 4 -->
     <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- ChartJS -->
     <script src="../plugins/chart.js/Chart.min.js"></script>
     <!-- Sparkline -->
     <script src=../"plugins/sparklines/sparkline.js"></script>
     <!-- JQVMap -->
     <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
     <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
     <!-- jQuery Knob Chart -->
     <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
     <!-- daterangepicker -->
     <script src="../plugins/moment/moment.min.js"></script>
     <script src="../plugins/daterangepicker/daterangepicker.js"></script>
     <!-- Tempusdominus Bootstrap 4 -->
     <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
     <!-- Summernote -->
     <script src="../plugins/summernote/summernote-bs4.min.js"></script>
     <!-- overlayScrollbars -->
     <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
     <!-- AdminLTE App -->
     <script src="../dist/js/adminlte.js"></script>
     <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     <script src="../dist/js/pages/dashboard.js"></script>
     <!-- AdminLTE for demo purposes -->
     <script src="../dist/js/demo.js"></script>
     </body>
     </html>

  <?php
  }
  else {
    header('location:./');
  }
}
  else {
    header('location:./');
  }
   ?>
