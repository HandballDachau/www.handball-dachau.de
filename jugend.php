<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
	<?php include('src/head.php'); ?>
</head>


<body>

	<header>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren">
			<?php echo make_subnavi(0, "", ""); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner">Jugend</h3>
			<p></p>
			<table class="teamtabelle">
				<tr>
					<td>Männliche A-Jugend</td>
					<td style="width: 50px;"></td>
					<td>Weibliche A-Jugend ASV/HCD</td>
				</tr><tr>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20A"><img src="bilder/teams/Männliche A_300.jpg"></a></td>
					<td></td>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20A"><img src="bilder/teams/Weibliche A_300.jpg"></a></td>
					</tr><tr style="height: 30px;"></tr><tr>
					<td>Männliche B-Jugend</td>
					<td></td>
					<td>Weibliche B-Jugend</td>
				</tr><tr>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20B"><img src="bilder/teams/Männliche B_300.jpg"></a></td>
					<td></td>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20B"><img src="bilder/teams/Weibliche B_300.jpg"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Männliche C-Jugend</td>
					<td></td>
					<td>Weibiche C-Jugend</td>
				</tr><tr>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20C"><img src="bilder/teams/Männliche C_300.jpg"></a></td>
					<td></td>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Weibliche%20C"><img src="bilder/teams/Weibliche C_300.jpg"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Männliche D-Jugend</td>
					<td></td>
					<td>Minis</td>
				</tr><tr>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20D"><img src="bilder/teams/Männliche D_300.jpg"></a></td>
					<td></td>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Minis"><img src="bilder/teams/Minis_300.jpg"></a></td>
				</tr><tr style="height: 30px;"></tr><tr>
					<td>Männliche E-Jugend</td>
				</tr><tr>
					<td><a href="http://handball-dachau.de/jugendteam.php?team=Männliche%20E"><img src="bilder/teams/Männliche E_300.jpg"></a></td>
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