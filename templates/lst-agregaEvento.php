<?php
include("acceso.php");
?>
<div id="DivPeople">
	<!--<a href="javascript:void(0)" onClick="PrintReportCabecera()" title="EXPORTAR A PDF" style="text-decoration:none">
	<img src="./images/print.jpg" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcel()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>
	<a href="javascript:void(0)" onClick="ExportarExcelAll()" title="EXPORTAR A EXCEL" style="text-decoration:none">
	<img src="./images/Excel-icon.png" width="3%">
	</a>-->
<br>
<?php
		// include('paginacion.php');
	?>
	
	<p align="right">
		<center><font face="verdana" color="#FF0000" size="5">DIAS FESTIVOS: </center>
        </font>
		</p>
	
	<br>
	<div class="CSSTableGenerator" id="">
	<form id="frmLst" action="./ajax/eventos-e.php" method="POST">
	<table align="center" width="100%" id="tblPeople" border=0 >
	<tr align="center">
		<td >
		     <label class="control-label col-md-3"><span class="reqIcon"></span>Fechas Con memorativas	</label>
         
			<select>
			    <option>
				         1 de enero
			    </option>	
				<option>
				         6 de enero, “Día de Reyes”
			    </option>
				<option>
				         2 de febrero, “Día de la Candelaria”
			    </option>
				<option>
				         6 de febrero, “Día de la Constitución Mexicana”
			    </option>
				<option>
				         14 de febrero “Día de San Valentín”
			    </option>
				<option>
				         6 de marzo “Día de la Familia”
			    </option>
				<option>
				         20 de marzo “ Natalicio de Benito Juárez”
			    </option>
				<option>
				         Semana Santa, del 10 al 21 de abril.
			    </option>
				<option>
				         30 de abril “Día del Niño”
			    </option>
				<option>
				         1 de mayo “Día del trabajo”
			    </option>
				<option>
				         5 de mayo “Conmemoración a la Batalla de Puebla”
			    </option>
				<option>
				         10 de mayo “Día de las Madres”
			    </option>
				<option>
				         15 de mayo “Día del Maestro”
			    </option>
				<option>
				         23 de mayo “Día del Estudiante”
			    </option>
				<option>
				         18 de junio “Día del Padre”
			    </option>
				<option>
				         Vacaciones de Verano del 18 al 31 de julio
			    </option>
				<option>
				         16 de septiembre “Día de la Independencia de México”
			    </option>
				<option>
				         1y 2 de noviembre, “Día de Muertos”
			    </option>
				<option>
				         20 de noviembre “Día de la Revolución Mexicana”
			    </option>
				<option>
				         12 de diciembre, Virgen de Guadalupe
			    </option>
				<option>
				         Posadas navideñas del 16 al 24 de diciembre
			    </option>
				<option>
				         25 de diciembre “Navidad”
			    </option>
				<option>
				         31 de diciembre “Fin de Año”
			    </option>			
			    
			</select>
			
		</td>
		<td>		      
			Consulta que dia Cae tu Fecha conmemorativa  <input type="date" name="fecha">  
		</td>
	</tr>		
	</table>
	<table>
	        <tr>
			     <td>
				      <center><h1>AGENDA ESTRATEGICA</h1> </center>
				 </td>
			</tr>
			<tr>
			     <td>  
					 Fechas conmemorativa: 
				 </td>
			</tr>
	</table>
	<table>
	        <tr>
			     <td>
				      <center><h1></h1> </center>
				 </td>
			</tr>
			<tr>
			     <td>  
					 <p><textarea name="comentario" rows="10" cols="50">Escribe tu apoyo: </textarea></p>
				 </td>			 
				 
			</tr>
	</table>      
	
	</form>
	</div>
	<?php
		// include('paginacion.php');
	?>
</div>
<div id="wideditpaciente"></div>
<div id="widcita"></div>
