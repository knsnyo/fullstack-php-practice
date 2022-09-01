<?php
session_start();
include "../../config/db.php";
$reply_idx = $_GET['reply_idx'];
$board_idx = $_GET['board_idx'];

$sql = "DELETE FROM reply WHERE reply_idx = ".$reply_idx;
mysqli_query($connect, $sql);

echo "<script>
alert('Delete your reply');
location.href = './notice_memo.php?board_idx=$board_idx';
</script>";
?>