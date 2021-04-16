<?php
include_once './includes/header.php';
date_default_timezone_set("Asia/Calcutta");
$date =date("Y-m-d H:i:s");
$faculty_id="fac1";
 ?>
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
             <div class="col-12">
               <div class="card">
                 <div class="card-header">
                   <h3 class="card-title">Avilable Answer Sheet</h3>
                   <div class="card-tools">
                   </div>
                 </div>
                 <!-- /.card-header -->
                 <?php
                 $sqli =" SELECT * FROM `exam_details` WHERE faculty_id ='$faculty_id'" ;
                 $data = $link->query($sqli);
                 if($data->num_rows>0){
                  ?>
                 <div class="card-body table-responsive p-0">
                   <table class="table table-hover table-bordered">
                     <thead>
                       <tr>
                         <th>#</th>
                         <th>Exam ID</th>
                         <th>Subject Code</th>
                         <th>Semester</th>
                         <th>Exam Type</th>
                         <th>Date </th>
                         <th>View</th>
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
                         <td><?php echo $row['sub_code']; ?></td>
                         <td><?php echo $row['semester']; ?></td>
                         <td><?php echo $row['exam_type']; ?></td>
                         <td><?php
                             echo  $d1=$row['date_of_exam'].' '.$row['time_of_exam'];
                          ?></td>

                          <td> <a href="viewstudent.php?ex_id=<?php echo base64_encode($row['ex_id']); ?>&sub_code=<?php echo base64_encode($row['sub_code']); ?>"  > <i class="far fa-eye"></i> </a> </td>
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
