<?php
	session_start();
	require_once 'connect.php';

	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	if($password === $confirm_password && strlen($login) > 2){
		$password = md5($password);
		$db = new Database();
		$db->execute("INSERT INTO `users` SET `login` = '$login', `email` = '$email', `password` = '$password';");
		$_SESSION['message'] = 'Регистрация прошла успешно!';
		header('Location: ../index.php');
	}
	else{
		$_SESSION['message'] = 'Ошибка создания профиля';
		header('Location: ../register.php');
	}