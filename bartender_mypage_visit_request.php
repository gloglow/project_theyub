<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $visit_request = "INSERT INTO visit_request (member_id)
                   VALUES ('{$_SESSION['login_id']}')";
  $result = mysqli_query($conn, $visit_request);

   if($result===FALSE)
    {
      echo '인증 신청에 실패했습니다.';
    }
    else
    {
      echo '<script>alert(\'방문 인증 신청에 성공했습니다.\');</script>';
      header('Refresh: 0; URL=bartender_mypage.php');

    }
   ?>
<?php require_once('lib/tail.php'); ?>
