<?php
/***********************************
	Copixil
	CPX Generator
	Transfer Object Generated:buying_rows
**/
class Buying_rows_TO {

	public $id = 0;
	public $buying_id = 0;
	public $product_id = 0;
	public $description = "";
	public $amount = "";
	public $unit_cost = "";
	public $iva = "";
	public $total_cost = "";
	public $notes = "";
	public $is_active = "";
	public $created_by = "";
	public $updated_by = "";
	public $created_at = "";
	public $updated_at = "";
	/******************************
	Constructor
	******************************/
	function __construct($param = null) {
       if (!is_null($param))
	   $this->id = $param;
    }
	
	/******************************
	Destructor
	******************************/
	function __destruct(){
       
    }
		
	/******************************
	Gets the id
	******************************/
	function getId(){
		return $this->id;
	}	
	/******************************
	Gets the buying_id
	******************************/
	function getBuying_id(){
		return $this->buying_id;
	}	
	/******************************
	Gets the product_id
	******************************/
	function getProduct_id(){
		return $this->product_id;
	}	
	/******************************
	Gets the description
	******************************/
	function getDescription(){
		return $this->description;
	}	
	/******************************
	Gets the amount
	******************************/
	function getAmount(){
		return $this->amount;
	}	
	/******************************
	Gets the unit_cost
	******************************/
	function getUnit_cost(){
		return $this->unit_cost;
	}	
	/******************************
	Gets the iva
	******************************/
	function getIva(){
		return $this->iva;
	}	
	/******************************
	Gets the total_cost
	******************************/
	function getTotal_cost(){
		return $this->total_cost;
	}	
	/******************************
	Gets the notes
	******************************/
	function getNotes(){
		return $this->notes;
	}	
	/******************************
	Gets the is_active
	******************************/
	function getIs_active(){
		return $this->is_active;
	}	
	/******************************
	Gets the created_by
	******************************/
	function getCreated_by(){
		return $this->created_by;
	}	
	/******************************
	Gets the updated_by
	******************************/
	function getUpdated_by(){
		return $this->updated_by;
	}	
	/******************************
	Gets the created_at
	******************************/
	function getCreated_at(){
		return $this->created_at;
	}	
	/******************************
	Gets the updated_at
	******************************/
	function getUpdated_at(){
		return $this->updated_at;
	}	
	/******************************
	Sets the id
	******************************/
	function setId($param){
		 $this->id = $param;
	}	
	/******************************
	Sets the buying_id
	******************************/
	function setBuying_id($param){
		 $this->buying_id = $param;
	}	
	/******************************
	Sets the product_id
	******************************/
	function setProduct_id($param){
		 $this->product_id = $param;
	}	
	/******************************
	Sets the description
	******************************/
	function setDescription($param){
		 $this->description = $param;
	}	
	/******************************
	Sets the amount
	******************************/
	function setAmount($param){
		 $this->amount = $param;
	}	
	/******************************
	Sets the unit_cost
	******************************/
	function setUnit_cost($param){
		 $this->unit_cost = $param;
	}	
	/******************************
	Sets the iva
	******************************/
	function setIva($param){
		 $this->iva = $param;
	}	
	/******************************
	Sets the total_cost
	******************************/
	function setTotal_cost($param){
		 $this->total_cost = $param;
	}	
	/******************************
	Sets the notes
	******************************/
	function setNotes($param){
		 $this->notes = $param;
	}	
	/******************************
	Sets the is_active
	******************************/
	function setIs_active($param){
		 $this->is_active = $param;
	}	
	/******************************
	Sets the created_by
	******************************/
	function setCreated_by($param){
		 $this->created_by = $param;
	}	
	/******************************
	Sets the updated_by
	******************************/
	function setUpdated_by($param){
		 $this->updated_by = $param;
	}	
	/******************************
	Sets the created_at
	******************************/
	function setCreated_at($param){
		 $this->created_at = $param;
	}	
	/******************************
	Sets the updated_at
	******************************/
	function setUpdated_at($param){
		 $this->updated_at = $param;
	}	
	/******************************
	 ToString Method
	******************************/
	function __toString(){
		$result="<table>  ";
		$result.="<tr><td>buying_rows</td></tr>";
		$result.="<tr><td>id</td><td>$this->id</td></tr>";
		$result.="<tr><td>buying_id</td><td>$this->buying_id</td></tr>";
		$result.="<tr><td>product_id</td><td>$this->product_id</td></tr>";
		$result.="<tr><td>description</td><td>$this->description</td></tr>";
		$result.="<tr><td>amount</td><td>$this->amount</td></tr>";
		$result.="<tr><td>unit_cost</td><td>$this->unit_cost</td></tr>";
		$result.="<tr><td>iva</td><td>$this->iva</td></tr>";
		$result.="<tr><td>total_cost</td><td>$this->total_cost</td></tr>";
		$result.="<tr><td>notes</td><td>$this->notes</td></tr>";
		$result.="<tr><td>is_active</td><td>$this->is_active</td></tr>";
		$result.="<tr><td>created_by</td><td>$this->created_by</td></tr>";
		$result.="<tr><td>updated_by</td><td>$this->updated_by</td></tr>";
		$result.="<tr><td>created_at</td><td>$this->created_at</td></tr>";
		$result.="<tr><td>updated_at</td><td>$this->updated_at</td></tr>";
		$result.="</table> "; 
	
		return $result;
	}
	
}
?>