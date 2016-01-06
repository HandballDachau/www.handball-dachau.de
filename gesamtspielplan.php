<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/hauptsponsoren.php");
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
	
		<?php echo make_navi("Spielplan"); ?>
	
		<div id="hauptsponsoren">
			<?php echo hauptsponsoren(); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner"> Spielplan </h3>
		
			<div style="padding: 10px; font-size: large;">
				<a href="gesamtspielplan.pdf" target_blank>Zum Spielplan</a>
				
			<br /><br />
			Bei Bedarf per Rechtsklick "Ziel Speichern unter"
			</div>
		</div>
	
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>