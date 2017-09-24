<?php 
session_start();
include("../conexion.php");
include_once('../libraries.php');
$user->AllowAccess();

switch ($_POST["type"])
{

	case "mnuRMaster":
	
		
		$lstSeccion = $master->LsSeccion();
		$lstMunicipio = $master->allMunicipio();
		include("../templates/flt-cabecera-master.php"); 
	
	break;
	
	
	case "SerchMaster":
	
	if(trim( $_POST["fltmunicipio"])=="")
	{
		echo "<center>Seleccione el Municipio</center>";
	}
	else
	{
	
		$_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
		$_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
		$_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
		$_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
		$_SESSION["fltcabecera"]["cabezaId"]= $_POST["fltcabeza"];;
		$_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
		$_SESSION["fltcabecera"]["municipioId"] = $_POST["fltmunicipio"];
		$lstPeople = $master->lstPeople($_SESSION["fltcabecera"]);
		@$TotalPeople = $master->CountFltro($_SESSION["fltcabecera"]);
		include("../templates/lst-Cabecera-master.php"); 
	}
	break;
	
	case "mnuTotales":
	
	$InfoConfi = $configuracion->Info(1);
	$lstTotales=$master->lstTotalesMuni();
	include("../templates/lst-TotalesMuni.php"); 
	
	
	break;
	
	case "mnuGrapMaster":
		$lstMunicipio = $master->allMunicipio();
		include("../templates/view-graficas-master.php"); 
	
	break;
	
	case "GraficarMaster":
		
		if($_POST["tipograhm"]=="sexo")
			$imgSex = $master->GraphSexMast($_POST["fltmunicipiomas"]);
		else if($_POST["tipograhm"]=="seccion")
			$imgSex = $master->GraphSeccionMast($_POST["fltmunicipiomas"]);
		else if($_POST["tipograhm"]=="votos")
			$imgSex = $master->GraphVotosMast($_POST["fltmunicipiomas"]);	
		
		if($_POST["tipograhm"]<>"")
		echo $imgSex;
	
	break;
	
}//termina switch

?>