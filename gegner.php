<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
	}	else {
		header('Location: teams.php');
	}
	$gegners = get_gegner($team);
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
	
		<?php echo make_navi(""); ?>
	
		<div id="hauptsponsoren">
			<?php echo make_subnavi(1, $team, "Gegner"); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner"> Gegner </h3>
		
			<div style="padding: 10px;">
				<?php 
					$html = '';
					foreach($gegners as $gegner) {
						$html .= '<a href = "'.$gegner[link].'" target="blank"><img class="gegner" src="bilder/logos/'.$gegner[logo].'.jpg">';
					}
					echo $html;
				?>
			</div>
		</div>
	
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>