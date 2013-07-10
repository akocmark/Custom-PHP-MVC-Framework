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

			case "profile":
				$profile_model = new Profile_Model();
				$content = $profile_model->loadManager();
				break;

			case "user-logbook":
				$logbook_model = new Logbook_Model();
				$content = $logbook_model->loadManager();
				break;

			case "edit-profile":
				$content = $this->loadEditProfile();
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

	private function loadEditProfile() {
		ob_start();
			include_once("view/editProfile.php");
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