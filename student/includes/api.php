<?php
function noofmcq($link,$ex_id){
  $sqli = $link->query("SELECT COUNT(que_type) as noofmcq FROM `question` WHERE  ex_id='$ex_id' AND que_type='mcq'");
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   return  $data['noofmcq'];
 }
}
function noofque_ans($link,$ex_id){
  $sqli = $link->query("SELECT COUNT(que_type) as noofmcq FROM `question` WHERE  ex_id='$ex_id' AND que_type='que_ans'");
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   return  $data['noofmcq'];
 }
}
function studentdetails($link,$date,$roll,$name,$username,$ex_id)
{
  $student_id=$ex_id."_".$roll;
  $sql="INSERT INTO `studentdetails`(`student_id`,`name`, `roll`, `username`,`ex_id`,`login_time`) VALUES ('$student_id','$name', '$roll', '$username','$ex_id','$date')";
  if(mysqli_query($link, $sql)){
    return $student_id;
  }
  else {
    return "false";
  }
}
function addquestion($link,$ex_id,$student_id)
{
  $sqli =" SELECT * FROM `question` WHERE ex_id ='$ex_id' ORDER BY que_type, RAND ()   " ;
  $data = $link->query($sqli);
  if($data->num_rows>0){
       while ($row = $data->fetch_assoc()) {
         $que=$row['question'];
         $o1 = $row['o1'];
         $o2 = $row['o2'];
         $o3 = $row['o3'];
         $o4 = $row['o4'];
         $o5 = $row['o5'];
         $mark=$row['mark'];
         $type=$row['que_type'];
         $sql="INSERT INTO `response`(`ex_id`,`student_id`, `question`, `o1`,`o2`,`o3`,`o4`,`o5`,`mark`,`type`) VALUES ('$ex_id','$student_id', '$que', '$o1','$o2','$o3','$o4','$o5','$mark','$type')";
         mysqli_query($link, $sql);
       }
       return "yes";
  }
}
function updateanswer($link,$q_id,$answer,$student_id)
{
  $sql="UPDATE response SET answer='$answer' WHERE id='$q_id' AND student_id='$student_id'";
   if(mysqli_query($link, $sql)){
     return "yes";
   }
}

function getins($link,$ex_id){
  $sqli = $link->query("SELECT any_inst FROM `exam_details` WHERE  ex_id='$ex_id'");
 if ($sqli->num_rows > 0) {
   $data = $sqli->fetch_assoc();
   return  $data['any_inst'];
 }
}

/// pdf

//////////////////////////
 ?>
