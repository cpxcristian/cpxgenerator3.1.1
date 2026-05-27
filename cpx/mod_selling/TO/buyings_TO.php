<?php
/***********************************
	Copixil
	CPX Generator
	Transfer Object Generated:buyings
**/
class Buyings_TO {

	public $id = 0;
	public $supplier_id = 0;
	public $subtotal = "";
	public $iva = "";
	public $total = "";
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
	Gets the supplier_id
	******************************/
	function getSupplier_id(){
		return $this->supplier_id;
	}	
	/******************************
	Gets the subtotal
	******************************/
	function getSubtotal(){
		return $this->subtotal;
	}	
	/******************************
	Gets the iva
	******************************/
	function getIva(){
		return $this->iva;
	}	
	/******************************
	Gets the total
	******************************/
	function getTotal(){
		return $this->total;
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
	Sets the supplier_id
	******************************/
	function setSupplier_id($param){
		 $this->supplier_id = $param;
	}	
	/******************************
	Sets the subtotal
	******************************/
	function setSubtotal($param){
		 $this->subtotal = $param;
	}	
	/******************************
	Sets the iva
	******************************/
	function setIva($param){
		 $this->iva = $param;
	}	
	/******************************
	Sets the total
	******************************/
	function setTotal($param){
		 $this->total = $param;
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
		$result.="<tr><td>buyings</td></tr>";
		$result.="<tr><td>id</td><td>$this->id</td></tr>";
		$result.="<tr><td>supplier_id</td><td>$this->supplier_id</td></tr>";
		$result.="<tr><td>subtotal</td><td>$this->subtotal</td></tr>";
		$result.="<tr><td>iva</td><td>$this->iva</td></tr>";
		$result.="<tr><td>total</td><td>$this->total</td></tr>";
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