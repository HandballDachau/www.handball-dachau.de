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
			var preview_gamedate = $('#newest_gamedate_'+bericht_id).html();
			var preview_text= $('#newest_text_'+bericht_id).html().substr(0,200)+"...";
			$("#preview_team").html(preview_team+' '+preview_gamedate);
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
	<header>
	</header>

	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren">
			<?php echo hauptsponsoren(); ?>
		</div>

		<div id="inhalt">
			<?php //echo '<img src="bilder/hinweis.jpg" style="margin-top:5px; border: 2px solid black; width: 786px;">';?>
			<?php //echo '<img src="bilder/banner.jpg" style="margin-top:2px; border: 2px solid black; width: 786px;">';?>
			<table style="border-collapse: collapse;">
				<tr>
					<td id="preview">
						<div id="preview_content">
							<p id="preview_team"></p>
							<p id="preview_titel"></p>
							<p id="preview_text"></p>
						</div>
					</td>
					<td id="newest_teams">

						<table class="table table-hover">
							<?php foreach ($teamsAdults as $index => $team) {
								$bericht = $mysql->get_newest($team);
								?>
								<tr>
									<td>

										<strong><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['team'] . ' ' . $liga[$index] . (!empty($bericht['gamedate']) ? ' (' . $bericht['gamedate'] . ')' : ''); ?></a></strong>
										<a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['titel']; ?></a>
										<div style="display: none;">
											<span id="newest_pic_<?php echo $index; ?>"><?php echo $bericht['pic']; ?></span><span id="newest_text_<?php echo $index; ?>"><a href="bericht.php?id=<?php echo $bericht['id']; ?>"><?php echo $bericht['text']; ?></a></span>';
										</div>
									</td>
								</tr>
							<?php } ?>
						</table>
					</td>
				</tr>
			</table>

			<div class="newest_top">
				<h3 class="minibanner"> Top News </h3>
			</div>

			<div class="newest_youth" style="font-size: 16px;">
				<h3 class="minibanner"> Jugendberichte </h3>
			</div>

			<div class="newest_top">
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

			<div class="newest_youth">
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
			<footer>
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