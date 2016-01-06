<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/subnavi.php");
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
	
		<?php echo make_navi("Teams"); ?>
	
		<div id="hauptsponsoren">
			<?php echo make_subnavi(1, "", ""); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner">Teams</h3>
			<p></p>
			<table class="teamtabelle">
				<tr>
					<td>Damen 1</td>
					<td style="width: 50px;"></td>
					<td>Herren 1</td>
				</tr><tr>
					<td><a href="team.php?team=Damen%201"><img src="bilder/teams/Damen 1_320.jpg" alt="muster"></a></td>
					<td></td>
					<td><a href="team.php?team=Herren%201"><img src="bilder/teams/Herren 1_320.jpg" alt="muster"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Damen 2</td>
					<td></td>
					<td>Herren 2</td>
				</tr><tr>
					<td><a href="team.php?team=Damen%202"><img src="bilder/teams/Damen 2_320.jpg" alt="muster"></a></td>
					<td></td>
					<td><a href="team.php?team=Herren%202"><img src="bilder/teams/Herren 2_320.jpg" alt="muster"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Damen 3</td>
					<td></td>
					<td>Herren 3</td>
				</tr><tr>
					<td><a href="team.php?team=Damen%203"><img src="bilder/teams/Damen 3_320.jpg" alt="muster"></a></td>
					<td></td>
					<td><a href="team.php?team=Herren%203"><img src="bilder/teams/Herren 3_320.jpg" alt="muster"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Damen 4</td>
					<td></td>
					<td>Herren 4</td>
				</tr><tr>
					<td><a href="team.php?team=Damen%204"><img src="bilder/teams/Damen 4_320.jpg" alt="muster"></a></td>
					<td></td>
					<td><a href="team.php?team=Herren%204"><img src="bilder/teams/Herren 4_320.jpg" alt="muster"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
				</tr>
			</table>
			<p></p>
			
		</div>
		
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>