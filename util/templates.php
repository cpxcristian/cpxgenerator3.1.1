<?php 
require_once (dirname(__FILE__)."/../DAO/database_DAO.php");
	
function getTOAttributes($attributes){
	$result ="";
	foreach ($attributes as $currentAttribute) {
		$defaultValue="\"\"";
		if ($currentAttribute["Default"]==null){	
			$attributeType= $currentAttribute["Type"];
			if (substr($attributeType, 0, 3)=="int"){
				$defaultValue="0";
			} else if (substr($attributeType, 0, 5)=="float"){
				$defaultValue="0.0";
			}else if (substr($attributeType, 0, 4)=="date"){
				$defaultValue="\"\"";
			} 
		} else {
			$defaultValue="\"\"";
			/*if (substr($attributeType, 0, 4)=="date"){
				$defaultValue="";
			} else{
				$defaultValue=$currentAttribute["Default"];
			}*/
		}
		$result.="
	public \$".$currentAttribute["Field"]." = ".$defaultValue.";";
		
	}
	return $result;
}

function getToString($to,$attributes ){

	$result ="";
		
	$result.="	
	/******************************
	 ToString Method
	******************************/
	function __toString(){
		\$result=\"<table>  \";
		";
		
	$result.= "\$result.=\"<tr><td>".$to."</td></tr>\";
	";
	foreach ($attributes as $currentAttribute) {
	$result.= "	\$result.=\""."<tr><td>".$currentAttribute["Field"]."</td><td>\$this->".$currentAttribute["Field"]."</td></tr>\";
	";	
	}		
	$result.="	\$result.=\""."</table> \"; 
	
		return \$result;
	}";
		
	
	return $result;
}
function getGetters($attributes){
	$result ="";
	foreach ($attributes as $currentAttribute) {
		
	$result.="	
	/******************************
	Gets the ".$currentAttribute["Field"]."
	******************************/
	function get".ucfirst($currentAttribute["Field"])."(){
		return \$this->".$currentAttribute["Field"].";
	}";
		
	}
	return $result;
}

function getSetters($attributes){
	$result ="";
	foreach ($attributes as $currentAttribute) {
		
		$result.="	
	/******************************
	Sets the ".$currentAttribute["Field"]."
	******************************/
	function set".ucfirst($currentAttribute["Field"])."(\$param){
		 \$this->".$currentAttribute["Field"]." = \$param;
	}";
		
	}
	return $result;
}

function getConstructor (){
	
	$result="
	/******************************
	Constructor
	******************************/
	function __construct() {
       
    }
	

	";
	return $result;
}
function getTObyIdConstructor (){
	
	$result="
	/******************************
	Constructor
	******************************/
	function __construct(\$param = null) {
       if (!is_null(\$param))
	   \$this->id = \$param;
    }
	";
	return $result;
}
function getDestructor (){
	
	$result="
	/******************************
	Destructor
	******************************/
	function __destruct(){
       
    }
	";
	return $result;
}
function getTOTemplate($to){
	$result ="";
	$result .="<?php
/***********************************
	Copixil
	CPX Generator
	Transfer Object Generated:".$to."
**/
class ".ucfirst($to)."_TO {
";

	$attributes = GetAllFieldsDAO($to);
	$result .= getTOAttributes($attributes);
	//$result .= getConstructor();
	$result .= getTObyIdConstructor();
	$result .= getDestructor();
	$result .= getGetters($attributes);
	$result .= getSetters($attributes);
	$result .= getToString($to,$attributes);
$result .="
	
}
?>";
	return $result;
}
	
/***********************************************************************/

