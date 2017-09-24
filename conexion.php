<?php
date_default_timezone_set('America/Mexico_City');
define('WEB_ROOT','http://'.$_SERVER["HTTP_HOST"].'/sie');
define('NUM_PAGINATION',100);
$conexion=mysql_connect("localhost","root","");
mysql_select_db("dbsie",$conexion);
?> 