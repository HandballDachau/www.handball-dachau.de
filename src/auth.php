<?php
	require_once('src/mysql.php');
	if(!isset($_SESSION['team'])){
		header("Location: login.php");
	}
?>
