<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Seniorenmannschaften - Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Seniorenmannschaften der Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3 hidden-xs" class="col-md-3">
			<?php echo make_subnavi(1, "", ""); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
		
			<h3 class="minibanner">Teams</h3>


			<div id="team-images" class="col-md-12">
				<div class="col-md-6">
					<div class="team-header">Damen 1</div>
					<a href="team.php?team=Damen%201"><img src="bilder/teams/Damen 1_320.jpg" alt="muster"></a>
					
				</div>
				<div class="col-md-6">

					<div class="team-header">Herren 1</div>
					<a href="team.php?team=Herren%201"><img src="bilder/teams/Herren 1_320.jpg" alt="muster"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Damen 2</div>
					<a href="team.php?team=Damen%202"><img src="bilder/teams/Damen 2_320.jpg" alt="muster"></a>
					
				</div>
				<div class="col-md-6">
					<div class="team-header">Herren 2</div>
					
					<a href="team.php?team=Herren%202"><img src="bilder/teams/Herren 2_320.jpg" alt="muster"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Damen 3</div>
					<a href="team.php?team=Damen%203"><img src="bilder/teams/Damen 3_320.jpg" alt="muster"></a>
					
				</div>
				<div class="col-md-6">

					<div class="team-header">Herren 3</div>
					<a href="team.php?team=Herren%203"><img src="bilder/teams/Herren 3_320.jpg" alt="muster"></a>
				</div>
				<div class="col-md-6">
					<div class="team-header">Damen 4</div>
					<a href="team.php?team=Damen%204"><img src="bilder/teams/Damen 4_320.jpg" alt="muster"></a>
					
				</div>
				<div class="col-md-6">

					<div class="team-header">Herren 4</div>
					<a href="team.php?team=Herren%204"><img src="bilder/teams/Herren 4_320.jpg" alt="muster"></a>
				</div>
			</div>
			
		</div>
		
	</div>
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>