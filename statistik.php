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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
    <link href="src/style.css" type="text/css" rel="stylesheet">
</head>


<body>

	<header>
	</header>
	
	<div id="main">
	
		<?php echo make_navi(""); ?>
	
		<div id="hauptsponsoren">
			<?php echo make_subnavi(1, $team, "Statistik"); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner"> Statistik </h3>
			
			<?php 
				$dateiname = "statistik/Stat_".$team.".jpg";
				$dateiname_ewige = "statistik/Ewige_".$team.".pdf";
				if(file_exists($dateiname))
					echo '<img style="padding: 10px;" src="'.$dateiname.'" >';
				if(file_exists($dateiname_ewige))
				echo '<p style="padding: 10px;"><a href="'.$dateiname_ewige.'">Zur Ewigen Statistik</a></p>';
			?>
		</div>
	
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>