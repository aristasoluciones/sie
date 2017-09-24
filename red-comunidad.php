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
nombre,css
from 
configuracion as c,style as s
where 
c.styleId = s.styleId and
configuracionId = 1";
$sqlcita = mysql_query($sql);
$Tpl=mysql_fetch_assoc($sqlcita);

//CONSULTA LA RED
$sqlQ ="
select 
	p.*,
	(select
	count(p2.peoplecomunidadId)
	from 
	peoplecomunidad as p2
	where 
	p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no') as NumInvitados,
	(select
	count(p2.peoplecomunidadId)
	from 
	peoplecomunidad as p2
	where 
	p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no' and voto='si') as yavoto,
	(select
	count(p2.peoplecomunidadId)
	from 
	peoplecomunidad as p2
	where 
	p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no' and voto='no') as novoto
from 
peoplecomunidad as p
where 
p.municipioId =".$_SESSION["municipiolog"]."
and p. statusdelete ='no' and p.representanteId =".$_GET["peopleId"]." ORDER BY  p.nombre ASC ";
$sqlcita = mysql_query($sqlQ);
$retArray = array();
$lstPeople = array();
while($rs=mysql_fetch_assoc($sqlcita))
{
$lstPeople[] = $rs;
}	

//CONSULTA EL TOTAL DE LA RED
$sqlC ="
select 
	COUNT(*)
from 
	peoplecomunidad as p
where
	p.municipioId = ".$_SESSION["municipiolog"]."
	and p. statusdelete ='no' and p.representanteId =".$_GET["peopleId"]."";
$l = mysql_query($sqlC);
$TotalPeople = mysql_result($l,0);
//Info people

$sqlP ="select * from peoplecomunidad where peoplecomunidadId = ".$_GET["peopleId"]."";
$rowP=mysql_query($sqlP);
$dataP=mysql_fetch_assoc($rowP);

		
	
	

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
<script type="text/javascript" src="js/medico.js"></script>
<script type="text/javascript" src="js/sala.js"></script>
<script type="text/javascript" src="js/cita.js"></script>
<script type="text/javascript" src="js/configuracion.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript" src="js/soporte.js"></script>
<script type="text/javascript" src="js/apariencia.js"></script>
<link type="text/css" href="css/redmond/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo $Tpl["css"]?>" type="text/css" media="all" />
<!--Css nuevos-->
<link rel="stylesheet" href="css/miestilo.css" type="text/css" media="all" />
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
		<!--<img src="./images/panlogo.png" width="5%">--><!--
		<div id="divnonmbresytem">Medic-Als</div>-->
		<div id="navigation">
		
		</div>
		<p align="right">
		<font face="verdana" color="#1E82CC" size="2">Bienvenido(a): 
		<b><?php echo strtoupper($_SESSION["namelog"]);?></b>
		</font>
		</p>
	</div>

	<div id="body"> 
		<div id="contenido">
			
			<table>
				<tr>
					<td>
						Nombre:
					</td>
					<td>
						<?php echo $dataP["nombre"]." ".$dataP["apellidos"]?>
					</td>
				</tr>
				<tr>
					<td>
						Nivel:
					</td>
					<td>
						<?php echo $dataP["cabezared"]+1?>
					</td>
				</tr>
			</table>
			
			<br>
			<br>
			<div id="DivPeople">
			Registros encontrados:<?php echo $TotalPeople;?>
				<br>
				<div class="CSSTableGenerator" id="">
				<table align="center" width="100%" id="tblPeople" border=0 >
				<tr align="center">
					<td ></td>
					<td >Nombre</td>
					<td >Seccion</td>
					<td >Telefono</td>
					<td >Voto</td>
					<td >Ya votaron</td>
					<td >No han votado</td>
					<td >Total Invitados</td>
					<td>Acciones</td>
				</tr>
				<?php
				if(!is_array($lstPeople))
				$lstPeople=array();
				
				foreach($lstPeople as $key=>$aux)
				{
				?>
					<tr align="center">
						<td><?php echo $key+1?></td>
						<td><?php echo $aux["nombre"]." ".$aux["apellidos"]?></td>
						<td><?php echo $aux["seccionId"]?></td>
						<td><?php echo $aux["telefono"]?></td>
						<td><?php echo $aux["voto"]?></td>
						<td><?php echo $aux["yavoto"]?></td>
						<td><?php echo $aux["novoto"]?></td>
						<td><?php echo $aux["NumInvitados"]?></td>
						<td>

						<a href="red-comunidad.php?peopleId=<?php echo $aux["peoplecomunidadId"]?>" target="_blank" style="text-decoration:none">
						<img src="./images/red.png" title="Ver Red">
						</a>
						
						<?php if($aux["img"]<>""){?>
						<a href="./doc_digital_c/<?php echo $aux["img"]?>" target="_blank" style="text-decoration:none">
						<img src="./images/magnifier.png" title="IFE">
						</a>
						<?php }?>
						<!--
						<a href="javascript:void(0)" onClick="EditPeople(<?php echo $aux["peoplecomunidadId"]?>)" title="Editar" style="text-decoration:none">
							<img src="./images/edit.png">
						</a>
						
						<a href="javascript:void(0)" onClick="DeletePeople(<?php echo $aux["peoplecomunidadId"]?>)" title="Eliminar" style="text-decoration:none">
							<img src="./images/del.png">
						</a>
						-->
						</td>
					</tr>
				<?php
				}
				?>
				</table>
				</div>
			</div>
		</div>
		<center>
		<div id="Respuestaajax">
		</div>
		</center>
		<center>
		<div id="Rsptaajaxc">
		</div>
		</center>
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


