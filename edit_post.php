<?php
  include 'db_info.php';

  // 데이터베이스 연결
  $conn = mysqli_connect($hostname, $username, $password, $databases);
  if (!$conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
  }

  // 게시글 ID 가져오기
  $post_id = $_GET['id'];

  // 게시글 조회 쿼리 실행
  $sql = "SELECT * FROM posts WHERE id = $post_id";
  $result = mysqli_query($conn, $sql);

  // 폼 전송 처리
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 게시글 수정 쿼리 실행
    $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$post_id";
    if (mysqli_query($conn, $sql)) {
      echo "게시글이 수정되었습니다.";
    } else {
      echo "게시글 수정에 실패했습니다: " . mysqli_error($conn);
    }
  }

  // 폼에 기존 게시글 내용 표시
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
?>
  <!DOCTYPE html>
  <html>
  <head>
    <title>게시글 수정</title>
  </head>
  <body>
    <h2>게시글 수정</h2>
    <form method="POST" action="">
      <div>
        <label for="title">제목</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
      </div>
      <div>
        <label for="content">내용</label>
        <textarea name="content" rows="5" required><?php echo $row['content']; ?></textarea>
      </div>
      <button type="submit">수정</button>
    </form>
  </body>
  </html>
<?php
  } else {
    echo "게시글을 찾을 수 없습니다.";
  }

  // 데이터베이스 연결 닫기
  mysqli_close($conn);
?>