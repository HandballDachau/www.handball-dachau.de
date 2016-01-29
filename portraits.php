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
    <title>Handball Dachau</title>

    <meta name="description" content="Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3" class="col-md-3">
			<?php echo make_subnavi(1, $team, "Portraits"); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
			<?php
				$html = '<h3 class="minibanner">Portraits</h3>'
					.'<div style="padding: 10px;">';
					
				
				if(file_exists('bilder/teams/'.$team.'_Kader.jpg')) {
					$html .= '<img style="width: 768px;" src="bilder/teams/'.$team.'_Kader.jpg"><br /><br />';
				}
					
				if($trainer!="leer") {
					$html .='<table class="ts-tabelle"><tr><td class="ts-haupt" colspan=3>Trainer:</td></tr>';
					foreach($trainer as $train) {
					$html .= '<tr style="border-top: 4px solid black;"><td class="ts-bild"rowspan=6><a href="bilder/trainer/'.$train['pic'].'"><img style="height: 200px;" src="bilder/trainer/'.$train['pic'].'"></a></td>'
						.'<td class="ts-neben">Name:</td><td class="ts-inhalt">'.$train['name'].'</td></tr>'
						.'<tr><td class="ts-neben">Geburtsjahr:</td><td class="ts-inhalt">'.$train['birthday'].'</td></tr>'
						.'<tr><td class="ts-neben">Bisherige Vereine:</td><td class="ts-inhalt">'.$train['so_far'].'</td></tr>'
						.'<tr><td class="ts-neben">Saisonziel:</td><td class="ts-inhalt">'.$train['goals'].'</td></tr>'
						.'<tr><td class="ts-neben">Bisherige Erfolge:</td><td class="ts-inhalt">'.$train['trophy'].'</td></tr>'
						.'<tr><td class="ts-neben">Hobbies:</td><td class="ts-inhalt">'.$train['hobbies'].'</td></tr>';
					}
					$html .= '</table><p></p>';
				}
				if($spieler!="leer") {
					$html .='<table class="ts-tabelle"><tr><td class="ts-haupt" colspan=3>Spieler:</td></tr>';
					foreach($spieler as $spiel) {
					$html .= '<tr style="border-top: 4px solid black;"><td class="ts-bild"rowspan=7><a href="bilder/spieler/'.$spiel['pic'].'"><img style="height: 200px;" src="bilder/spieler/'.$spiel['pic'].'"></a></td>'
						.'<td class="ts-neben">Name:</td><td class="ts-inhalt">'.$spiel['name'].'</td></tr>'
						.'<tr><td class="ts-neben">Position:</td><td class="ts-inhalt">'.$spiel['position'].'</td></tr>'
						.'<tr><td class="ts-neben">Geburtstag:</td><td class="ts-inhalt">'.$spiel['birthday'].'</td></tr>'
						.'<tr><td class="ts-neben">Bisherige Vereine:</td><td class="ts-inhalt">'.$spiel['so_far'].'</td></tr>'
						.'<tr><td class="ts-neben">Saisonziel:</td><td class="ts-inhalt">'.$spiel['goals'].'</td></tr>'
						.'<tr><td class="ts-neben">Bisherige Erfolge:</td><td class="ts-inhalt">'.$spiel['trophy'].'</td></tr>'
						.'<tr><td class="ts-neben">Hobbies:</td><td class="ts-inhalt">'.$spiel['hobby'].'</td></tr>';
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