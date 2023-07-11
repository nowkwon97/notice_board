<?php
  include 'db_info.php';

  // 데이터베이스 연결
  $conn = mysqli_connect($hostname, $username, $password, $databases);
  if (!$conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
  }

  // 게시글 ID 가져오기
  $post_id = $_GET['id'];

  // 게시글 삭제 쿼리 실행
  $sql = "DELETE FROM posts WHERE id = $post_id";
  if (mysqli_query($conn, $sql)) {
    echo "게시글이 삭제되었습니다.";
  } else {
    echo "게시글 삭제에 실패했습니다: " . mysqli_error($conn);
  }

  // 데이터베이스 연결 닫기
  mysqli_close($conn);
?>