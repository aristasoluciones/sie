function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789";
       especiales = [47,37,39,46];

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }



$('#txtfltpaciente').live('click', function() {
$("#datapaciente").hide();
});

$('#fechacita').live('click', function() {
$("#fechacita").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	 changeMonth: true,
	 changeYear: true
    }).focus();

});

$('#fecharegistroan').live('click', function() {
$("#fecharegistroan").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy'
    }).focus();

});

$('#fechadigital').live('click', function() {
$("#fechadigital").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy'
    }).focus();

});

$('#fechareg').live('click', function() {
$("#fechareg").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy'
    }).focus();

});



$('#fechacitasearch').live('click', function() {
$("#fechacitasearch").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	 changeMonth: true,
	 changeYear: true
    }).focus();

});
// Tabs

$('#fechadesdee').live('click', function() {
$("#fechadesdee").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	 changeMonth: true,
	 changeYear: true
    }).focus();

});

$('#fechahastae').live('click', function() {
$("#fechahastae").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	 changeMonth: true,
	 changeYear: true
    }).focus();

});



$('#fechacita').live('change', function() {

var selecMedicita = $("#selecMedicita").val(); 
var sala = $("#sala").val(); 
var fechacita = $("#fechacita").val(); 
$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"SearchDisponible",
			selecMedicita:selecMedicita,
			sala:sala,
			fechacita:fechacita},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#loader_gif").hide();
			$("#agenda").html(response);
			},
		});
});

$('#selecMedicita').live('change', function() {

var selecMedicita = $("#selecMedicita").val(); 
var sala = $("#sala").val(); 
var fechacita = $("#fechacita").val(); 
$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"SearchDisponible",
			selecMedicita:selecMedicita,
			sala:sala,
			fechacita:fechacita},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#loader_gif").hide();
			$("#agenda").html(response);
			},
		});



});



// function (id){

// $("#DivAddAgenda").show();
		// $.ajax({
			// type :"POST",
			// url : "ajax/cita.php",
			// data: {"type":"AddAgenda",
			// id:id},
			// beforeSend: function(){
				// $("#loader_gif").show();
			// },
			// success: function (response){
			// $("#DivAddAgenda").html(response);
			// },
		// });
		
// }

 function AddAgenda(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"AddAgenda",
			id:id},
			beforeSend: function(){
				$("#loader_"+id).show();
			},
			success: function (response){
			$("#loader_"+id).hide();
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Agregar cita");	
				$('#windowedit').dialog('open');
				$('#windowedit').dialog({
				autoOpen: false,
				width: 600,
				height: 400,
				buttons: {
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
				});
			},
		});
 
}

function Searchpacita(){
$("#resdiv").show();
var txtfltpaciente = $("#txtfltpaciente").val();
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"Searchpaciente",
		txtfltpaciente:txtfltpaciente
		},
		beforeSend: function(){
			$("#load_sp").show();
		},
		success: function (response){
		$("#load_sp").hide();
		$("#respaciente").show();
		$("#respaciente").html(response);
		},
	});

}


function ClickPac(id,nombre,ape){
var namecom = nombre+" "+ape;
$("#txtfltpaciente").val(namecom);
$("#pacienteIdsql").val(id);
$("#respaciente").hide();

}


function SaveCita(){

$("#btnsave").attr("disabled",false);
var pacienteIdsql = $("#pacienteIdsql").val();
var selecMedicita = $("#selecMedicita").val();
var fechacita = $("#fechacita").val();
var horariocita = $("#horariocita").val();
var horarioId = $("#horarioId").val();
if(pacienteIdsql == false)
{
alert("Campo requerido: Paciente");
}
else
{

	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"SaveCita",
		pacienteIdsql:pacienteIdsql,
		selecMedicita:selecMedicita,
		fechacita:fechacita,
		horariocita:horariocita,
		horarioId:horarioId
		},
		beforeSend: function(){
			$("#load_sp").show();
		},
		success: function (response){
		$("#btnsave").attr("disabled",true);
		console.log(response)
		$("#load_sp").hide();
		var splitResp = response.split("[#]");
		if($.trim(splitResp[0]) == 'ok'){
		$("#windowedit").dialog("close");		
		$("#Respuestaajax").show();
		$("#Respuestaajax").html(splitResp[1]);
		$("#agenda").html(splitResp[2]);
		$("#DivAddAgenda").hide();
		}
		else if ($.trim(splitResp[0]) == 'fail')
		{
		$("#Respuestaajax").show();
		$("#Respuestaajax").html(splitResp[1]);
		}		
		},
	});
}
}

function CloseCita()
{
$("#DivAddAgenda").hide();
}


