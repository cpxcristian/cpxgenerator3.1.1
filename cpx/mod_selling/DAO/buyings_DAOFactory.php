<?php
/***********************************
	Copixil
	CPX Generator
	Data Access Object Generated:buyings
**/
require_once (dirname(__FILE__).'/../TO/buyings_TO.php');
require_once (dirname(__FILE__).'/../../util/conectionDatabase.php');
class Buyings_DAOFactory {

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
	Create by TO Buyings_TO
	******************************/
	public static function createByTO(Buyings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='INSERT INTO table_buyings
		(
		supplier_id,
		subtotal,
		iva,
		total,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
		VALUES (
	
		"'.$param->getSupplier_id().'",
		"'.$param->getSubtotal().'",
		"'.$param->getIva().'",
		"'.$param->getTotal().'",
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
	Read by TO Buyings_TO
	******************************/
	public static function readByTO(Buyings_TO $param){
		$result=new Buyings_TO();	
		global $conn;
		
		$getAllRows='SELECT * FROM table_buyings
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_ExecuteRow($getAllRows);
		if ($resultQuery){
				$result->setId ( $resultQuery['id']);
				$result->setSupplier_id ( $resultQuery['supplier_id']);
				$result->setSubtotal ( $resultQuery['subtotal']);
				$result->setIva ( $resultQuery['iva']);
				$result->setTotal ( $resultQuery['total']);
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
	ReadALL by TO Buyings_TO
	******************************/
	public static function readAll(){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buyings';
			$resultQuery = ew_Execute($getAllRows);
		
			if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				
				$currentTO = new Buyings_TO();
									
					$currentTO->setId($row['id']);
									
					$currentTO->setSupplier_id($row['supplier_id']);
									
					$currentTO->setSubtotal($row['subtotal']);
									
					$currentTO->setIva($row['iva']);
									
					$currentTO->setTotal($row['total']);
									
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
	ReadByWhere by TO Buyings_TO
	******************************/
	public static function readByWhere($param){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buyings '.$param.';';
		$resultQuery = ew_Execute($getAllRows);
		
		if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				$currentTO = new Buyings_TO();
				
					
					$currentTO->setId($row['id']);
					
					$currentTO->setSupplier_id($row['supplier_id']);
					
					$currentTO->setSubtotal($row['subtotal']);
					
					$currentTO->setIva($row['iva']);
					
					$currentTO->setTotal($row['total']);
					
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
	Update by TO Buyings_TO
	******************************/
	public static function updateByTO(Buyings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='UPDATE table_buyings 
					  SET 
		supplier_id = "'.$param->getSupplier_id().'",
		subtotal = "'.$param->getSubtotal().'",
		iva = "'.$param->getIva().'",
		total = "'.$param->getTotal().'",
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
	Deletes the Buyings_TO
	******************************/
	public static function deleteByTO(Buyings_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='DELETE  FROM table_buyings
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_Execute($getAllRows);
		return $result;
	}	
	/******************************
	Create by TO Buyings_TO
	******************************/
	public static function createByTOAJAX(Buyings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			global $select_db ;
			$getAllRows='INSERT INTO table_buyings
			(
		supplier_id,
		subtotal,
		iva,
		total,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
			VALUES (
		
			"'.$param->getSupplier_id().'",
			"'.$param->getSubtotal().'",
			"'.$param->getIva().'",
			"'.$param->getTotal().'",
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
	Read by TO Buyings_TO
	******************************/
	public static function readByTOAJAX(Buyings_TO $param){
		$result=new Buyings_TO();	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buyings
					   WHERE id="'.$param->getId().'"';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$result->setId($row['id']);
				$result->setSupplier_id($row['supplier_id']);
				$result->setSubtotal($row['subtotal']);
				$result->setIva($row['iva']);
				$result->setTotal($row['total']);
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
	Read by TO Buyings_TO
	******************************/
	public static function readAllAJAX(){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buyings';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Buyings_TO();
				$currentTO->setId($row['id']);
				$currentTO->setSupplier_id($row['supplier_id']);
				$currentTO->setSubtotal($row['subtotal']);
				$currentTO->setIva($row['iva']);
				$currentTO->setTotal($row['total']);
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
	Read by TO Buyings_TO
	******************************/
	public static function readByWhereAJAX($param){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buyings '.$param.';';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Buyings_TO();
				$currentTO->setId($row['id']);
				$currentTO->setSupplier_id($row['supplier_id']);
				$currentTO->setSubtotal($row['subtotal']);
				$currentTO->setIva($row['iva']);
				$currentTO->setTotal($row['total']);
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
	Update by TO Buyings_TO
	******************************/
	public static function updateByTOAJAX(Buyings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='UPDATE table_buyings 
					  SET 
			supplier_id = "'.$param->getSupplier_id().'",
			subtotal = "'.$param->getSubtotal().'",
			iva = "'.$param->getIva().'",
			total = "'.$param->getTotal().'",
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
	Deletes the Buyings_TO
	******************************/
	public static function deleteByTOAJAX(Buyings_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='DELETE  FROM table_buyings
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