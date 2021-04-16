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
            <h1 class="m-0 text-dark">Activate Test</h1>
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Test</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table  class="table table-hover">
                  <thead>
                  <tr class="text-center">
                    <th rowspan="2">#</th>
                    <th rowspan="2"><center>Subject Cord</center></th>
                    <th rowspan="2"><center>Test Id</center></th>
                    <th rowspan="2"><center>Date of Test</center></th>
                    <th rowspan="2">Action</th>
                    </tr>

                  </thead>
                  <tbody>
                    <?php

                    $sqli =" SELECT * FROM `exam_details` WHERE isActive =0 AND faculty_id='$fac_id'" ;
                    $data = $link->query($sqli);
                    if($data->num_rows>0){
                      $count=0;
                      while ($row = $data->fetch_assoc()) {
                        $count++;
                        ?>
                        <tr class="text-center" >
                            <td><?php echo $count; ?></td>
                            <td><center><?php echo $row['sub_code']; ?></center></td>
                            <td><center><?php echo $row['ex_id']; ?></center></td>
                            <td><center><?php echo $row['date_of_exam']; ?></center></td>
                            <td><center><a href="add_student.php?ex_id=<?php echo base64_encode($row['ex_id']); ?>" class="nav-link ">
                              <i class="fas fa-angle-double-right"></i></center></td>
                        </tr>
                        <?php

                  }
                }else {
                  ?>
                  <tr class="text-center">
                    <td colspan="5"> No record Found</td>
                  </tr>
                  <?php
                } ?>
                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>



  <?php
  include_once './includes/footer.php';
   ?>
