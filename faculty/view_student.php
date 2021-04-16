<?php
include_once './includes/header.php';
 ?>
<?php if (isset($_GET['ex_id'])) {
  $ex_det= $link->query("SELECT * FROM `exam_details` WHERE faculty_id='$fac_id'");
  $ex_data = $ex_det->fetch_array();
  $students=[];
  $students=$ex_data['student'];
  $stu_arr= explode(',', $students);

}else {
  header('location:./');
} ?>
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
              <a href="./" class="btn btn-danger float-right">Back</a>
              </div>
              <div class="card-body table-responsive p-0">
                <table id="example2" class="table table-hover">
                  <thead>
                    <tr class="text-center">
                      <th>#</th>
                      <th>Student Name</th>
                      <th>Roll No</th>
                      <th>Branch</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <?php
                    $sqli =" SELECT * FROM `registerpage` WHERE aprove='1' AND type='student'" ;
                    $data = $link->query($sqli);
                    if($data->num_rows>0){
                      $count=0;
                      while ($row = $data->fetch_assoc()) {
                        if (in_array($row['roll_no'],  $stu_arr)){
                        $count++;
                          ?>
                         <tr>
                           <td><?php echo $count ?></td>
                           <td><?php echo $row['name'] ?></td>
                           <td><?php echo $row['roll_no'] ?></td>
                           <td><?php echo $row['branch'] ?></td>
                           </tr>
                         <?php
                       }
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
