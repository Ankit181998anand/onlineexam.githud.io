<?php include_once './includes/header.php' ?>
  <?php
  if (isset($_GET['question_id'])) {
   $question_id = $_GET['question_id'];
   $sql = $link->query("DELETE FROM `question` WHERE `id`='$question_id'");
  if ($sql=true){
   ?>
   <script>
      setTimeout(function() {
swal({
  title: "Congratulaions!",
  text: "question Deleted successfully",
  type: "success",
  confirmButtonText: "Ok"
}, function() {
  window.location  = "view-test.php";
}, 1000);
});
   </script>
   <?php
 }
 else {
   ?>
   <script>
   setTimeout(function() {
swal({
type: 'error',
title: 'Oops...',
text: 'Something went wrong!',
confirmButtonText: "Ok"
},  function() {
window.location = "view-test.php";
}, 1000);
});
   </script>
   <?php
 }
}
  ?>

  ?>
  <?php include_once './includes/footer.php'; ?>
