<?php
include("acceso.php");
?>
<table class="autocomplete"  style="background:white;">
<?php
	foreach($LstRepre as $key=>$aux)
	{
?>
	<tr onClick="SelectPeople('<?php echo $aux["peopleId"]?>')">
		<td>
			<?php echo $aux["nombre"]." ".$aux["apellidos"]?> 
			<input type="hidden" name="" id="name_<?php echo $aux["peopleId"]?>" value="<?php echo $aux["nombre"]." ".$aux["apellidos"]?> ">
		</td>
		<td>
			- <?php echo @$aux["seccionId"]?> 
		</td>
		<td>
			- <?php echo $aux["telefono"]?>
		</td>
	</tr>
<?php
	}
?>
</table>