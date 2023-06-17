<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $visit_request_delete = "DELETE FROM visit_request WHERE request_id={$_POST['request_id']}";
  $member_visit_increment = "UPDATE member SET member_visit = member_visit+1
                            WHERE member_nickname = '{$_POST['member_nickname']}'";

  $result1 = mysqli_query($conn, $visit_request_delete);
  $result2 = mysqli_query($conn, $member_visit_increment);

   if($result1===FALSE||$result2===FALSE)
   {
     echo '삭제에 실패했습니다.';
   }
   else
   {
     header('Location:/bartender_mypage_visit_manage.php');
   }
   ?>
<?php require_once('lib/tail.php'); ?>
