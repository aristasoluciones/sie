<?php
session_start();
if(!isset($_SESSION["userIdlogin"]))
{
header("Location:login.php");
}
else
{
include_once('conexion.php');
$sql ="
select 
nombre,css,mensaje
from 
configuracion as c,style as s
where 
c.styleId = s.styleId and
configuracionId = 1";
$sqlcita = mysql_query($sql);
$Tpl=mysql_fetch_assoc($sqlcita);
// echo $_SESSION["userIdlogin"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SIE</title>
		<link type="text/css" href="css/redmond/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
<!--Lib. js defaul-->
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>

<!--Lib. js nuevas-->
<script type="text/javascript" src="js/general.js"></script>
<script type="text/javascript" src="js/cabecera.js"></script>
<script type="text/javascript" src="js/master.js"></script>
<script type="text/javascript" src="js/sala.js"></script>
<script type="text/javascript" src="js/comunidad.js"></script>
<script type="text/javascript" src="js/configuracion.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript" src="js/soporte.js"></script>
<script type="text/javascript" src="js/apariencia.js"></script>
<link type="text/css" href="css/redmond/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $Tpl["css"]?>" type="text/css" media="all" />
<!--Css nuevos-->
<link rel="stylesheet" href="css/miestilo.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/menu.css?dasd" type="text/css" media="all" />
<link rel="stylesheet" href="css/tables.css" type="text/css" media="all" />
<style type="text/css">
			/*demo page css*/
			body{ font: 70.5% "Trebuchet MS", sans-serif}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}

</style>
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body bgcolor="#f7f8fa">
	

<div id="page" class="shell"  >
	<div id="top">	
		<!--<img src="./images/panlogo.png" width="5%">-->
		<!--
		<div id="divnonmbresytem">Medic-Als</div>-->
		<div id="navigation">
		<?php include("templates/menu.php") ?>
		</div>
		<p align="right">
		<font face="verdana" color="#1E82CC" size="2">Bienvenido(a): 
		<b><?php echo strtoupper($_SESSION["namelog"]);?></b>
		</font>
		</p><!--
		<p id="recordatorio" align="right">
			<?php //echo "<a href='javascript:void(0)' onClick='CloseRecordatorio()'><img src='./images/minus-circle.png'></a><font face='verdana' size=2 color='#6D695A'>".$Tpl["mensaje"]."</font><br><br><br>"?>
		</p>-->
	</div>

	<div id="body"> 
	
		
		<div id="Respuestaajax">
		</div>
		
		<div id="Rsptaajaxc">
		</div>
		<br>
		<br>
		<div id="contenido">
		
		</div>
		
		
		
		
		<br>
		<div id="windowedit" title="">
		</div>
	</div>
	
	<!--<div id="footer">
		<p class="right">2014 - J&J </p>
	</div>-->
	
	
</div>



</body>
</html>
<?php
}
?>


