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
            <h1 class="m-0 text-dark">Add Questions</h1>
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
                <h3 class="card-title">Add Questions</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table  table-bordered table-hover">
                  <thead>
                  <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2"><center>Subject Code</center></th>
                    <th rowspan="2"><center>Test Id</center></th>
                    <th colspan="2"><center>Add Question</center> </th>
                    </tr>

                      <tr>
                          <th><center>Answer Based question</center></th>
                          <th><center>Mcq Based question</center></th>
                      </tr>

                  </thead>
                  <tbody>
                    <?php

                    $sqli =" SELECT * FROM `exam_details` WHERE faculty_id='$fac_id' " ;
                    $data = $link->query($sqli);
                    if($data->num_rows>0){
                      $count=0;
                      while ($row = $data->fetch_assoc()) {
                        $count++;
                        ?>
                        <tr class="text-center">
                            <td><center><?php echo $count; ?></center></td>
                            <td><center><?php echo $row['sub_code']; ?></center></td>
                            <td><center><?php echo $row['ex_id']; ?></center></td>
                            <?php if ($row['isActive']!=1): ?>
                              <td><center><a href="add-que_anstype.php?ex_id=<?php echo base64_encode($row['ex_id']); ?>" class="nav-link ">
                                <i class="fas fa-book-medical"></i></center></td>
                                <td><center><a href="add-mcq.php?ex_id=<?php echo base64_encode($row['ex_id']); ?>" class="nav-link ">
                                  <i class="fas fa-book-medical"></i></center></td>
                            <?php endif; ?>
                            <?php if ($row['isActive']==1): ?>
                              <td colspan="2">Test was activated, can't be more question.</td>
                              <?php endif; ?>

                        </tr>
                        <?php

                  }
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

<?php echo base64_encode($row['id']); ?>

  <?php
  include_once './includes/footer.php';
   ?>
