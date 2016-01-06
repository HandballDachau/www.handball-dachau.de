<?php
	session_start();
	require('src/mysql.php');
	require('src/auth.php');
	
	if (isset($_GET['id'])) {
		if(!ist_bericht($_GET['id'])){
			header('Location: redakteur.php');
		}	else {
			$bericht = get_bericht($_GET['id']); 
		}
	}	else {
		header('Location: redakteur.php');
	}
	
	$e = 0;
	if(isset($_POST['titel'])){
		if($_POST['titel']!=""){
			$titel = $_POST['titel'];
		}else{
			$e = 1;
			$titel = "";
		}
	}else{
		$titel = $bericht['titel'];
	}
	if(isset($_POST['text'])){
		if($_POST['text']!=""){
			$text = $_POST['text'];
		}else{
			$e = 2;
			$text = "";
		}
	}else{
		$text = $bericht['text'];
	}
	$allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if($extension!=''){
		if (in_array($extension, $allowedExts)){
			if($_FILES['file']['error'] > 0){
				$e = $_FILES['file']['error'];
			}
		}else{
			$e = 3;
		}
	}
	if(isset($_POST['gamedate'])){
		if($_POST['gamedate']!=""){
			$gamedate = $_POST['gamedate'];
		}else{
			$gamedate = "";
		}
	}else{
		$gamedate = $bericht['gamedate'];
	}
	if($e == 0 && isset($_POST['sent']) && $_POST['sent']=="aendern"){
		if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])){
			$pp = 'bilder/teams/'.$_SESSION['team'].'/'.end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension; // HIER DATEINAME
			move_uploaded_file($_FILES['file']['tmp_name'], $pp);
		}else{
			$pp = $bericht['pic'];
		}
		if(edit_bericht($_POST['id'], $titel, $text, $gamedate, $pp)){
			header('Location: redakteur.php');
		}else{
			print_r(mysql_error());
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball-Dachau // Redakteur // Bericht &Auml;ndern</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body style="font-weight: 800">
	<h1>Bericht ändern</h1>
	<form name="bericht" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
		<p>Titel:<br />
		<input type="text" size="150" value="<?php echo $titel; ?>" name="titel" maxlength="150" /></p>
		<p>Spieldatum:<br />
		<input type="date" value="<?php echo $gamedate; ?>" name="gamedate" /><label for="gamedate">(Nichts eintragen, falls Vorbericht oder nicht spielzugehörig)</label></p>
		<p>Text:<br />
		<textarea name="text" rows="25" cols="113"><?php echo br2nl($text); ?></textarea></p>
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
		<p>Bild: (falls vorhanden)<br />
		<img src="<?php echo $bericht['pic']; ?>" width="100px" /><input type="file" name="file" id="file" size="50" maxlength="1048576" accept="image/jpeg"></p>
		<input class="button" type="submit" name="sent" value="aendern" />
		<a class="button" href="redakteur.php" title="zurück">zurück</a>
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
</body>
</html>