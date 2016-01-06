<?php
	session_start();
	require('src/auth.php');
	include('src/navi_red.php');
	$team = $_SESSION['team'];
	
	if (isset( $_POST['submitbutton'] )) {
		$Erlaubte_Dateiendungen = array( "pdf", "PDF" );
		if ($_FILES['datei']['size'] > 0) {
			$UploadDateiEndung = array_pop( explode( ".", strtolower( $_FILES['datei']['name'] ) ) );
			if (!in_array( $UploadDateiEndung, $Erlaubte_Dateiendungen )) {
				die( "Die angeh&auml;ngte Datei hat eine nicht erlaubte Dateiendung!" );
			}
			$DateiNameNeu = "gesamtspielplan.pdf";
			$umask_alt = umask( 0 );
			if (@move_uploaded_file( $_FILES['datei']['tmp_name'], $DateiNameNeu )) {
				@chmod( $DateiNameNeu, 0755 );
				umask( $umask_alt );
			} else {
				umask( $umask_alt );
			}
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Handball-Dachau // Spielplan-Upload</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
    <link href="src/style_red.css" type="text/css" rel="stylesheet">
</head>

<body>
	<h1><?php echo $_SESSION['team'].' // Spielplan-Upload'; ?></h1> 
    <br />
	<?php
		echo make_navi_red("Neuer Spielplan", $team);
    ?>
	<br /><br />
	<form name="DateiUpload" id="DateiUpload" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<input type="file" name="datei" id="datei">
		<br /><br />
		<input class="button" type="submit" name="submitbutton" id="submitbutton" value="Datei hochladen">
	</form>
</body>
</html>