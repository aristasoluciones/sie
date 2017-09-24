<?php
include("acceso.php");
?>
<br>
<center>
<form id="frmEditCabecera">
<input type="hidden" name="type" value="UpdateCabecera">
<input type="hidden" name="peopleId" value="<?php echo $InfoPeo["peopleId"]?>">
<table  align="center" class="txtfieldtable" cellspacing="5" border=0>
<tr>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Nombre:<br>
		<div class="marcotxt">
		<input type="text" id="nombre" name="nombre" value="<?php echo $InfoPeo["nombre"]?>" class="txtpaciente" >
		</div>
	</td>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Apellidos:<br>
		<div class="marcotxt">
		<input type="text" name="apellidos" id="apellidos" class="txtpaciente" value="<?php echo $InfoPeo["apellidos"]?>" >
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
		<input type="text"  name="fnacimiento" id="fnacimiento" class="txtpaciente" value="<?php echo $fechan?>" readonly>
		</div>
	</td>
	<td>
		Sexo:<br>
		<div class="marcotxt" >
			<select name="sexo" class="txtpaciente">
				<option value="">Seleccionar..</option>
				<option <?php if($InfoPeo["sexo"]=="Masculino"){?> selected <?php }?> >Masculino</option>
				<option <?php if($InfoPeo["sexo"]=="Femenino"){?> selected <?php }?> >Femenino</option>
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
		Correo Electr&oacutenico:<br>
		<div class="marcotxt">
		<input type="text" name="mail" id="mail" class="txtpaciente" value="<?php echo $InfoPeo["correo"]?>">
		</div>
	</td>
	<td>
		Clave de elector:<br>
		<div class="marcotxt">
		<input type="text" name="celector" id="celector" class="txtpaciente" value="<?php echo $InfoPeo["celector"]?>">
		</div>
	</td>
	<td>
		<font face="verdana" size=1 color="#e94835 ">*</font>
		Secci&oacuten:<br>
		<div class="marcotxt">
		<input type="text" name="seccion" id="seccion" value="<?php echo $InfoPeo["seccionId"]?>" class="txtpaciente">
			<!--<select name="seccion" id="seccion" class="txtpaciente">
					<option value="">Seleccionar...</option>
				<?php foreach($lstSeccion as $key=>$aux){ ?>
					<option <?php if($InfoPeo["seccionId"]==$aux["seccionId"]){?> selected <?php }?>><?php echo $aux["seccionId"]?></option>
				<?php }?>
			</select>-->
		</div>
	</td>
</tr>

<tr>
	<td>
		Representante:<br>
		<div class="marcotxt">
		<input type="text" name="SearchRepre" id="SearchRepre" class="txtpaciente" onkeyUp="SearchPeopleEdit()" value="<?php echo $Repre["nombre"]." ".$Repre["apellidos"]?>">
		<input type="hidden" name="representanteId" id="representanteId" class="txtpaciente" value="<?php echo $Repre["peopleId"]?>">
		</div>
		<img id="loader_gifEdit" src="img/r5.gif" style=" display:none;" width=10%/>
		<div id="lisCabezasEdit" style="position:absolute"></div>
	</td>
	<td>
		Facebook:<br>
		<div class="marcotxt">
		<input type="text" name="face" id="face" class="txtpaciente" value="<?php echo $InfoPeo["facebook"]?>">
		</div>
	</td>
	<td>
		Twitter:<br>
		<div class="marcotxt">
			<input type="text" name="twitter" id="twitter" class="txtpaciente" value="<?php echo $InfoPeo["twitter"]?>">
		</div>
	</td>
</tr>
<tr>
	<td style="vertical-align:top;">
		Imagen Credencial:<br>
		<div class="marcotxt">
		<input type="file" name="imgcrendencial" id="imgcrendencial" class="txtpaciente">
		<input type="hidden" name="hiddenimg" id="hiddenimg" class="txtpaciente">
		</div>
	</td>
	<td >
		Observaciones:<br>
		<textarea id="observacion" name="observacion" cols="30" rows="5" style="font-size:13px; border: 1px solid #C0C0C0;"><?php echo $InfoPeo["observacion"]?></textarea>
	</td>
	<td>Nivel:
		<div class="marcotxt">
		<select name="nivel" id="nivel" class="txtpaciente">
				<option value="">Seleccionar...</option>
				<option value="1" <?php if($InfoPeo["cabezared"] == 1){?>selected <?php }?>>Coordinador</option>
				<option value="2" <?php if($InfoPeo["cabezared"] == 2){?>selected <?php }?>>Promotor</option>
				<option value="3" <?php if($InfoPeo["cabezared"] == 3){?>selected <?php }?>>Promovido</option>
			
		</select>
	</div>
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
<img id="loader_gifEdit" src="img/r5.gif" style=" display:none;" width=15%/><br>
<input type="button" onClick="UpdateCabecera()" value="Editar" class="btnsave" id="UpdateCabecera"><br>
</center>
