<?php
include("acceso.php");
?>
<div class="CSSTableGenerator" id="">
<form id="frmvtopartido">
<input type="hidden" name="type" id="type" value="SaveVotoPart">
<table border=0>
	<tr>
		<td>Nombre del partido</td>
		<td>Total de votos hasta el momento</td>
		<td></td>
	</tr>
<?php
foreach($ltsPartidos as $key=>$aux)
{
?>
	<tr>
		<td>
			<?php echo $aux["nombre"]?>
		</td>
		<td>
			<?php echo "<b><font face='verdana' size='4' >".number_format($aux["totalvotos"])."</font></b>"?>
		</td>
		<td>
			<div class="marcotxt">
			<input type="" name="partido_<?php echo $aux["partidoId"]?>" id="partido_<?php echo $aux["partidoId"]?>" class="txtpaciente"/>
			</div>
		</td>
	</tr>
<?php
}
?>
</table>
</form>
</div>
<br>
<center>
<input type="button" onClick="SaveVotoPart()" value="Guardar" class="btnsave" id="SaveCabecera"><br>
</center>