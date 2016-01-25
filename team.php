<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
		$user = $mysql->get_user($team);
		$trainer = $mysql->get_trainer($team);
		$spieler = $mysql->get_spieler($team);
	}	else {
		header('Location: teams.php');
	}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Mannschaft <?php echo $team; ?> - Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $team; ?> der Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3">
			<?php echo make_subnavi(1, $team, ""); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
			<?php
				$html = '<h3 class="minibanner">'.$team.'</h3>'
					.'<div style="padding: 10px;">'
					.'<p style="text-align: center;"><img class="full-width" src="bilder/teams/'.$team.'.jpg" alt='.$team.'></p>'
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
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>