<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Subir excel
</div>
<br>
<center>
<font color="red" size="3">Solo permite subir promovidos</font><br>
<font color="red" size="3">Solo archivos (.csv)</font><br>
<font color="red" size="3">Revisar el orden de la Columnas</font><br>
<div  class="formsfont">
<form id="frmUpexcel" action="./upexcel.php" method="POST">
<input type="hidden" name="type" value="SaveCabecera">
<table  align="center" class="txtfieldtable" cellspacing="5" border=0>
<tr>
	<td style="vertical-align:top;">
		Imagen Credencial:<br>
		<div class="marcotxt">
		<input type="file" name="nombreexcel" id="nombreexcel" class="txtpaciente">
		<input type="hidden" name="hiddenimg" id="hiddenimg" class="txtpaciente">
		</div>
	</td>

</tr>
<tr>
	<td>
		Tipo:<br>
		<div class="marcotxt">
		<select name="tipo" class="txtpaciente">
				<option value="">Seleccionar..</option>
				<option>cabecera</option>
				<option>comunidad</option>
		</select>
		</div>
	</td>
	<td>

	</td>
	<td>

	</td>
</tr>
<tr>
	<td colspan="3">
	<div class="obligatorio">*</div>
	<div class="obligatoriotext">Campos Obligatorios</div>
	</td>
</tr>
</table>
</form>
<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=10%/>
</div>
<br>
<input type="button" onClick="Upexcel()" value="GUARDAR" class="btnsave" id="SaveCabecera"><br>
</center>
