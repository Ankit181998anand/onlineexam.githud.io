<?php

if (isset($_GET['ex_id'])) {
  $id=base64_decode($_GET['ex_id']);
}
include_once './includes/header.php';
$sql = $link->query("SELECT * FROM exam_details WHERE ex_id='$id'");
$data = $sql->fetch_array();
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
                         <input type="hidden" name="id" value="<?php echo $data['ex_id'];?>">
                    <div class="col-md-4 mb-3">
                       <label for="Exam Id">Select Branch</label>
                       <select class="form-control" name="branch" id="branch" >
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


                    <div class="col-md-12">
                        <button type="submit" name="search" class="btn btn-primary">Search</button>
                    </div>
                    <?php
                      $count=0;
                    if(isset($_POST['search'])){

                      $subj= mysqli_real_escape_string($link,$_POST['branch']);

                      $sq ="SELECT * FROM `registerpage` WHERE `branch`='$subj' AND aprove=1";

                    $dataa = $link->query($sq);
                      if($dataa->num_rows>0){

                        while ($roww = $dataa->fetch_assoc()) {
                          $count++;
                          ?>
                          <div class="col-md-12">
                            <h5 class="text-primary"> <?php echo $count.".".$roww['name']; ?></h5>
                            <div class="float-right">
                              <input type="checkbox" name="rollno[]" value ="<?php echo $roww['roll_no'];?>">
                            </div>
                          </div>
                          <?php
                        }


                    }else {
                      ?>
                      <div class="text-center">
                            <h3 >No record Found</h3>
                      </div>

                      <?php
                    }
                  }

                      ?>

                    </div>
                  </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <?php if ($count!=0): ?>
                        <button type="submit" name="activate" class="btn btn-primary">Activate</button>
                      <?php endif; ?>
                        </div>
                     </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


<?php
include_once './includes/footer.php';
if(isset($_POST['activate'])){
  $a= $_POST['rollno'];
  $roll=implode(',',$a);
  $id=mysqli_real_escape_string($link,$_POST['id']);
  $qry="UPDATE `exam_details` SET `student`='$roll',`isActive`= 1 WHERE `ex_id`='$id'";
  $run=mysqli_query($link,$qry);

  if($run == true) {
    ?>
    <script>
    setTimeout(function() {
swal({
title: "Congratulaions!",
text: "Student are added and exam activated.",
type: "success",
confirmButtonText: "Ok"
}, function() {
window.location = "activate_test.php";
}, 1000);
});
    </script>
    <?php
  }
  else {
echo mysqli_error($link);;
  }
} else {



}


 ?>
 C
