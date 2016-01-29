<?php
	//session_start();
	require('src/mysql.php');

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

    <meta name="description" content="Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3" class="col-md-3">
			<?php echo make_subnavi(1, $team, "Statistik"); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
		
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
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>