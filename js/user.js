function SaveUser(){

	var nombre = $("#nombre").val(); 
	var apellidos = $("#apellidos").val(); 
	var direccion = $("#direccion").val(); 
	var mail = $("#mail").val(); 
	var tipo = $("#tipo").val(); 
	var user = $("#user").val(); 
	var pass = $("#pass").val(); 

	if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	else if(apellidos == false)
	{
	alert("Se necesita el campo apellidos");
	}
	else if(mail == false)
	{
	alert("Se necesita el campo mail");
	}
	else if(user == false)
	{
	alert("Se necesita el usuario");
	}
	else if(pass == false)
	{
	alert("Se necesita el password");
	}
	else if(tipo == false)
	{
	alert("Se necesita el campo tipo");
	}
	else{
		$.ajax({
			type :"POST",
			url : "ajax/user.php",
			data : $("#formadduser").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			console.log(response)
			var splitResp = response.split("[#]");
			$("#loader_gif").hide();
			if($.trim(splitResp[0]) == 'ok'){	
			$(".txtpaciente").val("");
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			}
			else if($.trim(splitResp[0]) == "fail"){
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			}
			},
		});
	}	
}


function DeleteUser(id){

var resp = confirm("Seguro de eliminar al usuario?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/user.php",
			data: {"type":"DeleteUser",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			var splitResp = response.split("[#]");
			if($.trim(splitResp[0]) == 'ok'){	
			$("#Respuestaajax").show();
			$("#contenido").html(splitResp[1]);
			$("#Respuestaajax").html(splitResp[2]);
			}
			else if ($.trim(splitResp[0]) == 'fail')
			{
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[2]);
			}
			},
		});
		
}


// function EditUser(id){

		// $.ajax({
			// type :"POST",
			// url : "ajax/user.php",
			// data: {"type":"EditUser",
			// id:id},
			// beforeSend: function(){
				// $("#loader_gif").show();
			// },
			// success: function (response){
			// $("#wideditmedico").show();
			// $("#wideditmedico").html(response);
			
			// },
		// });
		
// }

 function EditUser(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/user.php",
			data: {"type":"EditUser",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Editar usuario");	
				$('#windowedit').dialog('open');
				$('#windowedit').dialog({
				autoOpen: false,
				width: 600,
				height: 700,
				buttons: {
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
				});
			},
		});
 
}



function EditUsersql(id){
	var nombre = $("#nombreeditp").val(); 
	var apellidos = $("#apeeditp").val(); 
	// var fnacimiento = $("#fnacip").val(); 
	var telefono = $("#telp").val(); 
	// var direccion = $("#diredip").val(); 
	var mail = $("#mailp").val(); 
	var user = $("#user").val(); 
	var pass = $("#pass").val(); 
	var tipouser = $("#tipouser").val(); 

	if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	else if(apellidos == false)
	{
	alert("Se necesita el campo apellidos");
	}
	else if(telefono == false)
	{
	alert("Se necesita el campo telefono");
	}
	else if(mail == false)
	{
	alert("Se necesita el campo mail");
	}
	else if(user == false)
	{
	alert("Se necesita el campo usuario");
	}
	else if(pass == false)
	{
	alert("Se necesita el campo Password");
	}
	else if(pass == false)
	{
	alert("Se necesita el campo Tipo");
	}
	else{		
		$.ajax({
			type :"POST",
			url : "ajax/user.php",
			data : $("#formedituser").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			
			// $("#contenido").html(response);
			var splitResp = response.split("[#]");
			$("#loader_gif").hide();
			if($.trim(splitResp[0]) == 'ok'){	
			$("#windowedit").dialog("close");
			$(".txtpaciente").val("");
			$("#Respuestaajax").show();
			$("#contenido").html(splitResp[1]);
			$("#Respuestaajax").html(splitResp[2]);
			}
			else if($.trim(splitResp[0]) == "fail"){
			$("#Respuestaajax").show();
			$("#contenido").html(splitResp[1]);
			$("#Respuestaajax").html(splitResp[2]);
			}
			
			
			
			
			},
		});
	}
}