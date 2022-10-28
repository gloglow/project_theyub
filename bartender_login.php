<?php require_once('lib/header.php'); ?>
      <h2>- LOGIN -</h2>
      <p>
        <form action="bartender_logincheck.php" method="post">
          ID : <input type="text" name="login_id" placeholder="아이디"><br>
          PW : <input type="password" name="login_pw" placeholder="비밀번호">
          <input type="submit" value="로그인">
        </form>
      </p>
      <p>
        <a href="bartender_signup.php">회원가입</a>
      </p>
<?php require_once('lib/tail.php'); ?>
