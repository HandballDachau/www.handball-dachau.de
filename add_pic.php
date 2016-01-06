<?php
	session_start();
	error_reporting(-1);
	require_once('src/mysql.php');
	require('src/auth.php');
	
	$team = $_SESSION['team'];
	
	$allowedExts = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
	$extension = end(explode(".", $_FILES["file"]["name"]));
	if($extension!=''){
		if (in_array($extension, $allowedExts)){
			if($_FILES['file']['error'] > 0){
				$e = $_FILES['file']['error'];
			}
		} else {
			$e=1;
		}
	}
	if($e == 0 && isset($_POST['sent']) && $_POST['sent']=="Hochladen"){
		if(file_exists($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])){
			$pp = 'bilder/teams/Galerie/1516/'.$team.'/'.end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension; // HIER DATEINAME
			move_uploaded_file($_FILES['file']['tmp_name'], $pp);
			
			$pfadAlt= 'bilder/teams/Galerie/1516/'.$team.'/';
			$pfadNeu= 'bilder/teams/Thumbnails/1516/'.$team.'/';
			$bild= end(explode("/", $_FILES['file']['tmp_name'])).'.'.$extension;

			$size=getimagesize($pfadAlt.$bild); 
			$breite=$size[0]; 
			$hoehe=$size[1]; 
			
			if($hoehe>=$breite) {
				$quot=$breite/200;
				$neueBreite=200;
				$neueHoehe=$hoehe/$quot;
				$cutB=0;
				$cutH=($neueHoehe-$neueBreite)/2;
			} else {
				$quot=$hoehe/200;
				$neueHoehe=200;
				$neueBreite=$breite/$quot;
				$cutB=($neueBreite-$neueHoehe)/2;
				$cutH=0;
				
			}

			if($size[2]==2) { 
				// JPG 
				$altesBild=imagecreatefromjpeg($pfadAlt.$bild);
				$zwischenBild=imagecreatetruecolor($neueBreite,$neueHoehe);
				$neuesBild=imagecreatetruecolor(200,200);
				imagecopyresampled($zwischenBild,$altesBild,0,0,0,0,$neueBreite,$neueHoehe,$breite,$hoehe);
				imagecopy($neuesBild,$zwischenBild,0,0,$cutB,$cutH,200,200);
				imagejpeg($neuesBild,$pfadNeu."TN".$bild);
			} 

			if($size[2]==3) { 
				// PNG 
				$altesBild=imagecreatefrompng($pfadAlt.$bild); 
				$neuesBild=imagecreatetruecolor($neueBreite,$neueHoehe); 
				imagecopyresampled($neuesBild,$altesBild,0,0,0,0,$neueBreite,$neueHoehe,$breite,$hoehe);
				imagepng($neuesBild,$pfadNeu."TN".$bild); 
			} 
			
		}else{
			$pp = '';
		}
		header("Location: galerie_manager.php");
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bilder-Upload</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

    

<body style="font-weight: 800">
	<h1><?php echo $_SESSION['team'].' // Neues Bild'; ?></h1>
	<form name="bild" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
		<p>Foto: (falls vorhanden)<br />
		<input type="file" name="file" id="file" size="50" maxlength="500000" accept="image/jpeg"><p>
		<input type="submit" class="button" name="sent" value="Hochladen" />
		<a class="button" href="galerie_manager.php" title="zurück">zurück</a>
	</form>
</body>
</html>