// function ShowCita(id){
	// $.ajax({
		// type :"POST",
		// url : "ajax/cita.php",
		// data: {"type":"ShowCita",
		// citaId:id
		// },
		// beforeSend: function(){
			// $("#loader_gif").show();
		// },
		// success: function (response){
		// $("#ShowCita").show();
		// $("#ShowCita").html(response);
		// },
	// });
// }

 function ShowCita(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"ShowCita",
			citaId:id},
			beforeSend: function(){
				$("#loaderh_"+id).show();
			},
			success: function (response){
				$("#loaderh_"+id).hide();
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Ver cita");	
				$('#windowedit').dialog('open');
				$('#windowedit').dialog({
				autoOpen: false,
				width: 600,
				height: 400,
				buttons: {
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
				});
			},
		});
 
}


function CancelCita(id){

var resp = confirm("Seguro de eliminar la cita?");
	
	if(!resp)
		return;


var fechacita = $("#fechacita").val();
var selecMedicita = $("#selecMedicita").val();

	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"CancelCita",
		citaId:id,
		fechacita:fechacita,
		selecMedicita:selecMedicita},
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){
		$("#loader_gif").hide();
		var splitResp = response.split("[#]");
		if($.trim(splitResp[0]) == 'ok'){
		$("#windowedit").dialog("close");
			$("#ShowCita").hide();
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			$("#agenda").html(splitResp[2]);
		}
		else if ($.trim(splitResp[0]) == 'fail')
		{
		
		$("#Respuestaajax").show();
		$("#Respuestaajax").html(splitResp[1]);
		}
		},
	});
}




function OpenExpedient(id){
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"OpenExpedient",
		citaId:id
		},
		beforeSend: function(){
			$("#loaderh_"+id).show();
		},
		success: function (response){
		$("#loaderh_"+id).hide();
		$("#contenido").html(response);
		$('#tabs').tabs();
		},
	});
}



function AddConsulta(id,id2){
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"AddConsulta",
		citaId:id,
		pacienteId:id2,
		},
		beforeSend: function(){
			$("#loadex_").show();
		},
		success: function (response){
		$("#loadex_").hide();
		$("#cotenidoexpediente").html(response);
		// $('#tabs').tabs();
		},
	});
}


function BackHistory(id){
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"BackHistory",
		pacienteId:id,
		},
		beforeSend: function(){
			$("#loadex_1").show();
		},
		success: function (response){
			$("#loadex_1").hide();
		$("#cotenidoexpediente").html(response);
		// $('#tabs').tabs();
		},
	});
}


function SaveFicha(){

	var nombre = $("#nombre").val(); 
	var apepaterno = $("#apepaterno").val(); 
	var apematerno = $("#apematerno").val(); 
	var fnacimiento = $("#fnacimiento").val(); 
	var sexo = $("#sexo").val(); 
	var telefono = $("#telefono").val(); 
 

	if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	else if(apepaterno == false)
	{
	alert("Se necesita el campo apellido paterno");
	}
	else if(apematerno == false)
	{
	alert("Se necesita el campo apellido materno");
	}
	else if(fnacimiento == false)
	{
	alert("Se necesita el campo fecha de nacimiento");
	}
	else if(telefono == false)
	{
	alert("Se necesita el campo fecha de telefono");
	}
	else if(sexo == false)
	{
	alert("Se necesita el campo sexo");
	}
	else{
		$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data : $("#formaddficha").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
console.log(response)
			var splitResp = response.split("[#]");

			$("#loader_gif").hide();
			if($.trim(splitResp[0]) == 'ok'){	
			$(".txtpaciente").val("");
			$("#Rsptaajaxc").show();
			$("#Rsptaajaxc").html(splitResp[1]);
			}
			else if($.trim(splitResp[0]) == "fail"){
			$("#Rsptaajaxc").show();
			$("#Rsptaajaxc").html(splitResp[1]);
			}
			},
		});
	}	
}



function SaveConsulta(){

	var sintoma = $("#sintoma").val(); 
	var costo = $("#costo").val(); 

	if(sintoma == false)
	{
	alert("Se necesita el campo sintoma");
	}
	else if(costo == false)
	{
	alert("Se necesita el campo costo");
	}

	else{
		$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data : $("#formaddconsulta").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
console.log(response)
			var splitResp = response.split("[#]");

			$("#loader_gif").hide();
			if($.trim(splitResp[0]) == 'ok'){	
			$(".txtpaciente").val("");
			$("#Rsptaajaxc").show();
			$("#Rsptaajaxc").html(splitResp[1]);
			}
			else if($.trim(splitResp[0]) == "fail"){
			$("#Rsptaajaxc").show();
			$("#Rsptaajaxc").html(splitResp[1]);
			}
			},
		});
	}	
}


function SeeFormAntecedente(){
	$("#divFormAnte").show();
}

