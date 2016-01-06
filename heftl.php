<?php
	//session_start();
	require('src/mysql.php');
	include("src/navi.php");
	include("src/hauptsponsoren.php");
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
	
		<?php echo make_navi("Heftl"); ?>
	
		<div id="hauptsponsoren">
			<?php echo hauptsponsoren(); ?>
		</div>
		
		<div id="inhalt">
		
			<h3 class="minibanner"> Heftl </h3>
		
			<div style="padding: 50px; font-size: large;">
				Heftl vom 12.-13.09.15 <a href="heftl/heftl_1213_09_15.pdf" target="blank">(DOWNLOAD)</a> <br />
				Heftl vom 19.-20.09.15 <a href="heftl/heftl_1920_09_15.pdf" target="blank">(DOWNLOAD)</a> <br />
				Heftl vom 03.-04.10.15 <a href="heftl/heftl_0304_10_15.pdf" target="blank">(DOWNLOAD)</a> <br />
				Heftl vom 10.-11.10.15 <a href="heftl/heftl_1011_10_15.pdf" target="blank">(DOWNLOAD)</a> <br />
				Heftl vom 24.-25.10.15 <a href="heftl/heftl_2425_10_15.pdf" target="blank">(DOWNLOAD)</a><br />
				Heftl vom 14.-15.11.15 <a href="heftl/heftl_1415_11_15.pdf" target="blank">(DOWNLOAD)</a><br />
				Heftl vom 28.-29.11.15 <a href="heftl/heftl_2829_11_15.pdf" target="blank">(DOWNLOAD)</a><br />
				Heftl vom 12.-13.12.15 <a href="heftl/heftl_1213_12_15.pdf" target="blank">(DOWNLOAD)</a>
			</div>
		</div>
	
	</div>
	
	<footer>
		<a href="impressum.php">Impressum</a>
	</footer>
	
</body>
</html>