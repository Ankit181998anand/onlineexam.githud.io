<?php

if (isset($_GET['question_id'])) {
  $id=base64_decode($_GET['question_id']);
}
include_once './includes/header.php';
$sql = $link->query("SELECT * FROM `question` WHERE `id`='$id'");
$data = $sql->fetch_array();

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Question ( Answer Based)</h1>
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
                    <h3 class="card-title"></h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="" method="post">
                    <div class="card-body">
                      <div class="col-md-12">
                        <label>Question</label>
                      <textarea class="form-control" name="que" rows="3" placeholder="Enter ..." ><?php echo $data['question']; ?></textarea>
                      </div>
                      <div class="col-md-4">
                        <label> Marks</label>
                        <input type="number" class="form-control" name="marks" value="<?php echo $data['mark'] ?>">
                      </div>
                      <input type="hidden"  name="question_id" value="<?php echo $data['id'];?>">

                    </div>
                  </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <center>
                        <button type="submit" name="submit"class="btn btn-success">Submit</button>
                        <a href="view-que_anstype.php?ex_id=<?php echo base64_encode($data['ex_id']); ?>" class="btn btn-warning">Back</a>
                      </center>
                    </div>
                     </form>
                            </div>
                          </div>
                        </div>
                      </div>

  <?php
  include_once './includes/footer.php';

    if(isset($_POST['submit'])){
                $que_id=$link->real_escape_string($_POST['question_id']);;
                $que=$link->real_escape_string($_POST['que']);
                $mark=$link->real_escape_string($_POST['marks']);
                $qry="UPDATE `question` SET `question`='$que',`mark`='$mark' WHERE `id`='$que_id'";
                $run=mysqli_query($link,$qry);

                if($run == true) {
                  ?>
                  <script>
                  setTimeout(function() {
              swal({
              title: "Congratulaions!",
              text: "Question updated successfully",
              type: "success",
              confirmButtonText: "Ok"
              }, function() {
              window.location = "view-que_anstype.php?ex_id=<?php echo base64_encode($data['ex_id']); ?>";
              }, 1000);
              });
                  </script>
                  <?php
                }
                else {
              echo mysqli_error($link);;
                }


}
   ?>
