<?php
session_start();
include("../conexion.php");
include_once('../libraries.php');
$user->AllowAccess();
 if($_GET['type']=='addCabecera'){

		foreach ($_FILES as $key) {

			$nombre = $key['name'];
			$temporal = $key['tmp_name']; 
			$tamano= ($key['size'] / 10000)."Kb";
			if (move_uploaded_file($temporal,"../doc_digital/".$_GET['imagename']))
			{
				$lstSeccion = $cabecera->LsSeccion();
				echo "ok[#]";
				$msjok = 1;
				include("../templates/msjconfirmacion.php");
				echo "[#]";
				include("../templates/Add-Cabecera.php"); 
			}
			else
			{
				echo "fail[#]";
				echo "Los datos se guardaron pero el pdf no se adjunto";
			}
		}
}
else if($_GET['type']=='addComunidad'){
	
	foreach ($_FILES as $key) {

			$nombre = $key['name'];
			$temporal = $key['tmp_name']; 
			$tamano= ($key['size'] / 10000)."Kb";
			if (move_uploaded_file($temporal,"../doc_digital_c/".$_GET['imagename']))
			{
				$lstSeccion = $cabecera->LsSeccion();
				$lstComunidades = $comunidad->allComunidad();
				echo "ok[#]";
				$msjok = 1;
				include("../templates/msjconfirmacion.php");
				echo "[#]";
				include("../templates/Add-Comunidad.php"); 
			}
			else
			{
				echo "fail[#]";
				echo "Los datos se guardaron pero el pdf no se adjunto";
			}
		}
}


 if($_GET['type']=='EditCabecera'){

		foreach ($_FILES as $key) {

			$nombre = $key['name'];
			$temporal = $key['tmp_name']; 
			$tamano= ($key['size'] / 10000)."Kb";
			if (move_uploaded_file($temporal,"../doc_digital/".$_GET['imagename']))
			{
				// $_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
				// $_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
				// $_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
				// $_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
				// $_SESSION["fltcabecera"]["cabezaId"]= $_POST["fltcabeza"];
				// $_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
				$cabecera->setPag(1);
				$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
				$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
				$lstSeccion = $cabecera->LsSeccion();
				
				$items = $TotalPeople/NUM_PAGINATION;
				$pagInicio = 1;
				$pagEnd = NUM_PAGINATION;

				echo "ok[#]";
				$msjok = 2;
				include("../templates/msjconfirmacion.php");	
				echo "[#]";
				$msjok = 2;
				include("../templates/flt-cabecera.php"); 
				include("../templates/lst-Cabecera.php"); 
			}
			else
			{
				echo "fail[#]";
				echo "Los datos se guardaron pero el pdf no se adjunto";
			}
		}
}
else if($_GET['type']=='EditComunidad'){

	foreach ($_FILES as $key) {

			$nombre = $key['name'];
			$temporal = $key['tmp_name']; 
			$tamano= ($key['size'] / 10000)."Kb";
			if (move_uploaded_file($temporal,"../doc_digital_c/".$_GET['imagename']))
			{
				
				// $_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
				// $_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
				// $_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
				// $_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
				// $_SESSION["fltcabecera"]["cabezaId"]= $_POST["fltcabeza"];
				// $_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
				$lstComunidades = $comunidad->allComunidad();
				$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
				$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
				$lstSeccion = $comunidad->LsSeccion();
				// include("../templates/flt-cabecera.php"); 
				 

				echo "ok[#]";
				$msjok = 2;
				include("../templates/msjconfirmacion.php");
				echo "[#]";
				include("../templates/flt-Comunidad.php"); 
				include("../templates/lst-Comunidad.php"); 
			}
			else
			{
				echo "fail[#]";
				echo "Los datos se guardaron pero el pdf no se adjunto";
			}
		}

}




?>