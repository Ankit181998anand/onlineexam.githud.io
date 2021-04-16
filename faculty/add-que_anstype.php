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
            <h1 class="m-0 text-dark">Add Question</h1>
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
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="" method="post">
                    <div class="card-body">



                      <div class="col-md-12">
                        <label>Question</label>
                      <textarea class="form-control" name="que" rows="3" required placeholder="Enter ..."></textarea>
                      </div>
                      <div class="form-group">
                        <div class="col-md-4 mb-3">
                       <label for="option">Marks</label>
                     <input type="number" class="form-control"  required name="marks" id="marks" >
                      </div>

                      <input type="hidden" name="ex_id" value="<?php echo $data['ex_id'];?>">


                    </div>
                  </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <center>
                        <button type="submit" name="submit"class="btn btn-success">Submit & Back</button>
                          <button type="submit" name="submit_more"class="btn btn-danger">Add More</button>
                          <a href="add-question.php" class="btn btn-warning">Back</a>
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

       $check=$link->real_escape_string($data['isActive']);
       if($check==1){
         ?>
                <script>
                setTimeout(function() {
                  swal({
                    title: "Error",
                    text: "Test is active.",
                    type: "error",
                    confirmButtonText: "Ok"
                  }, function() {
                    window.location = "";
                  }, 1000);
                });
                </script> <?php
              }
              else {

                $ex_id=$link->real_escape_string($_POST['ex_id']);;
                $que=$link->real_escape_string($_POST['que']);
                $mark=$link->real_escape_string($_POST['marks']);
                $type='que_ans';
                $qry="INSERT INTO `question`( `ex_id`, `question`, `que_type`, `mark`) VALUES ('$ex_id','$que','$type','$mark')";
                $run=mysqli_query($link,$qry);
                Print_r($sql);
                if($run == true) {
                  ?>
                  <script>
                  setTimeout(function() {
              swal({
              title: "Congratulaions!",
              text: "Question added successfully",
              type: "success",
              confirmButtonText: "Ok"
              }, function() {
              window.location = "add-question.php";
              }, 1000);
              });
                  </script>
                  <?php
                }
                else {
              echo mysqli_error($link);;
                }
              }

}
   ?>

   <<?php

   if(isset($_POST['submit_more'])){

      $check=$link->real_escape_string($data['isActive']);
      if($check==1){
        ?>
               <script>
               setTimeout(function() {
                 swal({
                   title: "Error",
                   text: "Test is active.",
                   type: "error",
                   confirmButtonText: "Ok"
                 }, function() {
                   window.location = "";
                 }, 1000);
               });
               </script> <?php
             }
             else {

               $ex_id=$link->real_escape_string($_POST['ex_id']);;
               $que=$link->real_escape_string($_POST['que']);
               $mark=$link->real_escape_string($_POST['marks']);
               $type='que_ans';
               $qry="INSERT INTO `question`( `ex_id`, `question`, `que_type`, `mark`) VALUES ('$ex_id','$que','$type','$mark')";
               $run=mysqli_query($link,$qry);
               Print_r($sql);
               if($run == true) {
                 ?>
                 <script>
                 setTimeout(function() {
             swal({
             title: "Congratulaions!",
             text: "Question added successfully",
             type: "success",
             confirmButtonText: "Ok"
             }, function() {
             window.location = "add-que_anstype.php?ex_id=<?php echo base64_encode($ex_id); ?>";
             }, 1000);
             });
                 </script>
                 <?php
               }
               else {
             echo mysqli_error($link);;
               }
             }

 }

    ?>
