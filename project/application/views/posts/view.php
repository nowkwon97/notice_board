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
      <h1>게시물 상세보기</h1>
    </header>
    <main id="main">
      <div>
        <h2>제목: <?php echo $posts['title'] ?></h2>
        <p><strong>작성일:</strong> <?php echo $posts['created_at'] ?></p>
        <p><strong>내용:</strong> <?php echo $posts['content'] ?></p>
      </div>
    </main>
    <footer id="footer">
    <a href="../../posts">뒤로 가기</a>
    </footer>
  </div>
</body>
</html>