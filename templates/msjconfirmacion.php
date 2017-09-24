<?php
include("acceso.php");
?>
<?php
if (isset($msjok))
{
echo "<center>";
echo "<div id='divmsjok' class='divmsjok'><strong>OK! </strong>";
	if ($msjok ==1)
	{
	echo "Los datos se agregaron correctamente";
	}
	else if($msjok ==2)
	{
	echo "Los datos se actualizaron correctamente";
	}
	else if($msjok ==3)
	{
	echo "Los datos se eliminaron correctamente";
	}
	else if($msjok ==5)
	{
	echo "El voto se guardo correctamente";
	}
	else if($msjok ==6)
	{
	echo "El Medico se actualizo correctamente";
	}	
	else if($msjok ==7)
	{
	echo "El Medico se elimino correctamente";
	}	
	else if($msjok ==8)
	{
	echo "La  sala se agrego correctamente";
	}
	else if($msjok ==9)
	{
	echo "La  sala se elimino correctamente";
	}
	else if($msjok ==10)
	{
	echo "La  sala se elimino correctamente";
	}
	else if($msjok ==11)
	{
	echo "La configuracion se actualizo correctamente";
	}
	else if($msjok ==12)
	{
	echo "La cita se agrego correctamente";
	}
	else if($msjok ==13)
	{
	echo "La cita se elimino correctamente";
	}
	else if($msjok ==14)
	{
	echo "El usuario se agrego correctamente";
	}
	else if($msjok ==15)
	{
	echo "El usuario se elimino correctamente";
	}
	else if($msjok ==16)
	{
	echo "El usuario se actualizo correctamente";
	}
	else if($msjok ==17)
	{
	echo "Los datos se guardaron correctamente";
	}
	else if($msjok ==18)
	{
	echo "El antecedente se elimino correctamente";
	}
	else if($msjok ==19)
	{
	echo "El antecedente se actualizo correctamente";
	}
	else if($msjok ==20)
	{
	echo "El documento se agrego correctamente";
	}
	else if($msjok ==21)
	{
	echo "Los Datos se agregaron correctamente";
	}
	
echo "
	<div style='top:-10px; left:430px; position:relative'>
	<a href='javascript:void(0)' onClick='CerraMjsCon()' class='closemsj' style='text-decoration:none'><font color='#468847' ><b>X</b></font></a>
	</div>
</div>";	
echo "</center>";
}
?>
<center>
<?php
if (isset($msjfail))
{
echo "<div id='divmsjfail' class='divmsjfail'>";
	if ($msjfail ==444)
	{
	echo "La clave de elector ya existe en el sistema";
	}
	if ($msjfail ==445)
	{
	echo "La clave de elector ya existe en el sistema de cabecera municipal";
	}
	else if($msjfail ==300)
	{
	echo "El Usuario ya existe";
	}
echo "<br>
<a href='javascript:void(0)' class='closemsj' onClick='CerraMjsCon()'>Cerrar</a></div>";	
}
?>
</center>