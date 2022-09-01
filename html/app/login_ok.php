<?php
session_start();
include "../config/db.php";
include "password.php";

$user_id = $_POST['user_id'];
$user_password = $_POST['user_password'];

$sql = "SELECT user_id, user_password, user_name FROM member WHERE user_id = '".$user_id."'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$hash_pw = $row['user_password'];

if (password_verify($user_password, $hash_pw)) {
  /* 로그인 성공 */
  $_SESSION['user_id'] = $row['user_id'];
  $_SESSION['user_name'] = $row['user_name'];
  echo "<script>
    alert('Login Success');
    location.href = './index.html';
  </script>";
} else {
  /* 로그인 실패 */
  echo "<script>
    alert('Login Failure');
    history.back();
  </script>";
}
?>