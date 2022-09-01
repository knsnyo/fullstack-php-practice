<?php
include "../../config/db.php";
session_start();

$sql = "SELECT * FROM notice ORDER BY board_idx DESC";
$result = mysqli_query($connect, $sql);
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
        <?php
        while($row = mysqli_fetch_array($result)){
        ?>
        <article>
          <!--본문 타이틀-->
          <div class="article-header">
            <h1 class="article-title">
              <a href="notice_memo.php?board_idx=<?php echo $row['board_idx'];?>">
                <span><?php echo $row['board_title'];?></span>
              </a>
            </h1>
            <p class="article-desc"><?php echo $row['user_name'];?>&nbsp&nbsp&nbsp<?php echo $row['board_date'];?></p>
          </div>
          <!--본문 내용-->
          <div class="article-body">
            <div class="article-img">
              <img src="./upload/<?php echo $row['file'];?>" alt="">
            </div>
            <p><?php echo $row['board_memo'];?></p>
          </div>
        </article>
        <?php
        }
        if ($_SESSION['user_id'] === 'admin') {
        ?>
        <div class="notice_btn">
          <a href="notice_write.php">
            <input type="button" value="글쓰기" class="btn">
          </a>
        </div>
        <?php
        }
        ?>
      </section>
      <!--본문 우측 영역-->
      <?php include "../aside.html";?>
    </div>
    <!--푸터영역-->
    <?php include "../footer.html";?>
  </div>    
</body>
</html>