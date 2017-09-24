<?php 
session_start();
include("../conexion.php");
include_once('../libraries.php');
if(!isset($_POST["type"]))
exit;

switch ($_POST["type"])
{

	case "Login": 
	
		
		$user->setUserId($_POST["user"]);
		$count=$user->loginUser();

			
		if($count>0)
		{
			
				$user->setUserId($_POST["user"]);
				$user->setPass($_POST["pass"]);
				$intro=$user->loginUserpas();
				if($intro > 0)
				{
					echo "ok[#]";
					$user->setUserId($_POST["user"]);
					$user->setPass($_POST["pass"]);
					$info=$user->Infouser();
					$_SESSION["userIdlogin"] = $info["userId"];
					$_SESSION["tipouserlogin"] = $info["tipo"];
					$_SESSION["municipiolog"] = $info["municipioId"];
					$_SESSION["namelog"] = $info["nombre"]." ".$info["apellidos"];
				}
				else
				{
					echo "fail[#]";
					echo "Password incorrecto";
				}
		}
		else
		{
			echo "fail[#]";
			echo "El Usuario no existe";
		}
		// else
		// {
			// $user->setUserId($_POST["user"]);
			// $count=$user->loginMedic();
			
				// if($count>0)
				// {
					// $user->setUserId($_POST["user"]);
					// $user->setPass($_POST["pass"]);
					// $intro=$user->loginMedicpass();
						// if($intro > 0)
						// {
							// echo "ok[#]";
							// $user->setUserId($_POST["user"]);
							// $user->setPass($_POST["pass"]);
							// $info=$user->InfoMedic();
							// $_SESSION["userIdlogin"] = $info["idmedico"];
							// $_SESSION["tipouserlogin"] = 3;
							// $_SESSION["namelog"] = $info["prefijo"]." ".$info["nombre"]." ".$info["apellidos"];
						// }
						// else
						// {
							// echo "fail[#]";
							// echo "Password incorrecto";
						// }
				// }
				// else
				// {
				// echo "fail[#]";
				// echo "El Usuario no existe";
				// }
		// }
	
	break;
	

	
	
	
	case "CloseAccount": 
	unset($_SESSION["userIdlogin"]);
	unset($_SESSION["tipouserlogin"]);
	unset($_SESSION["namelog"]);
	unset($_SESSION["municipiolog"]);
	break;
	
	
	

}//termina switch

?>