<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Авторизация и регистрация</title>
	<style><?php include 'assets/css/main.css'; ?></style>
</head>
<body>
	<form action="vendor/signup.php" method="post">
		<label>Логин</label>
		<input type="text" name="login" placeholder="Введите свой логин">
		<label>Почта</label>
		<input type="email" name="email" placeholder="Введите адресс почты">
		<label>Пароль</label>
		<input type="password" name="password" placeholder="Введите пароль">
		<label>Подтверждение пароля</label>
		<input type="password" name="confirm_password" placeholder="Подтвердите пароль">
		<button type="submit">Зарегистрироваться</button>
		<p>
			Есть аккаунт? - <a href="index.php">войдите</a>
		</p>
		<?php
			if($_SESSION['message'])
				echo '<p class ="msg">'. $_SESSION['message']. '</p>';
			unset($_SESSION['message']);
		?>
	</form>
</body>
</html>