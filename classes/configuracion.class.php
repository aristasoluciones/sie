<?php 
include_once('../conexion.php');
class Configuracion 
{
	public $citaId;
	

	public function setHorarioId($value)
	{
		$this->horarioId = $value;
	}
	
	

	public function ExtractTemplates()
	{
		$sql ="select * from style";
		$row=mysql_query($sql);

		$retArray = array();
		while($rs=mysql_fetch_assoc($row))
		{
		$retArray[] = $rs;
		}	

		return $retArray;
	}
	
	
	
		
	public function ChangeTemplate($Id)
	{
	
		
		
	 $query = "UPDATE  configuracion SET  `styleId` =  '".$Id."' WHERE  configuracionId =1;";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
	
	}
	
	public function Info($Id)
	{
		$sql="SELECT * 
		FROM  configuracion 
		WHERE configuracionId=".$Id."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
		return $data;
	}
}

?>