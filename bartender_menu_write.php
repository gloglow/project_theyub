<?php require_once('lib/header.php'); ?>
<?php
  $conn = mysqli_connect("localhost", "silvestern", "siterntlxjs98*", "silvestern");
  $filtered_menu_name=mysqli_real_escape_string($conn, $_POST['menu_name']);
  $filtered_alcoholper=mysqli_real_escape_string($conn, $_POST['alcoholper']);
  $filtered_flavor=mysqli_real_escape_string($conn, $_POST['flavor']);
  $filtered_base=mysqli_real_escape_string($conn, $_POST['base']);
  $filtered_method=mysqli_real_escape_string($conn, $_POST['method']);
  $filtered_recipe=mysqli_real_escape_string($conn, $_POST['recipe']);
  $menu_write = "INSERT INTO menu (menu_name, alcoholper, flavor, base, method, recipe)
                   VALUES ('{$filtered_menu_name}', '{$filtered_alcoholper}',
                          '{$filtered_flavor}', '{$filtered_base}',
                          '{$filtered_method}', '{$filtered_recipe}')";

  $result = mysqli_query($conn, $menu_write);

  if($result===FALSE)
  {
    echo '작성에 실패했습니다.';
  }
  else
  {
    header('Location:/bartender_menu.php');
  }
   ?>
<?php require_once('lib/tail.php'); ?>
