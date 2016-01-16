<?php
	//session_start();
	require('src/mysql.php');

	include("src/subnavi.php");
	if (isset($_GET['team'])) {
		$team = $_GET['team'];
		$user = $mysql->get_user($team);
		$trainer = $mysql->get_trainer($team);
	}	else {
		header('Location: jugend.php');
	}
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
			<?php echo make_subnavi(0, $team, ""); ?>
		</div>
		<div id="inhalt">
			<?php
				$html = '<h3 class="minibanner">'.$team.'</h3>'
					.'<div style="padding: 10px;">'
					.'<p style="text-align: center;"><img style="height: 400px;" src="bilder/teams/'.$team.'.jpg" alt='.$team.'></p>'
					.'<p style="text-align: center;"><img src="bilder/nanka.jpg" alt="Sport Nanka"></p>';
				if(isset($user['times'])) {
					$html .= '<p style="text-align: left;"><b>Trainingszeiten:</b><br />'.$user['times'].'</p><p></p>';
				}
				if($trainer!="leer") {
					$html .='<b>Trainer:</b>';
					foreach($trainer as $train) {
						$html .= '<br />'.$train['name'];
					}
				}
					
				if(file_exists('bilder/teams/'.$team.'_Kader.jpg')) {
					$html .= '<br /><br /><img style="width: 768px;" src="bilder/teams/'.$team.'_Kader.jpg"><br /><br />';
				}
				
				echo $html;
			?>
		</div>
		
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>