<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Comunidades
</div> 
<center>
<form id="frmCabecera" action="">

<input type="hidden" value="SerchPeople" name="type" >
<input type="hidden"  id="municipiolog" name="municipiolog" value="<?php echo $_SESSION["municipiolog"]?>">
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
		<!--
		<b>Seccion</b><br>
		<div class="marcotxt">
		<select name="fltseccionId" id="fltseccionId" class="txtfls">
			<option value="">Todos</option>
			<?php foreach($lstSeccion as $key=>$aux){?>
				<option ><?php echo $aux["seccionId"]?></option>
			<?php }?>
		</select>
		</div>
		-->
		<b>Comunidad</b><br>
		<div class="marcotxt"><input type="text" name="namecomunidad" id="namecomunidad" class="txtfls"></div>
		
	</td>
	<td>
		<b>Nivel</b><br>
		<div class="marcotxt">
		<select name="fltcabeza" id="fltcabeza" class="txtfls" >
			<option value="">Todos</option>
			<option value="1" selected>Coordinador</option>
			<option value="2">Promotor</option>
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
	<tr>
</tr>
<tr>
	<td>
		<b>Casillas</b><br>
		<div class="marcotxt">
		<select name="fltcComunidad" id="fltcComunidad" class="txtfls" >
			<option value="">Todos</option>
			<?php
				foreach($lstComunidades as $key=>$aux){
				?>
				<option value="<?php echo $aux["comunidadId"]?>"><?php echo $aux["nombre"]?></option>
			<?php
				}
			?>
		</select>
		</div>
	</td>
	<td>
		<b>Seccion donde vota</b><br>
		<div class="marcotxt">
		<select name="fltseccionVotaId" id="fltseccionVotaId" class="txtfls">
			<option value="">Todos</option>
			<?php foreach($lstSeccion as $key=>$aux){?>
				<option ><?php echo $aux["seccionId"]?></option>
			<?php }?>
		</select>
		</div>
	</td>
	<td>
	</td>
</tr>
</table>
</form>

<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=9%/><br>
<input type="button" onClick="SerchPeopleComunidad()" value="Buscar" class="btnsave" id=""><br>
</center>
<br>
<br>