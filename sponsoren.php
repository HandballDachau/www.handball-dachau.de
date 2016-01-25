<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
		$sponsoren = $mysql->get_sponsoren($team);
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
	
		<?php echo make_navi(""); ?>
	
		<div id="hauptsponsoren">
			<?php 
				$a = array("Damen 1","Damen 2","Damen 3","Damen 4","Herren 1","Herren 2","Herren 3", "Herren 4");
				if($team == "Top News"){
					echo hauptsponsoren();
				} else if(in_array($team, $a) == 1) {
				echo make_subnavi(1, $team, "Sponsoren");
				} else {
				echo make_subnavi(0, $team, "Sponsoren");
				}
			?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner"> Sponsoren </h3>
		
			<div style="padding: 10px; font-size: large;">
				<?php
					$html= '';
					$c = 0;
					if (!empty($sponsoren)) {
						foreach ($sponsoren as $sponsor) {
							$html .= '<a href="' . $sponsor['link'] . '"><img style="margin: 1px; border: 1px solid black;" src="bilder/sponsoren/' . $sponsor['name'] . '.jpg"></a>';
							$c++;
							if ($c % 2 == 0) {
								$html .= '<br />';
							}
						}
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