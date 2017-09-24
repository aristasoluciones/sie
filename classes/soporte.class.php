<?php 
include_once('../conexion.php');
class Soporte 
{

	public $modulo;
	public $comentario;
	public $imagen;
	public $usuarioId;
	public $sistemaId;
		

	public function setModulo($value)
	{
		$this->modulo = $value;
	}
	public function setComentario($value)
	{
		$this->comentario = $value;
	}
	public function setImagen($value)
	{
		$this->imagen = $value;
	}
	public function setUsuarioId($value)
	{
		$this->usuarioId = $value;
	}
	public function setSistemaId($value)
	{
		$this->sistemaId = $value;
	}
	
	public function LastReg(){
	
	$sql = "SELECT MAX(soporteId) FROM soporte";
	$l = mysql_query($sql);
	$last = mysql_result($l,0);
	$inc = $last+1;
	
	return $inc;
	}
		
	public function Insert(&$image_name)
	{
		$soporte = new soporte;
		$inc = $soporte->LastReg();
		$aux = explode(".",$this->imagen);
		$extencion=end($aux);
		$image_name="doc_".$inc.".".$extencion;
	
		 $query = "INSERT INTO  soporte (
		`soporteId`,
		`modulo`,
		`comentario`,
		`imagen`,
		`usuarioId`,
		`sistemaId`
		)
		VALUES (
		NULL,  
		'".$this->modulo."', 
		'".$this->comentario."', 
		'".$image_name."', 
		'".$this->usuarioId."',  
		'".$this->sistemaId."');";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}

	}
	
	public function ChangeApariencia($apariencia)
	{
	
	
		  $query = "UPDATE  configuracion SET  `apariencia` =  '".$apariencia."' WHERE  configuracionId =1;";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}

	}

	
}

?>