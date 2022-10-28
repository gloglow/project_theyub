<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $member_visit_increment = "UPDATE member SET member_visit=member_visit+1
                  where member_id='{$_SESSION['login_id']}'";

  if($_POST['admin_pw']='godyusang')
  {
    $result = mysqli_query($conn, $member_visit_increment);
    if($result===false)
    {
      echo '갱신에 실패했습니다.';
    }
    else
    {
      header('Location:/bartender_mypage.php');
    }
  }
   ?>

<?php require_once('lib/tail.php'); ?>
