<?php
	session_start();
	require('src/mysql.php');
	require('src/auth.php');
	
	if (isset($_GET['id'])) {
		if(!$mysql->ist_spieler($_GET['id'])){
			header('Location: verwaltung.php');
		}	else {
			$spieler = $mysql->get_spieler1($_GET['id']);
		}
	}	else {
		header('Location: verwaltung.php');
	}
	
	$e = 0;
	if(isset($_POST['name'])){
		if($_POST['name']!=""){
			$name = $_POST['name'];
		}else{
			$e = 1;
			$name = "";
		}
	}else{
		$name = $spieler['name'];
	}
	
	if(isset($_POST['nr'])){
		if($_POST['nr']!=""){
			$nr = $_POST['nr'];
		}else{
			$nr = "";
		}
	}else{
		$nr = $spieler['nr'];
	}
	
	if(isset($_POST['jahr'])){
		if($_POST['jahr']!=""){
			$jahr = $_POST['jahr'];
		}else{
			$jahr = "";
		}
	}else{
		$jahr = $spieler['birthday'];
	}
	
	if(isset($_POST['trophy'])){
		if($_POST['trophy']!=""){
			$trophy = $_POST['trophy'];
		}else{
			$trophy = "";
		}
	}else{
		$trophy = $spieler['trophy'];
	}
	
	if(isset($_POST['goals'])){
		if($_POST['goals']!=""){
			$goals = $_POST['goals'];
		}else{
			$goals = "";
		}
	}else{
		$goals = $spieler['goals'];
	}
	
	if(isset($_POST['so_far'])){
		if($_POST['so_far']!=""){
			$so_far = $_POST['so_far'];
		}else{
			$so_far = "";
		}
	}else{
		$so_far = $spieler['so_far'];
	}
	
	if(isset($_POST['hobbies'])){
		if($_POST['hobbies']!=""){
			$hobbies = $_POST['hobbies'];
		}else{
			$hobbies = "";
		}
	}else{
		$hobbies = $spieler['hobby'];
	}
	
	if(isset($_POST['position'])){
		if($_POST['position']!=""){
			$position = $_POST['position'];
		}else{
			$position = "";
		}
	}else{
		$position = $spieler['position'];
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
	if($e == 0 && isset($_POST['sent']) && $_POST['sent']=="aendern"){
		if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])){
			$pp = end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension; // HIER DATEINAME
			move_uploaded_file($_FILES['file']['tmp_name'], 'bilder/spieler/'.$pp);
		}else{
			$pp = $spieler['pic'];
		}
		if($mysql->edit_spieler($_GET['id'], $name, $nr, $jahr, $trophy, $goals, $position, $so_far, $hobbies, $pp)){
			header('Location: verwaltung.php');
		}else{
			print_r(mysqli_error($mysql->getConnection()));
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball-Dachau // Redakteur // Spieler &Auml;ndern</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body style="font-weight: 800">
	<h1>Spieler ändern</h1>
	<form name="spieler" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
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
		<input class="button" type="submit" name="sent" value="aendern" />
		<a class="button" href="verwaltung.php" title="zurück">zurück</a>
		<label for="sent"><?php
			switch($e){
				case 1:
					echo "Der Name fehlt.";
					break;
			}	?></label>
	</form>
</body>
</html>