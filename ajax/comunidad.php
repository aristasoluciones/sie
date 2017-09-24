<?php 
session_start();
include("../conexion.php");
include_once('../libraries.php');
$user->AllowAccess();
// echo "<pre>"; print_R($_POST);
switch ($_POST["type"])
{

	case "AddComunidad":
	
		$lstComunidades = $comunidad->allComunidad();
		$lstSeccion = $cabecera->LsSeccion();
		include("../templates/Add-Comunidad.php");
	break;

	case "SaveCabecera": 
	

		
		$fecha = $util->FechaMysql($_POST["fnacimiento"]);
		
		
		if(trim($_POST["hiddenimg"]==""))
		{

			$comunidad->setFecha($fecha);
			if ($comunidad->SaveCabeceraClean()) 
			{
				$lstComunidades = $comunidad->allComunidad();
				$lstSeccion = $comunidad->LsSeccion();
				echo "ok[#]";
				$msjok = 1;
				include("../templates/msjconfirmacion.php");
				echo "[#]";
				include("../templates/Add-Comunidad.php"); 
			
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
		else
		{
			$comunidad->setFecha($fecha);
			$comunidad->setImagen($_POST["hiddenimg"]);
			if ($comunidad->SaveCabecera($img)) 
			{
				echo 'ok[#]';
				echo $img;
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
	break;
	
	
	case "SearchPeople":
	
		if(trim($_POST["nombre"])<>"")
		{
		$LstRepre = $comunidad->SearchRepresentante($_POST["nombre"],null);
		// echo "<pre>"; print_r($LstRepre);
		include("../templates/ac-Representante.php"); 
		}
		
	break;
	
	
	case "SearchPeopleEdit":
	
		if(trim($_POST["nombre"])<>"")
		{
		$LstRepre = $comunidad->SearchRepresentante($_POST["nombre"],null);
		// echo "<pre>"; print_r($LstRepre);
		include("../templates/ac-Representante.php"); 
		}
		
	break;
	
	case "mReporteCo":
		

		// $_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
		// $_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
		// $_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
		// $_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
		$_SESSION["fltcabecera"]["cabezaId"]= 1;
		// $_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
		$lstSeccion = $comunidad->LsSeccion();
		$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
		@$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
		$lstComunidades = $comunidad->allComunidad();
		include("../templates/flt-Comunidad.php"); 
		include("../templates/lst-Comunidad.php"); 
		
	
	break;
	
	case "DeletePeopleComunidad":
	
		if($comunidad->Delete($_POST["id"]))
		{
			$lstSeccion = $comunidad->LsSeccion();
			$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
			$lstComunidades = $comunidad->allComunidad();
			@$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
			echo "ok[#]";
			include("../templates/flt-Comunidad.php"); 
			include("../templates/lst-Comunidad.php"); 
			echo "[#]";
			$msjok = 3;
			include("../templates/msjconfirmacion.php");
		}
		else
		{
			echo "fail[#]";
			$msjfail = 4;
			include("../templates/msjconfirmacion.php");
		}
		
	break;
	
	case "EditPeopleComunidad":
		$lstSeccion = $comunidad->LsSeccion();
		$lstComunidades = $comunidad->allComunidad();
		$InfoPeo = $comunidad->Info($_POST["id"]);
		$fechan = $util->FechaMysql($InfoPeo["fnacimiento"]);
		$Repre = $comunidad->Info($InfoPeo["representanteId"]);
		include("../templates/Edit-Comunidad.php");
	
	break;
	
	case "UpdateComunidad":
	
	// echo "<pre>";print_r($_POST);
	// exit;
	if(trim($_POST["hiddenimg"]==""))
		{
			if($comunidad->UpdateCabecera())
			{
				$lstSeccion = $comunidad->LsSeccion();
				$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
				$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
				$lstComunidades = $comunidad->allComunidad();
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
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
	else{
	
		if($comunidad->UpdateCabeceraCon($img))
			{
				echo 'ok[#]';
				echo $img;
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
	
	}
	break;
	
	
	case "SerchPeople":
	
		// echo "<pre>"; print_r($_POST);
		$_SESSION["fltcabecera"]["fltcComunidad"]= $_POST["fltcComunidad"];
		$_SESSION["fltcabecera"]["fltseccionVotaId"]= $_POST["fltseccionVotaId"];
		$_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
		$_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
		$_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
		$_SESSION["fltcabecera"]["comunidad"]= $_POST["namecomunidad"];
		$_SESSION["fltcabecera"]["cabezaId"]= $_POST["fltcabeza"];
		$_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
		$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
		$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
		$lstSeccion = $comunidad->LsSeccion();
		// include("../templates/flt-cabecera.php"); 
		include("../templates/lst-Comunidad.php"); 
	
	break;
	
	case "mnuGraficas":
	
		include("../templates/view-graficas.php"); 
	
	break;
	
	case "Graficar":
	
		// echo "H=".$_POST["tipograh"];
		
		if($_POST["tipograh"]=="sexo")
			$imgSex = $cabecera->GraphSex();
		else if($_POST["tipograh"]=="seccion")
			$imgSex = $cabecera->GraphSeccion();
		else if($_POST["tipograh"]=="votos")
			$imgSex = $cabecera->GraphVotos();	
		
		if($_POST["tipograh"]<>"")
		echo $imgSex;
		
	break;
	
	
	case "VotarComunidad":
	
		if($comunidad->Votar($_POST["id"]))
		{
			$lstSeccion = $comunidad->LsSeccion();
			$lstPeople = $comunidad->lstPeople($_SESSION["fltcabecera"]);
			@$TotalPeople = $comunidad->CountFltro($_SESSION["fltcabecera"]);
			$lstComunidades = $comunidad->allComunidad();
			echo "ok[#]";
			include("../templates/flt-Comunidad.php"); 
			include("../templates/lst-Comunidad.php"); 
			echo "[#]";
			$msjok = 5;
			include("../templates/msjconfirmacion.php");
		}
		else
		{
			echo "fail[#]";
			$msjfail = 4;
			include("../templates/msjconfirmacion.php");
		}
		
	break;
	
	case "mnuaddVotos":
	
		$ltsPartidos = $cabecera->allPartidos();
		include("../templates/add-Votos.php");
		// echo "<pre>"; print_r($ltsPartidos);
	break;
	
	case "SaveVotoPart":
	
		$error=0;
		$ltsPartidos = $cabecera->allPartidos();
		foreach($ltsPartidos as $key=>$aux)
		{
			if($_POST["partido_".$aux["partidoId"]] == "")
				$_POST["partido_".$aux["partidoId"]]=0;
		
			if(!is_numeric($_POST["partido_".$aux["partidoId"]]))
			$error += 1; 
		}
		// echo $error;
		if($error >=1)
		{
			echo "fail[#]";
			echo "Solo se permite numeros en los campos";
			exit;
		}
		else
		{
			if($cabecera->SaveVotosPartido())
			{
				echo "ok[#]";
				$msjok = 5;
				include("../templates/msjconfirmacion.php");
				echo "[#]";
				$ltsPartidos = $cabecera->allPartidos();
				include("../templates/add-Votos.php");
				
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
			
			
			
		// echo "hola";
	break;
	
}//termina switch

?>