<?php
include("acceso.php");
echo "Meta hasta el dia de hoy: ".$InfoConfi["meta"];
?>

	<br>
	<div class="CSSTableGenerator" id="">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td>Numero</td>
		<td>Municipio</td>
		<td>Total</td>
	</tr>
	<?php
	
	foreach($lstTotales as $key=>$aux)
	{
		if($aux["Total"] < $InfoConfi["meta"])
		{
	?>
		<tr align="center" >
			<td  ><?php echo $key+1; ?></td>
			<td  style="background:#F6CECE"><?php echo $aux["nombre"]?></td>
			<td  ><?php echo $aux["Total"]?></td>
		</tr>
	<?php
		}
		else
		{
	?>
		<tr align="center">
			<td  ><?php echo $key+1; ?></td>
			<td  style="background:#81F781"><?php echo $aux["nombre"]?></td>
			<td  ><?php echo $aux["Total"]?></td>
		</tr>
	<?php
		}
	}
	?>
	</table>
</div>

