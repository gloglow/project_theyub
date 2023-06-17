<?php require_once('lib/header.php'); ?>
<?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $filtered_nickname=mysqli_real_escape_string($conn, $_POST['signup_nickname']);
  $filtered_id=mysqli_real_escape_string($conn, $_POST['signup_id']);
  $filtered_pw=mysqli_real_escape_string($conn, $_POST['signup_pw']);
  $filtered_email=mysqli_real_escape_string($conn, $_POST['signup_email']);
  $repeat_test_nickname = "SELECT * FROM member WHERE member_nickname='{$filtered_nickname}'";
  $repeat_test_id = "SELECT * FROM member WHERE member_id='{$filtered_id}'";
  $signup = "INSERT INTO member (member_nickname, member_id, member_pw, member_email)
    VALUE('{$filtered_nickname}',
      '{$filtered_id}',
      '{$filtered_pw}',
      '{$filtered_email}'
      )
    ";

  $result = mysqli_query($conn, $repeat_test_nickname);
  $row = mysqli_fetch_array($result);
  if($row===NULL)
  {
    $result = mysqli_query($conn, $repeat_test_id);
    $row = mysqli_fetch_array($result);
    if($row===NULL)
    {
      $result = mysqli_query($conn, $signup);
      if($result != false)
      {
        echo '가입에 성공했습니다! 환영합니다!';
      }
      else
      {
        echo '가입에 실패했습니다. 관리자에게 문의해주세요.';
      }
    }
    else
    {
      echo '중복 아이디입니다.';
    }
  }
  else
  {
    echo '중복 닉네임입니다.';
  }

 ?>
 <?php require_once('lib/tail.php'); ?>
