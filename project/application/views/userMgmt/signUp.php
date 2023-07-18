<!-- 회원가입 화면 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>회원가입</title>
</head>
<body>
  <h2>회원가입</h2>
  <?php echo validation_errors(); ?>
	<?php echo form_open('SignUp/index') ?>
    <input type="text" name="username" placeholder="사용자명" required>
    <input type="password" name="password" placeholder="비밀번호" required>
    <button type="submit">회원 가입</button>
  </form>
  <!-- <br>
  <a href="login">로그인 하러 가기</a> -->
</body>
</html>