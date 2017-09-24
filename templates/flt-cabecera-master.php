<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Reportes
</div> 
<center>
<form id="frmMaster">
<input type="hidden" value="SerchMaster" name="type" >
<table border=0 align="center">
<tr>
	<td>
		<b>Nombre</b><br>
		<div class="marcotxt"><input type="fltnombre" name="fltnombre" class="txtfls"></div>
	</td>
	<td>
		<b>Telefono</b><br>
		<div class="marcotxt"><input type="flttelefono" name="flttelefono" class="txtfls"></div>
	</td>
	<td>
		<b>Sexo</b><br>
		<div class="marcotxt">
		<select name="fltsexo" id="fltsexo" class="txtfls">
			<option value="">Todos</option>
			<option >Femenino</option>
			<option >Masculino</option>
		</select>
		</div>
	</td>
</tr>
<tr>
	<td>
		<b>Seccion</b><br>
		<div class="marcotxt">
		<select name="fltseccionId" id="fltseccionId" class="txtfls">
			<option value="">Todos</option>
			<?php foreach($lstSeccion as $key=>$aux){?>
				<option ><?php echo $aux["seccionId"]?></option>
			<?php }?>
		</select>
		</div>
	</td>
	<td>
		<b>Nivel</b><br>
		<div class="marcotxt">
		<select name="fltcabeza" id="fltcabeza" class="txtfls" >
			<option value="">Todos</option>
			<option selected>1</option>
			<option >2</option>
			<option >3</option>
		</select>
		</div>
	</td>
	<td>
		<b>Voto</b><br>
		<div class="marcotxt">
		<select name="fltvoto" id="fltvoto" class="txtfls">
			<option value="">Todos</option>
			<option >Si</option>
			<option >No</option>
		</select>
		</div>
	</td>
	
</tr>

<tr>
	<td>
		<b>Municipio</b><br>
		<div class="marcotxt">
		<select name="fltmunicipio" id="fltmunicipio" class="txtfls">
			<?php foreach($lstMunicipio as $key=>$aux){?>
				<option value="<?php echo $aux["municipioId"]?>"><?php echo $aux["nombre"]?></option>
			<?php }?>
		</select>
		</div>
	</td>
	<td>
		
	</td>
	<td>
	
	</td>
	
</tr>

</table>
</form>

<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=9%/><br>
<input type="button" onClick="SerchMaster()" value="Buscar" class="btnsave" id=""><br>
</center>
<br>
<br>
<div id="DivMaster"></div>