$('#fnacimiento').live('click', function() {
$("#fnacimiento").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy'
    }).focus();
});


$('#fnacip').live('click', function() {
$("#fnacip").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy'
    }).focus();
});

//comienzan fltros

function fltnombre(){
$("#txtfltel").hide();
$("#txtflmail").hide();
$("#txtfltnombre").show();

}

function flttel(){
$("#txtflmail").hide();
$("#txtfltnombre").hide();
$("#txtfltel").show();
}

function fltmail(){
$("#txtfltnombre").hide();
$("#txtfltel").hide();
$("#txtflmail").show();
}
//terminan filtros
//comienza la busqueda de los filtros
function Searchmedico(){
var txtflmail = $("#txtflmail").val();
var txtfltel = $("#txtfltel").val();
var txtfltnombre = $("#txtfltnombre").val();

	$.ajax({
		type :"POST",
		url : "ajax/medico.php",
		data: {"type":"Searchmedico",
		txtflmail:txtflmail,
		txtfltel:txtfltel,
		txtfltnombre:txtfltnombre
		},
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){
		// alert(response)
		$("#tblmedico").html(response);
		},
	});

}

//termina la busqueda de los filtros
function SaveMedico(){

	var prefijo = $("#prefijo").val(); 
	var nombre = $("#nombre").val(); 
	var apellidos = $("#apellidos").val(); 
	var telefono = $("#telefono").val(); 
	var especialidad = $("#especialidad").val(); 
	var cedprofesional = $("#cedprofesional").val(); 
	var usermedico = $("#usermedico").val(); 
	var pass = $("#pass").val(); 

	if(prefijo == false)
	{
	alert("Se necesita el campo");
	}
	
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
	else if(especialidad == false)
	{
	alert("Se necesita el campo especialidad");
	}
	else if(cedprofesional == false)
	{
	alert("Se necesita el campo cedula profesional");
	}
	else if(usermedico == false)
	{
	alert("Se necesita el campo usuario");
	}
	else if(pass == false)
	{
	alert("Se necesita el campo password");
	}
	else{
		$.ajax({
			type :"POST",
			url : "ajax/medico.php",
			data : $("#formmedico").serialize(true),
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


function DeleteMedico(id){

var resp = confirm("Esta seguro de eliminar al medico?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/medico.php",
			data: {"type":"DeleteMedico",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
	
			// alert(response)
			var splitResp = response.split("[#]");
			// alert(splitResp[2]);
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






 function EditMedico(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/medico.php",
			data: {"type":"EditMedico",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Editar medico");	
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


function EditMedicosql(id){
	var nombre = $("#nombreeditp").val(); 
	var apellidos = $("#apeeditp").val(); 
	var telefono = $("#telp").val(); 
	var especialidad = $("#especialidad").val(); 
	var cedprofesional = $("#cedprofesional").val(); 
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
	else if(telefono == false)
	{
	alert("Se necesita el campo telefono");
	}
	else if(especialidad == false)
	{
	alert("Se necesita el campo especialidad");
	}
	else if(cedprofesional == false)
	{
	alert("Se necesita el campo cedula profesional");
	}
	else if(user == false)
	{
	alert("Se necesita el campo usuario");
	}
	else if(pass == false)
	{
	alert("Se necesita el campo password");
	}
	else{		
		$.ajax({
			type :"POST",
			url : "ajax/medico.php",
			data : $("#formeditmedico").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			// console.log(response)
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


