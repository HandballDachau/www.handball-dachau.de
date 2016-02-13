<?php
//session_start();
require('src/mysql.php');
include("src/hauptsponsoren.php");
$top = $mysql->get_berichte('Top News', '7');
$teamsKids = array('Weibliche A', 'Männliche A', 'Weibliche B', 'Männliche B', 'Weibliche C', 'Männliche C', 'Männliche D', 'Männliche E', 'Minis');
$teamsAdults = array("Damen 1", "Herren 1", "Damen 2", "Herren 2", "Damen 3", "Herren 3", "Damen 4", "Herren 4");
$liga = array('Bayernliga','Landesliga','Bezirksoberliga','Bezirksliga','Bezirksliga','Bezirksklasse','Bezirksklasse','Bezirksklasse');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Handball Dachau</title>

	<meta name="description" content="Webseite der Handballabteilung des ASV Dachau e.V. Finde Berichte und Aktuelles rund um den Handball in Dachau.">

	<?php include('src/head.php'); ?>

	<script>
		var bericht_id = 0;
		$(document).ready(function(){
			fill_preview();
			setInterval(fill_preview, 8000);
		});

		function fill_preview(){
			var preview_team = $('#newest_team_'+bericht_id).html();
			var preview_titel = $('#newest_titel_'+bericht_id).html();
			var preview_pic = $('#newest_pic_'+bericht_id).html();
			var preview_text= $('#newest_text_'+bericht_id).html().substr(0,200)+"...";
			$("#preview_team").html(preview_team);
			$("#preview_titel").html(preview_titel);
			$("#preview_gamedate").html(preview_team);
			$("#preview_text").html(preview_text);
			if(preview_pic != ''){
				$("#preview").css('backgroundImage', 'url("'+preview_pic+'")');
			} else {
				$("#preview").css('backgroundImage', 'url(bilder/teams/'+bericht_id+'.jpg)');
			}
			bericht_id++;
			if(bericht_id >= 8){
				bericht_id = 0;
			}
		}
	</script>
</head>

<body>

<div class="container">
	<header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>

	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3 hidden-xs">
			<?php echo hauptsponsoren(); ?>
		</div>

		<div id="inhalt" class="col-md-9">

			<div class="col-md-12 text">

				<strong>Liebe Handballfreunde</strong>, <br /><br />
				<a href="bilder/events/lohi-turnier-2016-big.png" class="pull-right thumbnail" target="_blank" title="1. Lohi Handball Spielfest">
					<img src="bilder/events/lohi-turnier-2016-thumb.png" class="thumb" alt="1. Lohi Handball Spielfest" />
				</a>
				wir laden Euch herzlich zu unserem Handballspielfest am <strong>Samstag den 12.06.2016</strong> ein.<br />
				Das Turnier wird gemeinsam vom ASV Dachau, dem TuS Fürstenfeldbruck und dem HCD Gröbenzell organisiert. Die Lohnsteuerhilfe Bayern e.V. unterstützt das Turnier freundlicherweise als Sponsor.
				Die Spiele der Minis und Bambinis werden von 10:00 – 14:00 Uhr und die der E-Jugend von 14:00 – 18:00 Uhr in der Halle ausgetragen. Das heißt das Turnier findet bei jedem Wetter statt.
				Zwischen den Spielen ist für ein abwechslungsreiches Rahmenprogramm gesorgt. Die Teilnahmegebühr beträgt 10 € pro Mannschaft.<br />
				Die Anmeldung ist bis zum 15.4.2016 über <a href="mailto:anmeldung@handball-spielfest.de">anmeldung@handball-spielfest.de</a> möglich. Bitte gebt dabei an mit welcher Mannschaft Ihr kommt.
				<br />
				<a href="bilder/events/lohi-turnier-2016-big.png" target="_blank" title="1. Lohi Handball Spielfest">
					Flyer
				</a> |
				<a href="docs/lohi-turnier-2016-Anmeldebogen.pdf" target="_blank" title="1. Lohi Handball Spielfest">
					Anmeldeschreiben
				</a>
				<hr />
			</div>

			<?php //echo '<img src="bilder/hinweis.jpg" style="margin-top:5px; border: 2px solid black; width: 786px;">';?>
			<?php //echo '<img src="bilder/banner.jpg" style="margin-top:2px; border: 2px solid black; width: 786px;">';?>

			<div class="col-md-6">

				<div id="preview">
					<div id="preview_content">
						<p id="preview_team"></p>
						<p id="preview_titel"></p>
						<p id="preview_text"></p>
					</div>
				</div>

			</div>

			<div class="col-md-6">

				<div>

					<table class="table table-striped">
						<?php foreach ($teamsAdults as $index => $team) {
							$bericht = $mysql->get_newest($team);
						?>
						<tr>
							<td>

								<strong><a id="newest_team_<?php echo $index; ?>" href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['team'] . ' ' . $liga[$index] . (!empty($bericht['gamedate']) ? ' (' . $bericht['gamedate'] . ')' : ''); ?></a></strong>
								<a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['titel']; ?></a>
								<div style="display: none;">
									<div id="newest_titel_<?php echo $index; ?>"<span id="newest_titel_<?php echo $index; ?>"><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['titel']; ?></a><span></span></div><span id="newest_pic_<?php echo $index; ?>"><?php echo $bericht['pic']; ?></span><span id="newest_text_<?php echo $index; ?>"><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['text']; ?></a></span>
								</div>

							</td>
						</tr>
						<?php } ?>
					</table>
				</div>

			</div>

		<div class="col-md-8">
			<h3 class="minibanner"> Top News </h3>
			<table class="table table-hover">
				<?php foreach ($top as $bericht) { ?>
					<tr>
						<td>

							<strong><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['titel']; ?></a></strong>
							<a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo mb_substr($bericht['text'], 0, 70) . '...'; ?></a>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td>
						<a href="berichte.php?team=Top News">Archiv</a>
					</td>
				</tr>
			</table>
		</div>

		<div class="col-md-4">
			<h3 class="minibanner"> Jugendberichte </h3>
			<table class="table table-hover">
				<?php foreach ($teamsKids as $index => $team) {
					$bericht = $mysql->get_newest($team);
					?>
					<tr>
						<td>

							<strong><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $team; ?></a></strong>
							<a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['titel']; ?></a>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
			<footer class="col-md-12">
				<a href="impressum.php">Impressum</a>

				<!-- Piwik -->
				<script type="text/javascript">
					var _paq = _paq || [];
					_paq.push(['trackPageView']);
					_paq.push(['enableLinkTracking']);
					(function() {
						var u=(("https:" == document.location.protocol) ? "https" : "http") + "://handball-dachau.de/piwik/";
						_paq.push(['setTrackerUrl', u+'piwik.php']);
						_paq.push(['setSiteId', 1]);
						var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
						g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
					})();

				</script>
				<noscript><p><img src="http://handball-dachau.de/piwik/piwik.php?idsite=1" style="border:0;" alt=""></p></noscript>
				<!-- End Piwik Code -->

			</footer>
		</div>
	</div>
</div>

</body>
</html>