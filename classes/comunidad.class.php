<?php 
include_once('../conexion.php');
class Comunidad 
{
	public $fecha;
	public $imagen;
	


	public function setFecha($value)
	{
		$this->fecha = $value;
	}
	
	public function setImagen($value)
	{
		$this->imagen = $value;
	}

	public function LastReg(){
	
	$sql = "SELECT MAX(peoplecomunidadId) FROM peoplecomunidad";
	$l = mysql_query($sql);
	$last = mysql_result($l,0);
	$inc = $last+1;
	
	return $inc;
	}

	public function SaveCabecera(&$image_name)
	{
		$comunidad = new Comunidad;
		$user = new User;
		
		
		$inc = $comunidad->LastReg();
		$aux = explode(".",$this->imagen);
		$extencion=end($aux);
		$image_name="doc_".$inc.".".$extencion;
		
	
		if(trim($_POST["representanteId"])=="")	
		{	
			$sql="	INSERT INTO peoplecomunidad (
			`peoplecomunidadId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`observacion`,
			`representanteId`,
			`img`,
			`cabezared`,
			`twitter`,
			`municipioId`,
			`votaseccionId`,
			`comunidadId`
			)
			VALUES (
			NULL ,  
			'".$_POST["nombre"]."',  
			'".$_POST["apellidos"]."',   
			'".$_POST["direccion"]."',    
			'".$this->fecha."',   
			'".$_POST["sexo"]."',     
			'".$_POST["telefono"]."',   
			'".$_POST["mail"]."',   
			'".$_POST["celector"]."',    
			'".$_POST["observacion"]."',   
			'".$_POST["representanteId"]."',   
			'".$image_name."',
			'1',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."',
			'".$_POST["seccionvota"]."',
			'".$_POST["comunidadId"]."'
			);";
		}
		else
		{
		$L = $comunidad->GetNumNivel($_POST["representanteId"]);
		$Level=$L["cabezared"]+1;
			$sql="	INSERT INTO peoplecomunidad (
			`peoplecomunidadId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`observacion`,
			`representanteId`,
			`img`,
			`cabezared`,
			`twitter`,
			`municipioId`,
			`votaseccionId`,
			`comunidadId`
			)
			VALUES (
			NULL ,  
			'".$_POST["nombre"]."',  
			'".$_POST["apellidos"]."',   
			'".$_POST["direccion"]."',    
			'".$this->fecha."',   
			'".$_POST["sexo"]."',     
			'".$_POST["telefono"]."',   
			'".$_POST["mail"]."',   
			'".$_POST["celector"]."',     
			'".$_POST["observacion"]."',   
			'".$_POST["representanteId"]."',   
			'".$image_name."',
			'".$Level."',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."',
			'".$_POST["seccionvota"]."',
			'".$_POST["comunidadId"]."'
			);";
		}	
				
