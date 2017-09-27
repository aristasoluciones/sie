<div id='menubloque'>
<ul id='menudesplegable'>
<li><a href='#'><img src="images/home.png"> INICIO</a></li>
<?php if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
<li>
<a href=''><img src="images/user-green.png">Cabecera Municipal</a>
<ul>
<?php if (($_SESSION["tipouserlogin"]=="admin") or ($_SESSION["tipouserlogin"]=="auxiliar")){?> 
	<li><a  href="#" onClick="m_addpaciente()">Agregar</a></li>
<?php }?>
<?php if ($_SESSION["tipouserlogin"]=="admin") { ?> 
<li>

<a href=''>Reportes</a>
<ul>

<li><a href="#" onClick="reporte1()" >Personas por Sección</a></li>
<li><a href="#" onClick="reporte3()" >Edad por Sección</a></li>
<li><a href="#" onClick="reporte2()" >Votos por Sección</a></li>
<li><a href="#" onClick="reporte4()">GeoInformación</a></li>
<li><a href="#" onClick="reporte5()" >Ranking de Niveles</a></li>
<li><a href="#" onClick="mReporteCab()">Personalizado</a></li>

</ul>
</li>
<li><a href="#" onClick="mnuGraficas()">Graficas</a>
</li>
</ul>
</li>
<?php }}?> 
<li>
<a href=''><img src="images/television-test.png">Mi Cuenta</a>
<ul>
<li>
<a onClick="CloseAccount()" href="javascript:void(0)">Salir</a>
</li>

</ul>
</li>
</ul>
</div>