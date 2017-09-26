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
<!--<link rel="stylesheet" href="css/miestilo.css" type="text/css" media="all" />-->
<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
<!--<style type="text/css">
			/*demo page css*/
            body{background:url("../images/background-login.jpg")#FF9000}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
</style>-->
<link href="../favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
    <div class="login-form">
        <h1>SIE</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Usuario " id="user" name="user">
            <i class="fa fa-user"></i>
        <div class="form-group log-status">
            <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass">
            <i class="fa fa-lock"></i>
        </div>

        <center>
            <span class="alert" id="errorMsg"></span>
            <img id="loader_gif" src="img/r5.gif" style=" display:none;" width=20%/>
        </center>
        <button type="button" class="log-btn" onclick="Login()" >Enviar</button>
    </div>

</body>
</html>