function SeeFormDigital(){
	$("#divFormdigi").show();
}


function SaveAntecedente(){

var tipoantece = $("#tipoantece").val();
var nombreantece = $("#nombreantece").val();
var fecharegistroan = $("#fecharegistroan").val();

if(tipoantece == false)
{
alert("se necesita campo tipo")
}
else if(nombreantece == false)
{
alert("se necesita campo antecedente")
}
else if(fecharegistroan == false)
{
alert("se necesita campo fecha de registro")
}
else
{
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data : $("#formaddantecedente").serialize(true),
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){
console.log(response)
		var splitResp = response.split("[#]");

			$("#loader_gif").hide();
			if($.trim(splitResp[0]) == 'ok'){	
			// $(".txtpaciente").val("");
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			$("#divlistantecedente").html(splitResp[2]);
			$(".txtantece").val("");
			}
			else if($.trim(splitResp[0]) == "fail"){
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			}
		},
	});
}
}





function DeleteAntecedente(id,pacienteid){

var resp = confirm("Esta seguro de eliminar el antecedente?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"DeleteAntecedente",
			id:id,pacienteid:pacienteid},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
$("#loader_gif").hide();
			console.log(response)
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0]) == 'ok'){	
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			$("#divlistantecedente").html(splitResp[2]);
			}
			else if ($.trim(splitResp[0]) == 'fail')
			{
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[2]);
			}
			

			},
		});
		
}



 function EditAntecedente(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"EditAntecedente",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Editar antecendete");	
				$('#windowedit').dialog('open');
				$('#windowedit').dialog({
				autoOpen: false,
				width: 600,
				height: 400,
				buttons: {
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
				});
			},
		});
 
}


function Editantecedente(id){
	var tipoedit = $("#tipoedit").val(); 
	var anteedit = $("#anteedit").val(); 
	var fechareg = $("#fechareg").val(); 


	if(tipoedit == false)
	{
	alert("Se necesita el campo tipo");
	}
	else if(anteedit == false)
	{
	alert("Se necesita el campo antecedente");
	}
	else if(fechareg == false)
	{
	alert("Se necesita el campo fecha");
	}

	else{		
		$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data : $("#formeditantecedente").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#loader_gif").hide();
			console.log(response)
			$("#windowedit").dialog("close");
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0]) == 'ok'){	
			$("#Respuestaajax").show();
			$("#Respuestaajax").html(splitResp[1]);
			$("#divlistantecedente").html(splitResp[2]);
			
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

$('#fechacitasearch').live('change', function() {

var fecha = $("#fechacitasearch").val(); 
$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data: {"type":"fechacitasearch",
			fecha:fecha},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			// alert(response)
			$("#contenido").html(response);
			},
		});
});

function SearchExpediente(){

$.ajax({
			type :"POST",
			url : "ajax/cita.php",
			data : $("#formsearchex").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			// alert(response)
			$("#loader_gif").hide();
			$("#resulsearchexpe").html(response);
			},
		});
	
}



function OpenE(id){
	$.ajax({
		type :"POST",
		url : "ajax/cita.php",
		data: {"type":"OpenE",pacienteId:id},
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){
			$("#loader_gif").hide();
		$("#contenido").html(response);
		// $('#tabs').tabs();
		$('#tabs2').tabs();
		},
	});
}


// function BackHistoryex(id){
	// $.ajax({
		// type :"POST",
		// url : "ajax/cita.php",
		// data: {"type":"MisExpedients",
		// pacienteId:id,
		// },
		// beforeSend: function(){
			// $("#loader_gif").show();
		// },
		// success: function (response){

		// $("#cotenidoexpediente").html(response);
		// $('#tabs').tabs();
		// },
	// });
// }

function SaveDigitalOne(){


var nombredoc = $("#nombredoc").val(); 
var fechadigital = $("#fechadigital").val(); 
var rutadigital = $("#rutadigital").val(); 

if(nombredoc==false)
{
alert("se necesita el campo nombre")
}
else if(fechadigital==false)
{
alert("se necesita el campo fecha")
}
else if(rutadigital==false)
{
alert("se necesita el campo archivo")
}
else
{
$("#SaveDigital").attr("disabled",true);

var inputFileImage=document.getElementById("rutadigital");
	if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append( 'rutadigital', filea);
		$("#rutahidden").val(filea.name);
	}

	
	$.ajax({
	  	type: "POST",
	  	url: "ajax/cita.php",
	  	data: $("#formadddigital").serialize(true),
		beforeSend: function(){
			
			$("#loader_gif").show();
		},
	  	success: function(response) {
		console.log(response)
		$("#SaveDigital").attr("disabled",false);
		$("#loader_gif").hide();
		 var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){				
				
				$.ajax({
					  url:"ajax/upload-file.php?type=uploadimage&imagename="+$.trim(splitResp[1])+"&pacinteId="+$.trim(splitResp[2]),
					  data: fd,
					  processData: false,
					  contentType: false,
					  type: 'POST',
					  success: function(response) {
					  // alert(response)
							 var splitResp = response.split("[#]");
								if($.trim(splitResp[0]) == "ok"){
									$("#Respuestaajax").show();
									$("#Respuestaajax").html(splitResp[1]);
									$("#tabs-4").html(splitResp[2]);
								}
								else if($.trim(splitResp[0]) == "fail"){	
											alert("not")	
							}
					  }
				});			
			}else if($.trim(splitResp[0]) == "fail"){	
						alert("not1")		
			}else{
				alert("not2")
			}
			
		}
    });
	}
}

