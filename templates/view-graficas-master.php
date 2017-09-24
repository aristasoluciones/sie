<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Graficas
</div>
<br>
<center>
<div  class="formsfont">
<form id="frmgraficasmast">
<input type="hidden" name="type" value="GraficarMaster">
<table  align="center" class="txtfieldtable" cellspacing="5" border=0>
<tr>
	<td>
		<b>Tipo de Grafica</b><br>
		<div class="marcotxt" >
		<select name="tipograhm"  class="txtpaciente">
			<option value="">Seleccionar..</option>
			<option value="sexo">Sexo</option>
			<option value="seccion">Sección</option>
			<option value="votos">Votos</option>
		<select>
		</div>
	</td>	
	<td>
		<b>Municipio</b><br>
		<div class="marcotxt">
		<select name="fltmunicipiomas" id="fltmunicipiomas" class="txtfls">
			<?php foreach($lstMunicipio as $key=>$aux){?>
				<option value="<?php echo $aux["municipioId"]?>"><?php echo $aux["nombre"]?></option>
			<?php }?>
		</select>
		</div>
	</td>
</table>
</form>
<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=10%/>
</div>
<br>
<input type="button" onClick="GraficarMaster()" value="Graficar" class="btnsave" id=""><br>
</center>

<div id="DivGraphm">
</div>