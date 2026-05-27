<?php
	session_start();
	require_once (dirname(__FILE__).'/../facade/database_Facade.php');
	require_once (dirname(__FILE__).'/../view/content/page_content.php');
	
	$result = '';
	
	$_SESSION['hostname'] = 'localhost';
	$_SESSION['username'] = 'root';
	$_SESSION['password'] = '';
	$_SESSION['database'] = $_POST["database"];
	
	$database = new conection_TO();
	$database->hostname = 'localhost';
	$database->username = 'root';
	$database->password = '';
	$database->database = $_POST["database"];
	
	$resultTables = GetAllTables($database);
	
	$result = showTableListContent($resultTables, $_POST["database"]);
	
	echo json_encode($result);
?>