function SaveDigital(){


var nombredoc = $("#nombredoc").val(); 
var fechadigital = $("#fechadigital").val(); 
var rutadigital = $("#rutadigital").val(); 

if(nombredoc==false)
{
alert("se necesita el campo nombre")
}
else if(fechadigital==false)
{
alert("se necesita el campo fecha")
}
else if(rutadigital==false)
{
alert("se necesita el campo archivo")
}
else
{
$("#SaveDigital").attr("disabled",true);

var inputFileImage=document.getElementById("rutadigital");
	if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append( 'rutadigital', filea);
		$("#rutahidden").val(filea.name);
	}

	
	$.ajax({
	  	type: "POST",
	  	url: "ajax/cita.php",
	  	data: $("#formadddigital").serialize(true),
		beforeSend: function(){
			
			$("#loader_gif").show();
		},
	  	success: function(response) {
		console.log(response)
		$("#SaveDigital").attr("disabled",false);
		$("#loader_gif").hide();
		 var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){				
				
				$.ajax({
					  url:"ajax/upload-file.php?type=uploadimage&imagename="+$.trim(splitResp[1])+"&pacinteId="+$.trim(splitResp[2]),
					  data: fd,
					  processData: false,
					  contentType: false,
					  type: 'POST',
					  success: function(response) {
					  // alert(response)
							 var splitResp = response.split("[#]");
								if($.trim(splitResp[0]) == "ok"){
									$("#Respuestaajax").show();
									$("#Respuestaajax").html(splitResp[1]);
									$("#tabs2-4").html(splitResp[2]);
								}
								else if($.trim(splitResp[0]) == "fail"){	
											alert("not")	
							}
					  }
				});			
			}else if($.trim(splitResp[0]) == "fail"){	
						alert("not1")		
			}else{
				alert("not2")
			}
			
		}
    });
	}
}




function More(id){


if (!document.getElementById) return false;
  fila = document.getElementById(id);
  
if (fila.style.display != "none") {
    fila.style.display = "none"; //ocultar fila 
	
  } else {
  // alert(fila)
  $.ajax({
		type :"POST",
		url: "ajax/cita.php",
		data: {"type":"More",id:id},
		beforeSend: function(){
		// $("#stLoaderEx_"+id).show();
			// $("#stLoaderEx"+id).html(LOADER);	
		},
		success: function (data){
		// alert(data)
		fila.style.display = ""; //mostrar fila
		$("#divmore_"+id).hide();
		$("#divmore_"+id).html(data);
		$("#divmore_"+id).show("blind", { direction: "up" }, 900);

		},
	});
  
    
  }
}


function ShowTools(id){


if (!document.getElementById) return false;
  fila = document.getElementById(id);
  
if (fila.style.display != "none") {
    fila.style.display = "none"; //ocultar fila 
	
  } else {
  // alert(fila)
  $.ajax({
		type :"POST",
		url: "ajax/cita.php",
		data: {"type":"ShowTools",id:id},
		beforeSend: function(){
		// $("#stLoaderEx_"+id).show();
			// $("#stLoaderEx"+id).html(LOADER);	
		},
		success: function (data){
		// alert(data)
		fila.style.display = ""; //mostrar fila
		$("#divmore_"+id).hide();
		$("#divmore_"+id).html(data);
		$("#divmore_"+id).show("blind", { direction: "up" }, 900);

		},
	});
  
    
  }
}


// 
function ReportImg(pacienteId){

	window.open("report-img.php?pacienteId="+pacienteId,"")
	
}


function ImprimirReceta(citaid){

	// window.open("templates/receta.php?citaid="+citaid,"receta")
	url="templates/receta.php?citaid="+citaid,"receta";
	open(url,"Receta","toolbal=0,width=800,resizable=1");
}


function OpenStatisticals(pacienteId){

	window.open("templates/statisticals.php?pacienteId="+pacienteId,"")
	
}