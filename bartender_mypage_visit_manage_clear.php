<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $visit_request_delete = "DELETE FROM visit_request";

  $result1 = mysqli_query($conn, $visit_request_delete);

   if($result1===FALSE)
   {
     echo '삭제에 실패했습니다.';
   }
   else
   {
     header('Location:/bartender_mypage_visit_manage.php');
   }
   ?>
<?php require_once('lib/tail.php'); ?>
