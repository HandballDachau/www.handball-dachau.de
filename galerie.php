<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/hauptsponsoren.php");
	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
	}	else {
		header('Location: teams.php');
	}
	if (isset($_GET['saison'])) {
		$saison = $_GET['saison'];
	} else {
		$saison = "1516";
	}
		
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
	<script src="src/jquery-1.10.2.min.js"></script>
	<script src="src/lightbox-2.6.min.js"></script>

	<link href="src/lightbox.css" rel="stylesheet" />
</head>


<body>

	<header>
	</header>
	
	<div id="main">
	
		<div id="hauptsponsoren">
			<?php 
				$a = array("Damen 1","Damen 2","Damen 3","Damen 4","Herren 1","Herren 2","Herren 3", "Herren 4");
				if($team == "Top News"){
					echo hauptsponsoren();
				} else if(in_array($team, $a) == 1) {
				echo make_subnavi(1, $team, "Galerie");
				} else {
				echo make_subnavi(0, $team, "Galerie");
				}
			?>
		</div>
		
		<div id="inhalt">
			<h3 class="minibanner"> Galerie </h3>
			<div>
				<table class="navi2"><tr>
					<?php
						switch($saison) {
						case 1314:
							echo "<td class=\"saisonbutton_active\"><a href=\"galerie.php?team=".$team."&saison=1314\">Saison 2013/2014</a></td>";
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1415\">Saison 2014/2015</a></td>";
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1516\">Saison 2015/2016</a></td>";
							break;
						case 1415:
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1314\">Saison 2013/2014</a></td>";
							echo "<td class=\"saisonbutton_active\"><a href=\"galerie.php?team=".$team."&saison=1415\">Saison 2014/2015</a></td>";
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1516\">Saison 2015/2016</a></td>";
							break;
						case 1516:
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1314\">Saison 2013/2014</a></td>";
							echo "<td class=\"saisonbutton\"><a href=\"galerie.php?team=".$team."&saison=1415\">Saison 2014/2015</a></td>";
							echo "<td class=\"saisonbutton_active\"><a href=\"galerie.php?team=".$team."&saison=1516\">Saison 2015/2016</a></td>";
							break;
						}
						
					?>
				</tr></table>
			</div>
			<div>
				<table class="galerie-table"><tr>
					<?php 
						$c1=0;
						$verzeichnis = 'bilder/teams/Galerie/'.$saison.'/'.$team.'/';
						$handle = openDir($verzeichnis); // Verzeichnis öffnen
						$html = '<table style="padding-left: 10px;"><tr>';
						while ($datei = readDir($handle)) { 
							if ($datei != "." && $datei != ".." && !is_dir($datei)) {
								if (strstr($datei, ".jpeg") || strstr($datei, ".png") || strstr($datei, ".jpg") || strstr($datei, ".JPEG") || strstr($datei, ".PNG") || strstr($datei, ".JPG")) {
									$verzeichnis_datei = $verzeichnis . $datei; 
									$c1++;
									$html .= "<td><a href=\"$verzeichnis_datei\" data-lightbox=\"Team\"><img  class=\"galerie_table\" src=\"bilder/teams/Thumbnails/".$saison."/".$team."/TN".$datei."\" width=180;></a></td>";
									if ($c1>3) {
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
				</tr></table>
			</div>
		</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>