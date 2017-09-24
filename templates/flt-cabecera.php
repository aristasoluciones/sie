<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Cabecera Municipal
</div> 
<center>
<form id="frmCabecera" action="./ajax/exportar-excel.php" method="POST">
<input type="hidden" value="SerchPeople" name="type" >
<input type="hidden"  name="municipiolog" value="<?php echo $_SESSION["municipiolog"]?>">
<table border=0 align="center">
<tr>
	<td>
		<b>Nombre</b><br>
		<div class="marcotxt"><input id="fltnombre" name="fltnombre" class="txtfls" onkeyup="SerchPeople()"></div>
	</td>
	<td>
		<b>Telefono</b><br>
		<div class="marcotxt"><input id="flttelefono" name="flttelefono" class="txtfls"></div>
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
		<!--<select name="fltseccionId" id="fltseccionId" class="txtfls">
			<option value="">Todos</option>
			<?php //foreach($lstSeccion as $key=>$aux){?>
				<option ><?php //echo $aux["seccionId"]?></option>
			<?php //}?>
		</select>-->
		<input type="text" name="fltseccionId" id="fltseccionId" class="txtfls">
		</div>
	</td>
	<td>
		<b>Nivel</b><br>
		<div class="marcotxt">
		<select name="fltcabeza" id="fltcabeza" class="txtfls" >
			<option value="">Todos</option>
			<option  value="1">Coordinador</option>
			<option value="2">Lider</option>
			<option value="3">Promovido</option>
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
		<b>Tipo</b><br>
		<div class="marcotxt">
		<select name="tipo2" id="tipo2" class="txtfls">
			<option value="" >Todos</option>
			<option >cabecera</option>
			<option >comunidad</option>
		</select>
		</div>
	</td>
	<td>
		<b>Clave elector</b><br>
		<div class="marcotxt">
		<input type="text" name="clave" id="clave" class="txtfls" onkeyup="SerchPeople()">
		</div>
	</td>
	<td>
		<b>Direccion</b><br>
		<div class="marcotxt">
		<input type="text" name="direccion" id="direccion" class="txtfls" onkeyup="SerchPeople()">
		</div>
	</td>
</tr>
<tr>
	<td>
		<b>Bingo</b><br>
		<div class="marcotxt">
		<input type="text" name="fltbingo" id="fltbingo" class="txtfls" onkeyup="SerchPeople()">
		</div>
	</td>
	<td></td>
	<td></td>
</tr>

</table>
</form>

<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=9%/><br>
<input type="button" onClick="SerchPeople()" value="Buscar" class="btnsave" id=""><br>
</center>
<br>
<br>