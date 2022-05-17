<?php
	include './includes/conn.php';
	session_start();


	if(isset($_SESSION['CodeUser'])){
		header('location: home.php');
	}

?>