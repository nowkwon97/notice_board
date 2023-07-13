<!-- 게시물 상세 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>게시물 상세보기</title>
</head>
<body>
  <h2>게시물 상세보기</h2>
  <?php
    // print_r($posts);
  ?>
  <h3>제목: <?php echo $posts['title'] ?></h3>
  <p>작성일: <?php echo $posts['created_at'] ?></p>
  <p>내용: <?php echo $posts['content'] ?></p>
</body>
</html>