<?php require_once('lib/header.php'); ?>
  <h2>- HISTORY -</h2>
<p>
<?php
  $conn = mysqli_connect("*", "*", "*", "*");
  $history_view = "SELECT history_id, history_content, history.member_id, history_time, member_nickname
                   FROM history
                   JOIN member
                   ON history.member_id = member.member_id";
  $result = mysqli_query($conn, $history_view);
   ?>
    <ul>
      <?php
      while($row=mysqli_fetch_array($result))
      {
        echo '<li>'.$row['member_nickname'].' : '.$row['history_content'].'('.$row['history_time'].')';
        if(isset($_SESSION['login_status'])&&$_SESSION['login_status']==='YES')
        {
          if($_SESSION['login_id']===$row['member_id']||$_SESSION['login_id']==='silvestern')
          {
            echo '<form action="bartender_history_delete.php" method="POST">
            <input type="hidden" name="history_delete_id" value="'.$row['history_id'].'">
            <input type="submit" value="삭제">
            </form>';
          }
        }
        echo '</li>';
      }
        ?>
    </ul>
  </p>
  <div class="history_write"
  <p>
    <?php
    if(isset($_SESSION['login_status'])&&$_SESSION['login_status']==='YES')
    {
      echo '
      <form action="bartender_history_write.php" method="POST">
        <p>
          <textarea maxlength="100" name="history_input" placeholder="100자까지 입력 가능합니다."></textarea>
        </p>
        <p>
          <input type="submit">
        </p>
      </form>';
    }?>
  </p>
</div>

<?php require_once('lib/tail.php'); ?>
