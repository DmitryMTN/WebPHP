<?php include "assets/header.html"?>
<div class="container">
	<form method="Post" class="form12" enctype="multipart/form-data">
		<div class="input-holder">
			<input type="text" name="title" class="inputs">
			<textarea class="inputs text" name="text"></textarea>
			<input type="file" name="img">
			<input type="submit" name="submit" value="Добавить">
		</div>
	</form>
</div>
<?php
$sql_connect = mysqli_connect('localhost', 'root', '', 'webphp','3307');

$check = empty($_POST['submit'])? false : true;

if ($check) {
	$text = $_POST['text'];
	$title = $_POST['title'];


	if ($_FILES['img'] and $_POST['title'] and $_POST['text']) {
	$image =$_FILES['img']['name'];
	$image = str_replace('', '|', $image);
	$image ="assets/media/".$image;

	$result = mysqli_query(
		$sql_connect,"INSERT INTO posts (`id_post`,`title`,`text_post`,`image_post`) values (null,'$title','$text','$image')"
	);

	if ($result) {
		move_uploaded_file($_FILES['img']['tmp_name'], $image);

	}
}
}

?>
</body>
</html>