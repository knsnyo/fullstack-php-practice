<?php
session_start();
include "../../config/db.php";

if ($_SESSION['user_id'] <> 'admin') {
  echo "<script>
  alert('BYE');
  history.back();
  </script>";
}

$board_idx = $_GET['board_idx'];
$sql = "DELETE FROM notice WHERE board_idx=".$board_idx;
mysqli_query($connect, $sql);

echo "<script>
alert('delete your post');
location.href = './notice_list.php';
</script>";
?>