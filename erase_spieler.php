<?php
	session_start();
	require('src/mysql.php');
	require('src/auth.php');
	
	if(isset($_POST['id']) && isset($_POST['sent'])){
		if($mysql->erase_spieler($_POST['id'])){
			header('Location: verwaltung.php');
		}else{
			echo mysqli_error($mysql->getConnection());
		}
	}elseif(isset($_GET['id']) && $mysql->ist_spieler($_GET['id'])) {
		$spieler = $mysql->get_spieler1($_GET['id']);
	}else{
		header('Location: verwaltung.php');
	}
?>
<html>

<head>
    <title>Handball-Dachau // Redakteur // Spieler löschen</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body>
	<h1><?php echo $_SESSION['team'].' // Spieler löschen'; ?></h1>
	<form name="erase" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<p> <?php 
				echo 'ID: '.$spieler['id'].'<br />';
				echo 'Name: '.$spieler['name']; 
			?></p>
		<p style="color: darkred; font-weight: 800; padding-top: 10px;">Diesen Spieler löschen?</p>
		<input class="button" type="submit" name="sent" value="Löschen" />
		<a class="button" href="redakteur.php" title="zurück">zurück</a>
	</form>
</body>
</html>