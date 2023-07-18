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
      <h1>로그인</h1>
    </header>
    <main id="main">
      <?php echo validation_errors(); ?>
	    <?php echo form_open('Login/index') ?>
        <input type="text" name="username" placeholder="사용자명" required>
        <input type="password" name="password" placeholder="비밀번호" required>
        <button type="submit">로그인</button>
      </form>
    </main>
    <footer id="footer">
      <a href="signup">회원가입 하러 가기</a>
    </footer>
  </div>
</body>
</html>