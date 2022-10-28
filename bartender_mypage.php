<?php require_once('lib/header.php'); ?>
  <h2>- MYPAGE -</h2>
  <?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $member_info = "SELECT * FROM member WHERE member_id='{$_SESSION['login_id']}'";

  $result = mysqli_query($conn, $member_info);
  $row = mysqli_fetch_array($result);
   ?>
   <script>
    function modifyCheck()
    {
      if(confirm("수정하시겠습니까?") == true)
      {
        document.removefrm.submit();
      }
      else
      {
        return false;
      }
    }
    function removeCheck()
    {
      if(confirm("정말로 탈퇴하시겠습니까?") == true)
      {
        location.href='/bartender_mypage_remove.php';
      }
      else
      {
        return false;
      }
    }
    </script>
      <p>
        <?=$_SESSION['login_nickname']?>님, 안녕하세요!
      </p>
      <p>
        <form action="bartender_mypage_modify.php" name="removefrm" method="POST">
        닉네임 : <input type="text" name="modified_nickname" value="<?=$row['member_nickname']?>" placeholder="닉네임"><br>
        아이디 : <?=$row['member_id']?><br>
        비밀번호 : <input type="password" name="modified_pw" value="<?=$row['member_pw']?>" placeholder="비밀번호"><br>
        이메일 : <input type="text" name="modified_email" value="<?php if($row['member_email']===NULL)
                  {
                    echo '';
                  }
                  else
                  {
                    echo $row['member_email'];
                  }?>" placeholder="이메일"><br>
        방문횟수 : <?php if($_SESSION['login_id']==='silvestern')
                    {
                      echo '<a href="bartender_mypage_visit_manage.php">방문관리</a>';
                    }
                    else
                    {
                      echo $row['member_visit'].'  <a href="bartender_mypage_visit_request.php">방문인증</a>';
                    }
                    ?>

      </p>
      <p>
      </form>
          <input type="button" value="회원정보 변경하기" onclick="modifyCheck()">
          <input type="button" value="회원 탈퇴하기" onclick="removeCheck()"
      </p>
<?php require_once('lib/tail.php'); ?>
