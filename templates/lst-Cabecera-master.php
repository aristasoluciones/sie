<?php
include("acceso.php");
?>
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
	foreach($lstPeople as $key=>$aux)
	{
	?>
		<tr align="center">
			<td><?php echo $key+1; ?></td>
			<td><?php echo $aux["nombre"]." ".$aux["apellidos"]?></td>
			<td><?php echo $aux["seccionId"]?></td>
			<td><?php echo $aux["telefono"]?></td>
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
			<!--
			<a href="javascript:void(0)" onClick="EditPeople(<?php //echo $aux["peopleId"]?>)" title="Editar" style="text-decoration:none">
				<img src="./images/edit.png">
			</a>
			
			<a href="javascript:void(0)" onClick="DeletePeople(<?php //echo $aux["peopleId"]?>)" title="Eliminar" style="text-decoration:none">
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
<div id="wideditpaciente"></div>
<div id="widcita"></div>
