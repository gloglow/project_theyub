<?php require_once('lib/header.php'); ?>
  <h2>- MENU -</h2>
  <p>
    <?php
    $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
    $filtered_menu_name=mysqli_real_escape_string($conn, $_POST['menu_name']);
    $filtered_alcoholper=mysqli_real_escape_string($conn, $_POST['alcoholper']);
    $filtered_flavor=mysqli_real_escape_string($conn, $_POST['flavor']);
    $filtered_base=mysqli_real_escape_string($conn, $_POST['base']);
    $filtered_method=mysqli_real_escape_string($conn, $_POST['method']);
    $filtered_recipe=mysqli_real_escape_string($conn, $_POST['recipe']);

    $menu_modify = "UPDATE menu SET menu_name='{$filtered_menu_name}'
                          , alcoholper='{$filtered_alcoholper}'
                          , flavor='{$filtered_flavor}'
                          , base='{$filtered_base}'
                          , method='{$filtered_method}'
                          , recipe='{$filtered_recipe}'
                          WHERE menu_id={$_POST['menu_modify_id']}";
    $result = mysqli_query($conn, $menu_modify);

    if($result===false)
    {
      echo '수정에 실패했습니다.';
    }
    else
    {
      header('Location:/bartender_menu.php');
    }
    ?>
  </p>
<?php require_once('lib/tail.php'); ?>
