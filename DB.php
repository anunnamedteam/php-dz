<?php session_start();
	require_once 'vendor/connect.php';
	$db = new Database();

	function get_posts(){
		$db = new Database();
		$posts = $db->query("SELECT users.login, posts.id, title, description  FROM `posts`
		INNER JOIN users ON posts.user_id = users.id;");
		return $posts;
	}

	function get_my_posts(){
		$db = new Database();
		$posts = $db->query("SELECT posts.id, title, description  FROM `posts`
		INNER JOIN users ON posts.user_id = users.id WHERE posts.user_id = '{$_SESSION['user']['id']}';
		");
		return $posts;
	}

	if((int) $_GET['del']>0){
		$db->query("DELETE FROM `posts` WHERE `id` ='{$_GET['del']}'");
	}

	if((int) $_GET['edit']>0){

		$edit_row = $db->query("SELECT * FROM `posts` WHERE `id` = '{$_GET['edit']}'")[0];
	}
	

	if(!empty($_POST['title']) && !empty($_POST['text'])){
		if($_GET['edit']>0){
			$db->query("UPDATE `posts` set `title` = '{$_POST['title']}', `description` = '{$_POST['text']}' WHERE `id` = '{$_GET['edit']}';");
		}

		else{
			$db->query("INSERT INTO `posts` (`title`,`description`,`user_id`) VALUES ('{$_POST['title']}', '{$_POST['text']}', '{$_SESSION['user']['id']}')");
		}
	}
?> 