<?php
	session_start();
	require_once('src/mysql.php');
	require('src/auth.php');
	
	$e = 0;
	if(!empty($_POST['titel'])){
		$titel = htmlspecialchars($_POST['titel']);
	}else{
		$e = 1;
		$titel = "";
	}
	if(!empty($_POST['text'])){
		$text = htmlspecialchars($_POST['text']);
	}else{
		$e = 2;
		$text = "";
	}
	$allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");

	$extension = '';
	if (!empty($_FILES["file"]["name"])) {
		$extension = end(explode(".", $_FILES["file"]["name"]));
	}

	if($extension!=''){
		if (in_array($extension, $allowedExts)){
			if($_FILES['file']['error'] > 0){
				$e = $_FILES['file']['error'];
			}
		}else{
			$e = 3;
		}
	}
	$gamedate = isset($_POST['gamedate']) ? $_POST['gamedate'] : '';
	if($e == 0 && isset($_POST['sent']) && $_POST['sent']=="Speichern"){
		if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])){
			$pp = 'bilder/teams/'.$_SESSION['team'].'/'.end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension; // HIER DATEINAME
			move_uploaded_file($_FILES['file']['tmp_name'], $pp);
		}else{
			$pp = '';
		}
		$mysql->add_bericht($titel, $text, $gamedate, $pp);
		header("Location: redakteur.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Neuer Bericht</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body style="font-weight: 800">
	<h1><?php echo $_SESSION['team'].' // Neuer Bericht'; ?></h1>
	<form name="bericht" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<p>Titel:<br />
		<input type="text" size="150" name="titel" value="<?php echo $titel; ?>" maxlength="150" /></p>
		<p>Spieldatum:<br />
		<input type="date" name="gamedate" /><label for="gamedate">(Nichts eintragen, falls Vorbericht oder nicht spielzugehörig)</label></p>
		<p>Text:<br />
		<textarea name="text" rows="25" cols="113"><?php echo $mysql->cleanHtml($text); ?></textarea></p>
		<p>Foto: (falls vorhanden)<br />
		<input type="file" name="file" id="file" size="50" maxlength="500000" accept="image/jpeg"><p>
		<input type="submit" class="button" name="sent" value="Speichern" />
		<a class="button" style ="font-weight: 500" href="redakteur.php" title="zurück">zurück</a>
		<label for="sent"><?php
			switch($e){
				case 1:
					echo "Der Titel fehlt.";
					break;
				case 2:
					echo "Der Bericht fehlt.";
					break;
			}	?></label>
	</form>
	<p></p>
	<p>Vorbericht Titel Beispiel: "Vorbericht ASV:TSV Schleißheim 22.4.13"</p>
</body>
</html>