$('#fnacimiento').live('click', function() {
$("#fnacimiento").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	 changeMonth: true,
	 changeYear: true,
	 yearRange: '-100:+0'
    }).focus();
});



$('#fnacip').live('click', function() {
$("#fnacip").datepicker({
     firstDay: 1,
     dateFormat: 'dd-mm-yy',
	  changeMonth: true,
	 changeYear: true,
	 yearRange: '-100:+0'
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
function SearchMail(){
var txtflmail = $("#txtflmail").val();
var txtfltel = $("#txtfltel").val();
var txtfltnombre = $("#txtfltnombre").val();

	$.ajax({
		type :"POST",
		url : "ajax/paciente.php",
		data: {"type":"SearchMail",
		txtflmail:txtflmail,
		txtfltel:txtfltel,
		txtfltnombre:txtfltnombre
		},
		beforeSend: function(){
			$("#loader_gif").show();
		},
		success: function (response){
		$("#tblpaciente").html(response);
		},
	});

}

//termina la busqueda de los filtros
function SaveComunidad(){

var nombre = $("#nombre").val(); 
var apellidos = $("#apellidos").val(); 
var telefono = $("#telefono").val(); 
// var seccion = $("#seccion").val(); 
var comunidadId = $("#comunidadId").val(); 
var seccionvota = $("#seccionvota").val(); 
var nivel = $("#nivel").val(); 

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
	// else if(seccion == false)
	// {
	// alert("Se necesita el campo seccion");
	// }
	else if(comunidadId == false)
	{
	alert("Se necesita el campo Comunidad");
	}
	else if(seccionvota == false)
	{
	alert("Se necesita el campo Seccion donde Vota");
	}
	else if(nivel == false)
	{
	alert("Se necesita el campo Nivel");
	}
	else
	{
		var img = $("#imgcrendencial").val();
		
		if(img == false)
		{
			SaveSinImgCo();
		}
		else
		{
			SaveWidthImgCo();
		}
		
	
	}
}

function SaveWidthImgCo(){

var inputFileImage=document.getElementById("imgcrendencial");
		if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append('imgcrendencial', filea);
		$("#hiddenimg").val(filea.name);
		}

		$.ajax({
		type: "POST",
		url: "ajax/comunidad.php",
		data: $("#frmComunidad").serialize(true),
		beforeSend: function(){
			$("#SaveCabecera").attr("disabled",true);
			$("#loader_gif").show();
		},
		success: function(response) {
		console.log(response)
		$("#SaveCabecera").attr("disabled",false);
		$("#loader_gif").hide();
		 var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){				
				
				$.ajax({
					  url:"ajax/upload-file.php?type=addComunidad&imagename="+$.trim(splitResp[1]),
					  data: fd,
					  processData: false,
					  contentType: false,
					  type: 'POST',
					  success: function(response) {
					 console.log(response)
							 var splitResp = response.split("[#]");
								if($.trim(splitResp[0]) == "ok"){
									$("#Respuestaajax").show();
									$("#Respuestaajax").html(splitResp[1]);
									$("#contenido").html(splitResp[2]);
									$("#SaveCabecera").attr("disabled",false);
								}
								else if($.trim(splitResp[0]) == "fail"){	
											alert("Ocurrio un error favor de intentar de nuevo")	
							}
					  }
				});			
			}else if($.trim(splitResp[0]) == "fail"){	
						$("#SaveCabecera").attr("disabled",false);
						alert("Ocurrio un error favor de intentar de nuevo")		
			}else{
				$("#SaveCabecera").attr("disabled",false);
				alert("Ocurrio un error favor de intentar de nuevo")
			}
			
		}
		});

}

function SaveSinImgCo(){

$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data : $("#frmComunidad").serialize(true),
			beforeSend: function(){
				$("#SaveCabecera").attr("disabled",true);
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				var splitResp = response.split("[#]");
				$("#loader_gif").hide();
				if($.trim(splitResp[0]) == 'ok'){	
				
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
					$("#SaveCabecera").attr("disabled",false);
				}
				else if($.trim(splitResp[0]) == "fail"){
					$("#SaveCabecera").attr("disabled",false);
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
				}
				
			},
		});

}

function SearchPeopleCo(){


if($("#SearchRepre").val()=="")
	$("#representanteId").val("")

$("#lisCabezas").show();
	$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"SearchPeople",
			nombre:$("#SearchRepre").val(),
			seccionId:$("#seccion").val()},
			beforeSend: function(){
				$("#loaderAuto").show();
			},
			success: function (response){
				console.log(response)
				$("#lisCabezas").html(response);
				$("#loaderAuto").hide();

			},
		});

}


function SearchPeopleEditCo(){
$("#lisCabezasEdit").show();
	$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"SearchPeopleEdit",
			nombre:$("#SearchRepre").val(),
			seccionId:$("#seccion").val()},
			beforeSend: function(){
				$("#loader_gifEdit").show();
			},
			success: function (response){
				console.log(response)
				$("#lisCabezasEdit").html(response);
				$("#loader_gifEdit").hide();

			},
		});

}




