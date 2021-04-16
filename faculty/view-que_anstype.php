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
            <h1 class="m-0 text-dark">View Question (Answer Type)</h1>
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
                    <h3 class="card-title">Subject cord-<?php echo $data['sub_code']." , Test Id -".$data['ex_id'];?></h3>
                    <div class="float-right">
                      <a href="view-test.php" class="btn btn-warning">Back</a>
                    </div>
                  </div>

                  <div class="card-body">

                    <div class="row">
                  <?php
                  $sqlii =" SELECT * FROM `question` WHERE `ex_id`='$id' AND `que_type`='que_ans'";
                  $dataa = $link->query($sqlii);
                  if($dataa->num_rows>0){
                    $count=0;
                    while ($roww = $dataa->fetch_assoc()) {
                      $count++;
                      ?>
                      <div class="col-md-12">
                        <h5 class="blue"> <?php echo $count.".".$roww['question']; ?></h5>
                        <?php if ($data['isActive']==0): ?>
                          <div class="float-right">
                            <a href="edit-que_anstype.php?question_id=<?php echo base64_encode($roww['id']); ?>"><i class="fa fa-edit dred"></i></a>
                            <a href="delete-que_anstype.php?question_id=<?php echo $roww['id']; ?>"><i class="fa fa-trash pink"></i></a>
                          </div>
                        <?php endif; ?>


                      </div>
                      <?php
                    }

                  }
                   ?>

            </div>
          <!-- /.card-body -->
          </div>
          <!-- /.row -->
          </div><!-- /.container-fluid -->
          </div>
        </div>
      </div>

  <?php
  include_once './includes/footer.php';

   ?>
