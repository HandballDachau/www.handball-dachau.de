<?php 
	function make_subnavi($c, $active_team, $active_sub) {
		if($c==1) {
			$teams = array(	"Damen 1", "Herren 1", "Damen 2", "Herren 2", "Damen 3", "Herren 3", "Damen 4", "Herren 4");
			$subs = array(	"Portraits" =>  "portraits.php?team=",
							"Berichte" 	=>	"berichte.php?team=", 
							"Tabelle"	=>	"tabelle.php?team=",
							"Spielplan"	=>	"spielplan.php?team=", 
							"Gegner"	=>	"gegner.php?team=",
							"Galerie"	=>	"galerie.php?saison=1516&team=",
							"Sponsoren"	=>	"sponsoren.php?team=",
							"Statistik"	=>	"statistik.php?team=");
			$team_path = 'team.php?team=';
		} else {
			$teams = array(	"Weibliche A", "Männliche A", "Weibliche B", "Männliche B", "Weibliche C",  "Männliche C", "Männliche D", "Männliche E", "Minis");
			$subs = array(	"Berichte" 	=>	"berichte.php?team=", 
							"Tabelle"	=>	"tabelle.php?team=",
							"Spielplan"	=>	"spielplan.php?team=",
							"Galerie"	=>	"galerie.php?saison=1415&team=");
			$team_path = 'jugendteam.php?team=';
		}
		
		$html = '<ul id="subnavi">';
		foreach( $teams as $team) {
			if($active_team==$team) {
				$html .= '<li class="sub_active"><a href="'.$team_path.$team.'">'.$team.'</a></li>';
				foreach($subs as $sub => $link) {
					if($active_sub == $sub) {
						$html .= '<li class="subsub_active"><a href="'.$link.$team.'">'.$sub.'</a></li>';
					} else {
						$html .= '<li class="subsub"><a href="'.$link.$team.'">'.$sub.'</a></li>';
					}
				}
			} else {
				$html .= '<li class="sub"><a href="'.$team_path.$team.'">'.$team.'</a></li>';
			}
		}
		$html .= '</ul>';
		return $html;
	}
?>