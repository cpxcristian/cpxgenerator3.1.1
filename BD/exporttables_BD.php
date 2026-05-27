<?php
	session_start();
	require_once (dirname(__FILE__)."/../facade/database_Facade.php");
	
	$result = true;
	$arrTables = [];
	foreach($_POST["tables"] as $key => $currentTable) {
		$arrTables[$currentTable] = $_POST["modulename"];
	}

	$result = createCPX($arrTables);
	
	echo json_encode($result);
?>