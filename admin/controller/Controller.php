<?php
class Controller{

	private $view = "";

	public function __construct() {
		global $RENDER_VIEW;
	}

	public function load() {

		if(isset($_GET["view"]) && ($_GET["view"]!="")) {
			$view = $_GET["view"];
		}else {
			$view = "";
		}

		$RENDER_VIEW = $this->loadView($view);
		include_once("view/template.php");
	}

	private function loadView($view) {
		$content = '';

		switch ($view) {

			case "user-management": 
				$content = $this->loadUserManagement();
				break;

			case "add-user": 
				$content = $this->loadAddUser();
				break;
			
			default: 
				if ($view == "") {
					$content = $this->loadIndex();
				}else {
					$content = $this->loadEmptyPage();
				}
				break;
		}

		return $content;
	} 

	private function loadIndex () {
		ob_start();
			include_once("view/index.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	private function loadUserManagement() {
		ob_start();
			include_once("view/userManagement.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

	private function loadAddUser() {
		ob_start();
			include_once("view/addUser.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}



	
	private function loadEmptyPage() {
		ob_start();
			include_once("view/emptyPage.php");
			$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

}
?>