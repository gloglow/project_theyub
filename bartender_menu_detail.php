<?php require_once('lib/header.php'); ?>
<?php
$conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
$menu_view = "SELECT * FROM menu WHERE menu_id = {$_GET['menu_id']}";
$review_view = "WITH pointed_menu AS
                (SELECT * FROM review WHERE menu_id = {$_GET['menu_id']})
                SELECT review_id, review_rate, review_content, review_time, member_nickname
                FROM pointed_menu
                JOIN member
                ON pointed_menu.member_id = member.member_id";
$review_rate_avg = "SELECT AVG(review_rate) AS avg FROM review WHERE menu_id={$_GET['menu_id']} GROUP BY menu_id";
$menu_view_result = mysqli_query($conn, $menu_view);
$review_view_result = mysqli_query($conn, $review_view);
$review_rate_avg_result = mysqli_query($conn, $review_rate_avg);
$row = mysqli_fetch_array($menu_view_result);
$row3 = mysqli_fetch_array($review_rate_avg_result);
?>
  <h2>- <?=$row['menu_name']?> -</h2>
  <p>
    <ul>
      <li>도수 : <?=$row['alcoholper']?>%</li>
      <li>맛 : <?=$row['flavor']?></li>
      <li>베이스 : <?=$row['base']?></li>
      <li>기법 : <?=$row['method']?></li>
      <li>평균 별점 : <?php if(isset($row3['avg'])) echo $row3['avg'];?></li>
      <?php if(isset($_SESSION['login_nickname'])&&$_SESSION['login_id']==='silvestern')
            {
              echo '<li>레시피 : '.$row['recipe'].'</li>';
            }?>
    </ul>
  </p>
  <p>
    <ul><h3>~리뷰 목록~</h3>
      <?php
        while($row2 = mysqli_fetch_array($review_view_result))
        {
          echo '<li>';
          echo $row2['member_nickname'].' : ['.$row2['review_rate'].'점] '.$row2['review_content'].' ('.$row2['review_time'].')';
          if(isset($_SESSION['login_nickname'])&&($row2['member_nickname']===$_SESSION['login_nickname']||$_SESSION['login_id']==='silvestern'))
          {
            echo '<form action="bartender_review_delete.php" method="POST">
                    <input type="hidden" name="review_id" value="'.$row2['review_id'].'">
                    <input type="hidden" name="menu_id" value="'.$_GET['menu_id'].'">
                    <input type="submit" value="삭제">
                  </form>';
          }
          echo '</li>';
        }
        ?>
    </ul>
  </p>
  <?php
    if(isset($_SESSION['login_status'])&&$_SESSION['login_status']==='YES')
    {
      echo '<p>
        <form action="bartender_review_write.php?menu_id='.$_GET['menu_id'].'" method="POST">
          <input type="hidden" name="member_nickname" value="'.$_SESSION['login_nickname'].'">
          <select name="review_rate">
            <option value=5>★★★★★</option>
            <option value=4>★★★★☆</option>
            <option value=3>★★★☆☆</option>
            <option value=2>★★☆☆☆</option>
            <option value=1>★☆☆☆☆</option>
          </select>
          <input type="text" name="review_content" placeholder="리뷰를 작성해주세요.">
          <input type="submit">
        </form>
      </p>';
      }
      ?>
<?php require_once('lib/tail.php'); ?>
