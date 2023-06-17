<?php require_once('lib/header.php'); ?>
  <h2>- MENU -</h2>
  <p>
    <?php
    $conn = mysqli_connect("*", "*", "*", "*");
    $menu_view = "SELECT *
                    FROM menu";
    $result = mysqli_query($conn, $menu_view);
    ?>
    <ul>
      <?php
      while($row=mysqli_fetch_array($result))
      {
        echo '<li><a href="bartender_menu_detail.php?menu_id='.$row['menu_id'].'">'.$row['menu_name'].'</a>';
        if(isset($_SESSION['login_nickname'])&&$_SESSION['login_nickname']==='관리자')
        {
          echo '<form action="bartender_menu_premodify.php" method="POST">
          <input type="hidden" name="menu_modify_id" value="'.$row['menu_id'].'">
          <input type="submit" value="수정">
          </form>';
          echo '<form action="bartender_menu_delete.php" method="POST">
          <input type="hidden" name="menu_delete_id" value="'.$row['menu_id'].'">
          <input type="submit" value="삭제">
          </form>';
        }
        echo '</li>';
      }
      ?>
    </ul>
  </p>
  <p>
    <?php
      if(isset($_SESSION['login_nickname'])&&$_SESSION['login_nickname']==='관리자')
      {
        echo '<form action="bartender_menu_write.php" method="POST">
                <input type="text" name="menu_name" placeholder="이름"><br>
                <input type="text" name="alcoholper" placeholder="도수"><br>
                <input type="text" name="flavor" placeholder="맛"><br>
                <input type="text" name="base" placeholder="기주"><br>
                <input type="text" name="method" placeholder="기법"><br>
                <input type="text" name="recipe" placeholder="레시피"><br>
                <input type="submit">
              </form>';
      }
     ?>

  </p>
<?php require_once('lib/tail.php'); ?>
