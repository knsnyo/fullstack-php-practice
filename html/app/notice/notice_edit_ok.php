<?php
include "../../config/db.php";
if ('admin' !== $_POST['user_id']) {
  echo "<script>
  alert('zi ral');
  location.href = '../index.html';
  </script>";
}
$board_idx = $_GET['board_idx'];

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

$sql = "UPDATE notice SET board_title='$title', board_memo='$memo', board_date='$date', board_ip='$board_ip', file='$originName' WHERE board_idx=".$board_idx;
mysqli_query($connect, $sql);

echo $sql;

echo "<script>
alert('edit your post');
location.href = './notice_memo.php?board_idx=$board_idx';
</script>";
?>
