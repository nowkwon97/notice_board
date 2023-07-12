<!-- 게시글 목록 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- 컨트롤러에서 전달받은 배열의 키를 변수명으로 사용하여 해당 값을 접근할 수 있다. -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>view page</title>
</head>
<body>
  <h2>게시글 목록</h2>
  
  <?php
    // print_r($posts[0]);
    // echo "<br>";
    // echo "<br>";
    // echo "제목: " . $posts[0]['title'] . "<br>";
    // echo "작성일: " . $posts[0]['created_at'] . "<br>";
    // echo "내용: " . $posts[0]['content'] . "<br>";
  ?>


  <!-- posts 배열의 모든 요소를 순회하며 반복 -->
  <!-- 제어문의 대체 문법 콜론(:)을 통해 HTML 태그 요소를 사용 -->
  <?php foreach($posts as $post) : ?>
    <h3>
      <?php echo "제목: " . $post['title'] . "<br>"; ?>
    </h3>
    <p>
      <?php echo "작성일: " . $post['created_at'] . "<br>"; ?>
    </p>
    <a href="view">상세보기</a>
    <a href="edit">수정</a>
    <a href="delete">삭제</a><br><br>
  <?php endforeach?>
  <a href="create">게시글 작성</a>
</body>
</html>