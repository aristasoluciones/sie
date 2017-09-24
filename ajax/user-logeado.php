<?php 
// session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/clinica_v1/libraries.php');



$user->setUserId($_SESSION["tipouserlogin"]);
$infouser = $user->Info();
echo  $infouser["nombre"];
// echo $_SESSION["tipouserlogin"];
?>