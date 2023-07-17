<!-- 게시물 수정 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>게시물 수정</title>
</head>
<body>
  <h2>게시물 수정</h2>
  <?php
    print_r($data['posts'][0]['id']);
  ?>
  <?php echo validation_errors(); ?>
	<?php echo form_open('edit/index/' . $data['posts'][0]['id']) ?>
    <div>
      <label for="title">제목</label>
      <input type="text" name="title" value="<?php echo $title ?>" required>
    </div>
    <div>
      <label for="content">내용</label>
      <textarea name="content" rows="5" required><?php echo $content ?></textarea>
    </div>
    <input type="submit" name="submit" value="게시물 수정" />
  </form>
</body>
</html>