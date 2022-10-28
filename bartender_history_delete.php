<?php require_once('lib/header.php'); ?>
<p>
<?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $history_delete = "DELETE FROM history WHERE history_id = {$_POST['history_delete_id']}";

  $result = mysqli_query($conn, $history_delete);

  if($result===FALSE)
  {
    echo '삭제에 실패했습니다.';
  }
  else
  {
    header('Location:/bartender_history.php');
  }
   ?>
<?php require_once('lib/tail.php'); ?>
