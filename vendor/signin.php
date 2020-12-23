<?php
	session_start();
	require_once 'connect.php';

	$login = $_POST['login'];
	$password = md5($_POST['password']);

	$db = new Database();
	$check_user = $db->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
	if(count($check_user) === 1){
		$user = $check_user[0];
		$_SESSION['user'] = [
			"id" => $user['id'],
			"login" =>$user ['login']
		];
		header('Location: ../content.php');
	}
	else{
		$_SESSION['message'] = 'Не верный логин или пароль';
		header('Location: ../index.php');
	}
?>
