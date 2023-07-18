<!-- 게시물 작성 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>게시글 작성</title>
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
  		<h1>게시글 작성</h1>
		</header>
		<main id="main">
			<?php echo validation_errors(); ?>
			<?php echo form_open('create/index') ?>
				<div>
  		    <label for="title">제목</label>
  		    <input type="input" name="title" required>
  		  </div>
				<div>
					<label for="content">내용</label>
					<textarea name="content" rows="5"required></textarea>
				</div>
				<input type="submit" name="submit" value="게시물 작성" />
			</form>
		</main>
	</div>
</body>
</html>