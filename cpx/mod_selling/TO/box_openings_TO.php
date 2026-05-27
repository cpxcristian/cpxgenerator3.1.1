<?php
/***********************************
	Copixil
	CPX Generator
	Transfer Object Generated:box_openings
**/
class Box_openings_TO {

	public $id = "";
	public $opened_by = "";
	public $opening_datetime = "";
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
	Gets the opened_by
	******************************/
	function getOpened_by(){
		return $this->opened_by;
	}	
	/******************************
	Gets the opening_datetime
	******************************/
	function getOpening_datetime(){
		return $this->opening_datetime;
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
	Sets the opened_by
	******************************/
	function setOpened_by($param){
		 $this->opened_by = $param;
	}	
	/******************************
	Sets the opening_datetime
	******************************/
	function setOpening_datetime($param){
		 $this->opening_datetime = $param;
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
		$result.="<tr><td>box_openings</td></tr>";
		$result.="<tr><td>id</td><td>$this->id</td></tr>";
		$result.="<tr><td>opened_by</td><td>$this->opened_by</td></tr>";
		$result.="<tr><td>opening_datetime</td><td>$this->opening_datetime</td></tr>";
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