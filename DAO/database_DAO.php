<?php 
	require_once (dirname(__FILE__)."/../util/DatabaseConnection.php");
	
/*********************************

	GET ALL DATABASES IN HOST

*********************************/

	function GetAllDatabasesDAO($param) {
		$result = [];
		
		if (conectionHost($param)){
			global $conection_db;
			
			
			$test_pull = "SHOW DATABASES";
			$resultQuery = mysqli_query($conection_db, $test_pull);
			while ($row = mysqli_fetch_array($resultQuery)) {
				
				$result[] = $row;
				
			}
			closeDatabase();
		}
		
		return $result;
	}
	
/*********************************

	GET ALL TABLES BY DATABASE

*********************************/	

	function getAllTablesDAO($param) {
		$result = [];
		if (conectionDatabase($param)){
			global $conection_db;
			
			$test_pull = "SHOW TABLES FROM $param->database WHERE tables_in_$param->database NOT LIKE 'v%'";
			$resultQuery = mysqli_query($conection_db, $test_pull);
			while ($row = mysqli_fetch_array($resultQuery)) {
				
				$result[] = $row;
				
			}
			closeDatabase();
		}
		
		return $result;
	}
	
/*********************************

	GET ALL FIELDS BY TABLE

*********************************/

	function GetAllFieldsDAO($param) {
		$result = [];
		
		if (ConectionTables($param)){
			global $conection_db;
			
			$test_pull = "DESCRIBE $param";
			
			$resultQuery = mysqli_query($conection_db, $test_pull);
			while ($row = mysqli_fetch_array($resultQuery)) {
				
				$result[] = $row;
				
			}
			
			closeDatabase();
		}
		
		return $result;
	}
?>