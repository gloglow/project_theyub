<?php
  session_start();
  if(isset($_SESSION['login_status'])&&$_SESSION['login_status']==='YES')
  {
    $mypagelink = 'bartender_mypage.php';
  }
  else
  {
    $mypagelink = 'bartender_login.php';
  }
/*
  $database_name = "silvestern";
  $pw = "siterntlxjs98*";
  $id = "silvestern";*/
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bartender_style.css?after">
    <title>THE YUB</title>
  </head>
  <body>
    <div class="top">
      <?php
        if(isset($_SESSION['login_status'])===TRUE&&$_SESSION['login_status']==='YES')
          echo $_SESSION['login_nickname'].'님'.'<a href="bartender_logout.php">&nbsp&nbsp로그아웃</a>';
        else
          echo $notmember = '<a href="bartender_login.php" >로그인/회원가입</a>';
       ?>
      </div>
      <a href="index.php">
        <div class="title">
          <h1>THE YUB</h1>
        </div>
      </a>
      <div class="mainmenu">
        <ul class="navs">
          <li class="nav"><a href="bartender_menu.php">Menu</a></li>
          <li class="nav"><a href="bartender_history.php">History</a></li>
          <li class="nav"><a href="bartender_contact.php">Contact</a></li>
          <li class="nav"><a href="<?=$mypagelink?>">Mypage</a></li>
        </ul>
        </div>
    </div>
    <div class="contents">
