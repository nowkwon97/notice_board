<?php
  include 'db_info.php';

  // 데이터베이스 연결
  $conn = mysqli_connect($hostname, $username, $password, $databases);
  if(!$conn) {
    die("데이터베이스 연결 실패: ". mysqli_connect_error());
  }

  // 게시글 목록 조회 쿼리 실행
  $sql = "SELECT * FROM posts ORDER BY created_at DESC";
  $result = mysqli_query($conn, $sql);

  // 결과 출력
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "제목: " . $row['title'] . "<br>";
      echo "작성일: " . $row['created_at'] . "<br>";
      echo "<a href='view_post.php?id=" . $row['id'] . "'>자세히 보기</a>";
      echo "<a href='edit_post.php?id=" . $row['id'] . "'>수정</a> ";
      echo "<a href='delete_post.php?id=" . $row['id'] . "'>삭제</a><br><br>";
    }
  } else {
    echo "게시글이 없습니다.<br>";
  }

  // 게시글 작성 링크
  echo "<a href='create_post.php'>게시글 작성</a>";

  // 데이터베이스 연결 닫기
  mysqli_close($conn);
?>