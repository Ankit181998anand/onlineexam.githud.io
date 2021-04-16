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
            <h1 class="m-0 text-dark">Examination Details</h1>
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

    <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Provide Information</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="" method="post" >
                    <div class="card-body">
                       <div class="form-row">


                    <div class="col-md-4 mb-3">
                        <label for="Subject code">Subject code</label>
                        <input type="text" class="form-control" name="sub_code" id="	sub_code" placeholder="Subject code" required >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="Date of Eximination">Date of Eximination</label>
                        <input type="date" class="form-control" name="date_of_exam" id="date_of_exam" placeholder="Date of Eximination" required >
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="Time of Eximination">Time of Eximination</label>
                        <input type="time" class="form-control" name="time_of_exam" id="time_of_exam" placeholder="Time of Eximination" required >
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="Duration">End time of Examination</label>
                        <input type="time" class="form-control" name="duration" id="duration" placeholder="Duration" required >
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="Full Marks">Full Marks</label>
                        <input type="number" class="form-control" name="f_marks" id="f_marks" placeholder="Full Marks" required >
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="Semester">Semester</label>
                        <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" required >
                      </div>

                      <div class="col-md-4 mb-3">
                        <label for="Examination Type">Examination Type</label>
                        <input type="text" class="form-control" name="exam_type" id="exam_type" placeholder="Examination Type" required >
                      </div>


                      <div class="col-md-12 mb-12">
                        <label>Any other Information</label>
                      <textarea class="form-control" name="any_inst" rows="3" placeholder="Enter ..."></textarea>
                      </div>

                    </div>
                  </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                      </div>
                     </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

  <?php
  include_once './includes/footer.php';


  if(isset($_POST['submit'])){
              $user_id = $fac_id;
              $token = '02120321236547956984456521236448586SDASYFDASGUYTAWERTYUIOIGDFGH';
              $token = str_shuffle($token);
              $token = substr($token, 0, 5);
              $ex_id='SR_'.$token;
              $sub_cod = mysqli_real_escape_string($link,$_POST['sub_code']);
              $date_of_exam = mysqli_real_escape_string($link,$_POST['date_of_exam']);
              $time_of_exam = mysqli_real_escape_string($link,$_POST['time_of_exam']);
              $duration = mysqli_real_escape_string($link,$_POST['duration']);
              $f_marks = mysqli_real_escape_string($link,$_POST['f_marks']);
              $semester = mysqli_real_escape_string($link,$_POST['semester']);
              $exam_type = mysqli_real_escape_string($link,$_POST['exam_type']);
              $any_inst = mysqli_real_escape_string($link,$_POST['any_inst']);

              $sqli="INSERT INTO `exam_details`(`ex_id`, `sub_code`, `date_of_exam`, `time_of_exam`, `end_time`, `f_marks`, `semester`, `exam_type`, `any_inst`, `faculty_id`)
                      VALUES ('$ex_id','$sub_cod','$date_of_exam','$time_of_exam','$duration','$f_marks','$semester','$exam_type','$any_inst','$user_id')";

              if($run=mysqli_query($link,$sqli)){
                ?>
                <script>
                setTimeout(function() {
                  swal({
                title: "Congratulaions!",
                text: "Examination details added successfully",
                type: "success",
                confirmButtonText: "Ok"
                }, function() {
                window.location = "add-question.php";
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
                       text: "Something went Wrong",
                       type: "error",
                       confirmButtonText: "Ok"
                     }, function() {
                       window.location = "";
                     }, 1000);
                   });
                   </script> <?php
              }


        }


   ?>
