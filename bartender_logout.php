<?php
  session_start();
  $_SESSION['login_status']='NO';
  unset($_SESSION['login_id']);
  unset($_SESSION['login_nickname']);
  header('Location:/index.php');
 ?>