function getDAOCreate($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Create by TO ".ucfirst($to)."_TO
	******************************/
	public static function createByTO(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$conn;
		
		\$getAllRows='INSERT INTO table_".$to."
		(";
	$fields="";
	$values="";
	//removes the id
	array_shift($attributes); 
	foreach ($attributes as $currentAttribute) {
		$fields.="
		".$currentAttribute["Field"].",";
		$values.="
		\"'.\$param->get".ucfirst($currentAttribute["Field"])."().'\",";
	}
	$fields = substr($fields, 0, -1);
	$values = substr($values, 0, -1);
	$result.=$fields.") 
		VALUES (
	".$values."
		)';";
	
	$result.="
		\$resultQuery = ew_Execute(\$getAllRows);";
		
	$result.="
		if (\$resultQuery) {
			\$param->setId(\$GLOBALS['conn']->Insert_ID());
			
			\$result = \$param;
		}else  {
			\$result = false;
		}
		return \$result;
	}";
		
	
	return $result;
}
function getDAORead($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByTO(".ucfirst($to)."_TO \$param){
		\$result=new ".ucfirst($to)."_TO();	
		global \$conn;
		
		\$getAllRows='SELECT * FROM table_".$to."
					   WHERE id=\"'.\$param->getId().'\"';";
	
	
	$result.="
		\$resultQuery = ew_ExecuteRow(\$getAllRows);
		";
	
	$result.="if (\$resultQuery){";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
				\$result->set".ucfirst($currentAttribute["Field"])." ( \$resultQuery['".$currentAttribute["Field"]."']);";
	}
				
				
	$result.="
		}else{ 
			\$result = false;
		}";
		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}
