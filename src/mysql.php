<?php

include_once('/config/config.php');

class mysql {

	/**
	 * The mysqli connection
	 *
	 * @var mysqli
	 */
	protected $connection = null;

	public function __construct()
	{

	}

	protected function connect()
	{
		$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_set_charset($this->connection, 'utf8');
	}

	/**
	 * Returns the mysqli connection
	 *
	 * @return mysqli
	 */
	public function getConnection() {

		if ($this->connection == NULL) {
			$this->connect();
		}
		
		return $this->connection;

	}

	/**
	 * Returns escaped string
	 *
	 * @param $string
	 * @return string
	 */
	public function escape($string)
	{
		return mysqli_real_escape_string($this->getConnection(), $string);
	}

	public function add_bericht($titel, $text, $gamedate, $pic) {
		$sql = 'INSERT INTO berichte (datetime, team, titel, text, gamedate, pic)'
			.'VALUES(CURRENT_TIMESTAMP, "'.$_SESSION['team'].'", "'.$titel.'", "'.nl2br($text).'", ';
		$sql .= empty($gamedate) ? 'NULL, ' : '"'.$gamedate.'", ';
		$sql .= empty($pic) ? 'NULL)' : '"'.$pic.'")';
		mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
	}

	public function add_spieler($name, $nr, $jahr, $position, $so_far, $trophy, $goals, $hobbies, $pic) {
		$sql = 'INSERT INTO spieler (name, birthday, trophy, nr, position, goals, hobby, so_far, team, pic)'
			.'VALUES("'.$name.'", "'.$jahr.'", "'.$trophy.'", "'.$nr.'", "'.$position.'", "'.$goals.'", "'.$hobbies.'", "'.$so_far.'", "'.$_SESSION['team'].'", "'.$pic.'")';
		mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
	}

	public function add_kommentar($name, $text, $berichtid) {
		$sql = 'INSERT INTO kommentare (datetime, name, text, berichtid)'
			.'VALUES(CURRENT_TIMESTAMP, "'.$name.'", "'.nl2br($text).'", '.$berichtid.')';
		mysqli_query($this->getConnection(), $sql) or die ("Fehler beim Kommentar speichern zu Bericht ".$berichtid.": ".mysqli_error($this->getConnection()));
	}

	public function edit_bericht($id, $titel, $text, $gamedate, $pic) {
		$sql  = 'UPDATE berichte SET titel = "'.$titel.'", text = "'.nl2br($text).'", gamedate = ';
		$sql .= empty($gamedate) ? 'NULL, ' : '"'.$gamedate.'", ';
		$sql .= empty($pic) ? 'pic = NULL' : 'pic="'.$pic.'"';
		$sql .= ' WHERE id = '.$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	public function edit_spieler($id, $name, $nr, $jahr, $trophy, $goals, $position, $so_far, $hobbies, $pic) {
		$sql  = 'UPDATE spieler SET name = "'.$name.'", nr = "'.$nr.'", birthday = "'.$jahr.'", trophy = "'.$trophy.'", goals = "'.$goals.'", position = "'.$position.'", so_far = "'.$so_far.'", hobby = "'.$hobbies.'", pic = "'.$pic.'" WHERE id = '.$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	public function erase_bericht($id) {
		$sql  = 'UPDATE berichte SET team = "" WHERE id = '.$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	public function erase_spieler($id) {
		$sql  = 'UPDATE spieler SET team = "" WHERE id = '.$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	public function get_berichte($team, $a){
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
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($bericht = mysqli_fetch_assoc($result)){
				$berichte[$i] = $bericht;
				$i++;
			}
		}else{
			$berichte = 'leer';
		}
		return $berichte;
	}

	public function get_trainer($team){
		$sql = 'SELECT * FROM trainer WHERE team = "'.$team.'"';
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($train = mysqli_fetch_assoc($result)){
				$trainer[$i] = $train;
				$i++;
			}
		}else{
			$trainer = 'leer';
		}
		return $trainer;
	}

	public function get_kommentare($bericht_id){
		$sql = 'SELECT *, DATE_FORMAT(datetime, "%d.%m.%Y um %T") AS datetime FROM kommentare WHERE berichtid = "'.$bericht_id.'" ORDER BY id ASC';
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($kommentar = mysqli_fetch_assoc($result)){
				$kommentare[$i] = $kommentar;
				$i++;
			}
		}else{
			$kommentare = 'leer';
		}
		return $kommentare;
	}

	public function get_spieler($team){
		$sql = 'SELECT * FROM spieler WHERE team = "'.$team.'" ORDER BY nr ASC';
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($spiel = mysqli_fetch_assoc($result)){
				$spieler[$i] = $spiel;
				$i++;
			}
		}else{
			$spieler = 'leer';
		}
		return $spieler;
	}

	public function get_sponsoren($team){
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
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($sponsor = mysqli_fetch_assoc($result)){
				$sponsoren[$i] = $sponsor;
				$i++;
			}
		}else{
			$sponsoren = 'leer';
		}
		return $sponsoren;
	}

	public function ist_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = '.$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return(mysqli_num_rows($result) > 0);
	}

	public function ist_spieler($id){
		$sql = 'SELECT team FROM spieler WHERE id = '.$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return(mysqli_num_rows($result) > 0);
	}

	public function owns_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = '.$id;
		$result = mysqli_fetch_assoc(mysqli_query($this->getConnection(), $sql));
		return($result['team']==$_SESSION['team']);
	}

	public function get_bericht($id){
		$sql = 'SELECT * FROM berichte WHERE id = '.$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	public function get_spieler1($id){
		$sql = 'SELECT * FROM spieler WHERE id = '.$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	public function get_user($team){
		$sql = 'SELECT * FROM user WHERE team = "'.$team.'"';
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	public function get_gegner($team){
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
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($gegner = mysqli_fetch_assoc($result)){
				$gegners[$i] = $gegner;
				$i++;
			}
		}else{
			$gegners = 'leer';
		}
		return $gegners;
	}

	public function get_newest($team) {
		$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate FROM berichte WHERE team = "'.$team.'" ORDER BY id DESC LIMIT 1';
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	public function login($team, $pw) {
		$sql = 'SELECT password FROM user WHERE team = "'.$team.'" LIMIT 1 ';
		$result = mysqli_fetch_assoc(mysqli_query($this->getConnection(), $sql));
		if (md5($pw) == $result['password']) {
			$_SESSION['team']= $team;
			return(true);
		}	else  {
			return(false);
		}
	}

	public function br2nl($str) {
		$str = preg_replace('/(\r\n|\n|\r)/', '', $str);
		return preg_replace('=<br */?>=i', '<br />', $str);
	}

}

$mysql = new mysql();

