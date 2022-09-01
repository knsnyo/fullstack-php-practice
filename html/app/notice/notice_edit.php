<?php
include "../../config/db.php";
session_start();

if ('admin' !== $_SESSION['user_id']) {
  echo "<script>
  alert('ziral');
  location.href = '../index.html';
  </script>";
}
$board_idx = $_GET['board_idx'];
$sql = "SELECT * FROM notice WHERE board_idx = '".$_GET['board_idx']."'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/notice.css">
    <script src="//cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
</head>
<body>
  <!--전체를 감싸는 태그-->
  <div id="page-wrapper">
    <!--헤더영역-->
    <?php include "../header.html";?>
    <!--메뉴영역-->
    <?php include "../menu.html";?>
    <!--본문영역-->
    <div id="content">
      <!--본문 가운데 영역-->
      <section id="main-section">
        <!--본문 첫번째 영역-->    
        <article>
          <!--본문 타이틀-->
          <div>
            <form method="post" action="./notice_edit_ok.php?board_idx=<?php echo $board_idx?>" enctype="multipart/form-data">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
              <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name'];?>">
              <table class="write-form">
                <tr>
                  <td class="td1">제목</td>
                  <td class="td2" style="vertical-align: top;"><input type="text" name="title" required value="<?php echo $row['board_title'];?>">&nbsp<input type="checkbox" name="notice" id="notice" style="width: 15px; heigth: 15px;">notice</td>
                </tr>
                <tr>
                  <td colspan="2"><textarea name="memo" rows="5" required><?php echo $row['board_memo'];?></textarea></td>
                  <script>
                  CKEDITOR.replace("memo");
                  </script>
                </tr>
                <tr>
                  <td class="td1">사진첨부</td>
                  <td class="td2"><input type="file" name="file" value="./upload/<?php echo $row['file']?>"></td>
                </tr>
                <tr>
                  <td colspan="2" class="td3"><input type="submit" value="글변경"></td>
                </tr>
              </table> 
            </form>    
          </div>
        </article>
      </section>
      <!--본문 우측 영역-->
      <?php include "../aside.html";?>
    </div>
    <!--푸터영역-->
    <?php include "../footer.html";?>
  </div>
</body>
</html>