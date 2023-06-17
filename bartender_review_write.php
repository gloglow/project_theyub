<?php require_once('lib/header.php'); ?>
<?php
$conn = mysqli_connect("*", "*", "*", "*");
$review_write = "INSERT INTO review (menu_id, review_rate, review_content, member_id)
                VALUES ({$_GET['menu_id']}, {$_POST['review_rate']}, '{$_POST['review_content']}', '{$_SESSION['login_id']}')";

$result = mysqli_query($conn, $review_write);

if($result===FALSE)
{
  echo '작성에 실패했습니다.';
}
else
{
  header('Location:/bartender_menu_detail.php?menu_id='.$_GET['menu_id']);
}

?>

<?php require_once('lib/tail.php'); ?>
