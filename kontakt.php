<?php	//session_start();	require('src/mysql.php');	include("src/hauptsponsoren.php");?><!DOCTYPE html><html><head>    <title>Kontakt - Handball Dachau</title>    <meta name="description" content="Kontaktdetails der Handballer des ASV Dachau">	<?php include('src/head.php'); ?></head><body>	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>	</header>		<div id="main">		<?php include("src/navi.php"); ?>		<div id="hauptsponsoren" class="col-md-3 hidden-xs" class="col-md-3">			<?php echo hauptsponsoren(); ?>		</div>				<div id="inhalt" class="col-md-9">					<h3 class="minibanner"> Ansprechpartner </h3> 			<table id="kontakt_tabelle">				<tr style="font-weight: bold; background-color: #DDDDDD;">					<td style="width: 130px;">Funktion</td>					<td style="width: 150px;">Name</td>					<td style="width: 250px;">E-Mail</td>					<td style="width: 100px;">Telefon</td>				</tr><tr>					<td>Abteilungsleitung</td>					<td>Jürgen Betz</td>					<td><a href="mailto:Juergen.Betz@ASV-Dachau.de">juergen.betz@asv-dachau.de</a></td>					<td>08131/93320</td>					</tr><tr>					<td>2. Vorstand</td>					<td>Vroni Marquart</td>					<td><a href="mailto:vroni.marquart@handball-dachau.de">vroni.marquart@handball-dachau.de</a></td>					<td></td>				</tr><tr>					<td>Technische Leitung</td>					<td>Rafaela Sandeck</td>					<td><a href="mailto:Rafaela.Sandeck@ASV-Dachau.de">rafaela.sandeck@asv-dachau.de</a></td>					<td>0178/8243402</td>				</tr><tr>					<td>Finanzleitung</td>					<td>Simone Hofmann</td>					<td><a href="mailto:Simone.Hofmann@ASV-Dachau.de">simone.hofmann@asv-dachau.de</a></td>					<td></td>				</tr><tr>					<td>Damenleitung</td>					<td>Nicole Kühn</td>					<td><a href="mailto:Nici.Kuehn@Handball-Dachau.de">nici.kuehn@handball-dachau.de</a></td>					<td></td>				</tr><tr>					<td>Herrenleitung</td>					<td>Stefan Pröll</td>					<td><a href="mailto:Stefan.Proell@ASV-Dachau.de">stefan.proell@asv-dachau.de</a></td>					<td>0173/6724473</td>				</tr><tr>					<td>Jugendleitung</td>					<td>Daniel Schermelleh</td>					<td><a href="Daniel.Schermelleh@Handball-Dachau.de">daniel.schermelleh@handball-dachau.de</a></td>					<td>0172/9912843</td>				</tr>			</table>			<p></p>			<h3 class="minibanner"> Kontakt </h3> 						<form style="padding: 10px;" id="form" action="src/form2mail.php" method="POST">			<label for="name">Name:</label>			<input class="form-control" id="name" name="name" size="30" type="text" />			<label for="email">Email:</label>			<input class="form-control" id="email" name="email" size="40" type="text" />			<p></p>			<label for="betreff">Betreff:</label>			<input class="form-control" id="betreff" name="betreff" size="83" type="text" />			<p></p>			<label for="nachricht">Nachricht:</label><br />			<textarea class="form-control" id="nachricht" cols="70" rows="6" name="nachricht"></textarea>			<br />			<input class="btn btn-primary" id="submit" name="submit" type="submit" value="Formular senden" />			</form>		</div>			</div>		<footer class="col-md-12">		<a href="impressum.php">Impressum</a>	</footer>	</div></body></html>