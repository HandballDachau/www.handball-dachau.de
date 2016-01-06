<?php
	session_start();
	require_once('src/mysql.php');
	require('src/auth.php');
	
	$e = 0;
	if($_POST['name']!=""){
		$name = htmlspecialchars($_POST['name']);
	}else{
		$e = 1;
		$name = "";
	}
	$allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if($extension!=''){
		if (in_array($extension, $allowedExts)){
			if($_FILES['file']['error'] > 0){
				$e = $_FILES['file']['error'];
			}
		}else{
			$e = 2;
		}
	}
	
	$nr = isset($_POST['nr']) ? $_POST['nr'] : '';
	$jahr = isset($_POST['jahr']) ? $_POST['jahr'] : '';
	$position = isset($_POST['position']) ? $_POST['position'] : '';
	$trophy = isset($_POST['trophy']) ? $_POST['trophy'] : '';
	$so_far = isset($_POST['so_far']) ? $_POST['so_far'] : '';
	$goals = isset($_POST['goals']) ? $_POST['goals'] : '';
	$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : '';
	
	if($e == 0 && isset($_POST['sent']) && $_POST['sent']=="Speichern"){
		if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])){
			$pp = end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension; // HIER DATEINAME
			move_uploaded_file($_FILES['file']['tmp_name'], 'bilder/spieler/'.$pp);
		}else{
			$pp = 'noname.jpg';
		}
		$mysql->add_spieler($name, $nr, $jahr, $position, $so_far, $trophy, $goals, $hobbies, $pp);
		header("Location: verwaltung.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Neuer Spieler</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body style="font-weight: 800">
	<h1><?php echo $_SESSION['team'].' // Neuer Spieler'; ?></h1>
	<form name="spieler" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<p>Name:<br />
		<input type="text" size="150" name="name" value="<?php echo $name; ?>" maxlength="150" /></p>
		<p>Nummer:<br />
		<input type="text" size="150" name="nr" value="<?php echo $nr; ?>" maxlength="2" /></p>
		<p>Geburtsjahr:<br />
		<input type="text" size="150" name="jahr" value="<?php echo $jahr; ?>" maxlength="4" /></p>
		<p>Position: (getrennt durch " / ")<br />
		<input type="text" size="150" name="position" value="<?php echo $position; ?>" maxlength="300" /></p>
		<p>Bisherige Vereine:<br />
		<input type="text" size="150" name="so_far" value="<?php echo $so_far; ?>" maxlength="300" /></p>
		<p>Bisherige Erfolge:<br />
		<input type="text" size="150" name="trophy" value="<?php echo $trophy; ?>" maxlength="300" /></p>
		<p>Saisonziele:<br />
		<input type="text" size="150" name="goals" value="<?php echo $goals; ?>" maxlength="300" /></p>
		<p>Hobbies:<br />
		<input type="text" size="150" name="hobbies" value="<?php echo $hobbies; ?>" maxlength="300" /></p>
		<p>Foto: (falls vorhanden)<br />
		<input type="file" name="file" id="file" size="50" maxlength="500000" accept="image/jpeg"><p>
		<input type="submit" class="button" name="sent" value="Speichern" />
		<a class="button" href="verwaltung.php" title="zurück">zurück</a>
		<label for="sent"><?php
			switch($e){
				case 1:
					echo "Der Name fehlt.";
					break;
			}	?></label>
	</form>
	<p></p>
</body>
</html>