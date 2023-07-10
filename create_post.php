<?php
  include 'db_info.php';

  // 데이터베이스 연결
  $conn = mysqli_connect($hostname, $username, $password, $databases);
  if(!$conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
  }

  // 게시글 작성 폼 전송 처리
  if($_SERVER['REQUEST_METHOD']==='POST'){
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 게시글 작성 쿼리 실행
    $sql = "INSERT INTO posts (title, content, created_at) VALUES ('$title', '$content', NOW())";
    if (mysqli_query($conn, $sql)) {
      echo "게시글이 작성되었습니다.";
    } else {
      echo "게시글 작성에 실패했습니다: " . mysqli_error($conn);
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>게시글 작성</title>
  </head>
  <body>
    <h2>게시글 작성</h2>
    <form method="POST" action="">
      <div>
        <label for="title">제목</label>
        <input type="text" name="title" required>
      </div>
      <div>
        <label for="content">내용</label>
        <textarea name="content" rows="5"required></textarea>
      </div>
      <button type="submit">작성</button>
    </form>
  </body>
</html>

<?php
  // 데이터베이스 연결 닫기
  mysqli_close($conn);
?>