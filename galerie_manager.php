<?php
	session_start();
	require('src/auth.php');
	include('src/navi_red.php');
	$team = $_SESSION['team'];
	
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
	<h1><?php echo $_SESSION['team'].' // Galerie'; ?></h1> 
	<form name="galerie_manager" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	    
        <br />
		
		<?php
			echo make_navi_red("Galerie", $team);
        ?>
		<br /><br />
        <a class="button" href="add_pic.php" title="Neues Bild">Neues Bild</a>
		
        <br /> <br />
		
		<?php 
			$c1=0;
			$verzeichnis = 'bilder/teams/Galerie/1516/'.$team.'/';
			$handle = openDir($verzeichnis);
			$html = '<table><tr>';
			while ($datei = readDir($handle)) { 
				if ($datei != "." && $datei != ".." && !is_dir($datei)) {
					if (strstr($datei, ".jpeg") || strstr($datei, ".png") || strstr($datei, ".jpg") || strstr($datei, ".JPEG") || strstr($datei, ".PNG") || strstr($datei, ".JPG")) {
						$verzeichnis_datei = $verzeichnis . $datei; 
						$info = getImageSize($verzeichnis_datei);
						
						if($info[0]>=$info[1]) {
							$quot= $info[0]/200;
							$info[0]=200;
							$info[1]/=$quot;
						} else {
							$quot= $info[1]/200;
							$info[1]=200;
							$info[0]/=$quot;
						}
						$c1++;
						$html .= "<td class=\"galerie_table\"><a href=\"erase_pic.php?pic=$verzeichnis_datei\"><img src=\"bilder/teams/Thumbnails/1516/".$team."/TN".$datei."\"></a></td>";
						if ($c1>4) {
							$html .= '</tr><tr>';
							$c1=0;
						}
					} 
				} 
			} 
			$html .= '</tr></table>';
			closeDir($handle); // Verzeichnis schließen 
			echo $html;
		?>
	</form>
	<br />
	<b>Zum löschen einfach auf das Bild klicken</b>
</body>
</html>