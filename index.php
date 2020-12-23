<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация и регистрация</title>
	<style><?php include 'assets/css/main.css'; ?></style>
</head>
<body>
	<form action="vendor/signin.php" method="post">
		<label>Логин</label>
		<input type="text" name="login" placeholder="Введите свой логин">
		<label>Пароль</label>
		<input type="password" name="password" placeholder="Введите пароль">
		<button type="submit">Войти</button>
		<p>
			У вас нет аккаунта? - <a href="register.php">зарегистрируйтесь</a>
		</p>
		<?php
			if($_SESSION['message'])
				echo '<p class ="msg">'. $_SESSION['message']. '</p>';
			unset($_SESSION['message']);
		?>
	</form>
</body>
</html>