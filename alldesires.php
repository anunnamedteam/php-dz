<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Все желания</title>
	<style><?php include 'assets/css/styles.css'; ?></style>
</head>
<body>
	<?php include "assets/header.php"; include "assets/footer.php"; require_once 'vendor/connect.php';
	$db = new Database();
	$posts = $db->query("SELECT users.login, title, description  FROM `posts`
	INNER JOIN users ON posts.user_id = users.id;");
	$post = current($posts);
	?> 
	<table class="all">
		<tr class="all">
			<td class="all">Автор</td>
			<td class="all">Название</td>
			<td class="all">Описание</td>
		</tr>
	<?;
	while ($post) {
		?>
		<tr class="all">
			<td class="all"><?=$post['login'];?></td>
			<td class="all"><?=$post['title'];?></td>
			<td class="all"><?=$post['description'];?></td>
			<?$post = next($posts);?>
		</tr>
		<?php
	}
	echo "</table>"

?>
	
</body>
</html>
