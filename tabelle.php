<?php	//session_start();	require('src/mysql.php');	include("src/navi.php");	include("src/subnavi.php");	if (isset($_GET['team'])) {		$team = $_GET['team'];	}	else {		header('Location: teams.php');	}	$user = get_user($team);?><!DOCTYPE html><html><head>    <title>Handball Dachau</title>    <meta charset="UTF-8">    <meta name="description" content="Handballer des ASV Dachau">    <link href="src/style.css" type="text/css" rel="stylesheet">	<script src="src/jquery.js" type="text/javascript"></script>	<script src="src/tabellen.js" type="text/javascript"></script></head><body>	<header>	</header>		<div id="main">			<?php echo make_navi(""); ?>			<div id="hauptsponsoren">			<?php 				$a = array("Damen 1","Damen 2","Damen 3","Damen 4","Herren 1","Herren 2","Herren 3", "Herren 4");				if($team == "Top News"){					echo werbung();				} else if(in_array($team, $a) == 1) {				echo make_subnavi(1, $team, "Tabelle");				} else {				echo make_subnavi(0, $team, "Tabelle");				}			?>		</div>				<div id="inhalt">					<h3 class="minibanner"> Tabelle </h3>			<p></p>			<div style="padding: 10px;">				<?php					$html = '<div class="srsTab" srsURL="'.$user['spielplan'].'" srsVerein="ASV Dachau" srsKeineAK="1"></div><br />';					echo $html;				?>			</div>						<?php // ?>		</div>		</div>		<footer>		<a href="impressum.php">Impressum</a>	</footer>	</body></html>