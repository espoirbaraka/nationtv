<?php
	include 'conn.php';
	session_start();

	if(!isset($_SESSION['CodeUser']) || trim($_SESSION['CodeUser']) == ''){
		header('location: ./index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM t_user WHERE CodeUser=:code");
	$stmt->execute(['code'=>$_SESSION['CodeUser']]);
	$user = $stmt->fetch();

	$pdo->close();

?>