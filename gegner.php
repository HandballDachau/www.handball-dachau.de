<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
	}	else {
		header('Location: teams.php');
	}
	$gegners = $mysql->get_gegner($team);
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
			<?php echo make_subnavi(1, $team, "Gegner"); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
		
			<h3 class="minibanner"> Gegner </h3>
		
			<div style="padding: 10px;">
				<?php 
					$html = '';
					foreach($gegners as $gegner) {
						$html .= '<a href = "'.$gegner['link'].'" target="blank"><img class="gegner" src="bilder/logos/'.$gegner['logo'].'.jpg">';
					}
					echo $html;
				?>
			</div>
		</div>
	
	</div>
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>