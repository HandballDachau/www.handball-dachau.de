<?php	
	function make_navi($active){
		$sites = array(	"Home" 				=> "index.php",
						"Teams"				=> "teams.php",
						"Jugend"			=> "jugend.php",
						"Spielplan"			=> "gesamtspielplan.php",
						"Kontakt"		 	=> "kontakt.php",
						"Historie"			=> "historie.php",
						"Sponsoring"		=> "sponsoring.php",
						"Heftl"				=> "heftl.php");
		$html = '<div id="navi"><table class="navi"><tr>';
		foreach($sites as $k => $v){
			$a = (strtolower($active) == strtolower($k)) ? "menu_active" : "menu";
			$html .= '<td class="'.$a.'"><a href="'.$v.'">'.$k.'</a></td>';
		}
		$html .= '</table></div>';
		return $html;
	}
?>