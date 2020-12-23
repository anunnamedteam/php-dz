<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Мои желания</title>
	<style><?php include 'assets/css/styles.css'; ?></style>
</head>
<body>
	<?php include "assets/header.php"; require_once 'DB.php';
	$posts = get_my_posts();
	$post = current($posts);?>
	<h2> Форма добавления желания </h2>
	<form method="post">
		<label for="login">Заголовок желания</label>
		<input type="text" name="title" id="login" placeholder="Введите заголовок" value =
		"<?=$edit_row['title']?>">
		<label for="login">Описание</label>
		<textarea placeholder="Ввведите описание" name="text"><?=$edit_row['description']?></textarea>
		<?if($_GET['edit']>0) {?>
		<button type="submit">Сохранить изменения</button>
		<a href="mydesires.php" class="save">Выйти из режима редактирования</a>
		<?}else{?>
			<button type="submit">Добавить желание</button>
		<?}?>

	<?php if(count($posts) !== 0)
	{
		echo "
		<table>
		<tr>
			<td>Название</td>
			<td>Описание</td>
		</tr>";
	}
	else 
		print("В данный момент нет никаких желаний");
	while ($post) {
		?>
		<tr>
			<td class="all"><?=$post['title'];?></td>
			<td class="all"><?=$post['description'];?></td>
			<td class="all"><a class='danger' href='?del=<?=$post['id'];?>'>Удалить</a></td>
			<td class="all"><a class='info' href='?edit=<?=$post['id']?>'>Редактировать</a></td>
			<?$post = next($posts);?>
		</tr>
		<?php
	}
	echo "</table>"

?>
	
</body>
</html>
