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
<body>
  <h2>게시글 작성</h2>
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
</body>
</html>