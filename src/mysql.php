<?php
	$db = @ mysql_connect('rdbms.strato.de', 'U1340654', 'qwasqwas1' ) or die ( 'Konnte keine Verbindung zur Datenbank herstellen' );
	$db_select = @ mysql_select_db('DB1340654');
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");
	if(!$db || !$db_select) echo(mysql_error());
	
	define("TEAM_UEBER", "Fotograf");
	
	function add_bericht($titel, $text, $gamedate, $pic) {
		$sql = 'INSERT INTO berichte (datetime, team, titel, text, gamedate, pic)'
			  .'VALUES(CURRENT_TIMESTAMP, "'.$_SESSION['team'].'", "'.$titel.'", "'.nl2br($text).'", ';
		$sql .= empty($gamedate) ? 'NULL, ' : '"'.$gamedate.'", ';
		$sql .= empty($pic) ? 'NULL)' : '"'.$pic.'")';
		mysql_query($sql) or die (mysql_error());
	}
	
	function add_spieler($name, $nr, $jahr, $position, $so_far, $trophy, $goals, $hobbies, $pic) {
		$sql = 'INSERT INTO spieler (name, birthday, trophy, nr, position, goals, hobby, so_far, team, pic)'
			  .'VALUES("'.$name.'", "'.$jahr.'", "'.$trophy.'", "'.$nr.'", "'.$position.'", "'.$goals.'", "'.$hobbies.'", "'.$so_far.'", "'.$_SESSION['team'].'", "'.$pic.'")';
		mysql_query($sql) or die (mysql_error());
	}
	
	function add_kommentar($name, $text, $berichtid) {
		$sql = 'INSERT INTO kommentare (datetime, name, text, berichtid)'
			  .'VALUES(CURRENT_TIMESTAMP, "'.$name.'", "'.nl2br($text).'", '.$berichtid.')';
		mysql_query($sql) or die ("Fehler beim Kommentar speichern zu Bericht ".$berichtid.": ".mysql_error());
	}
	
	function edit_bericht($id, $titel, $text, $gamedate, $pic) {
		$sql  = 'UPDATE berichte SET titel = "'.$titel.'", text = "'.nl2br($text).'", gamedate = ';
		$sql .= empty($gamedate) ? 'NULL, ' : '"'.$gamedate.'", ';
		$sql .= empty($pic) ? 'pic = NULL' : 'pic="'.$pic.'"';
		$sql .= ' WHERE id = '.$id;
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function edit_spieler($id, $name, $nr, $jahr, $trophy, $goals, $position, $so_far, $hobbies, $pic) {
		$sql  = 'UPDATE spieler SET name = "'.$name.'", nr = "'.$nr.'", birthday = "'.$jahr.'", trophy = "'.$trophy.'", goals = "'.$goals.'", position = "'.$position.'", so_far = "'.$so_far.'", hobby = "'.$hobbies.'", pic = "'.$pic.'" WHERE id = '.$id;
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function erase_bericht($id) {
		$sql  = 'UPDATE berichte SET team = "" WHERE id = '.$id;
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function erase_spieler($id) {
		$sql  = 'UPDATE spieler SET team = "" WHERE id = '.$id;
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}
	}
	
	function get_berichte($team, $a){
		if($a!=0) {
			if($team == TEAM_UEBER){
			$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team != "" ORDER BY id DESC LIMIT '.$a;
			} else {
			$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team = "'.$team.'" ORDER BY id DESC LIMIT '.$a;
			}
		} else {
			if($team == TEAM_UEBER){
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team != "" ORDER BY id DESC';
			}else{
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team = "'.$team.'" ORDER BY id DESC';
			}
		}
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($bericht = mysql_fetch_assoc($result)){
				$berichte[$i] = $bericht;
				$i++;
			}
		}else{
			$berichte = 'leer';
		}
		return $berichte;
	}
	
	function get_trainer($team){
			$sql = 'SELECT * FROM trainer WHERE team = "'.$team.'"';
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($train = mysql_fetch_assoc($result)){
				$trainer[$i] = $train;
				$i++;
			}
		}else{
			$trainer = 'leer';
		}
		return $trainer;
	}
	
	function get_kommentare($bericht_id){
			$sql = 'SELECT *, DATE_FORMAT(datetime, "%d.%m.%Y um %T") AS datetime FROM kommentare WHERE berichtid = "'.$bericht_id.'" ORDER BY id ASC';
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($kommentar = mysql_fetch_assoc($result)){
				$kommentare[$i] = $kommentar;
				$i++;
			}
		}else{
			$kommentare = 'leer';
		}
		return $kommentare;
	}
	
	function get_spieler($team){
			$sql = 'SELECT * FROM spieler WHERE team = "'.$team.'" ORDER BY nr ASC';
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($spiel = mysql_fetch_assoc($result)){
				$spieler[$i] = $spiel;
				$i++;
			}
		}else{
			$spieler = 'leer';
		}
		return $spieler;
	}
	
	function get_sponsoren($team){
		switch ($team) {
			case "Herren 1":	$team = "herren1";
			break;
			case "Herren 2":	$team = "herren2";
			break;
			case "Herren 3":	$team = "herren3";
			break;
			case "Herren 4":	$team = "herren4";
			break;
			case "Damen 1":		$team = "damen1";
			break;
			case "Damen 2":		$team = "damen2";
			break;	
			case "Damen 3":		$team = "damen3";
			break;
			case "Damen 4":		$team = "damen4";
			break;
		}		
		if ($team=="alle") {
			$sql = 'SELECT * FROM sponsoren ORDER BY id ASC';
		} else {
			$sql = 'SELECT * FROM sponsoren WHERE '.$team.' = 1 ORDER BY id ASC';
		}
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($sponsor = mysql_fetch_assoc($result)){
				$sponsoren[$i] = $sponsor;
				$i++;
			}
		}else{
			$sponsoren = 'leer';
		}
		return $sponsoren;
	}
	
	function ist_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = '.$id;
		$result = mysql_query($sql);
		return(mysql_num_rows($result) > 0);
	}
	
	function ist_spieler($id){
		$sql = 'SELECT team FROM spieler WHERE id = '.$id;
		$result = mysql_query($sql);
		return(mysql_num_rows($result) > 0);
	}
	
	function owns_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = '.$id;
		$result = mysql_fetch_assoc(mysql_query($sql));
		return($result['team']==$_SESSION['team']);
	}
	
	function get_bericht($id){
		$sql = 'SELECT * FROM berichte WHERE id = '.$id;
		$result = mysql_query($sql);
		return (mysql_fetch_assoc($result));
	}
	
	function get_spieler1($id){
		$sql = 'SELECT * FROM spieler WHERE id = '.$id;
		$result = mysql_query($sql);
		return (mysql_fetch_assoc($result));
	}
	
	function get_user($team){
		$sql = 'SELECT * FROM user WHERE team = "'.$team.'"';
		$result = mysql_query($sql);
		return (mysql_fetch_assoc($result));
	}
	
	function get_gegner($team){
		switch($team) {
		case "Herren 1": $sql = 'SELECT * FROM gegner WHERE herren1 = 1'; break;
		case "Herren 2": $sql = 'SELECT * FROM gegner WHERE herren2 = 1'; break;
		case "Herren 3": $sql = 'SELECT * FROM gegner WHERE herren3 = 1'; break;
		case "Herren 4": $sql = 'SELECT * FROM gegner WHERE herren4 = 1'; break;
		case "Damen 1": $sql = 'SELECT * FROM gegner WHERE damen1 = 1'; break;
		case "Damen 2": $sql = 'SELECT * FROM gegner WHERE damen2 = 1'; break;
		case "Damen 3": $sql = 'SELECT * FROM gegner WHERE damen3 = 1'; break;
		case "Damen 4": $sql = 'SELECT * FROM gegner WHERE damen4 = 1'; break;
	}
		$result = mysql_query($sql) or die (mysql_error());
		$i = 0;
		if(mysql_num_rows($result) > 0){
			while($gegner = mysql_fetch_assoc($result)){
				$gegners[$i] = $gegner;
				$i++;
			}
		}else{
			$gegners = 'leer';
		}
		return $gegners;
	}
	
	function get_newest($team) {
		$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate FROM berichte WHERE team = "'.$team.'" ORDER BY id DESC LIMIT 1';
		$result = mysql_query($sql);
		return (mysql_fetch_assoc($result));
	}
								
	function login($team, $pw) {
		$sql = 'SELECT password FROM user WHERE team = "'.$team.'" LIMIT 1 ';
		$result = mysql_fetch_assoc(mysql_query($sql));
		if (md5($pw) == $result['password']) {
			$_SESSION['team']= $team;
			return(true);
		}	else  {
			return(false);
		}
	}
	
	function br2nl($str) {
		$str = preg_replace('/(\r\n|\n|\r)/', '', $str);
		return preg_replace('=<br */?>=i', '<br />', $str);
	}
