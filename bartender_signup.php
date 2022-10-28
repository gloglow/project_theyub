<?php require_once('lib/header.php'); ?>
  <h2>- SIGN UP -</h2>
  <p>
    <form action="bartender_signupcheck.php" method="post">
      NICKNAME : <input type="text" name="signup_nickname" placeholder="닉네임"><br>
      ID : <input type="text" name="signup_id" placeholder="아이디"><br>
      PW : <input type="text" name="signup_pw" placeholder="비밀번호"><br>
      EMAIL : <input type="text" name="signup_email" placeholder="이메일">
      <input type="submit" value="가입하기">
    </form>
  </p>
<?php require_once('lib/tail.php'); ?>
