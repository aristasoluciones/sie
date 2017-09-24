<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>SIE</title>
<!--Lib. js defaul-->

<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
<!--Lib. js nuevas-->
<script type="text/javascript" src="js/login.js"></script>
<link type="text/css" href="css/redmond/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<!--Css nuevos-->
<link rel="stylesheet" href="css/miestilo.css" type="text/css" media="all" />
<style type="text/css">
			/*demo page css*/
			body{ font: 85.5% "Trebuchet MS", sans-serif}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
</style>
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body bgcolor="white" style="background: url(fontMedic.jpg) no-repeat; background-position:center 60px !important ";>
	


	<div id="top">	
		
		
		<!--<div id="navigation">
		
		</div>-->
	</div>

	<div id="body" align="center">
		<!--<div class="login" style="top:180px; position:absolute; left:550px; ">-->
		<div class="login" style="top:80px; position:absolute; left:190px; ">
		<br>
		<br>
		<br>
				<!--<img src="./images/logo.png" width="50%" >--><br>
				<!--<font face="verdana" size="2" color="#e94835">Expedientes Clinicios Electronicos
			</font>-->
		<br>
		<br>
		<table align="center" border=0 >
		<tr>
		<td></td>
		<td><div><input class="inputlogin" style="font-size:12px; color:#427FED; " type="text" name="user" id="user" placeholder="Usuario"></div></td>
		</tr>
		<tr>
		<td></td>
		<td><input class="inputlogin" style="font-size:12px; color:#427FED" type="password" name="pass" id="pass" placeholder="Password"></td>
		</tr>
		<tr>
		<td colspan="2" align="center">
		<div id="msjloading"></div>
		<br>
			
			<input class="btnlogin" type="submit" name="Login" id="Login" onClick="Login()" value="Iniciar">

		</td>
		</tr>
		</table>
		<img id="loader_gif" src="img/r5.gif" style=" display:none;" width=20%/>
		</div>
	</div>
	<br>
	<!--
	<div class="pielogin">
	
<br>
<b><font face="verdana" color="#1E82CC">Soporte:</font></b>
<br>
<br>
<font face="verdana" color="#1E82CC" size="2">	
<table>
	<tr>
		<td>Celular:</td>
		<td>968-100-86-46</td>
	</tr>
	<tr>
		<td>Web:</td>
		<td>www.medic-als.com.mx</td>
	</tr>
	<tr>
		<td>Email:</td>
		<td>soporte@medic-als.com.mx</td>
	</tr>
</table>
</font>
	</div>-->



</body>
</html>


