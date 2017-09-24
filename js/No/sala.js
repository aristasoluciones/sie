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
function SearchSala(){
// var txtflmail = $("#txtflmail").val();
// var txtfltel = $("#txtfltel").val();
// alert("hola")
var txtfltnombre = $("#txtfltnombre").val();

	$.ajax({
		type :"POST",
		url : "ajax/sala.php",
		data: {"type":"SearchSala",
		txtfltnombre:txtfltnombre
		},
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){

		$("#tblsala").html(response);
		},
	});

}

//termina la busqueda de los filtros
function SaveSala(){

	var nombre = $("#nombre").val(); 
	// var apellidos = $("#apellidos").val(); 
	// var fnacimiento = $("#fnacimiento").val(); 
	// var telefono = $("#telefono").val(); 
	// var direccion = $("#direccion").val(); 
	// var mail = $("#mail").val(); 

	if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	// else if(apellidos == false)
	// {
	// alert("Se necesita el campo apellidos");
	// }
	// else if(fnacimiento == false)
	// {
	// alert("Se necesita el campo fecha de nacimiento");
	// }
	// else if(telefono == false)
	// {
	// alert("Se necesita el campo fecha de telefono");
	// }
	// else if(direccion == false)
	// {
	// alert("Se necesita el campo fecha de direccion");
	// }
	// else if(mail == false)
	// {
	// alert("Se necesita el campo fecha de mail");
	// }
	else{
		$.ajax({
			type :"POST",
			url : "ajax/sala.php",
			data : $("#formsala").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
// alert(response)
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


function DeleteSala(id){

var resp = confirm("Esta seguro de eliminar la sala?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/sala.php",
			data: {"type":"DeleteSala",
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




function EditSala(id){

		$.ajax({
			type :"POST",
			url : "ajax/sala.php",
			data: {"type":"EditSala",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#wideditsala").show();
			$("#wideditsala").html(response);
			
			},
		});
		
}


function EditSalasql(id){
	var nombre = $("#nombreeditp").val(); 
	// var apellidos = $("#apeeditp").val(); 
	// var fnacimiento = $("#fnacip").val(); 
	// var telefono = $("#telp").val(); 
	// var direccion = $("#diredip").val(); 
	// var mail = $("#mailp").val(); 

	if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	// else if(apellidos == false)
	// {
	// alert("Se necesita el campo apellidos");
	// }
	// else if(fnacimiento == false)
	// {
	// alert("Se necesita el campo fecha de nacimiento");
	// }
	// else if(telefono == false)
	// {
	// alert("Se necesita el campo fecha de telefono");
	// }
	// else if(direccion == false)
	// {
	// alert("Se necesita el campo fecha de direccion");
	// }
	// else if(mail == false)
	// {
	// alert("Se necesita el campo fecha de mail");
	// }
	else{		
		$.ajax({
			type :"POST",
			url : "ajax/sala.php",
			data : $("#formeditsala").serialize(true),
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
}

