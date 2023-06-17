<?php require_once('lib/header.php'); ?>
  <h2>- MENU -</h2>
  <p>
    <?php
    $conn = mysqli_connect("*", "*", "*", "*");
    $menu_premodify = "SELECT *
                    FROM menu
                    WHERE menu_id='{$_POST['menu_modify_id']}'";
    $result = mysqli_query($conn, $menu_premodify);
    $row = mysqli_fetch_array($result);
    ?>
    <ul class="menu_modify_text">
      <form action="bartender_menu_modify.php" method="POST">
        <input type="hidden" name="menu_modify_id" value="<?=$_POST['menu_modify_id']?>">
        <input type="text" name="menu_name" value="<?=$row['menu_name']?>" placeholder="이름"><br>
        <input type="text" name="alcoholper" value="<?=$row['alcoholper']?>" placeholder="도수"><br>
        <input type="text" name="flavor" value="<?=$row['flavor']?>" placeholder="맛"><br>
        <input type="text" name="base" value="<?=$row['base']?>" placeholder="기주"><br>
        <input type="text" name="method" value="<?=$row['method']?>" placeholder="기법"><br>
        <input type="text" name="recipe" value="<?=$row['recipe']?>" placeholder="레시피"><br>
        <input type="submit" value="수정하기">
      </form>
    </ul>
  </p>
<?php require_once('lib/tail.php'); ?>
