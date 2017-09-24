<ul style=" font-family:verdana">
	<li >
		<a href="#" class="active"><span><img src="images/home.png"> INICIO</span></a>
		<ul>
			<li><a href="index.php">INICIO</a></li>
		</ul>
	</li>
	<?php if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
	<li >
		<a  href="javascript:void(0)"><span><img src="images/user-green.png">Cabecera Municipal</span></a>
		<ul>
		<?php if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
			<li><a  href="#" onClick="m_addpaciente()">Agregar</a></li>
		<?php }?>
		<?php if ($_SESSION["tipouserlogin"]=="admin") {?> 
			<li><a href="#" onClick="mReporteCab()">Reportes</a></li>
			<li><a href="#" onClick="mnuGraficas()">Graficas</a></li><!--
			<li><a href="#" onClick="mnuUpExcel()">Subir Excel</a></li>-->
		<?php }?> 
		</ul>
		
	</li>
	<li >
		<!--<a  href="javascript:void(0)"><span><img src="images/user-green.png">Comunidades</span></a>
		<ul>-->
		<?php //if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
			<!--<li><a  href="#" onClick="m_addComunidad()">Agregar</a></li>-->
		<?php //}?>
		<?php //if ($_SESSION["tipouserlogin"]=="admin") {?> 
			<!--<li><a href="#" onClick="mReporteCo()">Reportes</a></li>--><!--
			<li><a href="#" onClick="mnuGraficasCo()">Graficas</a></li>-->
		<?php //}?> 
		<!--</ul>-->
		
	</li>
	<li >
		<a  href="javascript:void(0)"><span><img src="images/user-green.png">Resumen</span></a>
		<ul>
		<?php if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
			<li><a  href="#" onClick="mnuaddVotos()">Total por partidos</a></li>
		<?php }?>
		</ul>
		
	</li>
	<?php }?>
	
	<?php if ($_SESSION["tipouserlogin"]=="master") {?> 
	<li >
		<a  href="javascript:void(0)"><span><img src="images/user-green.png">Reportes Municipios</span></a>
		<ul>
		
			<li><a href="#" onClick="mnuRMaster()">Reportes</a></li>
			<li><a href="#" onClick="mnuTotales()">Totales por Municipio</a></li>
			<li><a href="#" onClick="mnuGrapMaster()">Graficas</a></li>
		</ul>
	</li>
	<?php }?> 
	<li>
		<a href="javascript:void(0)"><span><img src="images/television-test.png"> Mi Cuenta</span></a>
		<ul>
			<!--<li><a onClick="MnuSoporte()" href="javascript:void(0)">Soporte</a></li>
			<li><a onClick="MnuApariencia()" href="javascript:void(0)">Personalizar</a></li>-->
			<li><a onClick="CloseAccount()" href="javascript:void(0)">Cerrar</a></li>
		</ul>
	
	</li>
</ul>
