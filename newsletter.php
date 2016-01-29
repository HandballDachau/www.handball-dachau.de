<?php
	//session_start();
	require('src/mysql.php');

	include("src/hauptsponsoren.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Handball Dachau - Newsletter</title>

    <meta name="description" content="Newsletter der Handballer des ASV Dachau">

	<?php include('src/head.php'); ?>
</head>


<body>

	<div class="container"><header><a href="/" title="Home"><img src="../bilder/titel.jpg" alt=Banner ASV Dachau Handball" /></a>
	</header>
	
	<div id="main">
		<?php include("src/navi.php"); ?>
		<div id="hauptsponsoren" class="col-md-3 hidden-xs" class="col-md-3">
			<?php echo hauptsponsoren(); ?>
		</div>
		
		<div id="inhalt" class="col-md-9">
		
			<h3 class="minibanner"> Newsletter bestellen </h3>
		
			<div>

				<!-- Begin MailChimp Signup Form -->
				<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
				<style type="text/css">
					#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
					/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
				</style>
				<div id="mc_embed_signup">
					<form action="//handball-dachau.us12.list-manage.com/subscribe/post?u=6ec23bb1adf7c1399437e32fc&amp;id=3273da2401" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
							<h2>Bestelle den Newsletter der Handballabteilung des ASV Dachau e.V.</h2>
							<div class="indicates-required"><span class="asterisk">*</span> Pflichfelder</div>
							<div class="mc-field-group">
								<label for="mce-EMAIL">Email Adresse  <span class="asterisk">*</span>
								</label>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
							</div>
							<div class="mc-field-group">
								<label for="mce-FNAME">Vorname  <span class="asterisk">*</span>
								</label>
								<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
							</div>
							<div class="mc-field-group">
								<label for="mce-LNAME">Nachname  <span class="asterisk">*</span>
								</label>
								<input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
							</div>
							<div id="mce-responses" class="clear">
								<div class="response" id="mce-error-response" style="display:none"></div>
								<div class="response" id="mce-success-response" style="display:none"></div>
							</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6ec23bb1adf7c1399437e32fc_3273da2401" tabindex="-1" value=""></div>
							<div class="clear"><input type="submit" value="Bestellen" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						</div>
					</form>
				</div>
				<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text'; /*
					 * Translated default messages for the $ validation plugin.
					 * Locale: DE
					 */
						$.extend($.validator.messages, {
							required: "Dieses Feld ist ein Pflichtfeld.",
							maxlength: $.validator.format("Geben Sie bitte maximal {0} Zeichen ein."),
							minlength: $.validator.format("Geben Sie bitte mindestens {0} Zeichen ein."),
							rangelength: $.validator.format("Geben Sie bitte mindestens {0} und maximal {1} Zeichen ein."),
							email: "Geben Sie bitte eine gültige E-Mail Adresse ein.",
							url: "Geben Sie bitte eine gültige URL ein.",
							date: "Bitte geben Sie ein gültiges Datum ein.",
							number: "Geben Sie bitte eine Nummer ein.",
							digits: "Geben Sie bitte nur Ziffern ein.",
							equalTo: "Bitte denselben Wert wiederholen.",
							range: $.validator.format("Geben Sie bitten einen Wert zwischen {0} und {1}."),
							max: $.validator.format("Geben Sie bitte einen Wert kleiner oder gleich {0} ein."),
							min: $.validator.format("Geben Sie bitte einen Wert größer oder gleich {0} ein."),
							creditcard: "Geben Sie bitte ein gültige Kreditkarten-Nummer ein."
						});}(jQuery));var $mcj = jQuery.noConflict(true);</script>
				<!--End mc_embed_signup-->

			</div>
		</div>
	
	</div>
	
	<footer class="col-md-12">
		<a href="impressum.php">Impressum</a>
	</footer>
	</div>
</body>
</html>