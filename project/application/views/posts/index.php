<!-- 게시글 목록 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>view page</title>
</head>
<style>
  body {
    box-sizing: border-box;
    margin: 0;
    width: 100vw;
    height: 1000px;
  }

  #container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    /* border: 1px solid black; */
  }
  #header {
    width: 100%;
    height: auto;
    background-color: azure;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #main {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #footer {
    width: auto;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 1000px;
    background-color: #ddd;
    font-size: large;
    border-radius: 10px;
  }
</style>
<body>
  <div id="container">
    <header id="header">
      <h1>게시글 목록</h1>
    </header>
    <!-- 컨트롤러에서 전달받은 배열의 키를 변수명으로 사용하여 해당 값을 접근할 수 있다. -->  
    <!-- posts 배열의 모든 요소를 순회하며 반복 -->
    <!-- 제어문의 대체 문법 콜론(:)을 통해 HTML 태그 요소를 사용 -->
    <main id="main">
      <div>
        <?php foreach($posts as $post) : ?>
          <h2>
            <?php echo "제목: " . $post['title'] . "<br>"; ?>
          </h2>
          <p>
            <?php echo "<strong>작성일: </strong>" . $post['created_at'] . "<br>"; ?>
          </p>
          <!-- url에 id를 표시하여 글의 식별이 가능하게 해야한다. -->
          <a href="view/index/<?php echo $post['id']; ?>">상세보기</a>
          <a href="edit/index/<?php echo $post['id']; ?>">수정</a>
          <a href="delete/index/<?php echo $post['id']; ?>">삭제</a><br><br>
        <?php endforeach; ?>
      </div>
    </main>
    <footer id="footer">
      <a href="create/index">게시글 작성</a>
    </footer>
  </div>
</body>
</html>