<?php
class Profile_Model {
  
	private $myDBObj = null;
	
	public function __construct() {
		global $DBObj;
		$this->myDBObj = $DBObj;
	}

	public function loadManager() {
		ob_start();
			include_once("view/profile.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

}
?>