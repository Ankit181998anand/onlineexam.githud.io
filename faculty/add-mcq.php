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
                        <div class="form-group dred">
                        <label>Coppy and Paste both question and answer hear.</label>
                      <textarea class="form-control" name="que" id="que" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                    </div>



                    </div>
                  </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <center>
                        <button type="submit" name="preview" id="preview" class="btn btn-primary">Preview</button>

                      </center>
                    </div>
                     </form>

                     <form role="form" action="" method="post">
                       <div class="card-body">



                         <div class="col-md-12">
                           <label>Question</label>
                         <textarea class="form-control" required name="que" id="question" rows="3" placeholder="Enter ..."></textarea>
                         </div>
                         <div class="form-group">
                           <div class="col-md-4 mb-3">
                          <label for="option">option 1</label>
                        <input type="text" class="form-control" name="op_1" id="op_1" >
                         </div>
                       </div>
                          <div class="form-group">
                            <div class="col-md-4 mb-3">
                          <label for="option">option 2</label>
                          <input type="text" class="form-control" name="op_2" id="op_2" >
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-4 mb-3">
                    <label for="option">option 3</label>
                    <input type="text" class="form-control" name="op_3" id="op_3" >
                  </div>
                  <div>
                  <div class="form-group">
                    <div class="col-md-4 mb-3">
                    <label for="option">option 4</label>
                    <input type="text" class="form-control" name="op_4" id="op_4" >
                  </div>
                  <div>
                    <div class="form-group">
                      <div class="col-md-4 mb-3">
                      <label for="option">option 5</label>
                      <input type="text" class="form-control" name="op_5" id="op_5" >
                    </div>
                    <div>


                    <div class="form-group">
                      <div class="col-md-4 mb-3">
                     <label for="option">Marks</label>
                   <input type="number" class="form-control" name="marks" id="marks" >
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
                    </div>
                  </div>
                </div>
              </div>
            </div>




  <?php
  include_once './includes/footer.php';
   ?>
   <script>
   $(document).ready(function() {

   $('#preview').click(function(){

     var nameVal = $('#que').val()
     var nameLength = nameVal.length;
     var nameSplit = nameVal.split("\n");
     var lastLength = nameLength - nameSplit[0].length;
     var lastNameLength = nameSplit[0].length + 1;
     var lastName = nameVal.slice(lastNameLength);
       $('#question').val(nameSplit[0]);
     $('#op_1').val(nameSplit[1]);
   $('#op_2').val(nameSplit[2]);
   $('#op_3').val(nameSplit[3]);
   $('#op_4').val(nameSplit[4]);
   $('#op_5').val(nameSplit[5]);
     return false;
   });

   });
   </script>


   <<?php

    if (isset($_POST['submit_more'])) {
    $ex_id=$link->real_escape_string($_POST['ex_id']);;
     $que = $link->real_escape_string($_POST['que']);
     $op1 = $link->real_escape_string($_POST['op_1']);
     $op2 = $link->real_escape_string($_POST['op_2']);
     $op3 = $link->real_escape_string($_POST['op_3']);
     $op4 = $link->real_escape_string($_POST['op_4']);
     $op5 = $link->real_escape_string($_POST['op_5']);
     $type='mcq';
     $mark=$link->real_escape_string($_POST['marks']);
     $qry="INSERT INTO `question`( `ex_id`, `question`, `que_type`, `o1`, `o2`, `o3`, `o4`, `o5`, `mark`)
            VALUES ('$ex_id','$que','$type',' $op1','$op2','$op3','$op4','$op5','$mark')";
     $run=mysqli_query($link,$qry);

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
   window.location = "add-mcq.php?ex_id=<?php echo base64_encode($ex_id); ?>";
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

    <<?php

     if (isset($_POST['submit'])) {
     $ex_id=$link->real_escape_string($_POST['ex_id']);;
      $que = $link->real_escape_string($_POST['que']);
      $op1 = $link->real_escape_string($_POST['op_1']);
      $op2 = $link->real_escape_string($_POST['op_2']);
      $op3 = $link->real_escape_string($_POST['op_3']);
      $op4 = $link->real_escape_string($_POST['op_4']);
      $op5 = $link->real_escape_string($_POST['op_5']);
      $type='mcq';
      $mark=$link->real_escape_string($_POST['marks']);
      $qry="INSERT INTO `question`( `ex_id`, `question`, `que_type`, `o1`, `o2`, `o3`, `o4`, `o5`, `mark`)
             VALUES ('$ex_id','$que','$type',' $op1','$op2','$op3','$op4','$op5','$mark')";
      $run=mysqli_query($link,$qry);

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
    } else {



    }


     ?>
