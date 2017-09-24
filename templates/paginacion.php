<center>
<?php
	if($pagEnd > $TotalPeople)
		$pagEnd =  $TotalPeople;
?>
MOSTRANDO <?php echo "DEL ".$pagInicio." AL ".$pagEnd; ?> DE <?php echo $TotalPeople;?> REGISTROS
<table>
<tr>
	<?php 
	for($i=0;$i<=$items;$i++){
	?>
	<td>
	<?php echo "<a href='javascript:void(0)' style='color:#706a6a; text-decoration:none' id='pag_".($i+1)."' onClick='Next(".($i+1).")'>
	<div class='div_".($i+1)."' style='background:#e5e5e5; text-color;width:20px; text-align:center; size:40px; height:20px'  >"; echo $i+1; 
	echo "</div></a>"; ?>
	</td>
	<?php		
	}
	?>
</tr>
</table>
</center>