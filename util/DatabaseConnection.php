<?php 
require_once (dirname(__FILE__)."/../util/conectionHost_TO.php");
	
		$conection_db = null;
		$select_db = null;
		
		define("HOST", "localhost");
		define("USERNAME", "root");
		define("PASSWORD", "");
		define("DATABASE", "");
		
/********************

	CONECTION HOST

********************/
	
	function conectionHost(conection_TO $param=null){
		$result = true;
		
		if ($param ==null) {
			$param = new conection_TO();
			$param->hostname =HOST;
			$param->username =USERNAME;
			$param->password =PASSWORD;
			$param->database =DATABASE ;
		}
		global $conection_db;
		try {
			$conection_db = mysqli_connect($param->hostname, $param->username, $param->password);
		} catch (mysqli_sql_exception $e) {
			echo $e->getMessage();
		}
				
		return $result;
	}
	
/***********************

	CONECTION DATABASE

***********************/
	
	function conectionDatabase(conection_TO $param=null){
		$result = true;
		if ($param ==null) {
			$param = new conection_TO();
			$param->hostname =HOST;
			$param->username =USERNAME;
			$param->password =PASSWORD;
			$param->database =DATABASE ;
		}
		global $conection_db;
		$conection_db = mysqli_connect($param->hostname, $param->username, $param->password, $param->database)
				or $result=false;
				
		return $result;
	}
	
/***********************

	CONECTION TABLES

***********************/	
	function ConectionTables($param){
		$result = true;
		global $conection_db;
		
		
		
		$conection_db = mysqli_connect($_SESSION['hostname'], $_SESSION['username'], $_SESSION['password'], $_SESSION['database'])
				or $result=false;
				
		return $result;
	}

/***********************

	CLOSE CONNECTION

***********************/
	
	function closeDatabase(){
		global $conection_db;
		mysqli_close($conection_db);
	}
	
	
?>