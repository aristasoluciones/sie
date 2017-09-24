<?php
include("acceso.php");
?>
<div class="divsubtitulo">
Editar Comunidad
</div>
<br>
<center>
<div  class="formsfont">
<form id="frmEditComunidad">
<input type="hidden" name="type" value="UpdateComunidad">
<input type="hidden" name="peopleId" value="<?php echo $InfoPeo["peoplecomunidadId"]?>">
<table  align="center" class="txtfieldtable" cellspacing="5" border=0>
<tr>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Nombre:<br>
		<div class="marcotxt">
		<input type="text" id="nombre" name="nombre" id="nombre" class="txtpaciente" value="<?php echo $InfoPeo["nombre"]?>">
		</div>
		
	</td>	
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Apellidos:<br>
		<div class="marcotxt">
		<input type="text" name="apellidos" id="apellidos" class="txtpaciente" value="<?php echo $InfoPeo["apellidos"]?>">
		</div>
	</td>
	<td>
		Direcci&oacuten:<br>
		<div class="marcotxt">
		<input type="text" name="direccion" id="direccion" class="txtpaciente" value="<?php echo $InfoPeo["direccion"]?>">
		</div>
	</td>
</tr>
<tr>
	<td>
		Fecha De Nacimiento:<br>
		<div class="marcotxt">
		<input type="text"  name="fnacimiento" id="fnacimiento" class="txtpaciente" readonly value="<?php echo $fechan?>">
		</div>
	</td>
	<td>
		Sexo:<br>
		<div class="marcotxt" >
			<select name="sexo" class="txtpaciente">
				<option value="">Seleccionar..</option>
				<option  <?php if($InfoPeo["sexo"]=="Masculino"){?> selected <?php }?>>Masculino</option>
				<option <?php if($InfoPeo["sexo"]=="Femenino"){?> selected <?php }?>>Femenino</option>
			<select>
		</div>
	</td>
	<td>
	<font face="verdana" size=1 color="#e94835 ">*</font>
	Telefono:<br>
	<div class="marcotxt">
	<input type="text" name="telefono" id="telefono" class="txtpaciente" value="<?php echo $InfoPeo["telefono"]?>">
	</div>
	</td>
</tr>
<tr>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Casilla:<br>
		<div class="marcotxt">
			<select name="comunidadId" id="comunidadId" class="txtpaciente">
					<option value="">Seleccionar...</option>
				<?php foreach($lstComunidades as $key=>$aux){ ?>
					<option value="<?php echo $aux["comunidadId"]?>" <?php if($InfoPeo["comunidadId"]==$aux["comunidadId"]){?> selected <?php }?>><?php echo $aux["nombre"]?></option>
				<?php }?>
			</select>
		</div>
	</td>
	
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Nivel:<br>
		
		<div class="marcotxt">
		<select name="nivel" id="nivel" class="txtpaciente">
				<option value="">Seleccionar...</option>
				<option value="1" <?php if($InfoPeo["cabezared"] == 1){?>selected <?php }?>>Coordinador</option>
				<option value="2" <?php if($InfoPeo["cabezared"] == 2){?>selected <?php }?>>Promotor</option>
				<option value="3" <?php if($InfoPeo["cabezared"] == 3){?>selected <?php }?>>Promovido</option>
			
		</select>
	</div>
		
	</td>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		<B>Secci&oacuten donde vota:</B><br>
		<div class="marcotxt">
		
			<select name="seccionvota" id="seccionvota" class="txtpaciente">
					<option value="">Seleccionar...</option>
				<?php foreach($lstSeccion as $key=>$aux){ ?>
					<option <?php if($InfoPeo["votaseccionId"]==$aux["seccionId"]){?> selected <?php }?>><?php echo $aux["seccionId"]?></option>
				<?php }?>
			</select>
		</div>
	</td>
</tr>
<tr>
	<td>
		Representante:<br>
		<div class="marcotxt">
		<input type="text" name="SearchRepre" id="SearchRepre" class="txtpaciente" onkeyUp="SearchPeopleEditCo()" value="<?php echo $Repre["nombre"]." ".$Repre["apellidos"]?>">
		<input type="hidden" name="representanteId" id="representanteId" class="txtpaciente" value="<?php echo $Repre["peoplecomunidadId"]?>">
		</div>
		<img id="loaderAuto" src="img/r5.gif" style=" display:none;" width=10%/>
		<div id="lisCabezasEdit" style="position:absolute"></div>
	</td>
	<td>
	Clave de elector:<br>
	<div class="marcotxt">
	<input type="text" name="celector" id="celector" class="txtpaciente" value="<?php echo $InfoPeo["celector"]?>">
	</div>
	</td>
	<td>
		Correo Electr&oacutenico:<br>
		<div class="marcotxt">
		<input type="text" name="mail" id="mail" class="txtpaciente" value="<?php echo $InfoPeo["correo"]?>">
		</div>
	</td>
	
	
</tr>
<tr>
	<td style="vertical-align:top;">
		Twitter:<br>
		<div class="marcotxt">
			<input type="text" name="twitter" id="twitter" class="txtpaciente" value="<?php echo $InfoPeo["twitter"]?>">
		</div>
	</td>
	<td style="vertical-align:top;">
		Imagen Credencial:<br>
		<?php echo $InfoPeo["img"]?>
		<div class="marcotxt">
		<input type="file" name="imgcrendencial" id="imgcrendencial" class="txtpaciente">
		<input type="hidden" name="hiddenimg" id="hiddenimg" class="txtpaciente">
		</div>
	</td>
		
	<td >
		Observaciones:<br>
		<textarea id="observacion" name="observacion" cols="35" rows="5" style="font-size:13px; border: 1px solid #C0C0C0;"><?php echo $InfoPeo["observacion"]?></textarea>

		
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
<input type="button" onClick="UpdateComunidad()" value="Editar" class="btnsave" id="SaveCabecera"><br>
</center>
