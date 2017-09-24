<?php
	$sqlQ ="
select 
	p.*,
	(select
	count(p2.peopleId)
	from 
	people as p2
	where 
	p.peopleId = p2.representanteId and p2.statusdelete='no') as NumInvitados,
	(select
	count(p2.peopleId)
	from 
	people as p2
	where 
	p.peopleId = p2.representanteId and p2.statusdelete='no' and voto='si') as yavoto,
	(select
	count(p2.peopleId)
	from 
	people as p2
	where 
	p.peopleId = p2.representanteId and p2.statusdelete='no' and voto='no') as novoto
from 
people as p
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
	people as p
where
	p.municipioId = ".$_SESSION["municipiolog"]."
	and p. statusdelete ='no' and p.representanteId =".$_GET["peopleId"]."";
$l = mysql_query($sqlC);
$TotalPeople = mysql_result($l,0);
//Info people
?>


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
<a href="javascript:void(0)" onClick="PrintReportnivel(<?php echo $_GET["peopleId"]?>)" title="EXPORTAR A PDF" style="text-decoration:none">
<img src="./images/print.jpg" width="3%">
</a>
<div id="DivPeople">
Registros encontrados:<?php echo $TotalPeople;?>
	<br>
	<div class="CSSTableGenerator" id="">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td >Consecitivo</td>
		<td >ID</td>
		<td >Numero Bingo</td>
		<td >Nombre</td>
		<td >C Elector</td>
		<td >Seccion</td>
		<td >Telefono</td>
		<td >Barrio</td>
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
			<td><?php echo $aux["peopleId"]?></td>
			<td><?php echo $aux["bingo"]?></td>
			<td><?php echo $aux["nombre"]." ".$aux["apellidos"]?></td>
			<td><?php echo $aux["celector"]?></td>
			<td><?php echo $aux["seccionId"]?></td>
			<td><?php echo $aux["telefono"]?></td>
			<td><?php echo $aux["barrio"]?></td>
			<td><?php echo $aux["voto"]?></td>
			<td><?php echo $aux["yavoto"]?></td>
			<td><?php echo $aux["novoto"]?></td>
			<td><?php echo $aux["NumInvitados"]?></td>
			<td>

			<a href="red.php?peopleId=<?php echo $aux["peopleId"]?>" target="_blank" style="text-decoration:none">
			<img src="./images/red.png" title="Ver Red">
			</a>
			
			<?php if($aux["img"]<>""){?>
			<a href="./doc_digital/<?php echo $aux["img"]?>" target="_blank" style="text-decoration:none">
			<img src="./images/magnifier.png" title="IFE">
			</a>
			<?php }?>
			
			<a href="javascript:void(0)" onClick="EditPeopleRed(<?php echo $aux["peopleId"]?>,<?php echo $_GET["peopleId"]?>)" title="Editar" style="text-decoration:none">
				<img src="./images/edit.png">
			</a>
			
			<a href="javascript:void(0)" onClick="DeletePeople(<?php echo $aux["peopleId"]?>)" title="Eliminar" style="text-decoration:none">
				<img src="./images/del.png">
			</a>
			
			</td>
		</tr>
	<?php
	}
	?>
	</table>
	