<?php
	
	session_start();
	
	//global variable
	global $RENDER_VIEW, $DBObj;
	$RENDER_VIEW = "";
	$DBObj = NULL;
 

 	//autoload classes or models..
	function __autoload($model_name) {
		include("model/$model_name.php");   
	}


	//Database Set Up
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "ojt_activities";
	$config = array('host'=>$host, 'user'=>$user, 'password'=>$password, 'database'=>$database);

	include_once('model/Database_Model.php');
		$DBObj = new Database_Model($config);



	//Load the Site Controller
	include_once('controller/Controller.php');
		$controller = new Controller;
		$controller->load();


	//Close the Database
	$DBObj->disconnect();

?>