function getDAOReadByWhere($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	ReadByWhere by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByWhere(\$param){
		\$result=[];	
		global \$conn;
		
		if (conectionDatabase()){
			\$getAllRows='SELECT * FROM table_".$to." '.\$param.';';";

	$result.="
		\$resultQuery = ew_Execute(\$getAllRows);
		";
	
	$result.="
		if (\$resultQuery){";
	$result.= "
				\$resultQueryRows = \$resultQuery->GetRows();
				foreach (\$resultQueryRows as \$row ){
				\$currentTO = new ".ucfirst($to)."_TO();
				";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
					
					\$currentTO->set".ucfirst($currentAttribute["Field"])."(\$row['".$currentAttribute["Field"]."']);";
	}
			
	$result.="
					\$result[] =\$currentTO;
				}
			}
		}else{ 
			\$result = false;
		}";	
			
	$result.="
		return \$result;
	}";
		
	
	return $result;
}
function getDAOReadAll($to, $attributes){
	$result ="";
		
	$result.="	
	/******************************
	ReadALL by TO ".ucfirst($to)."_TO
	******************************/
	public static function readAll(){
		\$result=[];	
		global \$conn;
		
		if (conectionDatabase()){
			\$getAllRows='SELECT * FROM table_".$to."';";

	$result.="
			\$resultQuery = ew_Execute(\$getAllRows);
		";
	
	$result.="
			if (\$resultQuery){";
	$result.= "
				\$resultQueryRows = \$resultQuery->GetRows();
				foreach (\$resultQueryRows as \$row ){
				
				\$currentTO = new ".ucfirst($to)."_TO();";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
									
					\$currentTO->set".ucfirst($currentAttribute["Field"])."(\$row['".$currentAttribute["Field"]."']);";
	}
			
	$result.="\$result[] =\$currentTO;
				}
			}
		}else{ 
			\$result = false;
		}";	
			
	$result.="
		return \$result;
	}";
		
	
	return $result;
	
}
function getDAOUpdate($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Update by TO ".ucfirst($to)."_TO
	******************************/
	public static function updateByTO(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$conn;
		
		\$getAllRows='UPDATE table_".$to." 
					  SET ";
	
	$values="";
	//removes the id
	array_shift($attributes); 
	foreach ($attributes as $currentAttribute) {
		
		$values.= "
		".$currentAttribute["Field"]." = \"'.\$param->get".ucfirst($currentAttribute["Field"])."().'\",";
	}
	$values = substr($values, 0, -1);
	$result.= $values."
		WHERE id= \"'.\$param->getId().'\"';";
	
	$result.="
		\$resultQuery = ew_Execute(\$getAllRows);";
		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}
function getDAODelete($to,$attributes){
	$result ="";
	
		
		
		$result.="	
	/******************************
	Deletes the ".ucfirst($to)."_TO
	******************************/
	public static function deleteByTO(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$conn;
		
		\$getAllRows='DELETE  FROM table_".$to."
					   WHERE id=\"'.\$param->getId().'\"';";
	
	
	$result.="
		\$resultQuery = ew_Execute(\$getAllRows);";
		
	$result.="
		return \$result;
	}";
		

	return $result;
}
/****************************************************************
*****************************************************************
*****************************************************************/
function getDAOCreateAJAX($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Create by TO ".ucfirst($to)."_TO
	******************************/
	public static function createByTOAJAX(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$mysqli;
		
		if (conectionDatabase()){
			global \$select_db ;
			\$getAllRows='INSERT INTO table_".$to."
			(";
	$fields="";
	$values="";
	//removes the id
	array_shift($attributes); 
	foreach ($attributes as $currentAttribute) {
		$fields.="
		".$currentAttribute["Field"].",";
		$values.="
			\"'.\$param->get".ucfirst($currentAttribute["Field"])."().'\",";
	}
	$fields = substr($fields, 0, -1);
	$values = substr($values, 0, -1);
	$result.=$fields.") 
			VALUES (
		".$values."
			)';";
	
	$result.="
			\$mysqli->query(\$getAllRows);
			\$param->setId(\$mysqli->insert_id);
			\$result = \$param;
			
			closeDatabase();
			";
			
	$result.="
		} else {
			\$result=false;
		}";	
	$result.="
		return \$result;
	}";
		
	
	return $result;
}

function getDAOReadAJAX($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByTOAJAX(".ucfirst($to)."_TO \$param){
		\$result=new ".ucfirst($to)."_TO();	
		global \$mysqli;
		
		if (conectionDatabase()){
			\$getAllRows='SELECT * FROM table_".$to."
					   WHERE id=\"'.\$param->getId().'\"';";
	
	
	$result.="
			\$resultQuery =   \$mysqli->query (\$getAllRows);";
			
			
	$result.="
			while(\$row = \$resultQuery->fetch_assoc())
			{";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
				\$result->set".ucfirst($currentAttribute["Field"])."(\$row['".$currentAttribute["Field"]."']);";
	}
				
				
	$result.="
			};
			\$resultQuery->free();
			closeDatabase();";
			
			
			
	$result.="
		} else {
			\$result=false;
		}";		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}

function getDAOReadByWhereAJAX($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByWhereAJAX(\$param){
		\$result=[];	
		global \$mysqli;
		
		if (conectionDatabase()){
			\$getAllRows='SELECT * FROM table_".$to." '.\$param.';';";
	
	
	$result.="
			\$resultQuery =   \$mysqli->query (\$getAllRows);";
			
			
	$result.="
			while(\$row = \$resultQuery->fetch_assoc())
			{
				\$currentTO= new ".ucfirst($to)."_TO();";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
				\$currentTO->set".ucfirst($currentAttribute["Field"])."(\$row['".$currentAttribute["Field"]."']);";
	}
				
				
	$result.="
				\$result[]=\$currentTO;
			};
			\$resultQuery->free();
			closeDatabase();";
			
			
			
	$result.="
		} else {
			\$result=false;
		}";		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}

function getDAOReadAllAJAX($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readAllAJAX(){
		\$result=[];	
		global \$mysqli;
		
		if (conectionDatabase()){
			\$getAllRows='SELECT * FROM table_".$to."';";
	
	
	$result.="
			\$resultQuery =   \$mysqli->query (\$getAllRows);";
			
			
	$result.="
			while(\$row = \$resultQuery->fetch_assoc())
			{
				\$currentTO= new ".ucfirst($to)."_TO();";
	foreach ($attributes as $currentAttribute) {
		
			$result.= "
				\$currentTO->set".ucfirst($currentAttribute["Field"])."(\$row['".$currentAttribute["Field"]."']);";
	}
				
				
	$result.="
				\$result[]=\$currentTO;
			};
			\$resultQuery->free();
			closeDatabase();";
			
			
			
	$result.="
		} else {
			\$result=false;
		}";		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}

function getDAOUpdateAJAX($to, $attributes){
	$result ="";
	
		
	$result.="	
	/******************************
	Update by TO ".ucfirst($to)."_TO
	******************************/
	public static function updateByTOAJAX(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$mysqli;
		
		if (conectionDatabase()){
			\$getAllRows='UPDATE table_".$to." 
					  SET ";
	
	$values="";
	//removes the id
	array_shift($attributes); 
	foreach ($attributes as $currentAttribute) {
		
			$values.= "
			".$currentAttribute["Field"]." = \"'.\$param->get".ucfirst($currentAttribute["Field"])."().'\",";
	}
	$values = substr($values, 0, -1);
	$result.= $values."
			WHERE id= \"'.\$param->getId().'\"';";
	
	$result.="
		\$resultQuery =  \$mysqli->query (\$getAllRows);
		
		closeDatabase();";
	$result.="
		} else {
			\$result=false;
		}";		
	$result.="
		return \$result;
	}";
		
	
	return $result;
}
function getDAODeleteAJAX($to,$attributes){
	$result ="";
	
		
		
		$result.="	
	/******************************
	Deletes the ".ucfirst($to)."_TO
	******************************/
	public static function deleteByTOAJAX(".ucfirst($to)."_TO \$param){
		\$result=true;	
		global \$mysqli;
		
		if (conectionDatabase()){
			\$getAllRows='DELETE  FROM table_".$to."
					   WHERE id=\"'.\$param->getId().'\"';";
	
	
	$result.="
			\$resultQuery =  \$mysqli->query (\$getAllRows);
			closeDatabase();
			";
			
	$result.="
		} else {
			\$result=false;
		}";		
	$result.="
		return \$result;
	}";
		

	return $result;
}

/****************************************************************
*****************************************************************
*****************************************************************/

function getDAOFactoryTemplate($to){
	$result ="";
	$result .="<?php
/***********************************
	Copixil
	CPX Generator
	Data Access Object Generated:".$to."
**/
require_once (dirname(__FILE__).'/../TO/".strtolower($to)."_TO.php');
require_once (dirname(__FILE__).'/../../util/conectionDatabase.php');
class ".ucfirst(strtolower($to))."_DAOFactory {
";
	$attributes = GetAllFieldsDAO($to);
	$result .= getConstructor();
	$result .= getDestructor();
	
	$result .= getDAOCreate($to,$attributes);
	$result .= getDAORead($to,$attributes);
	$result .= getDAOReadAll($to,$attributes);
	$result .= getDAOReadByWhere($to,$attributes);	
	$result .= getDAOUpdate($to,$attributes);
	$result .= getDAODelete($to,$attributes);
	
	$result .= getDAOCreateAJAX($to,$attributes);
	$result .= getDAOReadAJAX($to,$attributes);
	$result .= getDAOReadAllAJAX($to,$attributes);
	$result .= getDAOReadByWhereAJAX($to,$attributes);	
	$result .= getDAOUpdateAJAX($to,$attributes);
	$result .= getDAODeleteAJAX($to,$attributes);
	
	
	
$result .="
			
}
?>";
	return $result;
}	


function getDAOTemplate($to){
	$result ="";
	$result .="<?php
/***********************************
	Copixil
	CPX Generator
	Data Access Object Generated:".$to."
**/
require_once (dirname(__FILE__).'/../TO/".strtolower($to)."_TO.php');
require_once (dirname(__FILE__).'/".strtolower($to)."_DAOFactory.php');
require_once (dirname(__FILE__).'/../../util/conectionDatabase.php');
class ".ucfirst(strtolower($to))."_DAO extends ".ucfirst(strtolower($to))."_DAOFactory{
";

$result .="
			
}
?>";
	return $result;
}	
	
/****************************************************************
*****************************************************************
*****************************************************************/

function getFacadeCreate($to){
	$result ="";
	$result.="	
	/******************************
	Create by TO ".ucfirst($to)."_TO
	******************************/
	public static function createByTO(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::createByTO(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}

function getFacadeRead($to){
	$result ="";
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByTO(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::readByTO(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}
function getFacadeUpdate($to){
	$result ="";
	$result.="	
	/******************************
	Update by TO ".ucfirst($to)."_TO
	******************************/
	public static function updateByTO(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::updateByTO(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}
function getFacadeDelete($to){
	$result ="";
	$result.="	
	/******************************
	Delete by TO ".ucfirst($to)."_TO
	******************************/
	public static function deleteByTO(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
			
		\$result= ".ucfirst($to)."_DAO::deleteByTO(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}

function getFacadeCreateAJAX($to){
	$result ="";
	$result.="	
	/******************************
	Create by TO ".ucfirst($to)."_TO
	******************************/
	public static function createByTOAJAX(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::createByTOAJAX(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}

function getFacadeReadAJAX($to){
	$result ="";
	$result.="	
	/******************************
	Read by TO ".ucfirst($to)."_TO
	******************************/
	public static function readByTOAJAX(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result=".ucfirst($to)."_DAO::readByTOAJAX(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}
function getFacadeUpdateAJAX($to){
	$result ="";
	$result.="	
	/******************************
	Update by TO ".ucfirst($to)."_TO
	******************************/
	public static function updateByTOAJAX(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::updateByTOAJAX(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}
function getFacadeDeleteAJAX($to){
	$result ="";
	$result.="	
	/******************************
	Delete by TO ".ucfirst($to)."_TO
	******************************/
	public static function deleteByTOAJAX(".ucfirst($to)."_TO \$param){
		
		\$result=\$param;	
	";
	$result.="
		
		\$result= ".ucfirst($to)."_DAO::deleteByTOAJAX(\$param);";	
	
	$result.="
		return \$result;
	}";
	return $result;
	
}



function getFacadeFactoryTemplate($to) {
	
	$result ="";
	$result .="<?php
/***********************************
	Copixil
	CPX Generator
	Facade Generated:".$to."
**/

require_once (dirname(__FILE__).'/../DAO/".strtolower($to)."_DAO.php');

class ".ucfirst($to)."_FacadeFactory {
";

	$attributes = GetAllFieldsDAO($to);
	
	$result .= getConstructor();
	$result .= getDestructor();
	
	$result .= getFacadeCreate($to);
	$result .= getFacadeRead($to);
	$result .= getFacadeUpdate($to);
	$result .= getFacadeDelete($to);

	$result .= getFacadeCreateAJAX($to);
	$result .= getFacadeReadAJAX($to);
	$result .= getFacadeUpdateAJAX($to);
	$result .= getFacadeDeleteAJAX($to);
$result .="
		
}
?>";
	return $result;
}	

function getFacadeTemplate($to) {
	
	$result ="";
	$result .="<?php
/***********************************
	Copixil
	CPX Generator
	Facade Generated:".$to."
**/

require_once (dirname(__FILE__).'/../DAO/".strtolower($to)."_DAO.php');
require_once (dirname(__FILE__).'/".strtolower($to)."_FacadeFactory.php');
class ".ucfirst($to)."_Facade extends ".ucfirst($to)."_FacadeFactory {
";


$result .="
	
}
?>";
	return $result;
}	

	
?>