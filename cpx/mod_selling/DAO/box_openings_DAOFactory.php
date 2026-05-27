<?php
/***********************************
	Copixil
	CPX Generator
	Data Access Object Generated:box_openings
**/
require_once (dirname(__FILE__).'/../TO/box_openings_TO.php');
require_once (dirname(__FILE__).'/../../util/conectionDatabase.php');
class Box_openings_DAOFactory {

	/******************************
	Constructor
	******************************/
	function __construct() {
       
    }
	

	
	/******************************
	Destructor
	******************************/
	function __destruct(){
       
    }
		
	/******************************
	Create by TO Box_openings_TO
	******************************/
	public static function createByTO(Box_openings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='INSERT INTO table_box_openings
		(
		opened_by,
		opening_datetime,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
		VALUES (
	
		"'.$param->getOpened_by().'",
		"'.$param->getOpening_datetime().'",
		"'.$param->getNotes().'",
		"'.$param->getIs_active().'",
		"'.$param->getCreated_by().'",
		"'.$param->getUpdated_by().'",
		"'.$param->getCreated_at().'",
		"'.$param->getUpdated_at().'"
		)';
		$resultQuery = ew_Execute($getAllRows);
		if ($resultQuery) {
			$param->setId($GLOBALS['conn']->Insert_ID());
			
			$result = $param;
		}else  {
			$result = false;
		}
		return $result;
	}	
	/******************************
	Read by TO Box_openings_TO
	******************************/
	public static function readByTO(Box_openings_TO $param){
		$result=new Box_openings_TO();	
		global $conn;
		
		$getAllRows='SELECT * FROM table_box_openings
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_ExecuteRow($getAllRows);
		if ($resultQuery){
				$result->setId ( $resultQuery['id']);
				$result->setOpened_by ( $resultQuery['opened_by']);
				$result->setOpening_datetime ( $resultQuery['opening_datetime']);
				$result->setNotes ( $resultQuery['notes']);
				$result->setIs_active ( $resultQuery['is_active']);
				$result->setCreated_by ( $resultQuery['created_by']);
				$result->setUpdated_by ( $resultQuery['updated_by']);
				$result->setCreated_at ( $resultQuery['created_at']);
				$result->setUpdated_at ( $resultQuery['updated_at']);
		}else{ 
			$result = false;
		}
		return $result;
	}	
	/******************************
	ReadALL by TO Box_openings_TO
	******************************/
	public static function readAll(){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_box_openings';
			$resultQuery = ew_Execute($getAllRows);
		
			if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				
				$currentTO = new Box_openings_TO();
									
					$currentTO->setId($row['id']);
									
					$currentTO->setOpened_by($row['opened_by']);
									
					$currentTO->setOpening_datetime($row['opening_datetime']);
									
					$currentTO->setNotes($row['notes']);
									
					$currentTO->setIs_active($row['is_active']);
									
					$currentTO->setCreated_by($row['created_by']);
									
					$currentTO->setUpdated_by($row['updated_by']);
									
					$currentTO->setCreated_at($row['created_at']);
									
					$currentTO->setUpdated_at($row['updated_at']);$result[] =$currentTO;
				}
			}
		}else{ 
			$result = false;
		}
		return $result;
	}	
	/******************************
	ReadByWhere by TO Box_openings_TO
	******************************/
	public static function readByWhere($param){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_box_openings '.$param.';';
		$resultQuery = ew_Execute($getAllRows);
		
		if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				$currentTO = new Box_openings_TO();
				
					
					$currentTO->setId($row['id']);
					
					$currentTO->setOpened_by($row['opened_by']);
					
					$currentTO->setOpening_datetime($row['opening_datetime']);
					
					$currentTO->setNotes($row['notes']);
					
					$currentTO->setIs_active($row['is_active']);
					
					$currentTO->setCreated_by($row['created_by']);
					
					$currentTO->setUpdated_by($row['updated_by']);
					
					$currentTO->setCreated_at($row['created_at']);
					
					$currentTO->setUpdated_at($row['updated_at']);
					$result[] =$currentTO;
				}
			}
		}else{ 
			$result = false;
		}
		return $result;
	}	
	/******************************
	Update by TO Box_openings_TO
	******************************/
	public static function updateByTO(Box_openings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='UPDATE table_box_openings 
					  SET 
		opened_by = "'.$param->getOpened_by().'",
		opening_datetime = "'.$param->getOpening_datetime().'",
		notes = "'.$param->getNotes().'",
		is_active = "'.$param->getIs_active().'",
		created_by = "'.$param->getCreated_by().'",
		updated_by = "'.$param->getUpdated_by().'",
		created_at = "'.$param->getCreated_at().'",
		updated_at = "'.$param->getUpdated_at().'"
		WHERE id= "'.$param->getId().'"';
		$resultQuery = ew_Execute($getAllRows);
		return $result;
	}	
	/******************************
	Deletes the Box_openings_TO
	******************************/
	public static function deleteByTO(Box_openings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='DELETE  FROM table_box_openings
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_Execute($getAllRows);
		return $result;
	}	
	/******************************
	Create by TO Box_openings_TO
	******************************/
	public static function createByTOAJAX(Box_openings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			global $select_db ;
			$getAllRows='INSERT INTO table_box_openings
			(
		opened_by,
		opening_datetime,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
			VALUES (
		
			"'.$param->getOpened_by().'",
			"'.$param->getOpening_datetime().'",
			"'.$param->getNotes().'",
			"'.$param->getIs_active().'",
			"'.$param->getCreated_by().'",
			"'.$param->getUpdated_by().'",
			"'.$param->getCreated_at().'",
			"'.$param->getUpdated_at().'"
			)';
			$mysqli->query($getAllRows);
			$param->setId($mysqli->insert_id);
			$result = $param;
			
			closeDatabase();
			
		} else {
			$result=false;
		}
		return $result;
	}	
	/******************************
	Read by TO Box_openings_TO
	******************************/
	public static function readByTOAJAX(Box_openings_TO $param){
		$result=new Box_openings_TO();	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_box_openings
					   WHERE id="'.$param->getId().'"';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$result->setId($row['id']);
				$result->setOpened_by($row['opened_by']);
				$result->setOpening_datetime($row['opening_datetime']);
				$result->setNotes($row['notes']);
				$result->setIs_active($row['is_active']);
				$result->setCreated_by($row['created_by']);
				$result->setUpdated_by($row['updated_by']);
				$result->setCreated_at($row['created_at']);
				$result->setUpdated_at($row['updated_at']);
			};
			$resultQuery->free();
			closeDatabase();
		} else {
			$result=false;
		}
		return $result;
	}	
	/******************************
	Read by TO Box_openings_TO
	******************************/
	public static function readAllAJAX(){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_box_openings';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Box_openings_TO();
				$currentTO->setId($row['id']);
				$currentTO->setOpened_by($row['opened_by']);
				$currentTO->setOpening_datetime($row['opening_datetime']);
				$currentTO->setNotes($row['notes']);
				$currentTO->setIs_active($row['is_active']);
				$currentTO->setCreated_by($row['created_by']);
				$currentTO->setUpdated_by($row['updated_by']);
				$currentTO->setCreated_at($row['created_at']);
				$currentTO->setUpdated_at($row['updated_at']);
				$result[]=$currentTO;
			};
			$resultQuery->free();
			closeDatabase();
		} else {
			$result=false;
		}
		return $result;
	}	
	/******************************
	Read by TO Box_openings_TO
	******************************/
	public static function readByWhereAJAX($param){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_box_openings '.$param.';';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Box_openings_TO();
				$currentTO->setId($row['id']);
				$currentTO->setOpened_by($row['opened_by']);
				$currentTO->setOpening_datetime($row['opening_datetime']);
				$currentTO->setNotes($row['notes']);
				$currentTO->setIs_active($row['is_active']);
				$currentTO->setCreated_by($row['created_by']);
				$currentTO->setUpdated_by($row['updated_by']);
				$currentTO->setCreated_at($row['created_at']);
				$currentTO->setUpdated_at($row['updated_at']);
				$result[]=$currentTO;
			};
			$resultQuery->free();
			closeDatabase();
		} else {
			$result=false;
		}
		return $result;
	}	
	/******************************
	Update by TO Box_openings_TO
	******************************/
	public static function updateByTOAJAX(Box_openings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='UPDATE table_box_openings 
					  SET 
			opened_by = "'.$param->getOpened_by().'",
			opening_datetime = "'.$param->getOpening_datetime().'",
			notes = "'.$param->getNotes().'",
			is_active = "'.$param->getIs_active().'",
			created_by = "'.$param->getCreated_by().'",
			updated_by = "'.$param->getUpdated_by().'",
			created_at = "'.$param->getCreated_at().'",
			updated_at = "'.$param->getUpdated_at().'"
			WHERE id= "'.$param->getId().'"';
		$resultQuery =  $mysqli->query ($getAllRows);
		
		closeDatabase();
		} else {
			$result=false;
		}
		return $result;
	}	
	/******************************
	Deletes the Box_openings_TO
	******************************/
	public static function deleteByTOAJAX(Box_openings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='DELETE  FROM table_box_openings
					   WHERE id="'.$param->getId().'"';
			$resultQuery =  $mysqli->query ($getAllRows);
			closeDatabase();
			
		} else {
			$result=false;
		}
		return $result;
	}
			
}
?>