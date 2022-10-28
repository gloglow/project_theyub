<?php require_once('lib/header.php'); ?>
<p>
<?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $review_delete = "DELETE FROM review WHERE review_id = {$_POST['review_id']}";

  $result = mysqli_query($conn, $review_delete);

  if($result===FALSE)
  {
    echo '삭제에 실패했습니다.';
  }
  else
  {
    header('Location:/bartender_menu_detail.php?menu_id='.$_POST['menu_id']);
  }
   ?>
<?php require_once('lib/tail.php'); ?>
