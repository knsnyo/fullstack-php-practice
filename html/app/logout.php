<?php
session_start();
$result = session_destroy();

if($result) {
  echo "
  <script>
    alert('Logout Success');
    location.href = './index.html';
  </script>";
}
?>
