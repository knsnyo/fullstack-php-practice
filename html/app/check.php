<?php
include "../config/db.php";

$user_id = $_GET['userid'];

$sql = "SELECT * FROM member where user_id = ".$user_id;
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

if(0 == $row) {
  echo "사용 가능한 ID입니다.";
} else {
  echo " 중복";
}
?>
<button onclick="window.close()">close</button>