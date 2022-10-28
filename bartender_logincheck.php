<?php require_once('lib/header.php'); ?>
<?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $filtered_id=mysqli_real_escape_string($conn, $_POST['login_id']);
  $filtered_pw=mysqli_real_escape_string($conn, $_POST['login_pw']);
  $logincheck = "SELECT * FROM member WHERE member_id='{$filtered_id}' AND member_pw='{$filtered_pw}'";

  $result = mysqli_query($conn, $logincheck);
  $row = mysqli_fetch_array($result);

  if($row===NULL)
    echo '로그인에 실패하였습니다.';
  else
  {
    $_SESSION['login_status']='YES';
    $_SESSION['login_id']=$filtered_id;
    $_SESSION['login_nickname']=$row['member_nickname'];
    header('Location:/index.php');
  }

 ?>
 <?php require_once('lib/tail.php'); ?>
