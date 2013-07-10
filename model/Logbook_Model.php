<?php
class Logbook_Model {
	
	private $myDBObj = null;

	public function __construct() {
		global $DBObj;
		$this->myDBObj = $DBObj;
	}

	public function retrieveUserLogs($userID) {
		$this->myDBObj->setQuery("SELECT tblLogBook.ID, tblUsers.AccountType, tblUsers.UserName, tblUsers.FirstName, tblUsers.LastName, tblLogBook.LogIn, tblLogBook.LogOut FROM tblLogBook, tblUsers WHERE tblUsers.ID = tblLogBook.UserID AND tblUsers.ID = $userID ORDER BY LogIn ASC");
		return $this->myDBObj->searchList();
	}

	public function retrieveLogs() {
		$this->myDBObj->setQuery("SELECT tblLogBook.ID, tblUsers.AccountType, tblUsers.UserName, tblUsers.FirstName, tblUsers.LastName, tblLogBook.LogIn, tblLogBook.LogOut FROM tblLogBook, tblUsers WHERE tblUsers.ID = tblLogBook.UserID ORDER BY LogIn ASC");
		return $this->myDBObj->searchList();
	}

	public function deleteLog($logID) {
		$logID = $this->myDBObj->sanitizeInput($logID);
		$this->myDBObj->setQuery("DELETE FROM tblLogBook WHERE ID = $logID");
		return $this->myDBObj->execute();
	}

	public function deleteUserLogs($userID) {
		$this->myDBObj->setQuery("DELETE FROM tblLogBook WHERE UserID = $userID");
		return $this->myDBObj->execute();
	}

	public function loadManager() {
		ob_start();
			include_once("view/logbook.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

}
?>