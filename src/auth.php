<?php
	require_once('mysql.php');
	if(!isset($_SESSION['team'])){
		header("Location: login.php");
	}
?>
