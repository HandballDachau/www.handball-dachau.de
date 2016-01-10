<?php

include_once('config.php');

/**
 * Mysql class
 *
 * @author Norbert Hanauer <nzseokiwi@gmail.com>
 */
class mysql {

	/**
	 * The database hostname
	 *
	 * @var string
	 */
	protected $dbHost = null;

	/**
	 * The database user
	 *
	 * @var string
	 */
	protected $dbUser = null;

	/**
	 * The database password
	 *
	 * @var string
	 */
	protected $dbPassword = null;

	/**
	 * The database name
	 *
	 * @var string
	 */
	protected $dbName = null;

	/**
	 * The connection charset
	 *
	 * @var string
	 */
	protected $charset = null;

	/**
	 * The mysqli connection
	 *
	 * @var mysqli
	 */
	protected $connection = null;

	/**
	 * Mysql constructor
	 *
	 * @param string $dbHost
	 * @param string $dbUser
	 * @param string $dbPassword
	 * @param string $dbName
	 * @param string $charset
	 */
	public function __construct($dbHost, $dbUser, $dbPassword, $dbName, $charset) {

		$this->setDbHost($dbHost);
		$this->setDbUser($dbUser);
		$this->setDbPassword($dbPassword);
		$this->setDbName($dbName);
		$this->setCharset($charset);

		$this->connect();
	}

	/**
	 * Connects to mysql database
	 */
	protected function connect() {

		$this->connection = mysqli_connect($this->getDbHost(), $this->getDbUser(), $this->getDbPassword(), $this->getDbName());

		// Check connection
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		mysqli_set_charset($this->connection, $this->getCharset());

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
		$escapedString = mysqli_real_escape_string($this->getConnection(), $string);
		return '"' . $escapedString . '"';
	}

	// Setters and getters

	/**
	 * @return string
	 */
	public function getDbHost()
	{
		return $this->dbHost;
	}

	/**
	 * @param string $dbHost
	 */
	public function setDbHost($dbHost)
	{
		$this->dbHost = $dbHost;
	}

	/**
	 * @return string
	 */
	public function getDbUser()
	{
		return $this->dbUser;
	}

	/**
	 * @param string $dbUser
	 */
	public function setDbUser($dbUser)
	{
		$this->dbUser = $dbUser;
	}

	/**
	 * @return string
	 */
	public function getDbPassword()
	{
		return $this->dbPassword;
	}

	/**
	 * @param string $dbPassword
	 */
	public function setDbPassword($dbPassword)
	{
		$this->dbPassword = $dbPassword;
	}

	/**
	 * @return string
	 */
	public function getDbName()
	{
		return $this->dbName;
	}

	/**
	 * @param string $dbName
	 */
	public function setDbName($dbName)
	{
		$this->dbName = $dbName;
	}

	/**
	 * @return string
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	/**
	 * @param string $charset
	 */
	public function setCharset($charset)
	{
		$this->charset = $charset;
	}

	// Query methods

	public function add_bericht($titel, $text, $gamedate, $pic) {
		$sql = 'INSERT INTO berichte (datetime, team, titel, text, gamedate, pic)'
				.'VALUES(CURRENT_TIMESTAMP, ' . $this->escape($_SESSION['team']) . ', ' . $this->escape($titel) . ', ' . $this->escape(nl2br($text)) . ', ';
		$sql .= empty($gamedate) ? 'NULL, ' : '' . $this->escape($gamedate) . ', ';
		$sql .= empty($pic) ? 'NULL)' : '' . $this->escape($pic) . ')';
		mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
	}

	/**
	 * Add player
	 *
	 * @param $name
	 * @param $nr
	 * @param $jahr
	 * @param $position
	 * @param $so_far
	 * @param $trophy
	 * @param $goals
	 * @param $hobbies
	 * @param $pic
	 */
	public function add_spieler($name, $nr, $jahr, $position, $so_far, $trophy, $goals, $hobbies, $pic) {
		$sql = 'INSERT INTO spieler (name, birthday, trophy, nr, position, goals, hobby, so_far, team, pic)'
			 . 'VALUES(' . $this->escape($name) . ', ' . $this->escape($jahr) . ', ' . $this->escape($trophy) . ', ' . (int)$nr . ', ' . $this->escape($position) . ', ' . $this->escape($goals) . ', ' . $this->escape($hobbies) . ', ' . $this->escape($so_far) . ', ' . $this->escape($_SESSION['team']) . ', ' . $this->escape($pic) . ')';
		mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
	}

