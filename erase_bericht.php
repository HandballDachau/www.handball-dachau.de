<?php
	session_start();
	require('src/mysql.php');
	require('src/auth.php');
	
	if(isset($_POST['id']) && isset($_POST['sent'])){
		if($mysql->erase_bericht($_POST['id'])){
			header('Location: redakteur.php');
		}else{
			echo mysqli_error($mysql->getConnection());
		}
	}elseif(isset($_GET['id']) && $mysql->ist_bericht($_GET['id'])) {
		$bericht = $mysql->get_bericht($_GET['id']);
	}else{
		header('Location: redakteur.php');
	}
	
	if(isset($_POST['sent']) && isset($_POST['id'])){
	}
?>
<html>

<head>
    <title>Handball-Dachau // Redakteur // Bericht &Auml;ndern</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body>
	<h1><?php echo $_SESSION['team'].' // Bericht löschen'; ?></h1>
	<form name="erase" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php 
				echo '<p><b>ID: </b>'.$bericht['id'].'<br />'
				.'<b>Titel: </b>'.$bericht['titel'].'<br />'
				.'<b>Text: </b>'.substr($bericht['text'],0,100).'...</p>';
			?>
		<p style="color: darkred; font-weight: 800; padding-top: 10px;">Diesen Bericht löschen?</p>
		<input class="button" type="submit" name="sent" value="Löschen" />
		<a class="button" href="redakteur.php" title="zurück">zurück</a>
	</form>
</body>
</html>