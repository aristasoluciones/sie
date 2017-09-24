<?php 
include_once('../conexion.php');
class Master 
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
	
	
	public function  allMunicipio(){
	
		$sql ="
		select 
		*
		from 
		municipio 
		 order by nombre ASC";
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
			
		if(isset($flt["seccionId"]) and $flt["seccionId"]<>"")
			$filtro .= "and seccionId ='".$flt["seccionId"]."'";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
			
		if(isset($flt["municipioId"]) and $flt["municipioId"]<>"")
			$filtro .= "and municipioId ='".$flt["municipioId"]."'";
			
			
			
			
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
		 p. statusdelete ='no' ".$filtro."
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
			
		if(isset($flt["seccionId"]) and $flt["seccionId"]<>"")
			$filtro .= "and seccionId ='".$flt["seccionId"]."'";
			
		if(isset($flt["cabezaId"]) and $flt["cabezaId"]<>"")
			$filtro .= "and cabezared ='".$flt["cabezaId"]."'";
			
		if(isset($flt["voto"]) and $flt["voto"]<>"")
			$filtro .= "and voto ='".$flt["voto"]."'";
			
		if(isset($flt["municipioId"]) and $flt["municipioId"]<>"")
			$filtro .= "and municipioId ='".$flt["municipioId"]."'";
			
	  $sql ="
		select 
			COUNT(*)
		from 
		people as p
		where 
		 p. statusdelete ='no' ".$filtro." limit 0,200";
	
		$l = mysql_query($sql);
		$last = mysql_result($l,0);
		

		
		return $last;
	}
	
	
	public function lstTotalesMuni()
	{
	
	 $sql ="
		select 
			m.nombre,
			(select COUNT(peopleId) from people as p where statusdelete='no' and p.municipioId = m.municipioId) as Total
		from 
		municipio as m
		 ORDER BY  m.nombre ASC";
		$sqlcita = mysql_query($sql);
		
		$retArray = array();
		while($rs=mysql_fetch_assoc($sqlcita))
		{
		$retArray[] = $rs;
		}	

		return $retArray;
	}
	
	
	
	
	
	public function Info($Id)
	{
		$sql ="select * from people where peopleId = ".$Id."";
		$row=mysql_query($sql);
		$data=mysql_fetch_assoc($row);
		return $data;
		
	}
	
	public function GraphSexMast($municipioId)
	{
	
		$master = new Master;
		 $sqlH ="
				select 
					count(sexo) as total
				from
					people
				where 
					sexo = 'Masculino'
					and statusdelete='no' 
					and municipioId = '".$municipioId."'";
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
					and municipioId = '".$municipioId."'";
			$rowM=mysql_query($sqlM);
			$countM = mysql_fetch_assoc($rowM);
		
			echo "Total Hombres: ".$countH["total"]."<br>"; 
			echo "Total Mujeres: ".$countM["total"]; 
			$img = $master->GraficaPastel($countM["total"],$countH["total"],"sexo");
			
			return $img;
	}
	
	
	public function GraphSeccionMast($municipioId)
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
				p2.statusdelete='no' and p2.municipioId = '".$municipioId."' and p2.seccionId = p1.seccionId) as Total
		from
		people as p1
		where 
			p1.statusdelete='no' and p1.municipioId = '".$municipioId."' group by p1.seccionId";

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
	
	
	public function GraphVotosMast($municipioId)
	{
	
	$master = new Master;
	 $sqlH ="
			select 
				count(peopleId) as total
			from
				people
			where 
				 statusdelete='no' 
				and municipioId = '".$municipioId."'
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
				and municipioId = '".$municipioId."'
				and voto = 'no'";
		$rowM=mysql_query($sqlM);
		$countNo = mysql_fetch_assoc($rowM);
	
		echo "Total Si: ".$countSi["total"]."<br>"; 
		echo "Total No: ".$countNo["total"]; 
		$img = $master->GraficaPastel($countSi["total"],$countNo["total"],"votos");
		
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
			@unlink("../graficas/imgMas_.png");
			// Output graph
			$graph->Stroke("../graficas/imgMas_.png");
			$img = "<center><img src='".WEB_ROOT."/graficas/imgMas_.png?".rand()."' width=70% height=70%/></center>";
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

	@unlink("../graficas/imgSem_.png");
	// Output graph
	$graph->Stroke("../graficas/imgSem_.png");
	$img = "<center><img src='".WEB_ROOT."/graficas/imgSem_.png?".rand()."' width=70% height=70%/></center>";
	
	return $img;
	}
	
	
}

?>