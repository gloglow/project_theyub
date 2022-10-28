<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $filtered_nickname=mysqli_real_escape_string($conn, $_POST['modified_nickname']);
  $filtered_pw=mysqli_real_escape_string($conn, $_POST['modified_pw']);
  $filtered_email=mysqli_real_escape_string($conn, $_POST['modified_email']);
  $member_info_modify = "UPDATE member SET member_nickname='{$filtered_nickname}'
                        , member_pw='{$filtered_pw}'
                        , member_email='{$filtered_email}'
                        WHERE member_id='{$_SESSION['login_id']}'";

  if(mysqli_query($conn, $member_info_modify)===false)
  {
    echo '회원정보 변경에 실패했습니다.';
  }
  else
  {
    $_SESSION['login_nickname']=$filtered_nickname;
    echo '회원정보 변경에 성공했습니다.';
  }

   ?>

<?php require_once('lib/tail.php'); ?>
