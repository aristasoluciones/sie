<?php 
include_once('../conexion.php');
class Util 
{
	
	public $age;
	
	
	public function setAge($value)
	{
		$this->age = $value;
	}
	
	public function FechaMysql($fecha)
	{
		if($fecha=="")
		{
			$fecha="";
		}
		else
		{
			$fecha=explode("-",$fecha);
			$fechasearch = $fecha[2]."-".$fecha[1]."-".$fecha[0]; 
			$fecha=$fechasearch;
		}
			
			
		return $fecha;
	}
	
	public function CalcAge()
	{
		$anio = explode("-",$this->age);
		$age = date("Y") - $anio[0];	
			
		return $age;
	}
	
}

?>