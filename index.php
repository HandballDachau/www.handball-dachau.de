<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/hauptsponsoren.php");
	$top = get_berichte('Top News', "7");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau</title>

    <meta charset="UTF-8">
    <meta name="description" content="Handballer des ASV Dachau">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<script src="http://code.jquery.com/jquery.min.js"></script>
    <link href="src/style.css" type="text/css" rel="stylesheet">
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
	<header>
	</header>
	
	<div id="main">
	
		<?php echo make_navi("Home"); ?>
	
		<div id="hauptsponsoren"> 
			<?php echo hauptsponsoren(); ?>
		</div>
		
		<div id="inhalt">
			<?php echo '<img src="bilder/hinweis.jpg" style="margin-top:5px; border: 2px solid black; width: 786px;">';?>
			<?php echo '<img src="bilder/banner.jpg" style="margin-top:2px; border: 2px solid black; width: 786px;">';?>
			<table style="border-collapse: collapse;">
				<tr><td id="preview">
					<div id="preview_content">
						<p id="preview_team"></p>
						<p id="preview_titel"></p>
						<p id="preview_text"></p> 
					</div>
				</td>
				<td id="newest_teams">
					<?php $t = array("Damen 1", "Herren 1", "Damen 2", "Herren 2", "Damen 3", "Herren 3", "Damen 4", "Herren 4");
					$liga = array(" / Bayernliga"," / Landesliga"," / Bezirksoberliga"," / Bezirksliga"," / Bezirksliga"," / Bezirksklasse"," / Bezirksklasse", " / Bezirksklase");
					$c = 0;
					$html = '<table>';
					foreach($t as $k){
						if($c % 2 == 0) {
						$color = '#ccc';
						} else {
						$color = '#fff';
						}
						$bericht = get_newest($k);
						
						$html .= '<tr style="background-color: '.$color.'; font-weight: 800;">';
						$html .= '<td id="newest_team_'.$c.'" style="font-size: 12px;"><a href="bericht.php?id='.$bericht['id'].'">'.$bericht['team'].$liga[$c].'</a></td>';
						if(isset($bericht['gamedate'])) {
							$html .= '<td colspan="2" id="newest_gamedate_'.$c.'" style="text-align: right; font-size: 12px;"><a href="bericht.php?id='.$bericht['id'].'">('.$bericht['gamedate'].')</a></td></tr>';
						} else {
							$html .= '<td colspan="2" id="newest_gamedate_'.$c.'"></td></tr>';
						}
						$html .= '<tr style="background-color: '.$color.';">';
						$html .= '<td colspan="3" style="padding-left: 20px; padding-right: 20px; font-size: 12px;" id="newest_titel_'.$c.'"><a href="bericht.php?id='.$bericht['id'].'">'.$bericht['titel'].'</a><span id="newest_pic_'.$c.'" style="display:none">'.$bericht['pic'].'</span><span id="newest_text_'.$c.'" style="display:none"><a href="bericht.php?id='.$bericht['id'].'">'.$bericht['text'].'</a></span></td></tr>';
						$c++;
					}
					$html .= '</table>';
					echo $html; ?>
				
				</td></tr>
			</table>
			
			<div class="newest_top">
				<h3 class="minibanner"> Top News </h3>
			</div>
			
			<div class="newest_youth" style="font-size: 16px;">
				<h3 class="minibanner"> Jugendberichte </h3>
			</div>
			
			<div class="newest_top">
				<table>
					<?php
						$html = "";
						foreach($top as $bericht){
							if($c % 2 == 1) {
								$color = '#ccc';
							} else {
								$color = '#fff';
							}
							$txt = substr($bericht['text'], 0, 70);
							$txt .= "...";
							$html .= '<tr style="background-color: '.$color.'; font-weight: 800;">';
							$html .= '<td style="border-top: 2px black solid;"><a href="bericht.php?id='.$bericht['id'].'">'.$bericht['titel'].'</a></td></tr>';
							$html .= '<tr style="background-color: '.$color.';">';
							$html .= '<td style="padding-left: 20px; padding-right: 20px;"><a href="bericht.php?id='.$bericht['id'].'">'.$txt.'</a></td></tr>';
							$c++;
						}
						if($c % 2 == 1) {
							$color = '#ccc';
						} else {
							$color = '#fff';
						}
						$html .= '<tr style="background-color: '.$color.'; font-weight: 800;">';
						$html .= '<td style="padding-left: 20px; padding-right: 20px; text-align: right; border-top: 2px black solid;"><a href="berichte.php?team=Top News">Archiv</a></td></tr>';
						echo $html;
					?>
				</table>
				<p style="height: 10px;"></p>
			</div>
			
			<div class="newest_youth">
					<?php $t = array(	"Weibliche A", "Männliche A", "Weibliche B", "Männliche B", "Weibliche C", "Männliche C", "Männliche D", "Männliche E", "Minis");		
					$c = 0;
					$html = '<table>';
					foreach($t as $k){
						$c++;
						if($c % 2 == 1) {
						$color = '#ccc';
						} else {
						$color = '#fff';
						}
						$bericht = get_newest($k);
						$html .= '<tr style="background-color: '.$color.'; font-weight: 800;">';
						$html .= '<td><a href="bericht.php?id='.$bericht['id'].'">'.$k.'</a></td></tr>';
						$html .= '<tr style="background-color: '.$color.';">';
						$html .= '<td style="padding-left: 20px; padding-right: 20px;"><a href="bericht.php?id='.$bericht['id'].'">'.$bericht['titel'].'</a></td></tr>';
					}
					$html .= '</table>';
					echo $html; ?>
					<p style="height: 10px;"></p>
				</div>
			
		</div>
		<p style="width: 1000px;"></p>
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
		<noscript><p><img src="http://handball-dachau.de/piwik/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
		<!-- End Piwik Code -->
		
	</footer>
</body>
</html>