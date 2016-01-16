<?php	//session_start();	require('src/mysql.php');	include("src/subnavi.php");	if (isset($_GET['team'])) {		$team = $_GET['team'];	}	else {		header('Location: teams.php');	}	$user = $mysql->get_user($team);?><!DOCTYPE html><html><head>    <title>Handball Dachau</title>    <meta charset="UTF-8">    <meta name="description" content="Handballer des ASV Dachau">	<?php include('src/head.php'); ?>	<link rel="stylesheet" type="text/css" href="http://handball-sr-mittelfranken.de/tabellen/tabellen.css">	<script src="http://handball-sr-mittelfranken.de/tabellen/jquery.js" type="text/javascript"></script>	<script src="http://handball-sr-mittelfranken.de/tabellen/tabellen.js" type="text/javascript"></script></head><body>	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>	</header>		<div id="main">		<?php include("src/navi.php"); ?>		<div id="hauptsponsoren" class="col-md-3" class="col-md-3">			<?php 				$a = array("Damen 1","Damen 2","Damen 3","Damen 4","Herren 1","Herren 2","Herren 3", "Herren 4");				if($team == "Top News"){					echo werbung();				} else if(in_array($team, $a) == 1) {				echo make_subnavi(1, $team, "Spielplan");				} else {				echo make_subnavi(0, $team, "Spielplan");				}			?>		</div>				<div id="inhalt" class="col-md-9">					<h3 class="minibanner"> Spielplan </h3>			<p></p>			<div style="padding: 10px;">				<?php					$html = '<div class="srsPlan" srsURL="'.$user['spielplan'].'" srsVerein="ASV Dachau" srsTabellenKopf="Spieldatum;Zeit;Heim;Gast;Ergebnis" srsTabellenSpalten="Spieldatum/^..(..).(..).(..).*/$3.$2.$1;Spieldatum/.*T(..:..).*/$1;HeimTeam_Name_kurz;GastTeam_Name_kurz;Heim+%:+Gast" srsTabellenFormat="c;c;l;l;c"></div>';					$html .= '<br /><br /><a href="'.$user['spielplan'].'" target="_blank">Weiterleitung zu NuLiga</a>';					echo $html;				?>			</div>						<?php // ?>		</div>		</div>		<footer class="col-md-12">		<a href="impressum.php">Impressum</a>	</footer>	</div></body></html>