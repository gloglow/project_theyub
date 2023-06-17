<?php require_once('lib/header.php'); ?>
<?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $filtered_history=mysqli_real_escape_string($conn, $_POST['history_input']);
  $history_write = "INSERT INTO history (history_content, member_id)
                   VALUES ('{$filtered_history}', '{$_SESSION['login_id']}')";

  $result = mysqli_query($conn, $history_write);

  if($result===FALSE)
  {
    echo '작성에 실패했습니다.';
  }
  else
  {
    header('Location:/bartender_history.php');
  }
   ?>
<?php require_once('lib/tail.php'); ?>
