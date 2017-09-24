<?php 
if(date('Y') <= 2018 ){
session_start();
include("../conexion.php");
include_once('../libraries.php');
$user->AllowAccess();
// echo "<pre>"; print_R($_POST);
switch ($_POST["type"])
{

	case "AddCabecera":
	
		$lstSeccion = $cabecera->LsSeccion();
		include("../templates/Add-Cabecera.php");
	break;

	case "SaveCabecera": 
	
	
	// echo "lle aja";
		$Rep = $cabecera->BuscaRepetidos();
		if($Rep["Total"]>0){
			echo "fail[#]";
			$msjfail = 444;
			include("../templates/msjconfirmacion.php");
		 $cabecera->BuscaConQuien();
			exit;
		}

		
		$fecha = $util->FechaMysql($_POST["fnacimiento"]);
		
		
		if(trim($_POST["hiddenimg"]==""))
		{

			$cabecera->setFecha($fecha);
			if ($cabecera->SaveCabeceraClean()) 
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
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
		else
		{
			$cabecera->setFecha($fecha);
			$cabecera->setImagen($_POST["hiddenimg"]);
			if ($cabecera->SaveCabecera($img)) 
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
		$LstRepre = $cabecera->SearchRepresentante($_POST["nombre"],null);
		// echo "<pre>"; print_r($LstRepre);
		include("../templates/ac-Representante.php"); 
		}
		
	break;
	
	
	case "SearchPeopleEdit":
	
		if(trim($_POST["nombre"])<>"")
		{
		$LstRepre = $cabecera->SearchRepresentante($_POST["nombre"],null);
		// echo "<pre>"; print_r($LstRepre);
		include("../templates/ac-Representante.php"); 
		}
		
	break;
	
	case "mReporteCab":
		

		// $_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
		// $_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
		// $_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
		// $_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
		$_SESSION["fltcabecera"]["cabezaId"]= "";
		// $_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
		$lstSeccion = $cabecera->LsSeccion();
		$cabecera->setPag(1);
		$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
		@$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
		$items = $TotalPeople/NUM_PAGINATION;
		$pagInicio = 1;
		$pagEnd = NUM_PAGINATION;
		include("../templates/flt-cabecera.php"); 
		include("../templates/lst-Cabecera.php"); 
		
	
	break;
	
	case "reporte1":
		

		$_SESSION["fltcabecera"]["cabezaId"]= "";
		$lstSeccion = $cabecera->LsSeccion();
		$cabecera->setPag(1);
		$lstPeople = $cabecera->reporte1($_SESSION["fltcabecera"]);
		@$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
		$items = $TotalPeople/NUM_PAGINATION;
		$pagInicio = 1;
		$pagEnd = NUM_PAGINATION;
		// include("../templates/flt-cabecera.php"); 
		include("../templates/lst-reporte1.php"); 
		
	
	break;
	
	case "DeletePeople":
	
		if($cabecera->Delete($_POST["id"]))
		{
			$lstSeccion = $cabecera->LsSeccion();
			$cabecera->setPag(1);
			$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
			@$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
			$items = $TotalPeople/NUM_PAGINATION;
			$pagInicio = 1;
			$pagEnd = NUM_PAGINATION;
			echo "ok[#]";
			include("../templates/flt-cabecera.php"); 
			include("../templates/lst-Cabecera.php"); 
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
	
	case "EditPeople":
		$lstSeccion = $cabecera->LsSeccion();
		$InfoPeo = $cabecera->Info($_POST["id"]);
		$fechan = $util->FechaMysql($InfoPeo["fnacimiento"]);
		$Repre = $cabecera->Info($InfoPeo["representanteId"]);
		include("../templates/Edit-Cabecera.php");
	
	break;
	
	case "EditPeopleRed":
		$lstSeccion = $cabecera->LsSeccion();
		$editarred = 1;
		
		$InfoPeo = $cabecera->Info($_POST["id"]);
		$fechan = $util->FechaMysql($InfoPeo["fnacimiento"]);
		$Repre = $cabecera->Info($InfoPeo["representanteId"]);
		// if(isset($_POST["redId"]))
		$redId = $_POST["redId"];
		// else
	
		include("../templates/Edit-Cabecera.php");
	
	break;
	
	case "UpdateCabecera":
	
	// echo "<pre>";print_r($_POST);
	// exit;
	if(trim($_POST["hiddenimg"]==""))
		{
			if($cabecera->UpdateCabecera())
			{
				$lstSeccion = $cabecera->LsSeccion();
				$cabecera->setPag(1);
				$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
				$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
				$items = $TotalPeople/NUM_PAGINATION;
				$pagInicio = 1;
				$pagEnd = NUM_PAGINATION;
				echo "ok[#]";
				include("../templates/flt-cabecera.php"); 
				include("../templates/lst-Cabecera.php"); 
				echo "[#]";
				$msjok = 2;
				include("../templates/msjconfirmacion.php");
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
	else{
	
		if($cabecera->UpdateCabeceraCon($img))
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
	
	case "UpdateCabeceraRed":
	
	// echo "<pre>";print_r($_POST);
	// exit;
	if(trim($_POST["hiddenimg"]==""))
		{
			if($cabecera->UpdateCabecera()) 
			{
				$lstSeccion = $cabecera->LsSeccion();
				$cabecera->setPag(1);
				$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
				$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
				$items = $TotalPeople/NUM_PAGINATION;
				$pagInicio = 1;
				$pagEnd = NUM_PAGINATION;
				 $sqlP ="select * from people where peopleId = ".$_POST["redId"]."";
				$_GET["peopleId"] = $_POST["redId"];
				$rowP=mysql_query($sqlP);
				$dataP=mysql_fetch_assoc($rowP);
				// exit;
				echo "ok[#]";
				include("../contenidored.php");
				echo "[#]";
				$msjok = 2;
				include("../templates/msjconfirmacion.php");
			}
			else
			{
				echo "fail[#]";
				$msjfail = 4;
				include("../templates/msjconfirmacion.php");
			}
		}
	else{
	
		if($cabecera->UpdateCabeceraCon($img))
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
		// exit;
		$_SESSION["fltcabecera"]["nombre"]= $_POST["fltnombre"];
		$_SESSION["fltcabecera"]["telefono"]= $_POST["flttelefono"];
		$_SESSION["fltcabecera"]["sexo"]= $_POST["fltsexo"];
		$_SESSION["fltcabecera"]["seccionId"]= $_POST["fltseccionId"];
		$_SESSION["fltcabecera"]["cabezaId"]= $_POST["fltcabeza"];
		$_SESSION["fltcabecera"]["voto"]= $_POST["fltvoto"];
		$_SESSION["fltcabecera"]["tipo2"]= $_POST["tipo2"];
		$_SESSION["fltcabecera"]["clave"]= $_POST["clave"];
		$_SESSION["fltcabecera"]["direccion"]= $_POST["direccion"];
		
		// $_SESSION["fltcabecera"]["nombre"]= "";
		// $_SESSION["fltcabecera"]["telefono"]= "";
		// $_SESSION["fltcabecera"]["sexo"]= "";
		// $_SESSION["fltcabecera"]["seccionId"]="";
		// $_SESSION["fltcabecera"]["cabezaId"]= "";
		// $_SESSION["fltcabecera"]["voto"]= "";
		// $_SESSION["fltcabecera"]["tipo2"]="";
		// $_SESSION["fltcabecera"]["clave"]= "";
		
		// $pagInicio =0;
		if(isset($_POST["pag"])=="")
			{
			$_POST["pag"]=1;
			@$pagInicio = 1;
			@$pagEnd =NUM_PAGINATION;
			}
		else{
			@$pagInicio +=  (($_POST["pag"]*NUM_PAGINATION)+1)-NUM_PAGINATION;
			@$pagEnd += ($_POST["pag"]*NUM_PAGINATION);
		}
		
		$cabecera->setPag($_POST["pag"]);
		$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
		$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
		$lstSeccion = $cabecera->LsSeccion();
		
		
		// $pagEnd = NUM_PAGINATION;
		
		$items = $TotalPeople/NUM_PAGINATION;
		
		// include("../templates/flt-cabecera.php"); 
		include("../templates/lst-Cabecera.php"); 
	
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
	
	
	case "Votar":
	
		if($cabecera->Votar($_POST["id"]))
		{
			$lstSeccion = $cabecera->LsSeccion();
			$cabecera->setPag(1);
			$lstPeople = $cabecera->lstPeople($_SESSION["fltcabecera"]);
			@$TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);
			$items = $TotalPeople/NUM_PAGINATION;
			$pagInicio = 1;
			$pagEnd = NUM_PAGINATION;
			echo "ok[#]";
			include("../templates/flt-cabecera.php"); 
			include("../templates/lst-Cabecera.php"); 
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
	
	case "Cambiarestatus":
	// echo "<pre>"; print_R($_POST);
		if($cabecera->Depurar())
			{
				echo "ok[#]";
				echo "el estatus se cambio";
				
			}
			else
			{
				echo "fail[#]";

			}
	break;
	
	case "mnuUpExcel":
	// echo "<pre>"; print_R($_POST);
		include("../templates/up-excel.php");
	break;
	
	
	
}//termina switch
}
?>