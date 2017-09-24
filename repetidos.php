<?php
// session_start();
// if(!isset($_SESSION["userIdlogin"]))
// {
// header("Location:login.php");
// }
// else
// {
include_once('conexion.php');
$sql1 ="
select 
nombre,css
from 
configuracion as c,style as s
where 
c.styleId = s.styleId and
configuracionId = 1";
$sqlcita1 = mysql_query($sql1);
$Tpl=mysql_fetch_assoc($sqlcita1);


$sql ='
SELECT 
	*
FROM  
	`people`  as p2
WHERE 
	  cabezared =  "3" and (SELECT count(*) 
FROM  `people` as p1
WHERE p1.cabezared =  "3" and p1.celector = p2.celector and statusdelete="no" and celector<>"") >1 and seccionId = 317 ';

$sqlcita = mysql_query($sql);
$lstPeople = array();
while($rs=mysql_fetch_assoc($sqlcita))
{
$lstPeople[] = $rs;
}	


// echo "<pre>"; print_r($lstPeople);
// exit;
	

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
	<div id="top">	<!--
		<img src="./images/panlogo.png" width="5%">--><!--
		<div id="divnonmbresytem">Medic-Als</div>-->
		<div id="navigation">
		
		</div>
		<p align="right">
		<font face="verdana" color="#1E82CC" size="2">Bienvenido(a): 
		<b><?php //echo strtoupper($_SESSION["namelog"]);?></b>
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
						<?php //echo $dataP["nombre"]." ".$dataP["apellidos"]?>
					</td>
				</tr>
				<tr>
					<td>
						Nivel:
					</td>
					<td>
						<?php //echo $dataP["cabezared"]+1?>
					</td>
				</tr>
			</table>
			
			<br>
			<br>
			<div id="DivPeople">
			Registros encontrados:<?php //echo $TotalPeople;?>
				<br>
				<div class="CSSTableGenerator" id="">
				<table align="center" width="100%" id="tblPeople" border=0 >
				<tr align="center">
					<td ></td>
					<td >Nombre</td>
					<td >Seccion</td>
					<td >Repetido con:</td>
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
						<td><?php echo $aux["celector"]."__".$aux["nombre"]." ".$aux["apellidos"]?></td>
						<td><?php echo $aux["seccionId"]?></td>
						<td>
							<?php
								 $sql2 ='
									SELECT 
										representanteId
									FROM  
										`people` 
									WHERE 
										statusdelete ="no" and celector = "'.$aux["celector"].'"';
								$sqlcita2 = mysql_query($sql2);
								$lstPeople2 = array();
								while($rs2=mysql_fetch_assoc($sqlcita2))
								{
								$lstPeople2[] = $rs2;
								}	
							foreach($lstPeople2 as $key2=>$aux1){
								$sqli ="
									select 
										nombre,seccionId,peopleId
									from 
										people
									where 
										peopleId = ".$aux1["representanteId"];
									$sqlia = mysql_query($sqli);
									$info=mysql_fetch_assoc($sqlia);
									echo "<form name='frm_".$key2."' id='frm_".$key2."_".$key."'>";
									echo "<input type='hidden' id='type' name='type' value='Cambiarestatus'>";
									echo $info["peopleId"]."__".$info["nombre"]."___".$info["seccionId"]."<br>";
									 echo "<input type='text' name='celetor' value=".$aux["celector"].">";
									 echo "<input type='text' name='representanteId' value=".$info["peopleId"].">";
									echo "</form>";
									echo "<input type='button' value='Cambiar estatus' onClick='Cambiarestatus(".$key2.",".$key.")'>";
									echo "<hr><br><br>";
							}
								
							?>
						</td>
						<td><?php //echo $aux["telefono"]?></td>
						<td><?php //echo $aux["voto"]?></td>
						<td><?php //echo $aux["yavoto"]?></td>
						<td><?php //echo $aux["novoto"]?></td>
						<td><?php //echo $aux["NumInvitados"]?></td>
						<td>

						<a href="red.php?peopleId=<?php echo $aux["peopleId"]?>" target="_blank" style="text-decoration:none">
						<img src="./images/red.png" title="Ver Red">
						</a>
						
						<?php if($aux["img"]<>""){?>
						<a href="./doc_digital/<?php echo $aux["img"]?>" target="_blank" style="text-decoration:none">
						<img src="./images/magnifier.png" title="IFE">
						</a>
						<?php }?>
						<!--
						<a href="javascript:void(0)" onClick="EditPeople(<?php echo $aux["peopleId"]?>)" title="Editar" style="text-decoration:none">
							<img src="./images/edit.png">
						</a>
						
						<a href="javascript:void(0)" onClick="DeletePeople(<?php echo $aux["peopleId"]?>)" title="Eliminar" style="text-decoration:none">
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
// }
?>


