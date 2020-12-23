<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Все желания</title>
	<style><?php include 'assets/css/styles.css'; ?></style>
</head>
<body>
	<?php include "assets/header.php"; require_once "DB.php";
	$posts = get_posts();
	$post = current($posts);
	if(count($posts) !== 0)
	{
		echo "
		<table>
		<tr>
			<td>Автор</td>
			<td>Название</td>
			<td>Описание</td>
		</tr>";
	}
	else 
		print("В данный момент нет никаких желаний");
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
