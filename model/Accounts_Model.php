<?php
class Accounts_Model {
  
	private $myDBObj = null;
	public $name="zxc";
	public $username="asd";
	
	public function __construct() {
		global $DBObj;
		$this->myDBObj = $DBObj;
	}

	public function logIn($username, $password) {
		$username = $this->myDBObj->sanitizeInput($username);
		$password = md5($this->myDBObj->sanitizeInput($password));

		$this->myDBObj->setQuery("SELECT * FROM tblUsers WHERE UserName = '$username' AND Password = '$password'");
		$result = $this->myDBObj->search();

		if (!empty($result)) {

			$_SESSION['USERID'] = $result->ID; 

			$this->saveLogin($result->ID,date("Y-m-d H:i:s"));
			return true;

		}else {
			return false;	
		}
	}

	public function logOut($userID) {
		session_destroy();
		$this->saveLogout($userID,date("Y-m-d H:i:s"));
		header('location: index.php');
	}

	public function saveLogin($userID,$date){
		$this->myDBObj->setQuery("INSERT INTO tblLogBook VALUES(NULL, $userID, '$date', NULL)");
		return $this->myDBObj->execute();
	}

	public function saveLogout($userID,$date) {
		$this->myDBObj->setQuery("UPDATE tblLogBook SET LogOut = '$date' WHERE UserID = $userID AND LogOut IS NULL");
		return $this->myDBObj->execute();
	}



	public function getUserInfo($userID) {

		$userID = $this->myDBObj->sanitizeInput($userID);
		$userinfo = array();

		$this->myDBObj->setQuery("SELECT * FROM tblUsers WHERE ID = $userID");
		$result = $this->myDBObj->search();

		if (!empty($result)) {
			$userinfo['ID'] = $result->ID;
			$userinfo['Name'] = $result->FirstName;
			$userinfo['LastName'] = $result->LastName;
			$userinfo['FullName'] = $result->FirstName . " " . $result->LastName;
			$userinfo['UserName'] = $result->UserName;
			$userinfo['AccountType'] = $result->AccountType;
			$userinfo['Date'] = $result->Date;

			return $userinfo;
		}
	}



	//CRUD FUNCTIONS

	//CREATE FUNCTION
	public function insertUser($data){

		//sanitize inputs
		$accountType = $this->myDBObj->sanitizeInput($data['accountType']);
		$firstname = $this->myDBObj->sanitizeInput($data['firstname']);
		$lastname = $this->myDBObj->sanitizeInput($data['lastname']);
		$username = $this->myDBObj->sanitizeInput($data['username']);
		$password = md5($this->myDBObj->sanitizeInput($data['password']));

		$this->myDBObj->setQuery("INSERT INTO tblUsers VALUES(NULL, '$accountType', '$firstname', NULL, '$lastname', '$username', '$password', NULL)");
		return $this->myDBObj->execute(); 
	}

	//RETRIEVE FUNCTION
	public function retrieveUsers() {
		$this->myDBObj->setQuery("SELECT * FROM tblUsers ORDER BY FirstName ASC");
		return $this->myDBObj->searchList();
	}

	//UPDATE FUNCTION
	public function updateUser($data) {

		//sanitize input
		$userID = $this->myDBObj->sanitizeInput($data['userID']);
		$accountType = $this->myDBObj->sanitizeInput($data['accountType']);
		$firstname = $this->myDBObj->sanitizeInput($data['firstname']);
		$lastname = $this->myDBObj->sanitizeInput($data['lastname']);
		$username = $this->myDBObj->sanitizeInput($data['username']);

		$this->myDBObj->setQuery("UPDATE tblUsers SET FirstName = '$firstname', LastName = '$lastname', UserName = '$username', AccountType = '$accountType' WHERE ID = $userID ");
		return $this->myDBObj->execute();
	}

	//DELETE FUNCTION
	public function deleteUser($userID) {
		$userID = $this->myDBObj->sanitizeInput($userID);

		$logbook_model = new LogBook_Model();
		$deleteUserLogs = $logbook_model->deleteUserLogs($userID);

		if($deleteUserLogs) {
			$this->myDBObj->setQuery("DELETE FROM tblUsers WHERE ID = $userID");
			return $this->myDBObj->execute();
		}else {
			return false;
		}
	}

}
?>