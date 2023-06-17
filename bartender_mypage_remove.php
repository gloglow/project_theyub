<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $member_info = "DELETE FROM member WHERE member_id='{$_SESSION['login_id']}'";

  $result = mysqli_query($conn, $member_info);
  ?>

<?php require_once('lib/tail.php'); ?>
