<?php
include_once('../conexion.php');
include_once('../pdf/dompdf_config.inc.php');



$filtro ="";
			
		if(isset($_GET["fltnombre"]) and $_GET["fltnombre"]<>"")
			$filtro .= "and concat_ws(' ',nombre,apellidos) like '%".$_GET["fltnombre"]."%'";
			
		if(isset($_GET["flttelefono"]) and $_GET["flttelefono"]<>"")
			$filtro .= "and telefono ='".$_GET["flttelefono"]."'";
			
		if(isset($_GET["fltsexo"]) and $_GET["fltsexo"]<>"")
			$filtro .= "and sexo ='".$_GET["fltsexo"]."'";
			
		if(isset($_GET["fltseccionId"]) and $_GET["fltseccionId"]<>"")
			$filtro .= "and seccionId ='".$_GET["fltseccionId"]."'";
			
		if(isset($_GET["fltcabeza"]) and $_GET["fltcabeza"]<>"")
			$filtro .= "and cabezared ='".$_GET["fltcabeza"]."'";
			
		if(isset($_GET["fltvoto"]) and $_GET["fltvoto"]<>"")
			$filtro .= "and voto ='".$_GET["fltvoto"]."'";
			
	 $sql ="
		select 
			p.*,
			(select
			count(p2.peopleId)
			from 
			people as p2
			where 
			p.peopleId = p2.representanteId and p2.statusdelete='no')
			as NumInvitados,
			(select
			count(p2.peopleId)
			from 
			people as p2
			where 
			p.peopleId = p2.representanteId and p2.statusdelete='no' and voto='si')
			as yavoto,
			(select
			count(p2.peopleId)
			from 
			people as p2
			where 
			p.peopleId = p2.representanteId and p2.statusdelete='no' and voto='no')
			as novoto
		from 
		people as p
		where
		p.municipioId = ".$_GET["municipiolog"]."
		and p. statusdelete ='no' ".$filtro."
		  ORDER BY  p.nombre ASC limit 0,200";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$lstPeople[] = $rs;
		}	

		


// $TotalPeople = $cabecera->CountFltro($_SESSION["fltcabecera"]);

@$html .='
<html>
		<head>
		<title>Cupon</title>
		<style type="text/css">
		.txtTicket{
			font-size:9px;
			font-family:verdana;
			text-transform: uppercase;
			font:bold 9px "Trebuchet MS"; 
		}
		table,td {
	border: 1px solid black;
	 border-collapse: collapse;
}
		</style>
		</head>
		<body>

<p class="txtTicket">cabecera municipal</p>
<p class="txtTicket">fecha de impresion: '.date("d-m-Y H:i:s").'</p>
<table class="txtTicket" width="100%">
	<tr>
		<td>
			nombre: '.$_GET["fltnombre"].'
		</td>
		<td>
			telefono: '.$_GET["flttelefono"].'
		</td>
		<td>
			sexo: '.$_GET["fltsexo"].'
		</td>
	</tr>
	<tr>
		<td>
			seccion:
			'.$_GET["fltseccionId"].'
		</td>
		<td>
			nivel:
			'.$_GET["fltcabeza"].'
		</td>
		<td>
			voto:
			'.$_GET["fltvoto"].'
		</td>
	</tr>
</table>

<table align="center" width="100%" id="tblPeople" class="txtTicket" >
	<tr align="center">
		<td ></td>
		<td >Nombre</td>
		<td >Seccion</td>
		<td >Direccion</td>
		<td >Telefono</td>
		<td >Voto</td>
		<td >Ya votaron</td>
		<td >No han votado</td>
		<td >Total Invitados</td>
	</tr>';
	
	foreach($lstPeople as $key=>$aux)
	{
	$key = $key+1;
		$html .='<tr align="center">
			<td>'.$key.'</td>
			<td>'.$aux["nombre"].' '.$aux["apellidos"].'</td>
			<td>'.$aux["seccionId"].'</td>
			<td>'.$aux["direccion"]." ".$aux["barrio"].'</td>
			<td>'.$aux["telefono"].'</td>
			<td>'.$aux["voto"].'</td>
			<td>'.$aux["yavoto"].'</td>
			<td>'.$aux["novoto"].'</td>
			<td>'.$aux["NumInvitados"].'</td>
		</tr>';
	
	}

	$html .= '</table></body></html>';
// echo "<pre>"; print_r($html);
// exit;
// @$html.="sad";
# Instanciamos un objeto de la clase DOMPDF.
$mipdf = new DOMPDF();
# Definimos el tamaño y orientación del papel que queremos.
# O por defecto cogerá el que está en el fichero de configuración.
$mipdf ->set_paper("A4", "portrait");
# Cargamos el contenido HTML.
$mipdf ->load_html(utf8_decode($html));
# Renderizamos el documento PDF.
$mipdf ->render();
# Enviamos el fichero PDF al navegador.
$varReceta = 'Cabecera_'.date('d-m-Y').'.pdf';
$mipdf ->stream($varReceta,array("Attachment" => 0));