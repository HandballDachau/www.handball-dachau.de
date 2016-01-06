<?php
	session_start();
	require('src/auth.php');
	$team = $_SESSION['team'];
	$pic = $_GET['pic'];
	$path = pathinfo($pic);
	$npic = 'bilder/teams/Thumbnails/1516/'.$team.'/TN'.$path['basename'];
	if(isset($_POST['id']) && isset($_POST['sent'])){
		if(@unlink($npic)){
			@unlink($pic);
			header('Location: galerie_manager.php');
		}else{
			echo mysqli_error($mysql->getConnection());
		}
	}
	
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball-Dachau // Verwaltung</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body>
	<h1><?php echo $_SESSION['team'].' // Bild löschen'; ?></h1> 
	
	<br />
	<img height="300" src="<?php echo $pic;?>"
	<br />
	
	<form name="erase" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
		<p style="color: darkred; font-weight: 800; padding-top: 10px;">Dieses Bild löschen?</p>
		<input class="button" type="submit" name="sent" value="Löschen" />
		<a class="button" href="galerie_manager.php" title="zurück">zurück</a>
	</form>
	
	
</body>
</html>