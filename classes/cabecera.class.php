<?php 
include_once('../conexion.php');

class Cabecera 
{
	public $fecha;
	public $imagen;
	public $pag;
	
	public function setPag($value)
	{
		$this->pag = $value;
	}

	public function setFecha($value)
	{
		$this->fecha = $value;
	}
	
	public function setImagen($value)
	{
		$this->imagen = $value;
	}

	public function LastReg(){
	
	$sql = "SELECT MAX(peopleId) FROM people";
	$l = mysql_query($sql);
	$last = mysql_result($l,0);
	$inc = $last+1;
	
	return $inc;
	}

	public function SaveCabecera(&$image_name)
	{
		$cabecera = new cabecera;
		$user = new User;
		
		
		$inc = $cabecera->LastReg();
		$aux = explode(".",$this->imagen);
		$extencion=end($aux);
		$image_name="doc_".$inc.".".$extencion;
		
	
		if(trim($_POST["representanteId"])=="")	
		{	
			$sql="	INSERT INTO people (
			`peopleId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`seccionId` ,
			`observacion`,
			`representanteId`,
			`img`,
			`cabezared`,
			`facebook`,
			`twitter`,
			`municipioId`
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
			'".$_POST["seccion"]."',    
			'".$_POST["observacion"]."',   
			'".$_POST["representanteId"]."',   
			'".$image_name."',
			'".$_POST["nivel"]."',
			'".$_POST["face"]."',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."'
			);";
		}
		else
		{
		$L = $cabecera->GetNumNivel($_POST["representanteId"]);
		$Level=$L["cabezared"]+1;
			$sql="	INSERT INTO people (
			`peopleId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`seccionId` ,
			`observacion`,
			`representanteId`,
			`img`,
			`cabezared`,
			`facebook`,
			`twitter`,
			`municipioId`,
			`tipo`
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
			'".$_POST["seccion"]."',    
			'".$_POST["observacion"]."',   
			'".$_POST["representanteId"]."',   
			'".$image_name."',
			'".$_POST["nivel"]."',
			'".$_POST["face"]."',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."',	
			'".$_POST["tipo"]."'	
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
	$cabecera = new cabecera;
	$user = new User;
	
	$user->setUserId($_SESSION["userIdlogin"]);
	$InfoUser = $user->Info();
	
	
		if(trim($_POST["representanteId"])=="")
		{
			$sql="	INSERT INTO people (
			`peopleId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`seccionId` ,
			`observacion`,
			`representanteId`,
			`cabezared`,
			`facebook`,
			`twitter`,
			`municipioId`,
			`tipo`
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
			'".$_POST["seccion"]."',    
			'".$_POST["observacion"]."',
			'".$_POST["representanteId"]."',
			'".$_POST["nivel"]."',
			'".$_POST["face"]."',
			'".$_POST["twitter"]."',	
			'".$_SESSION["municipiolog"]."',	
			'".$_POST["tipo"]."'	
			);";
			
		}
		else
		{
		
		$L = $cabecera->GetNumNivel($_POST["representanteId"]);
		$Level=$L["cabezared"]+1;
		
			$sql="	INSERT INTO people (
			`peopleId`,
			`nombre`,
			`apellidos`,
			`direccion`,
			`fnacimiento`,
			`sexo`,
			`telefono`,
			`correo`,
			`celector` ,
			`seccionId` ,
			`observacion`,
			`representanteId`,
			`cabezared`,
			`facebook`,
			`twitter`,
			`municipioId`
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
			'".$_POST["seccion"]."',    
			'".$_POST["observacion"]."',
			'".$_POST["representanteId"]."',
			'".$_POST["nivel"]."',
			'".$_POST["face"]."',
			'".$_POST["twitter"]."',
			'".$_SESSION["municipiolog"]."'				
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
		peopleId,
		nombre,
		apellidos,
		seccionId,
		telefono
		from 
		people 
		where 
		municipioId = ".$_SESSION["municipiolog"]." 
		and statusdelete='no' 
		and concat_ws(' ',nombre,apellidos) like '%".$nombre."%'  ".$filtro." 
		ORDER BY  apellidos ASC  ";
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
	
		$offset = ($this->pag - 1) * NUM_PAGINATION;
	
		$filtro ="";
			
		if(isset($flt["nombre"]) and $flt["nombre"]<>"")
			$filtro .= "and concat_ws(' ',nombre,apellidos) like '%".$flt["nombre"]."%'";
			
		if(isset($flt["telefono"]) and $flt["telefono"]<>"")
			$filtro .= "and telefono ='".$flt["telefono"]."'";
			
		if(isset($flt["sexo"]) and $flt["sexo"]<>"")
			$filtro .= "and sexo ='".$flt["sexo"]."'";
			
		if(isset($flt["seccionId"]) and $flt["seccionId"]<>"")
			$filtro .= "and seccionId ='".$flt["seccionId"]."'";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
		
		if(isset($_POST["tipo"]))
			$order = "p.nombre ASC";
		else
			$order = "p.peopleId ASC";
		
		if(isset($flt["tipo2"]) and $flt["tipo2"]<>"")
			$filtro .= "and tipo ='".$flt["tipo2"]."'";
		
		if(isset($flt["clave"]) and $flt["clave"]<>"")
			$filtro .= "and celector ='".$flt["clave"]."'";
		
		if(isset($flt["direccion"]) and $flt["direccion"]<>"")
			$filtro .= "and (direccion like '%".$flt["direccion"]."%' or barrio like '%".$flt["direccion"]."%')";
		
		if(isset($flt["fltbingo"]) and $flt["fltbingo"]<>"")
			$filtro .= "and bingo ='".$flt["fltbingo"]."'";
		
		
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
		p.municipioId = ".$_SESSION["municipiolog"]."
		and p. statusdelete ='no' ".$filtro."
		  ORDER BY  ".$order."  limit ".$offset.",".NUM_PAGINATION."";
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
			
		if(isset($flt["seccionId"]) and $flt["seccionId"]<>"")
			$filtro .= "and seccionId ='".$flt["seccionId"]."'";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
		
		if(isset($flt["tipo2"]) and $flt["tipo2"]<>"")
			$filtro .= "and tipo ='".$flt["tipo2"]."'";
		
		if(isset($flt["clave"]) and $flt["clave"]<>"")
			$filtro .= "and celector ='".$flt["clave"]."'";
		
		if(isset($flt["direccion"]) and $flt["direccion"]<>"")
			$filtro .= "and (direccion like '%".$flt["direccion"]."%' or barrio like '%".$flt["direccion"]."%')";
		
		if(isset($flt["fltbingo"]) and $flt["fltbingo"]<>"")
			$filtro .= "and bingo ='".$flt["fltbingo"]."'";
			
	  $sql ="
		select 
			COUNT(*)
		from 
		people as p
		where 
		p.municipioId = ".$_SESSION["municipiolog"]."
		and p. statusdelete ='no' ".$filtro." ";
	
		$l = mysql_query($sql);
		$last = mysql_result($l,0);
		

		
		return $last;
	}
	
	
	
	public function Delete($Id)
	{
	
		
		
	 $query = "UPDATE  people SET  `statusdelete` =  'si' WHERE  peopleId = ".$Id.";";
		
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
		$sql ="select * from people where peopleId = ".$Id."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
		return $data;
		
	}
	
	
	public function UpdateCabecera()
	{
		if(trim($_POST["SearchRepre"])=="")
			$_POST["representanteId"]=0;
		
		$cabecera = new cabecera;
		if(trim($_POST["representanteId"])=="")
		{
			$query = "
			 UPDATE  
			 people 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 bingo =  '".$_POST["bingo"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 seccionId =  '".$_POST["seccion"]."',
			 observacion =  '".$_POST["observacion"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared =  '".$_POST["nivel"]."',
			 facebook =  '".$_POST["face"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peopleId =".$_POST["peopleId"]."";
		}
		else
		{
			$L = $cabecera->GetNumNivel($_POST["representanteId"]);
			$Level=$L["cabezared"]+1;
		
			$query = "
			 UPDATE  
			 people 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 bingo =  '".$_POST["bingo"]."',
			 correo =  '".$_POST["mail"]."',
			 celector =  '".$_POST["celector"]."',
			 seccionId =  '".$_POST["seccion"]."',
			 observacion =  '".$_POST["observacion"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared =  '".$_POST["nivel"]."',
			 facebook =  '".$_POST["face"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peopleId =".$_POST["peopleId"]."";
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
			 people 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			  bingo =  '".$_POST["bingo"]."',
			 celector =  '".$_POST["celector"]."',
			 seccionId =  '".$_POST["seccion"]."',
			 observacion =  '".$_POST["observacion"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 img =  '".$image_name."',
			 cabezared =  '".$_POST["nivel"]."',
			 facebook =  '".$_POST["face"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peopleId =".$_POST["peopleId"]."";
		}
		else
		{
			$L = $cabecera->GetNumNivel($_POST["representanteId"]);
			$Level=$L["cabezared"]+1;
		
			$query = "
			 UPDATE  
			 people 
			 SET  
			 nombre =  '".$_POST["nombre"]."',
			 apellidos =  '".$_POST["apellidos"]."',
			 direccion =  '".$_POST["direccion"]."',
			 fnacimiento =  '".$_POST["fnacimiento"]."',
			 sexo =  '".$_POST["sexo"]."',
			 telefono =  '".$_POST["telefono"]."',
			 correo =  '".$_POST["mail"]."',
			  bingo =  '".$_POST["bingo"]."',
			 celector =  '".$_POST["celector"]."',
			 img =  '".$image_name."',
			 seccionId =  '".$_POST["seccion"]."',
			 observacion =  '".$_POST["observacion"]."',
			 representanteId =  '".$_POST["representanteId"]."',
			 cabezared =  '".$_POST["nivel"]."',
			 facebook =  '".$_POST["face"]."',
			 twitter =  '".$_POST["twitter"]."'
			 WHERE 
			 peopleId =".$_POST["peopleId"]."";
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
	
		$sql ="select cabezared from people where peopleId = ".$Id."";
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
		
		// echo $countH["total"]; 
		// exit;
		
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
				p2.statusdelete='no' and p2.municipioId = '".$_SESSION["municipiolog"]."' and p2.seccionId = p1.seccionId) as Total,
			(select meta from seccion as s where s.seccionId = p1.seccionId) as Meta
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
			$meta[] = $aux["Meta"];
		}
		
		
		$img = $cabecera->GraficarVectores($totales,$secciones,$meta);

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
	
	public function GraficarVectores($y,$x,$meta)
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
	$p3->SetLegend("Personas por Seccion");
	
	$p4 = new LinePlot($meta);
	$graph->Add($p4);
	$p4->SetColor("green");
	$p4->SetLegend("Meta de la seccion");

	$graph->legend->SetFrameWeight(500);

	@unlink("../graficas/img_.png");
	// Output graph
	$graph->Stroke("../graficas/img_.png");
	$img = "<center><img src='".WEB_ROOT."/graficas/img_.png?".rand()."' width=70% height=70%/></center>";
	
	return $img;
	}
	
	public function Votar($Id)
	{
	
		
		
	 $query = "UPDATE  people SET  `voto` =  'si' WHERE  peopleId = ".$Id.";";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
	
	}
	
	public function allPartidos()
	{
	
				
	$sql ="
		select 
			*
		from 
		partido 
			where 
		municipioId =".$_SESSION["municipiolog"]." ORDER BY  totalvotos DESC ";
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
	
	
	public function Depurar()
	{
	
		
		
	 $query = "UPDATE  people SET  `statusdelete` =  'si' WHERE  representanteId = ".$_POST["representanteId"]." and celector = '".$_POST["celetor"]."';";
		
		if (mysql_query($query)) 
		{
		return true;
		}
		else
		{
		return false;
		}
		
	
	}
	
		public function BuscaRepetidos()
	{
		$sql ="select count(*) as Total from people where celector = '".$_POST["celector"]."' and statusdelete='no'";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);

		// echo $data["Total"];
		return $data;
	}
	
	public function BuscaConQuien()
	{
		
			$sql1 ="
			select 
			*
			from 
			people 
				where
			celector = '".$_POST["celector"]."' and statusdelete='no'";
			$sqlcita1 = mysql_query($sql1);
			
			$retArray = array();
			while($rs=mysql_fetch_assoc($sqlcita1))
			{
			$retArray[] = $rs;
			}
			foreach($retArray as $key=>$aux){
			echo "<br><center><b>Con: 
			<font color='red'>".$aux["nombre"]." ".$aux["apellidos"]."<font color='black'> seccion:</font> ".$aux["seccionId"]." ".$aux["direccion"]."
			</font></b><center><br>";
			}
			exit;
		
	}
	
	public function Direccion()
	{
		
			$sql1 ="
			select 
				direccion
			from 
				people 
				where
			seccionId = 322  group by direccion";
			$sqlcita1 = mysql_query($sql1);
			
			$retArray = array();
			while($rs=mysql_fetch_assoc($sqlcita1))
			{
			$retArray[] = $rs;
			}
			
			// return $retArray;
			
			echo "<pre>"; print_R($retArray);
		exit;
	}
	
	
	public function BuscaRepetidosBingo()
	{
		$sql ="select * from people where bingo = '".$_POST["bingo"]."' and peopleId <> ".$_POST["peopleId"]."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);

		// echo $data["Total"];
		return $data;
	}
	
	
	
	public function reporte1($flt)
	{
	
		$offset = ($this->pag - 1) * NUM_PAGINATION;
	
		$filtro ="";
			
		
		
		
	 $sql ="
		select 
			*,
			(select count(*) from people as p where p.seccionId  = s.seccionId and sexo = 'Femenino') as totalMujeres,
			(select count(*) from people as p where p.seccionId  = s.seccionId and sexo = 'Masculino') as totalHombres,
			(select count(*) from people as p where p.seccionId  = s.seccionId ) as total
		from 
			seccion as s
		where
		1  ";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	
		
		foreach($retArray as $key=>$aux){
			
		}

		
		return $retArray;
	}
	
	
	public function reporte2($flt)
	{
	
		$offset = ($this->pag - 1) * NUM_PAGINATION;
	
		$filtro ="";
			
		
		
		
	 $sql ="
		select 
			*,
			(select count(*) from people as p where p.seccionId  = s.seccionId and voto = 'si') as totalMujeres,
			(select count(*) from people as p where p.seccionId  = s.seccionId and voto = 'no') as totalHombres,
			(select count(*) from people as p where p.seccionId  = s.seccionId ) as total
		from 
			seccion as s
		where
		1  ";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	
		
		foreach($retArray as $key=>$aux){
			
		}

		
		return $retArray;
	}
	
	
	public function reporte3($flt)
	{
	
		$offset = ($this->pag - 1) * NUM_PAGINATION;
	
		$filtro ="";
			
		
		
		
	 $sql ="
		select 
			*,
			(select count(*) from people as p where p.seccionId  = s.seccionId and fnacimiento = '0000-00-00') as fuera,
			(select count(*) from people as p where p.seccionId  = s.seccionId and fnacimiento <= '1999-01-01' and fnacimiento >= '1993-01-01') as rango1,
			(select count(*) from people as p where p.seccionId  = s.seccionId and fnacimiento <= '1992-01-01' and fnacimiento >= '1958-01-01') as rango2,
			(select count(*) from people as p where p.seccionId  = s.seccionId and fnacimiento <= '1957-01-01' and fnacimiento <> '0000-00-00') as rango3,
			(select count(*) from people as p where p.seccionId  = s.seccionId ) as total
		from 
			seccion as s
		where
		1  ";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	
		
		foreach($retArray as $key=>$aux){
			
		}

		
		return $retArray;
	}
}

?>