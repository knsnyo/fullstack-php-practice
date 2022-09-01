<?php
session_start();
include "../config/db.php";
include "./password.php";

/* $_POST['user_password1'] <> $_POST['user_password2'] */
if($_POST['user_password1'] !== $_POST['user_password2']) {
  echo "<script>
  alert('비번 틀림');
  history.back();
  </script>";
} else {
  $new_password = password_hash($_POST['user_password1'], PASSWORD_DEFAULT);
}

$user_id = $_POST['user_id'];
$user_password = $_POST['user_password1'];
$user_name = $_POST['user_name'];
$user_date = date('Y-m-d H:i:s');
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$user_postcode = $_POST['user_postcode'];
$user_address = $_POST['user_address'];
$user_detail_address = $_POST['user_detail_address'];
$user_intro = $_POST['user_intro'];
$user_ip = $_SERVER['REMOTE_ADDR'];

$sql = "INSERT INTO `member`(`user_id`, `user_password`, `user_name`, `user_date`, `user_phone`, `user_email`, `user_postcode`, `user_addr`, `user_addr1`, `user_intro`, `user_ip`) VALUES ('$user_id','$new_password','$user_name','$user_date','$user_phone','$user_email','$user_postcode','$user_address','$user_detail_address','$user_intro','$user_ip')";
mysqli_query($connect, $sql);

echo "<script>
alert('가입 끝');
location.href = './login.php';
</script>";
?>