<?php
	require_once (dirname(__FILE__).'/../facade/database_Facade.php');
	
	function GetDatabaseList() {
		$result = '';
		
		$database = new conection_TO();
		$database->hostname = 'localhost';
		$database->username = 'root';
		$database->password = '';
		
		$result = GetAllDatabases($database);
		
		return $result;
	}
?>