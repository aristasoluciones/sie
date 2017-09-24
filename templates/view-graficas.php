<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Graficas
</div>
<br>
<center>
<div  class="formsfont">
<form id="frmgraficas">
<input type="hidden" name="type" value="Graficar">
<table  align="center" class="txtfieldtable" cellspacing="5" border=0>
<tr>
	<td>
			<div class="marcotxt" >
			<select name="tipograh"  class="txtpaciente">
				<option value="">Seleccionar..</option>
				<option value="sexo">Sexo</option>
				<option value="seccion">Sección</option>
				<option value="votos">Votos</option>
			<select>
		</div>
	</td>	
</table>
</form>
<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=10%/>
</div>
<br>
<input type="button" onClick="Graficar()" value="Graficar" class="btnsave" id=""><br>
</center>

<div id="DivGraph">
</div>