	/**
	 * Add comment
	 *
	 * @param $name
	 * @param $text
	 * @param $berichtid
	 */
	public function add_kommentar($name, $text, $berichtid) {
		$sql = 'INSERT INTO kommentare (datetime, name, text, berichtid)'
			.'VALUES(CURRENT_TIMESTAMP, ' . $this->escape($name) . ', ' . $this->escape(nl2br($text)) . ', ' . (int)$berichtid . ')';
		mysqli_query($this->getConnection(), $sql) or die ("Fehler beim Kommentar speichern zu Bericht ".$berichtid.": ".mysqli_error($this->getConnection()));
	}

	/**
	 * Edit report
	 *
	 * @param $id
	 * @param $titel
	 * @param $text
	 * @param $gamedate
	 * @param $pic
	 * @return bool
	 */
	public function edit_bericht($id, $titel, $text, $gamedate, $pic) {
		$sql  = 'UPDATE berichte SET titel = ' . $this->escape($titel) . ', text = ' . $this->escape(nl2br($text)) . ', gamedate = ';
		$sql .= empty($gamedate) ? 'NULL, ' : $this->escape($gamedate) . ', ';
		$sql .= empty($pic) ? 'pic = NULL' : 'pic=' . $this->escape($pic);
		$sql .= ' WHERE id = ' . (int)$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Edit player
	 *
	 * @param $id
	 * @param $name
	 * @param $nr
	 * @param $jahr
	 * @param $trophy
	 * @param $goals
	 * @param $position
	 * @param $so_far
	 * @param $hobbies
	 * @param $pic
	 * @return bool
	 */
	public function edit_spieler($id, $name, $nr, $jahr, $trophy, $goals, $position, $so_far, $hobbies, $pic) {
		$sql  = 'UPDATE spieler SET name = ' . $this->escape($name) . ', nr = ' . (int)$nr . ', birthday = ' . $this->escape($jahr) . ', trophy = ' . $this->escape($trophy) . ', goals = ' . $this->escape($goals) . ', position = ' . $this->escape($position) . ', so_far = ' . $this->escape($so_far) . ', hobby = ' . $this->escape($hobbies) . ', pic = ' . $this->escape($pic) . ' WHERE id = ' . (int)$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Erase report
	 *
	 * @param $id
	 * @return bool
	 */
	public function erase_bericht($id) {
		$sql  = 'UPDATE berichte SET team = "" WHERE id = ' . (int)$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Erase player
	 *
	 * @param $id
	 * @return bool
	 */
	public function erase_spieler($id) {
		$sql  = 'UPDATE spieler SET team = "" WHERE id = ' . (int)$id;
		if(mysqli_query($this->getConnection(), $sql)){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Get reports
	 *
	 * @param $team
	 * @param $a
	 * @return string
	 */
	public function get_berichte($team, $a){
		if($a!=0) {
			if($team == TEAM_UEBER){
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team != "" ORDER BY id DESC LIMIT ' . (int)$a;
			} else {
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team = ' . $this->escape($team) . ' ORDER BY id DESC LIMIT ' . (int)$a;
			}
		} else {
			if($team == TEAM_UEBER){
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team != "" ORDER BY id DESC';
			}else{
				$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate, DATE_FORMAT(datetime, "%d.%m.%Y") AS datetime FROM berichte WHERE team = ' . $this->escape($team) . ' ORDER BY id DESC';
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

	/**
	 * Get trainer
	 *
	 * @param $team
	 * @return string
	 */
	public function get_trainer($team){
		$sql = 'SELECT * FROM trainer WHERE team = ' . $this->escape($team);
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

	/**
	 * Get comments
	 *
	 * @param $bericht_id
	 * @return string
	 */
	public function get_kommentare($bericht_id){
		$sql = 'SELECT *, DATE_FORMAT(datetime, "%d.%m.%Y um %T") AS datetime FROM kommentare WHERE berichtid = ' . (int)$bericht_id . ' ORDER BY id ASC';
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

	/**
	 * Get player
	 *
	 * @param $team
	 * @return string
	 */
	public function get_spieler($team){
		$sql = 'SELECT * FROM spieler WHERE team = ' . $this->escape($team) . ' ORDER BY nr ASC';
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

	/**
	 * Get sponsors
	 *
	 * @param $team
	 * @return string
	 */
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
			$sql = 'SELECT * FROM sponsoren WHERE ' . $team . ' = 1 ORDER BY id ASC';
		}
		$result = mysqli_query($this->getConnection(), $sql) or die (mysqli_error($this->getConnection()));
		$i = 0;
		if(mysqli_num_rows($result) > 0){
			while($sponsor = mysqli_fetch_assoc($result)){
				$sponsoren[$i] = $sponsor;
				$i++;
			}
		} else {
			$sponsoren = 'leer';
		}
		return $sponsoren;
	}

	/**
	 * Is report
	 * @param $id
	 * @return bool
	 */
	public function ist_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = ' . (int)$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return(mysqli_num_rows($result) > 0);
	}

	/**
	 * Is player
	 *
	 * @param $id
	 * @return bool
	 */
	public function ist_spieler($id){
		$sql = 'SELECT team FROM spieler WHERE id = ' . (int)$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return(mysqli_num_rows($result) > 0);
	}

	/**
	 * Owns report
	 *
	 * @param $id
	 * @return bool
	 */
	public function owns_bericht($id){
		$sql = 'SELECT team FROM berichte WHERE id = ' . (int)$id;
		$result = mysqli_fetch_assoc(mysqli_query($this->getConnection(), $sql));
		return($result['team']==$_SESSION['team']);
	}

	/**
	 * Get report
	 *
	 * @param $id
	 * @return array|null
	 */
	public function get_bericht($id){
		$sql = 'SELECT * FROM berichte WHERE id = ' . (int)$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	/**
	 * Get player
	 *
	 * @param $id
	 * @return array|null
	 */
	public function get_spieler1($id){
		$sql = 'SELECT * FROM spieler WHERE id = ' . (int)$id;
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	/**
	 * Get user
	 *
	 * @param $team
	 * @return array|null
	 */
	public function get_user($team){
		$sql = 'SELECT * FROM user WHERE team = ' . $this->escape($team);
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	/**
	 * Get opponent
	 * @param $team
	 * @return string
	 */
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

	/**
	 * Get newest report
	 *
	 * @param $team
	 * @return array|null
	 */
	public function get_newest($team) {
		$sql = 'SELECT *, DATE_FORMAT(gamedate, "%d.%m.%Y") AS gamedate FROM berichte WHERE team = ' . $this->escape($team) . ' ORDER BY id DESC LIMIT 1';
		$result = mysqli_query($this->getConnection(), $sql);
		return (mysqli_fetch_assoc($result));
	}

	/**
	 * Login user
	 *
	 * @param $team
	 * @param $pw
	 * @return bool
	 */
	public function login($team, $pw) {
		$sql = 'SELECT password FROM user WHERE team = ' . $this->escape($team). ' LIMIT 1 ';
		$result = mysqli_fetch_assoc(mysqli_query($this->getConnection(), $sql));
		if (md5($pw) == $result['password']) {
			$_SESSION['team'] = $team;
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Converts br2nl
	 * @param $str
	 * @return mixed
	 */
	public function br2nl($str) {
		$str = preg_replace('/(\r\n|\n|\r)/', '', $str);
		return preg_replace('=<br */?>=i', '<br />', $str);
	}

	/**
	 * Returns escaped html
	 * @param $data
	 * @return string
	 */
	public function cleanHtml($data)
	{
		// Fix &entity\n;
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		// Remove any attribute starting with "on" or xmlns
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		// Remove javascript: and vbscript: protocols
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		// Remove namespaced elements (we do not need them)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		do {
			// Remove really unwanted tags
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		} while ($old_data !== $data);

		return $data;
	}

}

// Create instance of mysql connection once
$mysql = new mysql(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME, 'utf-8');