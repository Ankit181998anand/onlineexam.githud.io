<?php

if (isset($_GET['id'])) {
  $id=base64_decode($_GET['id']);
}
include_once './includes/header.php';
$sql = $link->query("SELECT * FROM `registerpage` WHERE `id`='$id'");
$data = $sql->fetch_array();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Aprove Student</h1>
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
                  <h3 class="card-title">Student Information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="" method="post" >
                  <div class="card-body">
                     <div class="form-row">


                  <div class="col-md-4 mb-3">
                      <label for="Name">Name</label>
                      <input type="text" class="form-control" name="name" id="name" value="<?php echo $data['name']; ?>">
                  </div>

                  <div class="col-md-4 mb-3">
                      <label for="email_id">Email Id</label>
                      <input type="email" class="form-control" name="email_id" id="email_id" value="<?php echo $data['email_id']; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="Branch">Branch</label>
                      <input type="taxt" class="form-control" name="branch" id="branch" value="<?php echo $data['branch']; ?>">
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="roll_no">Roll No</label>
                      <input type="text" class="form-control" name="roll_no" id="roll_no" value="<?php echo $data['roll_no']; ?>" >
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="Contact">Contact</label>
                      <input type="number" class="form-control" name="Contact" id="Contact" value="<?php echo $data['phone_no']; ?>" >
                    </div>

                    <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">

                  </div>
                </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="aprove" id="aproved" class="btn btn-danger">Approve</button>
                    <a href="view_student.php" class="btn btn-warning float-right">Back</a>
                    </div>
                   </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


          <?php
            include_once './includes/footer.php';
         ?>

        <?php

                     if (isset($_POST['aprove'])) {

                     $id=$link->real_escape_string($_POST['id']);

                      $qry="UPDATE `registerpage` SET`aprove`= 1  WHERE `id`='$id'";
                      $run=mysqli_query($link,$qry);
                      print_r($qry);
                      if($run == true) {
                        ?>
                        <script>
                        setTimeout(function() {
                    swal({
                    title: "Congratulaions!",
                    text: "student aproved successfully successfully",
                    type: "success",
                    confirmButtonText: "Ok"
                    }, function() {
                    window.location = "view_student.php";
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
