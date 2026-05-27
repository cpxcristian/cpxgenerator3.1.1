<?php
/***********************************
	Copixil
	CPX Generator
	Data Access Object Generated:buying_rows
**/
require_once (dirname(__FILE__).'/../TO/buying_rows_TO.php');
require_once (dirname(__FILE__).'/../../util/conectionDatabase.php');
class Buying_rows_DAOFactory {

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
	Create by TO Buying_rows_TO
	******************************/
	public static function createByTO(Buying_rows_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='INSERT INTO table_buying_rows
		(
		buying_id,
		product_id,
		description,
		amount,
		unit_cost,
		iva,
		total_cost,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
		VALUES (
	
		"'.$param->getBuying_id().'",
		"'.$param->getProduct_id().'",
		"'.$param->getDescription().'",
		"'.$param->getAmount().'",
		"'.$param->getUnit_cost().'",
		"'.$param->getIva().'",
		"'.$param->getTotal_cost().'",
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
	Read by TO Buying_rows_TO
	******************************/
	public static function readByTO(Buying_rows_TO $param){
		$result=new Buying_rows_TO();	
		global $conn;
		
		$getAllRows='SELECT * FROM table_buying_rows
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_ExecuteRow($getAllRows);
		if ($resultQuery){
				$result->setId ( $resultQuery['id']);
				$result->setBuying_id ( $resultQuery['buying_id']);
				$result->setProduct_id ( $resultQuery['product_id']);
				$result->setDescription ( $resultQuery['description']);
				$result->setAmount ( $resultQuery['amount']);
				$result->setUnit_cost ( $resultQuery['unit_cost']);
				$result->setIva ( $resultQuery['iva']);
				$result->setTotal_cost ( $resultQuery['total_cost']);
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
	ReadALL by TO Buying_rows_TO
	******************************/
	public static function readAll(){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buying_rows';
			$resultQuery = ew_Execute($getAllRows);
		
			if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				
				$currentTO = new Buying_rows_TO();
									
					$currentTO->setId($row['id']);
									
					$currentTO->setBuying_id($row['buying_id']);
									
					$currentTO->setProduct_id($row['product_id']);
									
					$currentTO->setDescription($row['description']);
									
					$currentTO->setAmount($row['amount']);
									
					$currentTO->setUnit_cost($row['unit_cost']);
									
					$currentTO->setIva($row['iva']);
									
					$currentTO->setTotal_cost($row['total_cost']);
									
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
	ReadByWhere by TO Buying_rows_TO
	******************************/
	public static function readByWhere($param){
		$result=[];	
		global $conn;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buying_rows '.$param.';';
		$resultQuery = ew_Execute($getAllRows);
		
		if ($resultQuery){
				$resultQueryRows = $resultQuery->GetRows();
				foreach ($resultQueryRows as $row ){
				$currentTO = new Buying_rows_TO();
				
					
					$currentTO->setId($row['id']);
					
					$currentTO->setBuying_id($row['buying_id']);
					
					$currentTO->setProduct_id($row['product_id']);
					
					$currentTO->setDescription($row['description']);
					
					$currentTO->setAmount($row['amount']);
					
					$currentTO->setUnit_cost($row['unit_cost']);
					
					$currentTO->setIva($row['iva']);
					
					$currentTO->setTotal_cost($row['total_cost']);
					
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
	Update by TO Buying_rows_TO
	******************************/
	public static function updateByTO(Buying_rows_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='UPDATE table_buying_rows 
					  SET 
		buying_id = "'.$param->getBuying_id().'",
		product_id = "'.$param->getProduct_id().'",
		description = "'.$param->getDescription().'",
		amount = "'.$param->getAmount().'",
		unit_cost = "'.$param->getUnit_cost().'",
		iva = "'.$param->getIva().'",
		total_cost = "'.$param->getTotal_cost().'",
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
	Deletes the Buying_rows_TO
	******************************/
	public static function deleteByTO(Buying_rows_TO $param){
		$result=true;	
		global $conn;
		
		$getAllRows='DELETE  FROM table_buying_rows
					   WHERE id="'.$param->getId().'"';
		$resultQuery = ew_Execute($getAllRows);
		return $result;
	}	
	/******************************
	Create by TO Buying_rows_TO
	******************************/
	public static function createByTOAJAX(Buying_rows_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			global $select_db ;
			$getAllRows='INSERT INTO table_buying_rows
			(
		buying_id,
		product_id,
		description,
		amount,
		unit_cost,
		iva,
		total_cost,
		notes,
		is_active,
		created_by,
		updated_by,
		created_at,
		updated_at) 
			VALUES (
		
			"'.$param->getBuying_id().'",
			"'.$param->getProduct_id().'",
			"'.$param->getDescription().'",
			"'.$param->getAmount().'",
			"'.$param->getUnit_cost().'",
			"'.$param->getIva().'",
			"'.$param->getTotal_cost().'",
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
	Read by TO Buying_rows_TO
	******************************/
	public static function readByTOAJAX(Buying_rows_TO $param){
		$result=new Buying_rows_TO();	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buying_rows
					   WHERE id="'.$param->getId().'"';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$result->setId($row['id']);
				$result->setBuying_id($row['buying_id']);
				$result->setProduct_id($row['product_id']);
				$result->setDescription($row['description']);
				$result->setAmount($row['amount']);
				$result->setUnit_cost($row['unit_cost']);
				$result->setIva($row['iva']);
				$result->setTotal_cost($row['total_cost']);
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
	Read by TO Buying_rows_TO
	******************************/
	public static function readAllAJAX(){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buying_rows';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Buying_rows_TO();
				$currentTO->setId($row['id']);
				$currentTO->setBuying_id($row['buying_id']);
				$currentTO->setProduct_id($row['product_id']);
				$currentTO->setDescription($row['description']);
				$currentTO->setAmount($row['amount']);
				$currentTO->setUnit_cost($row['unit_cost']);
				$currentTO->setIva($row['iva']);
				$currentTO->setTotal_cost($row['total_cost']);
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
	Read by TO Buying_rows_TO
	******************************/
	public static function readByWhereAJAX($param){
		$result=[];	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='SELECT * FROM table_buying_rows '.$param.';';
			$resultQuery =   $mysqli->query ($getAllRows);
			while($row = $resultQuery->fetch_assoc())
			{
				$currentTO= new Buying_rows_TO();
				$currentTO->setId($row['id']);
				$currentTO->setBuying_id($row['buying_id']);
				$currentTO->setProduct_id($row['product_id']);
				$currentTO->setDescription($row['description']);
				$currentTO->setAmount($row['amount']);
				$currentTO->setUnit_cost($row['unit_cost']);
				$currentTO->setIva($row['iva']);
				$currentTO->setTotal_cost($row['total_cost']);
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
	Update by TO Buying_rows_TO
	******************************/
	public static function updateByTOAJAX(Buying_rows_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='UPDATE table_buying_rows 
					  SET 
			buying_id = "'.$param->getBuying_id().'",
			product_id = "'.$param->getProduct_id().'",
			description = "'.$param->getDescription().'",
			amount = "'.$param->getAmount().'",
			unit_cost = "'.$param->getUnit_cost().'",
			iva = "'.$param->getIva().'",
			total_cost = "'.$param->getTotal_cost().'",
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
	Deletes the Buying_rows_TO
	******************************/
	public static function deleteByTOAJAX(Buying_rows_TO $param){
		$result=true;	
		global $mysqli;
		
		if (conectionDatabase()){
			$getAllRows='DELETE  FROM table_buying_rows
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