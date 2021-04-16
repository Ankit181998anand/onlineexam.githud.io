<?php
include_once './includes/header.php';
date_default_timezone_set("Asia/Calcutta");
$date =date("Y-m-d H:i:s");
 ?>
 <script language="JavaScript">
 function Full_W_P(url) {
   params  = 'width='+screen.width;
   params += ', height='+screen.height;
   params += ', top=0, left=0'
   params += ', fullscreen=yes';
   params += ', directories=no';
   params += ', location=no';
   params += ', menubar=no';
   params += ', resizable=no';
   params += ', scrollbars=no';
   params += ', status=no';
   params += ', toolbar=no';
   params += ', channelmode=yes';
   newwin=window.open(url,'FullWindowAll', params);
   if (window.focus) {newwin.focus()}
   return false;
 }
</script>

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
                   <h3 class="card-title">Avilable Exam</h3>

                   <div class="card-tools">

                   </div>
                 </div>
                 <!-- /.card-header -->
                 <?php
                 $sqli =" SELECT * FROM `exam_details` WHERE isActive =1" ;
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
                         <th>Starts on </th>
                         <th>Attend</th>
                       </tr>
                     </thead>
                     <tbody>
                       <?php
             $count=0;
             while ($row = $data->fetch_assoc()) {
               $count++;
               $stu_arr=[];
               $stu=$row['student'];
               $stu_arr= explode(',', $stu);
               if (in_array($roll_no,  $stu_arr)){
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

                          <td> <a href="#" onclick="javascript:Full_W_P('attend_exam.php?ex_id=<?php echo base64_encode($row['ex_id']);?>&id=<?php echo base64_encode($row['id']); ?>');"> <i class="fas fa-external-link-alt"></i> </a> </td>
                       </tr>
                       <?php
                     }
                     else {

                       ?>
                       <tr>
                         <td colspan="7"> <h2 class="text-center">No exam Avilable.</h2></td>

                       </tr>

                       <?php
                     }
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
                   <h2 class="text-center">No exam Avilable.</h2>
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
