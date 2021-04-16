<?php
if (isset($_GET['ex_id']) && isset($_GET['sub_code'])) {
  include_once './includes/dbcon.php';
  $ex_id=base64_decode($_GET['ex_id']);
  $sub_code=base64_decode($_GET['sub_code']);
  $sqli =$link->query("SELECT * FROM `exam_details` WHERE ex_id='$ex_id' AND sub_code='$sub_code'") ;
 if ($sqli->num_rows > 0) {
  $data = $sqli->fetch_assoc();
}
else {
  header("location:./");
}
include_once './includes/header.php';
?>
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
           <div class="col-12">
             <div class="card">
               <div class="card-header">
                 <h3 class="card-title">Student List</h3>
                 <div class="card-tools">
                Subject Code:   <?php echo $sub_code; ?>
                 </div>
               </div>
               <!-- /.card-header -->
               <?php
               $sqli =" SELECT * FROM `studentdetails` WHERE ex_id ='$ex_id'" ;
               $data = $link->query($sqli);
               if($data->num_rows>0){
                ?>
               <div class="card-body table-responsive p-0">
                 <table class="table table-hover table-bordered">
                   <thead>
                     <tr>
                       <th>#</th>
                       <th>Exam ID</th>
                       <th>Answer-Sheet Id</th>
                       <th>Name</th>
                       <th>Roll</th>
                       <th>Attend on</th>
                       <th class="text-center">View</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
           $count=0;
           while ($row = $data->fetch_assoc()) {
             $count++;
             ?>
                     <tr>
                       <td><?php echo $count; ?></td>
                       <td><?php echo $row['ex_id']; ?></td>
                       <td><?php echo $row['student_id']; ?></td>
                       <td><?php echo $row['name']; ?></td>
                       <td><?php echo $row['roll']; ?></td>
                       <td><?php echo $row['login_time']; ?></td>
                        <td class="text-center"> <a href="view-as.php?as_id=<?php echo base64_encode($row['student_id']); ?>&sub_code=<?php echo base64_encode($sub_code); ?>" target="_blank"  > <i class="far fa-file-pdf"></i> </a> </td>
                     </tr>
                     <?php
                   }
                      ?>



                   </tbody>
                 </table>
               </div>
               <?php
             }
             else {
               ?>
               <div class="text-danger">
                 <br>
                 <h2 class="text-center">No Sheet Avilable.</h2>
                 <br>
               </div>
               <?php
             }
                ?>


               <!-- /.card-body -->
             </div>
             <!-- /.card -->
           </div>
          </div>

         <!-- /.row -->
       </div><!-- /.container-fluid -->
     </section>

     <!-- /.content -->





























<?php
include_once './includes/footer.php';
 ?>




<?php
}
 ?>
