<?php
include("acceso.php");
?>
<div id="DivPeople">
	<a href="javascript:void(0)" onClick="PrintReportComunidad()" title="Imprimir" style="text-decoration:none">
	<img src="./images/print.jpg" width="3%">
	</a>
<br>
Registros encontrados:<?php echo $TotalPeople;?>

	<br>
	<div class="CSSTableGenerator" id="">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td ></td>
		<td >Nombre</td>
		<td >Comunidad</td>
		<td >Casillas</td>
		<td >Seccion donde Vota</td>
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
			<td><?php echo $aux["peoplecomunidadId"] ?></td>
			<td><?php echo $aux["nombre"]." ".$aux["apellidos"]?></td>
			<td><?php echo $aux["direccion"]?></td>
			<td><?php echo $aux["comunidad"]?></td>
			<td><?php echo $aux["votaseccionId"]?></td>
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
			
			<a href="javascript:void(0)" onClick="EditPeopleComunidad(<?php echo $aux["peoplecomunidadId"]?>)" title="Editar" style="text-decoration:none">
				<img src="./images/edit.png">
			</a>
			
			<a href="javascript:void(0)" onClick="DeletePeopleComunidad(<?php echo $aux["peoplecomunidadId"]?>)" title="Eliminar" style="text-decoration:none">
				<img src="./images/del.png">
			</a>
			<?php if($aux["voto"] <> "si"){?>
				<a href="javascript:void(0)" onClick="VotarComunidad(<?php echo $aux["peoplecomunidadId"]?>)" title="Votar" style="text-decoration:none">
					<img src="./images/ok.png">
				</a>
			<?php }?>
			
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
