<?php	//session_start();	require('src/mysql.php');	include("src/hauptsponsoren.php");	$sponsoren = $mysql->get_sponsoren("alle");?><!DOCTYPE html><html><head>    <title>Handball Dachau</title>    <meta name="description" content="Handballer des ASV Dachau">	<?php include('src/head.php'); ?></head><body>	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>	</header>		<div id="main">		<?php include("src/navi.php"); ?>		<div id="hauptsponsoren" class="col-md-3 hidden-xs" class="col-md-3">			<?php echo hauptsponsoren(); ?>		</div>				<div id="inhalt" class="col-md-9">					<h3 class="minibanner"> Ewige Sponsorenliste </h3>					<div style="padding: 10px; font-size: large;">				<?php					$html= '';					$c = 0;					foreach($sponsoren as $sponsor) {						$html .= '<a href="'.$sponsor['link'].'"><img style="margin: 1px; border: 1px solid black;" src="bilder/sponsoren/'.$sponsor['name'].'.jpg"></a>';						$c++;						if ($c%2==0) {							$html .= '<br />';						}					}					echo $html;				?>			</div>		</div>		</div>		<footer class="col-md-12">		<a href="impressum.php">Impressum</a>	</footer>	</div></body></html>