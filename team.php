<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
		$user = get_user($team);
		$trainer = get_trainer($team);
		$spieler = get_spieler($team);
	}	else {
		header('Location: teams.php');
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">

    <link href="src/style.css" type="text/css" rel="stylesheet">
</head>


<body>

	<header>
	</header>
	
	<div id="main">
	
		<?php echo make_navi("Teams"); ?>
	
		<div id="hauptsponsoren">
			<?php echo make_subnavi(1, $team, ""); ?>
		</div>
		
		<div id="inhalt">
			<?php
				$html = '<h3 class="minibanner">'.$team.'</h3>'
					.'<div style="padding: 10px;">'
					.'<p style="text-align: center;"><img style="height: 400px;" src="bilder/teams/'.$team.'.jpg" alt='.$team.'></p>'
					.'<p style="text-align: left;"><b>Trainingszeiten:</b><br />'.$user['times'].'</p><p></p>';
				if($trainer!="leer") {
					$html .='<b>Trainer:</b><br />';
					foreach($trainer as $train) {
					$html .= ''.$train['name'].'<br />';
					}
					$html .= '<p></p>';
				}
				if($spieler!="leer") {
					$html .='<table class="ts-tabelle"><tr><td class="ts-haupt" colspan=3>Kader:</td></tr>'
						.'<tr class="ts-main"><td class="ts-nr">Nummer:</td>'
						.'<td class="ts-name">Name:</td>'
						.'<td class="ts-position">Position:</td></tr>';
					foreach($spieler as $spiel) {
					$html .= '<tr style="border-top: 4px solid black;">'
						.'<tr><td class="ts-nr">'.$spiel['nr'].'</td>'
						.'<td class="ts-name">'.$spiel['name'].'</td>'
						.'<td class="ts-position">'.$spiel['position'].'</td></tr>';
					}
					$html .= '</table>';
				}
				echo $html;
			?>
		</div>
		
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>