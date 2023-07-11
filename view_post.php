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

  // 결과 출력
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    echo "제목: " . $row['title'] . "<br>";
    echo "작성일: " . $row['created_at'] . "<br>";
    echo "내용: " . $row['content'];
  } else {
    echo "게시글을 찾을 수 없습니다.";
  }

  // 데이터베이스 연결 닫기
  mysqli_close($conn);
?>