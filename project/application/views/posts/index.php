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
    print_r($posts);
  ?>
</body>
</html>