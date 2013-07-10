<?php
class Database_Model {

	private $dbHost = "localhost";
	private $dbUser = "root";
	private $dbPassword = "";
	private $dbName = "";

	private $sqlQuery = "";

	public function __construct($config) {
		$this->dbHost = $config['host'];
		$this->dbUser = $config['user'];
		$this->dbPassword = $config['password'];
		$this->dbName = $config['database'];

		$this->connect();
	}

	private function connect() {
		mysql_connect($this->dbHost, $this->dbUser, $this->dbPassword) or die('Cannot connect to the server.</br>' . mysql_error());
		mysql_select_db($this->dbName) or die('Unable to connect to the specified database.</br>' . mysql_error());
	}


	public function setQuery($query){
		$this->sqlQuery = $query;
	}

	public function execute() {
		$result = mysql_query($this->sqlQuery);

		if($result) {
			return true;
		}else {
			echo mysql_error();
			return false;
		}
	}

	public function search() {
		$rowsArray = array();
		$result = mysql_query($this->sqlQuery);

		if ($result) {
			while ($row = mysql_fetch_object($result)) {
				$rowsArray = $row;
			}
		}else {
			echo mysql_error();
		}

		return $rowsArray;
	}

	public function searchList() {
		$rowsArray = array();
		$result = mysql_query($this->sqlQuery);

		if ($result) {
			while ($row = mysql_fetch_object($result)) {
				$rowsArray[] = $row;
			}
		}else {
			echo mysql_error();
		}

		return $rowsArray;
	}


	public function disconnect(){
		mysql_close();
	}


	public function sanitizeInput($string) {

		$string = trim($string);
		$string = addslashes($string);

		return $string;
	}

	public function sanitizeOutput($string) {

		$string = htmlspecialchars($string);

		return $string;
	}

}
?>