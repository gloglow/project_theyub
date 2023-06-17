<?php require_once('lib/header.php'); ?>
  <?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $visit_request_list = "SELECT visit_request.request_id, member_nickname, visit_time
                        FROM member
                        JOIN visit_request
                        ON member.member_id = visit_request.member_id";

  $result = mysqli_query($conn, $visit_request_list);

   ?>
      <p>
        방문 신청 목록
        <ol>
          <?php
            while($row = mysqli_fetch_array($result))
              {
                echo '<li>'.$row['member_nickname'].' - '.$row['visit_time'];
                echo '<form action="bartender_mypage_visit_manage_process.php" method="POST">'.
                      '<input type="hidden" name="request_id" value="'.$row['request_id'].'">'.
                      '<input type="hidden" name="member_nickname" value="'.$row['member_nickname'].'">'.
                      '<input type="submit" value="처리"></form></li>';
              }
          ?>
        </ol>
        <a href="bartender_mypage_visit_manage_clear.php">전체삭제</a>
      </p>
<?php require_once('lib/tail.php'); ?>
