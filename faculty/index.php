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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
              Exam Details
              </div>
              <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Exam ID</th>
                      <th>Subject Code</th>
                      <th>Date of Exam</th>
                      <th>Semester</th>
                      <th>Exam Type</th>
                      <th>Start At</th>
                      <th>End At</th>
                      <th>Full Marks</th>
                      <th>Status</th>
                      <th>View Student</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sqli =" SELECT * FROM `exam_details` WHERE    faculty_id='$fac_id'" ;
                    $data = $link->query($sqli);
                    if($data->num_rows>0){
                      $count=0;
                      while ($row = $data->fetch_assoc()) {
                        $count++;
                     ?>
                    <tr>
                      <td><?php echo $count ?></td>
                      <td><?php echo $row['ex_id'] ?></td>
                      <td><?php echo $row['sub_code'] ?></td>
                      <td><?php echo $row['date_of_exam'] ?></td>
                      <td><?php echo $row['semester'] ?></td>
                      <td><?php echo $row['exam_type'] ?></td>
                      <td><?php echo $row['time_of_exam'] ?></td>
                      <td><?php echo $row['end_time'] ?></td>
                      <td><?php echo $row['f_marks'] ?></td>
                      <td><?php if ($row['isActive']==0) {
                        echo "Inactive Exam";
                      }else {
                        echo "Active Exam";
                      } ?></td>
                      <td> <a href="view_student.php?ex_id=<?php echo $row['ex_id']; ?>"> <i class="fas fa-forward"></i> </a> </td>

                    </tr>
                    <?php

                  }
                } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  <?php
  include_once './includes/footer.php';

   ?>
