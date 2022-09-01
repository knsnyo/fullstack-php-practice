<?php
include "../../config/db.php";
if ('admin' !== $_POST['user_id']) {
  echo "<script>
  alert('zi ral');
  location.href = '../index.html';
  </script>";
}

$title = $_POST['title'];
$user_name = $_POST['user_name'];
$memo = $_POST['memo'];
$date = date("Y-m-d H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$board_id = $_POST['user_id'];

/* file upload */
$tmpFile = $_FILES['file']['tmp_name']; /* temp file name */
$originName = $_FILES['file']['name']; /* origianl name */
$filename = iconv("UTF-8", "EUC-KR", $_FILES['file']['name']); /* encoding(입력 캐릭터셋, 변환 캐릭터셋, 바꿀 것) */
$folder = "./upload/".$filename;
move_uploaded_file($tmpFile, $folder);

$sql = "INSERT INTO notice (board_title, user_name, board_memo, board_date, board_hit, board_ip, file, board_id) VALUES ('".$title."', '".$user_name."', '".$memo."', '".$date."', 0, '".$ip."', '".$originName."', '".$board_id."')";
mysqli_query($connect, $sql);

echo $sql;

echo "<script>
alert('post your write');
location.href = './notice_list.php';
</script>";
?>
