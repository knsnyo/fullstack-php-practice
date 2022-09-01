<?php
include "../../config/db.php";

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
    <link rel="stylesheet" href="../css/notice.css?">
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
            <form method="post" action="notice_write_ok.php" enctype="multipart/form-data">   
              <table class="write-form">
                <tr>
                  <td class="td2" style="border-bottom: 1px solid black;background-color: #eee; ">
                    <h3 style="font-weight: bold; text-align: center; padding: 20px; font-size: 25px;"><?php echo $row['board_title'];?></h3>
                    <p style="text-align: end; padding-bottom: 10px">작성일: <?php echo $row['board_date'];?></p>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 30px;">
                    <?php echo $row['board_memo'];?>
                  </td>
                </tr>
                <tr>
                  <td class="td2" style="padding: 30px;"><img src="./upload/<?php echo $row['file'];?>" alt="" ></td>
                </tr>
                <tr>
                  <td class="td3">
                    <input type="button" value="글목록" onclick="location.href='./notice_list.php';">
                    <?php 
                    if ('admin' == $_SESSION['user_id']) {
                    ?>
                    <input type="button" value="글수정" style="background-color: Dodgerblue;" onclick="location.href='./notice_edit.php?board_idx=<?php echo $row['board_idx'];?>';">
                    <input type="button" value="글삭제" style="background-color: red;" onclick="location.href='./notice_delete.php?board_idx=<?php echo $row['board_idx'];?>';">
                    <?php
                    }
                    ?>
                  </td>
                </tr>
              </table>
            </form>
            <?php
            $reply_sql = "SELECT * FROM reply WHERE board_idx = ".$row['board_idx'];
            $reply_result = mysqli_query($connect, $reply_sql);
            ?>
            <table style="width: 100%;">
              <tr>
                <td colspan="2" style="height: 50px; border-bottom: 2px solid #333;"><h1 style="font-size: 20px;">댓글</h1></td>
              </tr>
              <?php
              for(;$reply_row = mysqli_fetch_array($reply_result);){
              ?>
              <tr>
                <td style="height: 30px;">
                  <span style="font-weight: bold;"><?php echo $reply_row['user_name'];?></span>&nbsp
                  <span style="font-size: 10px; color: #888;"><?php echo $reply_row['reply_date'];?></span>&nbsp
                  <?php if ($reply_row['user_id'] == $_SESSION['user_id']) {?>
                  <a href="./reply_delete.php?reply_idx=<?php echo $reply_row['reply_idx'];?>&board_idx=<?php echo $row['board_idx'];?>" style="text-decoration: none;">
                    <span style="color: white; font-weight: bold; font-size: 10px; border: 1px solid red; border-radius: 5px; width: 10px; heigth: 10px; padding: 0px 3px; background-color: red;">X</span>
                  </a>
                  <?php
                  }
                  ?>
                </td>
              </tr>
              <tr>
                <td style="border-bottom: 1px solid #ccc; height: 30px;"><?php echo $reply_row['reply_memo'];?></td>
              </tr>
              <?php
              }
               ?>
            </table>
            <div style="margin-bottom: 20px;"></div>
            <form action="./reply_ok.php" method="post">
              <input type="hidden" name="board_idx" value="<?php echo $row['board_idx']?>">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
              <input type="hidden" name="user_name" value="<?php echo $_SESSION['user_name']?>">
              <table style="margin: 0 auto; width: 100%;">
                <tr>
                  <td style="width: 90%;"><textarea name="reply_memo" rows="3" style="width: 90%; resize: none; font-size: 16px;" required></textarea></td>
                  <td class="td3"><input type="submit" value="작성"></td>
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