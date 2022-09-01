<?php
session_start();
include "../../config/db.php";

$board_idx = $_POST['board_idx'];
$reply_memo = $_POST['reply_memo'];
$reply_date = date("Y-m-d H:i:s");
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];

$sql = "INSERT INTO reply (board_idx, reply_memo, reply_date, user_id, user_name) VALUES ('$board_idx', '$reply_memo', '$reply_date', '$user_id', '$user_name');";
mysqli_query($connect, $sql);

echo "<script>
alert('upload your reply');
location.href = './notice_memo.php?board_idx=$board_idx';
</script>";
?>