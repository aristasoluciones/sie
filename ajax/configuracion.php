<?php 
session_start();
include_once('../libraries.php');
$user->AllowAccess();
switch ($_POST["type"])
{

	case "config":
		$p1=mysql_query("select * from configuracion where configuracionId = 1");
		$p15=mysql_fetch_array($p1);
	include("../templates/configuracion.php");
	break;
	
	case "AddConfig";
	

	 $query = "
		update 
		configuracion 
		set
		intervalo = '".$_POST["intervalo"]."',
		horainicio = '".$_POST["horainicio"]."'
		where 
		configuracionId=1";
		if (mysql_query($query,$conexion)) 
		{
		echo "ok[#]";
		$msjok = 11;
		include("../templates/msjconfirmacion.php");
		}
		else
		{
		echo "fail[#]";
		$msjfail = 4;
		include("../templates/msjconfirmacion.php");
		}
	
	break;

	case "MnuApariencia":
		
		$LtsTemplates = $configuracion->ExtractTemplates();
		include("../templates/Edit-Apariencia.php");
	
	break;
	
	case "SaveApariencia":
	
		if($configuracion->ChangeTemplate($_POST["Id"]))
		{
			echo "ok[#]";
			$msjok = 11;
		}
		else
		{
			echo "fail[#]";
			$msjok = 4;
		}
		
		
	break;
	
}//termina switch

?>