<?php
// include_once('../initPdf.php');
include_once('../conexion.php');
// echo "<pre>"; print_r($_POST);
// exit;
// include_once(DOC_ROOT.'/libraries.php'); 

	$name = "Reporte_".date("d-m-Y")."";

	$filtro ="";
			
		// if(isset($_POST["fltnombre"]) and $_POST["fltnombre"]<>"")
			// $filtro .= "and concat_ws(' ',nombre,apellidos) like '%".$_POST["fltnombre"]."%'";
			
		// if(isset($_POST["flttelefono"]) and $_POST["flttelefono"]<>"")
			// $filtro .= "and telefono ='".$_POST["flttelefono"]."'";
			
		// if(isset($_POST["fltsexo"]) and $_POST["fltsexo"]<>"")
			// $filtro .= "and sexo ='".$_POST["fltsexo"]."'";
			
		// if(isset($_POST["fltseccionId"]) and $_POST["fltseccionId"]<>"")
			// $filtro .= "and seccionId ='".$_POST["fltseccionId"]."'";
			
		// if(isset($_POST["fltcabeza"]) and $_POST["fltcabeza"]<>"")
			$filtro .= "and p.representanteId ='".$_POST["peopleId"]."'";
			
		// if(isset($_POST["fltvoto"]) and $_POST["fltvoto"]<>"")
			// $filtro .= "and voto ='".$_POST["fltvoto"]."'";
			
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
		p.municipioId = 21
		and p. statusdelete ='no' ".$filtro."
		  ORDER BY  p.nombre ASC ";
		  // exit;
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		// echo $x;
		// exit;
		@$x .= '
			<table align="center" width="100%" id="tblPeople" border=0 >
			<tr align="center">
				<td >Id</td>
				<td >Nombre</td>
				<td >C elector</td>
				<td >Calle</td>
				<td >Colonia</td>
				<td >Seccion</td>
				<td >Telefono</td>
				<td >Voto</td>
				<td >Ya votaron</td>
				<td >No han votado</td>
				<td >Total Invitados</td>
			</tr>';
			
		
	foreach($retArray as $key=>$aux)
	{

	$x .='<tr align="center">
			<td>'.$aux["peopleId"].'</td>
			<td>'.utf8_decode($aux["nombre"]).' '.utf8_decode($aux["apellidos"]).'</td>
			<td>'.$aux["celector"].'</td>
			<td>'.$aux["direccion"].'</td>
			<td>'.$aux["barrio"].'</td>
			<td>'.$aux["seccionId"].'</td>
			<td>'.$aux["telefono"].'</td>
			<td>'.$aux["voto"].'</td>
			<td>'.$aux["yavoto"].'</td>
			<td>'.$aux["novoto"].'</td>
			<td>'.$aux["NumInvitados"].'</td>
			<td>			
			</td>
		</tr>';

	}

	$x .= '</table>';
		
	// echo $x;	
		// exit;
	header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
	header("Content-type:   application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=".$name.".xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	echo $x;	
		
?>