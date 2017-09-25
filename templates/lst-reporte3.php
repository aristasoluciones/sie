<?php
include("acceso.php");
?>
<div id="DivPeople">
	<!--<a href="javascript:void(0)" onClick="PrintReportCabecera()" title="EXPORTAR A PDF" style="text-decoration:none">
	<img src="./images/print.jpg" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcel()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcelAll()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>-->
<br>
<?php
		// include('paginacion.php');
	?>
	<br>
	<div class="CSSTableGenerator" id="">
	<form id="frmLst" action="./ajax/exportar-excelcomunidad-all.php" method="POST">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td >Seccion</td>
		<td >Fuera de Rango</td>
		<td >18 - 24</td>
		<td >25 - 59</td>
		<td >60 - adelante</td>
		<td >Total de Personas</td>

	</tr>
	<?php
	foreach($lstPeople as $key=>$aux)
	{
	?>
		<tr align="center">
			<td><?php echo $aux["seccionId"]; ?></td>
			<td><?php echo @$aux["fuera"]; ?></td>
			<td><?php echo @$aux["rango1"]; ?></td>
			<td><?php echo @$aux["rango2"]; ?></td>
			<td><?php echo @$aux["rango3"];?></td>
			<td><?php echo @$aux["total"]?></td>

		</tr>
	<?php
	}
	?>
	</table>
	</form>
	</div>
	<?php
		// include('paginacion.php');
	?>
</div>
<div id="wideditpaciente"></div>
<div id="widcita"></div>
