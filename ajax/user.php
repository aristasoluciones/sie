<?php 
session_start();
include("../conexion.php");
include_once('../libraries.php');
$user->AllowAccess();
switch ($_POST["type"])
{

	case "AddUser": 
		include("../templates/adduser.php");
	break;
	
	case "SaveUser":
	
	$user->setUserId($_POST['user']);
	$countu = $user->loginUser();
	
	// echo "fail[#]";
	// echo $countu;
	// exit;
	if($countu >0)
	{
		echo "fail[#]";
		$msjfail = 300;
		include("../templates/msjconfirmacion.php");
	}
	else
	{
	
	
		 $query = "INSERT INTO user (
		`userId` ,
		`usuario` ,
		`password` ,
		`nombre` ,
		`apellidos` ,
		`telefono`,
		`correo`,
		`tipo`
		)
		VALUES (
		NULL,  
		'".trim($_POST['user'])."', 
		'".trim($_POST['pass'])."',  
		'".$_POST['nombre']."', 
		'".$_POST['apellidos']."',
		'".$_POST['telefono']."',
		'".$_POST['correo']."',
		'".$_POST['tipo']."'
		);";
		

		if (mysql_query($query,$conexion)) 
		{
		echo 'ok[#]';
		$msjok = 14;
		include("../templates/msjconfirmacion.php");
		}
		else
		{
		echo "fail[#]";
		$msjfail = 4;
		include("../templates/msjconfirmacion.php");
		}
	}
	break;
	
	
	case "ShowUser":
		$p1=mysql_query("select * from user order by userId desc");
		$p15=mysql_fetch_array($p1);
		// include("../templates/fltuser.php"); 
		include("../templates/showuser.php"); 
	break;
	
	case "EditUser":
		$p1=mysql_query("select * from user where userId=".$_POST["id"]."");
		$p15=mysql_fetch_row($p1);
		// $fecha=explode("-",$p15[3]);
		// $nacimiento = $fecha[2]."-".$fecha[1]."-".$fecha[0]; 
		include("../templates/edituser.php"); 
	break;
	
	case "Editmedicosql":
	 
		$query = "
		update 
		medico 
		set
		nombre = '".$_POST["nombreeditp"]."',
		apellidos = '".$_POST["apeeditp"]."',
		telefono = '".$_POST["telp"]."',
		mail = '".$_POST["mailp"]."'
		where 
		idmedico=".$_POST["id"]."";
		if (mysql_query($query,$conexion)) 
		{
		echo "ok[#]";
		$p1=mysql_query("select * from medico order by idmedico desc");
		$p15=mysql_fetch_array($p1);
		// include("../templates/fltuser.php"); 
		include("../templates/showmedico.php"); 
		echo "[#]";
		$msjok = 6;
		include("../templates/msjconfirmacion.php");
		}
		else
		{
		echo "fail[#]";
		$msjfail = 4;
		include("../templates/msjconfirmacion.php");
		}
	
	break;
	
	case "DeleteUser":
		$query = "delete from user where userId=".$_POST["id"]."";
		if (mysql_query($query,$conexion)) 
		{
		echo "ok[#]";
		$p1=mysql_query("select * from user order by userId desc");
		$p15=mysql_fetch_array($p1);
		// include("../templates/fltuser.php"); 
		include("../templates/showuser.php"); 
		echo "[#]";
		$msjok = 15;
		include("../templates/msjconfirmacion.php");
		}
		else
		{
		echo "fail[#]";
		$msjfail = 4;
		include("../templates/msjconfirmacion.php"); 
		}
	break;
	
	case "Searchmedico":
	
	$filtro = "";
	
	if($_POST["txtflmail"]<>"")
		$filtro .= " AND `mail` LIKE  '%".$_POST["txtflmail"]."%'";
	
	if($_POST["txtfltel"]<>"")
		$filtro .= " AND `telefono` LIKE  '%".$_POST["txtfltel"]."%'";
		
	if($_POST["txtfltnombre"]<>"")
		$filtro .= " AND `nombre` LIKE  '%".$_POST["txtfltnombre"]."%'";
		
		$sql="SELECT * 
		FROM  `medico` 
		WHERE 1".$filtro."  order by idmedico desc";
		$p1=mysql_query($sql);
		$p15=mysql_fetch_array($p1);
		include("../templates/showmedico.php");
	break;
	
	case "EditUsersql":
		 
		$query = "
		update 
		user 
		set
		nombre = '".$_POST["nombreeditp"]."',
		apellidos = '".$_POST["apeeditp"]."',
		telefono = '".$_POST["telp"]."',
		correo = '".$_POST["mailp"]."',
		usuario = '".$_POST["user"]."',
		password = '".$_POST["pass"]."',
		tipo = '".$_POST["tipouser"]."'
		where 
		userId=".$_POST["id"]."";
		if (mysql_query($query,$conexion)) 
		{
		echo "ok[#]";
		$p1=mysql_query("select * from user order by userId desc");
		$p15=mysql_fetch_array($p1);
		// include("../templates/fltuser.php"); 
		include("../templates/showuser.php"); 
		echo "[#]";
		$msjok = 16;
		include("../templates/msjconfirmacion.php");
		}
		else
		{
		echo "fail[#]";
		$msjfail = 4;
		include("../templates/msjconfirmacion.php");
		}
	
	break;

}//termina switch

?>