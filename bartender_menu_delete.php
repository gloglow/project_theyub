<?php require_once('lib/header.php'); ?>
<p>
<?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $menu_delete = "DELETE FROM menu WHERE menu_id = {$_POST['menu_delete_id']}";

  $result = mysqli_query($conn, $menu_delete);

  if($result===FALSE)
  {
    echo '삭제에 실패했습니다.';
  }
  else
  {
    header('Location:/bartender_menu.php');
  }
   ?>
<?php require_once('lib/tail.php'); ?>
