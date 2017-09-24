<?php
	include_once('conexion.php');
	
	if(trim($_POST["tipo"])=="")
	{
	echo "Se necesita el tipo";
	exit;
	}
	
	if(trim($_POST["nombreexcel"])==""){
	echo "Se necesita el archivo";
	exit;
	}
	

	
	$lineSeparator = "\n";
	$fieldSeparator = ",";
	$csvFile = $_POST["nombreexcel"];

	if(!file_exists($csvFile)){
		echo 'No se encuentra el archivo '.$csvFile;
		exit;	
	}//if
	
	$file = fopen($csvFile, 'r');
	
	if(!$file){
		echo 'Error al abrir el archivo';
		exit;	
	}//if
	
	$size = filesize($csvFile);
	
	if(!$size){
		echo 'El archivo esta vacio, verifique';
		exit;
	}//if
	
	$lines = 0;
	$regs = 0;
	$promotores = array();
	$empresaId = 15;
	echo "<pre>";
	
	$row = 0;
	$cards = array();
	while (( $field = fgetcsv($file,19192,",")) !== false ) 
	{

	//primero buscamos si  no existen la clave de elector si existen
	// ya no se agregan
// echo	$nombre = $field[3]." ".$field[4]." ".$field[5]."<br>";
	if(trim($field[2])==""){
		
		$nombre = $field[3]." ".$field[4]." ".$field[5];
		 $sql ="
				select 
					count(*) as count
				from 
					people
				where 
					nombre = '".$nombre."'";
				$sqlcita = mysql_query($sql);
				$Tpl=mysql_fetch_assoc($sqlcita);
				if($Tpl["count"]==0){

					echo " guardar<br>";
					echo $sqlsa="	INSERT INTO people (
						`representanteId`,
						`seccionId` ,
						`celector` ,
						`nombre`,
						`direccion`,
						`barrio`,
						`cabezared`,
						`municipioId`,
						`tipo`
						)
						VALUES (
						'".$field[0]."',  
						'".$field[1]."',       
						'".$field[2]."',       
						'".$field[3]." ".$field[4]." ".$field[5]."',         
						'".$field[6]." ".$field[7]." ".$field[8]." ".$field[9]."',         
						'".$field[9]."',         
						'3',
						'21',
						'".$_POST["tipo"]."');";
						echo "<br>";
						if(mysql_query($sqlsa)){
							echo "ok";
						}else{
							echo "fail";
						}
				}
		
	}else{
					
				$sql ="
				select 
					count(*) as count
				from 
					people
				where 
					celector = '".$field[2]."'";
				$sqlcita = mysql_query($sql);
				$Tpl=mysql_fetch_assoc($sqlcita);

				if($Tpl["count"]==0){

					echo " guardar<br>";
					echo $sqlsa="	INSERT INTO people (
						`representanteId`,
						`seccionId` ,
						`celector` ,
						`nombre`,
						`direccion`,
						`barrio`,
						`cabezared`,
						`municipioId`,
						`tipo`
						)
						VALUES (
						'".$field[0]."',  
						'".$field[1]."',       
						'".$field[2]."',       
						'".$field[3]." ".$field[4]." ".$field[5]."',         
						'".$field[6]." ".$field[7]." ".$field[8]."',         
						'".$field[9]."',          
						'3',
						'21',
						'".$_POST["tipo"]."');";
						echo "<br>";
						if(mysql_query($sqlsa)){
							echo "ok";
						}else{
							echo "fail";
						}
				}

		
	}
	
	
	

	}

	fclose($file);	
	exit;

?>