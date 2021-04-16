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
            <h1 class="m-0 text-dark">View Faculty</h1>
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
                <h3 class="card-title">Viwe Faculty</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-hover">
                  <thead>
                  <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2"><center>Faculty Name</center></th>
                    <th rowspan="2"><center>Employ Id</center></th>
                    <th rowspan="2"><center>Email Id</center> </th>
                    <th rowspan="2"><center>Approve</center> </th>

                    </tr>

                  </thead>
                  <tbody>
                    <?php

                    $sqli =" SELECT * FROM `registerpage` WHERE `type`='faculty' AND `aprove`= 0" ;
                    $data = $link->query($sqli);

                    if($data->num_rows>0){
                      $count=0;
                      while ($row = $data->fetch_assoc()) {
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><center><?php echo $row['name']; ?></center></td>
                            <td><center><?php echo $row['employ_id']; ?></center></td>
                            <td><center><?php echo $row['email_id']; ?></center></td>
                              <td><center><a href="aprove_faculty.php?id=<?php echo base64_encode($row['id']); ?>" class="nav-link ">
                                <i class="fas fa-angle-double-right"></i></center></td>

                        </tr>
                        <?php
                      }
                  }
                  else {
                    ?>
                    <tr>
                      <td  class="text-center"colspan="5">No record Found</td>
                    </tr>
                    <?php
                  }
                 ?>
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