function SelectPeople(Id){


	$("#SearchRepre").val($("#name_"+Id).val());
	$("#SearchRepre").val($("#name_"+Id).val());
	$("#representanteId").val(Id);
	$("#lisCabezas").hide();
	$("#lisCabezasEdit").hide();
	

}

function DeletePeopleComunidad(id){

var resp = confirm("Esta seguro de eliminar el registro?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"DeletePeopleComunidad",
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


 function EditPeopleComunidad(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"EditPeopleComunidad",
			id:id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				$("#loader_gif").hide();
				$("#wideditpaciente").show();
				$("#windowedit").html(response);
				$("#windowedit").dialog("option", "title", "Editar");	
				$('#windowedit').dialog('open');
				$('#windowedit').dialog({
				autoOpen: false,
				width: 900,
				height: 600,
				buttons: {
					"Cancel": function() {
						$(this).dialog("close");
					}
				}
				});
			},
		});
 
}




	
//termina la busqueda de los filtros
function UpdateComunidad(){

var nombre = $("#nombre").val(); 
var apellidos = $("#apellidos").val(); 
var telefono = $("#telefono").val(); 
// var seccion = $("#seccion").val(); 

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
	// else if(seccion == false)
	// {
	// alert("Se necesita el campo seccion");
	// }
	else
	{
		var img = $("#imgcrendencial").val();
		
		if(img == false)
		{
			UpdateSinImgCo();
		}
		else
		{
			UpdateWidthImgCo();
		}
		
	
	}
}


function UpdateSinImgCo(){

$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data : $("#frmEditComunidad").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				
				var splitResp = response.split("[#]");
				$("#loader_gif").hide();
				if($.trim(splitResp[0]) == 'ok'){	
				$("#windowedit").dialog("close");
					$("#Respuestaajax").show();
					
					$("#Respuestaajax").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
					
				}
				else if($.trim(splitResp[0]) == "fail"){
					
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
				}
				
			},
		});

}

function SerchPeopleComunidad(){

$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data : $("#frmCabecera").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				$("#loader_gif").hide();
				$("#DivPeople").html(response);
				
			},
		});

}



function Graficar(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frmgraficas").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				$("#loader_gif").hide();
				$("#DivGraph").html(response);
				
			},
		});

}

			

function VotarComunidad(id){



		$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"VotarComunidad",
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





function CloseRecordatorio(){
	$("#recordatorio").hide();
}


function PrintReport(){
	$("#frmCabecera").submit();
}

function SaveVotoPart(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frmvtopartido").serialize(true),
			beforeSend: function(){
				$("#SaveVotoPart").attr("disabled",true);
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				var splitResp = response.split("[#]");
				$("#loader_gif").hide();
				if($.trim(splitResp[0]) == 'ok'){	
				
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
					$("#contenido").html(splitResp[2]);
					$("#SaveVotoPart").attr("disabled",false);
				}
				else if($.trim(splitResp[0]) == "fail"){
					$("#SaveVotoPart").attr("disabled",false);
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
				}
				
			},
		});

}




function UpdateWidthImgCo(){

var inputFileImage=document.getElementById("imgcrendencial");
		if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append('imgcrendencial', filea);
		$("#hiddenimg").val(filea.name);
		}

		$.ajax({
		type: "POST",
		url: "ajax/comunidad.php",
		data: $("#frmEditComunidad").serialize(true),
		beforeSend: function(){
			$("#SaveCabecera").attr("disabled",true);
			$("#loader_gif").show();
		},
		success: function(response) {
		console.log(response)
		$("#SaveCabecera").attr("disabled",false);
		$("#loader_gif").hide();
		 var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){				
				
				$.ajax({
					  url:"ajax/upload-file.php?type=EditComunidad&imagename="+$.trim(splitResp[1]),
					  data: fd,
					  processData: false,
					  contentType: false,
					  type: 'POST',
					  success: function(response) {
					 console.log(response)
							 var splitResp = response.split("[#]");
								if($.trim(splitResp[0]) == "ok"){
									$("#Respuestaajax").show();
									$("#Respuestaajax").html(splitResp[1]);
									$("#contenido").html(splitResp[2]);
									$("#SaveCabecera").attr("disabled",false);
										$("#windowedit").dialog("close");
								}
								else if($.trim(splitResp[0]) == "fail"){	
											alert("Ocurrio un error favor de intentar de nuevo")	
							}
					  }
				});			
			}else if($.trim(splitResp[0]) == "fail"){	
						$("#SaveCabecera").attr("disabled",false);
						alert("Ocurrio un error favor de intentar de nuevo")		
			}else{
				$("#SaveCabecera").attr("disabled",false);
				alert("Ocurrio un error favor de intentar de nuevo")
			}
			
		}
		});

}


function PrintReportComunidad(citaid){

	 
	url="templates/pdf-comunidad.php?data="+$("#frmCabecera").serialize(true),"receta";
	open(url,"Receta","toolbal=0,width=800,resizable=1");
}
