<?php
include("acceso.php");
?>
<div id="DivPeople">
	<a href="javascript:void(0)" onClick="PrintReportCabecera()" title="EXPORTAR A PDF" style="text-decoration:none">
	<img src="./images/print.jpg" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcel()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcelAll()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>
<br>
<?php
		include('paginacion.php');
	?>
	<br>
	<div class="CSSTableGenerator" id="">
	<form id="frmLst" action="./ajax/exportar-excelcomunidad-all.php" method="POST">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td >Id</td>
		<td >Numero Bingo</td>
		<td >
			<a href="javascript:void(0)" onClick="Next(1,'asc','nombre')">
			Nombre
			</a>
		</td>
		<td >Clave elector</td>
		<td >Seccion</td>
		<td >Direccion</td>
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
			<td><?php echo $aux["peopleId"]; ?></td>
			<td><?php echo @$aux["bingo"]; ?></td>
			<td><?php echo $aux["nombre"]." ".$aux["apellidos"]?></td>
			<td><?php echo $aux["celector"]?></td>
			<td><?php echo $aux["seccionId"]?></td>
			<td><?php echo $aux["direccion"]." ".$aux["barrio"]?></td>
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
			
			<a href="javascript:void(0)" onClick="EditPeople(<?php echo $aux["peopleId"]?>)" title="Editar" style="text-decoration:none">
				<img src="./images/edit.png">
			</a>
			
			<a href="javascript:void(0)" onClick="DeletePeople(<?php echo $aux["peopleId"]?>)" title="Eliminar" style="text-decoration:none">
				<img src="./images/del.png">
			</a>
			<?php if($aux["voto"] <> "si"){?>
				<a href="javascript:void(0)" onClick="Votar(<?php echo $aux["peopleId"]?>)" title="Votar" style="text-decoration:none">
					<img src="./images/ok.png">
				</a>
			<?php }?>
			<input type="checkbox" name="idPrint[<?php echo $aux["peopleId"]?>]" id="" >
			</td>
		</tr>
	<?php
	}
	?>
	</table>
	</form>
	</div>
	<?php
		include('paginacion.php');
	?>
</div>
<div id="wideditpaciente"></div>
<div id="widcita"></div>
