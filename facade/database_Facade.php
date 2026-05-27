<?php 
	
	require_once (dirname(__FILE__)."/../DAO/database_DAO.php");
	require_once (dirname(__FILE__)."/../util/templates.php");
	
	

	/******GET DATABASE ********/
	function GetAllDatabases($param) {
		
		$result = [];
		$result = GetAllDatabasesDAO($param);
	
		return $result;
	}
	
	/******GET TABLE ********/
	function GetAllTables($param){
		$result = [];
		$result = getAllTablesDAO($param);
		//var_dump($result);
		return $result;
	
	}
	/******GET FIELDS ********/
	function GetAllFields($tableSelected){
		$result = [];
		$result = GetAllFieldsDAO($tableSelected);
		//var_dump($result);
		return $result;
	
	}
	
	/** rearrange the Array to treeArray*********************************/
	function arrayToTree($param) {
		$result =[];
		
		foreach ($param as $key => $currentTable) {
			if ($currentTable!='0'){
				/*if (!array_key_exists($currentTable, $result)){
					$result[$currentTable] = [];					
				}*/
				
				$result[$currentTable][] = $key;

			}
		}
		
		return $result;
	}
	/** Create all Dirs for modules*********************************/
	function createDirsByKeys($keys){
		
		@mkdir('../cpx', 0, true);
		foreach ($keys as $current){
			
			$dirs= Array("/view/interfase/css",
						"/view/interfase/img",
						"/view/interfase",
						"/view/functions",
						"/view/content",
						"/view",
						"/DAO",
						"/facade",
						"/TO",
						"/BD",
						"");
			foreach ($dirs as $dir){
				$rootDir = '../cpx/mod_'.strtolower($current).$dir.'/index.php';
				
				@mkdir('../cpx/mod_'.strtolower($current).$dir ,0,true);
				
				$fp = fopen($rootDir, 'w+');
				$fw = fwrite($fp, "Acceso denegado");
			}
		}
		return true;
	
	}
	
	
	/** Create all Dirs for modules*********************************/
	
	function createAllTO($param){
		$result =true;
		
		foreach ($param as $module => $TOs ){
			
			foreach($TOs as $currentTO){
				$fp = fopen('../cpx/mod_'.$module.'/TO/'.strtolower($currentTO).'_TO.php', 'w+');
				fwrite($fp, getTOTemplate($currentTO));	
				fclose($fp);
			}
		}
		
		return $result;
	}
	
	function createAllDAO($param){
		$result =true;
		
		foreach ($param as $module => $TOs ){
			
			foreach($TOs as $currentTO){
				$fp = fopen('../cpx/mod_'.$module.'/DAO/'.strtolower($currentTO).'_DAO.php', 'w+');
				fwrite($fp, getDAOTemplate($currentTO));	
				fclose($fp);
				$fp = fopen('../cpx/mod_'.$module.'/DAO/'.strtolower($currentTO).'_DAOFactory.php', 'w+');
				fwrite($fp, getDAOFactoryTemplate($currentTO));	
				fclose($fp);
			}
		}
		
		return $result;
	}
	
	function createAllFacade($param){
		$result =true;
		
		foreach ($param as $module => $TOs ){
			
			foreach($TOs as $currentTO){
				$fp = fopen('../cpx/mod_'.$module.'/Facade/'.strtolower($currentTO).'_Facade.php', 'w+');
				fwrite($fp, getFacadeTemplate($currentTO));	
				fclose($fp);
				$fp = fopen('../cpx/mod_'.$module.'/Facade/'.strtolower($currentTO).'_FacadeFactory.php', 'w+');
				fwrite($fp, getFacadeFactoryTemplate($currentTO));	
				fclose($fp);
			}
		}
		
		return $result;
	}
	/** This does all magic*********************************/
	function createCPX($param) {
		$result =true;
		// _$POST to Tree
		
		$treeArray  = arrayToTree($param);
		
		// Create key dirs
		$result = createDirsByKeys(array_keys($treeArray));
		
		// Create Leaf TO
		if ($result) {
			$result = createAllTO($treeArray);
		} 
		// Create Leaf DAO
		if ($result) {
			$result = createAllDAO($treeArray);
		} 
		if ($result) {
			$result = createAllFacade($treeArray);
		}  
		
		// foreach key add leafs to Facade
		
		//echo "Modulos generados correctamente";	
		return $result;
	}

?>