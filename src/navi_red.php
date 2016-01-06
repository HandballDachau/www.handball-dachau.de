
<?php	
	function make_navi_red($active, $team){
		$sites_top = 	array(	"Berichte" 				=> "redakteur.php",
								"Neuer Spielplan"		=> "upload.php",
								"Logout"		 		=> "logout.php");
		$sites = 		array(	"Berichte" 				=> "redakteur.php",
								"Spieler" 				=> "verwaltung.php",
								"Galerie"				=> "galerie_manager.php",
								"Logout"		 		=> "logout.php");
		$html = '<div><table><tr>';
		if($team=="Top News") {
			foreach($sites_top as $k => $v){
				$a = (strtolower($active) == strtolower($k)) ? "menu_active" : "menu";
				$html .= '<td class="'.$a.'"><a href="'.$v.'">'.$k.'</a></td>';
			}
		} else {
			foreach($sites as $k => $v){
				$a = (strtolower($active) == strtolower($k)) ? "menu_active" : "menu";
				$html .= '<td class="'.$a.'"><a href="'.$v.'">'.$k.'</a></td>';
			}
		}
		$html .= '</table></div>';
		return $html;
	}
?>