			if (mysql_query($sql)) 
			{
			return true;
			}
			else
			{
			return false;
			}
	}
	
	
	public function SaveCabeceraClean()
	{
	$comunidad = new Comunidad;
	$user = new User;
	
	$user->setUserId($_SESSION["userIdlogin"]);
	$InfoUser = $user->Info();
	
	
		if(trim($_POST["representanteId"])=="")
		{
			$sql="	INSERT INTO peoplecomunidad (
			`peoplecomunidadId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`observacion`,
			`representanteId`,
			`cabezared`,
			`twitter`,
			`municipioId`,
			`votaseccionId`,
			`comunidadId`
			)
			VALUES (
			NULL ,  
			'".$_POST["nombre"]."',  
			'".$_POST["apellidos"]."',   
			'".$_POST["direccion"]."',    
			'".$this->fecha."',   
			'".$_POST["sexo"]."',     
			'".$_POST["telefono"]."',   
			'".$_POST["mail"]."',   
			'".$_POST["celector"]."',      
			'".$_POST["observacion"]."',
			'".$_POST["representanteId"]."',
			'".$_POST["nivel"]."',
			'".$_POST["twitter"]."',	
			'".$_SESSION["municipiolog"]."',	
			'".$_POST["seccionvota"]."',	
			'".$_POST["comunidadId"]."'	
			);";
			
		}
		else
		{
		
		$L = $comunidad->GetNumNivel($_POST["representanteId"]);
		$Level=$L["cabezared"]+1;
		
			$sql="	INSERT INTO peoplecomunidad (
			`peoplecomunidadId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`observacion`,
			`representanteId`,
			`cabezared`,
			`twitter`,
			`municipioId`,
			`votaseccionId`,
			`comunidadId`
			)
			VALUES (
			NULL ,  
			'".$_POST["nombre"]."',  
			'".$_POST["apellidos"]."',   
			'".$_POST["direccion"]."',    
			'".$this->fecha."',   
			'".$_POST["sexo"]."',     
			'".$_POST["telefono"]."',   
			'".$_POST["mail"]."',   
			'".$_POST["celector"]."',     
			'".$_POST["observacion"]."',
			'".$_POST["representanteId"]."',
			'".$_POST["nivel"]."',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."',
			'".$_POST["seccionvota"]."',
			'".$_POST["comunidadId"]."'				
			);";
		}
		
		

		if (mysql_query($sql)) 
		{
		return true;
		}
		else
		{
		return false;
		}
	}
	
	public function SearchRepresentante($nombre,$seccionId)
	{
	
		$filtro ="";
			
		// if($seccionId)
			// $filtro.= " and seccionId =".$seccionId."";
			
	
	
	 $sql ="
		select 
		peoplecomunidadId as peopleId,
		nombre,
		apellidos,
		telefono
		from 
		peoplecomunidad 
		where 
		municipioId = ".$_SESSION["municipiolog"]." 
		and statusdelete='no' 
		and concat_ws(' ',nombre,apellidos) like '%".$nombre."%'  ".$filtro."
		ORDER BY  apellidos ASC ";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		
		return $retArray;
	}
	
	public function  LsSeccion(){
	
		$sql ="
		select 
		*
		from 
		seccion 
		 order by seccionId ASC";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		
		return $retArray;
	}
	
	public function lstPeople($flt)
	{
	
		$filtro ="";
			
		if(isset($flt["nombre"]) and $flt["nombre"]<>"")
			$filtro .= "and concat_ws(' ',nombre,apellidos) like '%".$flt["nombre"]."%'";
			
		if(isset($flt["telefono"]) and $flt["telefono"]<>"")
			$filtro .= "and telefono ='".$flt["telefono"]."'";
			
		if(isset($flt["sexo"]) and $flt["sexo"]<>"")
			$filtro .= "and sexo ='".$flt["sexo"]."'";
			
		if(isset($flt["comunidad"]) and $flt["comunidad"]<>"")
			$filtro .= "and upper(direccion) like upper('%".$flt["comunidad"]."%')";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
		
		if(isset($flt["fltcComunidad"]) and $flt["fltcComunidad"]<>"")
			$filtro .= "and comunidad.comunidadId ='".$flt["fltcComunidad"]."'";
			
		if(isset($flt["fltseccionVotaId"]) and $flt["fltseccionVotaId"]<>"")
			$filtro .= "and votaseccionId ='".$flt["fltseccionVotaId"]."'";

			
			
			
	 $sql ="
		select 
			p.*,
			(select
			count(p2.peoplecomunidadId)
			from 
			peoplecomunidad as p2
			where 
			p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no')
			as NumInvitados,
			(select
			count(p2.peoplecomunidadId)
			from 
			peoplecomunidad as p2
			where 
			p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no' and voto='si')
			as yavoto,
			(select
			count(p2.peoplecomunidadId)
			from 
			peoplecomunidad as p2
			where 
			p.peoplecomunidadId = p2.representanteId and p2.statusdelete='no' and voto='no')
			as novoto,
			comunidad.nombre as comunidad
		from 
		peoplecomunidad as p
		left join  comunidad on p.comunidadId = comunidad.comunidadId
		where
		p.municipioId = ".$_SESSION["municipiolog"]."
		and p. statusdelete ='no' ".$filtro."
		  ORDER BY  p.nombre ASC limit 0,200";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		
		return $retArray;
	}
	
	public function CountFltro($flt)
	{
	
		$filtro ="";
			
		if(isset($flt["nombre"]) and $flt["nombre"]<>"")
			$filtro .= "and concat_ws(' ',nombre,apellidos) like '%".$flt["nombre"]."%'";
			
		if(isset($flt["telefono"]) and $flt["telefono"]<>"")
			$filtro .= "and telefono ='".$flt["telefono"]."'";
			
		if(isset($flt["sexo"]) and $flt["sexo"]<>"")
			$filtro .= "and sexo ='".$flt["sexo"]."'";
			
		if(isset($flt["comunidad"]) and $flt["comunidad"]<>"")
			$filtro .= "and upper(direccion) like upper('%".$flt["comunidad"]."%')";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
			
		if(isset($flt["fltcComunidad"]) and $flt["fltcComunidad"]<>"")
			$filtro .= "and comunidad.comunidadId ='".$flt["fltcComunidad"]."'";
			
		if(isset($flt["fltseccionVotaId"]) and $flt["fltseccionVotaId"]<>"")
			$filtro .= "and votaseccionId ='".$flt["fltseccionVotaId"]."'";
			
	  $sql ="
		select 
			COUNT(*)
		from 
		peoplecomunidad as p
		left join  comunidad on p.comunidadId = comunidad.comunidadId
		where 
		p.municipioId = ".$_SESSION["municipiolog"]."
		and p. statusdelete ='no' ".$filtro." limit 0,200";
	
		$l = mysql_query($sql);
		$last = mysql_result($l,0);
		

		
		return $last;
	}
	
	
	
	public function Delete($Id)
	{
	
		
		
	 $query = "UPDATE  peoplecomunidad SET  `statusdelete` =  'si' WHERE  peoplecomunidadId = ".$Id.";";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
	
	}
	
	
	public function Info($Id)
	{
		$sql ="select * from peoplecomunidad where peoplecomunidadId = ".$Id."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
		return $data;
		
	}
	
	
	public function UpdateCabecera()
	{
		$comunidad = new Comunidad;
		if(trim($_POST["representanteId"])=="")
		{
			$query = "
			 UPDATE  
			 peoplecomunidad 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 observacion =  '".$_POST["observacion"]."',
			 comunidadId =  '".$_POST["comunidadId"]."',
			 votaseccionId =  '".$_POST["seccionvota"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared = '".$_POST["nivel"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peoplecomunidadId =".$_POST["peopleId"]."";
		}
		else
		{
			$L = $comunidad->GetNumNivel($_POST["representanteId"]);
			$Level=$L["cabezared"]+1;
		
			$query = "
			 UPDATE  
			 peoplecomunidad 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 observacion =  '".$_POST["observacion"]."',
			 votaseccionId =  '".$_POST["seccionvota"]."',
			 comunidadId =  '".$_POST["comunidadId"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared = '".$_POST["nivel"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peoplecomunidadId =".$_POST["peopleId"]."";
		}
		 
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
		
	}
	
	
	public function UpdateCabeceraCon(&$image_name)
	{
		$cabecera = new cabecera;
		

		$aux = explode(".",$_POST["hiddenimg"]);
		$extencion=end($aux);
		
		$image_name="doc_".$_POST["peopleId"].".".$extencion;
		
		if(trim($_POST["representanteId"])=="")
		{
			$query = "
			 UPDATE  
			 peoplecomunidad 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 observacion =  '".$_POST["observacion"]."',
			 comunidadId =  '".$_POST["comunidadId"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 img =  '".$image_name."',
			 cabezared =  '".$_POST["nivel"]."',
			 votaseccionId =  '".$_POST["seccionvota"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peoplecomunidadId =".$_POST["peopleId"]."";
		}
		else
		{
			$L = $cabecera->GetNumNivel($_POST["representanteId"]);
			$Level=$L["cabezared"]+1;
		
			$query = "
			 UPDATE  
			 peoplecomunidad 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 img =  '".$image_name."',
			 observacion =  '".$_POST["observacion"]."',
			 comunidadId =  '".$_POST["comunidadId"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared =  '".$_POST["nivel"]."',
			  votaseccionId =  '".$_POST["seccionvota"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peoplecomunidadId =".$_POST["peopleId"]."";
		}
		
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		 // exit;
		
	}
	
	public function GetNumNivel($Id)
	{
	
		$sql ="select cabezared from peoplecomunidad where peoplecomunidadId = ".$Id."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
	
		return $data;
	}
	
	
	
	public function GraphSex()
	{
	
	$cabecera = new Cabecera;
	 $sqlH ="
			select 
				count(sexo) as total
			from
				people
			where 
				sexo = 'Masculino'
				and statusdelete='no' 
				and municipioId = '".$_SESSION["municipiolog"]."'";
		$rowH=mysql_query($sqlH);
		$countH = mysql_fetch_assoc($rowH);
		
		 $sqlM ="
			select 
				count(sexo) as total
			from
				people
			where 
				sexo = 'Femenino'
				and statusdelete='no' 
				and municipioId = '".$_SESSION["municipiolog"]."'";
		$rowM=mysql_query($sqlM);
		$countM = mysql_fetch_assoc($rowM);
	
		echo "Total Hombres: ".$countH["total"]."<br>"; 
		echo "Total Mujeres: ".$countM["total"]; 
		$img = $cabecera->GraficaPastel($countM["total"],$countH["total"],"sexo");
		
		return $img;
	}
	
	
	
	
	public function GraphSeccion()
	{
	
	$cabecera = new Cabecera;
		$sql="
		select 
			p1.seccionId,
			(select 
				COUNT(p2.seccionId)
			from
				people as p2
			where 
				p2.statusdelete='no' and p2.municipioId = '".$_SESSION["municipiolog"]."' and p2.seccionId = p1.seccionId) as Total
		from
		people as p1
		where 
			p1.statusdelete='no' and p1.municipioId = '".$_SESSION["municipiolog"]."' group by p1.seccionId";

		$row=mysql_query($sql);
		$retArray = array();
		while($rs=mysql_fetch_assoc($row))
		{
		$retArray[] = $rs;
		}	

		foreach($retArray as $key=>$aux)
		{
			$totales[] = $aux["Total"];
			$secciones[] = $aux["seccionId"];
		}
		
		
		$img = $cabecera->GraficarVectores($totales,$secciones);

		return $img;
	}
	
	
	public function GraphVotos()
	{
	
	$cabecera = new Cabecera;
	 $sqlH ="
			select 
				count(peopleId) as total
			from
				people
			where 
				 statusdelete='no' 
				and municipioId = '".$_SESSION["municipiolog"]."'
				and voto = 'si'";
		$rowH=mysql_query($sqlH);
		$countSi = mysql_fetch_assoc($rowH);
		
		$sqlM ="
			select 
				count(peopleId) as total
			from
				people
			where 
				 statusdelete='no' 
				and municipioId = '".$_SESSION["municipiolog"]."'
				and voto = 'no'";
		$rowM=mysql_query($sqlM);
		$countNo = mysql_fetch_assoc($rowM);
	
		echo "Total Si: ".$countSi["total"]."<br>"; 
		echo "Total No: ".$countNo["total"]; 
		$img = $cabecera->GraficaPastel($countSi["total"],$countNo["total"],"votos");
		
		return $img;
	}
	
	public function GraficaPastel($var1,$var2,$tipo)
	{
			$data = array($var1,$var2);
			$graph = new PieGraph(400,350);
			
			if($tipo=="sexo")
				$leyenda = array("Mujeres","Hombres");
			else
				$leyenda = array("Si","No");
				
			$theme_class="DefaultTheme";
			$graph->title->Set("");
			$graph->SetBox(true);

			$p1 = new PiePlot($data);
			$graph->Add($p1);
			$p1->SetLegends($leyenda);
			$p1->ShowBorder();
			$p1->SetColor('black');
			$p1->SetSliceColors(array('#1E90FF','#2E8B57'));
			@unlink("../graficas/img_.png");
			// Output graph
			$graph->Stroke("../graficas/img_.png");
			$img = "<center><img src='".WEB_ROOT."/graficas/img_.png?".rand()."' width=70% height=70%/></center>";
		// exit;
		return $img;
	}
	
	public function GraficarVectores($y,$x)
	{


	// Setup the graph
	$graph = new Graph(600,550);
	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;

	$graph->SetTheme($theme_class);
	$graph->img->SetAntiAliasing(false);
	
	$graph->title->Set("");
	
	$graph->SetBox(false);

	$graph->img->SetAntiAliasing();

	$graph->yaxis->HideZeroLabel();
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);

	$graph->xgrid->Show();
	$graph->xgrid->SetLineStyle("solid");
	$graph->xaxis->SetFont(FF_DEFAULT,FS_NORMAL,8);
	$graph->xaxis->SetTickLabels($x);
	
	$graph->xgrid->SetColor('#E3E3E3');

	// Create the third line
	$p3 = new LinePlot($y);
	$graph->Add($p3);
	$p3->SetColor("#FD0404");
	$p3->SetLegend("Secciones");

	$graph->legend->SetFrameWeight(500);

	@unlink("../graficas/img_.png");
	// Output graph
	$graph->Stroke("../graficas/img_.png");
	$img = "<center><img src='".WEB_ROOT."/graficas/img_.png?".rand()."' width=70% height=70%/></center>";
	
	return $img;
	}
	
	public function Votar($Id)
	{
	
		
		
	 $query = "UPDATE  peoplecomunidad SET  `voto` =  'si' WHERE  peoplecomunidadId = ".$Id.";";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
	
	}
	
	public function allComunidad()
	{
	
				
	$sql ="
		select 
			*
		from 
		comunidad 
			where 
		municipioId =".$_SESSION["municipiolog"]." ORDER BY  nombre ASC  ";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		
		return $retArray;
	}
	
	
	
	public function SaveVotosPartido()
	{
		$ltsPartidos = $this->allPartidos();
		foreach($ltsPartidos as $key=>$aux)
		{	
			$sqlp ="select * from partido where partidoId = ".$aux["partidoId"]."";
			$row=mysql_query($sqlp);
			$data=mysql_fetch_assoc($row);
			$Total = $data["totalvotos"] + $_POST["partido_".$aux["partidoId"]];
			$query = "
			UPDATE  
			partido 
			SET  
			totalvotos =  ".$Total."
			WHERE 
			partidoId =".$aux["partidoId"]."";
			mysql_query($query);
		}
			return true;
		}
}

?>