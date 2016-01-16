<?php

	$sites = array(
		"Home" 				=> "index.php",
		"Teams"				=> "teams.php",
		"Jugend"			=> "jugend.php",
		"Spielplan"			=> "gesamtspielplan.php",
		"Kontakt"		 	=> "kontakt.php",
		"Historie"			=> "historie.php",
		"Sponsoring"		=> "sponsoring.php",
		"Heftl"				=> "heftl.php",
		"Newsletter"		=> "newsletter.php"
	);

	function isPageActive($name) {
		global $sites;
		return $_SERVER['SCRIPT_NAME'] == '/' . $sites[$name];
	}
?>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
      <a class="navbar-brand" href="/"><img src="bilder/logos/asv_dachau.jpg" alt="Homepage"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		  <?php foreach ($sites as $name => $link) { ?>
			  <li class="<?php echo isPageActive($name) ? 'active' : ''; ?>"><a href="<?php echo $link; ?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></li>
		  <?php } ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>