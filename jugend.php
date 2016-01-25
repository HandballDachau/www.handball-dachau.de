<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Jugendmannschaften - Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Jugendmannschaften der Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3 hidden-xs" class="col-md-3">
			<?php echo make_subnavi(0, "", ""); ?>
		</div>


		<div id="inhalt" class="col-md-9">
		
			<h3 class="minibanner">Jugend</h3>
			<p></p>
			<div id="team-images" class="col-md-12">
				<div class="col-md-6">
					<div class="team-header">Männliche A-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20A"><img src="bilder/teams/Männliche A_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Weibliche A-Jugend ASV/HCD</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20A"><img src="bilder/teams/Weibliche A_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Männliche B-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20B"><img src="bilder/teams/Männliche B_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Weibliche B-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20B"><img src="bilder/teams/Weibliche B_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Männliche C-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20C"><img src="bilder/teams/Männliche C_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Weibiche C-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20C"><img src="bilder/teams/Weibliche C_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Minis</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Minis"><img src="bilder/teams/Minis_300.jpg"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Männliche D-Jugend</div>
					<a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20D"><img src="bilder/teams/Männliche D_300.jpg"></a>
				</div>
			</div>
			<p></p>
			
		</div>
		
	</div>
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>