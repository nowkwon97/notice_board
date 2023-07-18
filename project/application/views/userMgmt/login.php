<!-- 로그인 화면 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>로그인</title>
</head>
<body>
  <h2>로그인</h2>
  <?php echo validation_errors(); ?>
	<?php echo form_open('Login/index') ?>
    <input type="text" name="username" placeholder="사용자명" required>
    <input type="password" name="password" placeholder="비밀번호" required>
    <button type="submit">로그인</button>
  </form>
  <br>
  <a href="signup">회원가입 하러 가기</a>
</body>
</html>