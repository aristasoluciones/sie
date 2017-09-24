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
function SaveCabecera(){

var nombre = $("#nombre").val(); 
var apellidos = $("#apellidos").val(); 
var telefono = $("#telefono").val(); 
var seccion = $("#seccion").val(); 
var nivel = $("#nivel").val(); 
var tipo = $("#tipo").val(); 

if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	else if(tipo == false)
	{
	alert("Se necesita el campo tipo");
	}
	// else if(telefono == false)
	// {
	// alert("Se necesita el campo telefono");
	// }
	else if(seccion == false)
	{
	alert("Se necesita el campo seccion");
	}
	else if(nivel == false)
	{
	alert("Se necesita el campo nivel");
	}
	else
	{
		var img = $("#imgcrendencial").val();
		
		if(img == false)
		{
			SaveSinImg();
		}
		else
		{
			SaveWidthImg();
		}
		
	
	}
}

function SaveWidthImg(){

var inputFileImage=document.getElementById("imgcrendencial");
		if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append('imgcrendencial', filea);
		$("#hiddenimg").val(filea.name);
		}

		$.ajax({
		type: "POST",
		url: "ajax/cabecera.php",
		data: $("#frmCabecera").serialize(true),
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
					  url:"ajax/upload-file.php?type=addCabecera&imagename="+$.trim(splitResp[1]),
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

function SaveSinImg(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frmCabecera").serialize(true),
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

function SearchPeople(){


if($("#SearchRepre").val()=="")
	$("#representanteId").val("")

$("#lisCabezas").show();
	$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
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


function SearchPeopleEdit(){
$("#lisCabezasEdit").show();
	$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
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

function DeletePeople(id){

var resp = confirm("Esta seguro de eliminar el registro?");
	
	if(!resp)
		return;

		$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"DeletePeople",
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


 function EditPeople(id){

 
 $.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"EditPeople",
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
function UpdateCabecera(){

var nombre = $("#nombre").val(); 
var apellidos = $("#apellidos").val(); 
var telefono = $("#telefono").val(); 
var seccion = $("#seccion").val(); 
var nivel = $("#nivel").val(); 

if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	// else if(apellidos == false)
	// {
	// alert("Se necesita el campo apellidos");
	// }
	// else if(telefono == false)
	// {
	// alert("Se necesita el campo telefono");
	// }
	else if(seccion == false)
	{
	alert("Se necesita el campo seccion");
	}
	else if(nivel == false)
	{
	alert("Se necesita el campo nivel");
	}
	else
	{
		var img = $("#imgcrendencial").val();
		
		if(img == false)
		{
			UpdateSinImg();
		}
		else
		{
			UpdateWidthImg();
		}
		
	
	}
}


function UpdateCabeceraRed(){

var nombre = $("#nombre").val(); 
var apellidos = $("#apellidos").val(); 
var telefono = $("#telefono").val(); 
var seccion = $("#seccion").val(); 
var nivel = $("#nivel").val(); 

if(nombre == false)
	{
	alert("Se necesita el campo nombre");
	}
	// else if(apellidos == false)
	// {
	// alert("Se necesita el campo apellidos");
	// }
	// else if(telefono == false)
	// {
	// alert("Se necesita el campo telefono");
	// }
	else if(seccion == false)
	{
	alert("Se necesita el campo seccion");
	}
	else if(nivel == false)
	{
	alert("Se necesita el campo nivel");
	}
	else
	{
		var img = $("#imgcrendencial").val();
		
		if(img == false)
		{
			UpdateSinImgRed();
		}
		else
		{
			UpdateWidthImg();
		}
		
	
	}
}



function UpdateSinImgRed(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frmEditCabecera").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				// alert(response)
				var splitResp = response.split("[#]");
				$("#loader_gif").hide();
				if($.trim(splitResp[0]) == 'ok'){	
				$("#windowedit").dialog("close");
					// $("#Respuestaajax").show();
					
					$("#Respuestaajax").html(splitResp[2]);
					$("#contenidored").html(splitResp[1]);
					
				}
				else if($.trim(splitResp[0]) == "fail"){
					$("#Respuestaajaxedit").show();
					$("#Respuestaajax").show();
					$("#Respuestaajax").html(splitResp[1]);
					$("#Respuestaajaxedit").html(splitResp[1]);
				}
				
			},
		});

}

function UpdateSinImg(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frmEditCabecera").serialize(true),
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
					
					$("#Respuestaajax").html(splitResp[2]);
					$("#contenido").html(splitResp[1]);
					
				}
				else if($.trim(splitResp[0]) == "fail"){
					
					$("#Respuestaajaxedit").show();
					$("#Respuestaajax").show();
					$("#Respuestaajaxedit").html(splitResp[1]);
					$("#Respuestaajax").html(splitResp[1]);
				}
				
			},
		});

}

function SerchPeople(){

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
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

			

function Votar(id){



		$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"Votar",
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




function UpdateWidthImg(){

var inputFileImage=document.getElementById("imgcrendencial");
		if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append('imgcrendencial', filea);
		$("#hiddenimg").val(filea.name);
		}

		$.ajax({
		type: "POST",
		url: "ajax/cabecera.php",
		data: $("#frmEditCabecera").serialize(true),
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
					  url:"ajax/upload-file.php?type=EditCabecera&imagename="+$.trim(splitResp[1]),
					  data: fd,
					  processData: false,
					  contentType: false,
					  type: 'POST',
					  success: function(response) {
					 console.log(response)
							 var splitResp = response.split("[#]");
								if($.trim(splitResp[0]) == "ok"){
								$("#windowedit").dialog("close");
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



function PrintReportCabecera(citaid){

	 
	url="templates/pdf-cabecera.php?data="+$("#frmCabecera").serialize(true),"receta";
	open(url,"Receta","toolbal=0,width=800,resizable=1");
}


function Next(pag,order,tipo){
$("#Respuestaajax").hide();

$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: $("#frmCabecera").serialize(true)+"&pag="+pag+'&order='+order+'&tipo='+tipo,
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				$("#loader_gif").hide();
			$("#DivPeople").html(response);	
					// var celda $("#pag_"+pag).val();
					$(".div_"+pag).css("background","#00A651"); 
			},
		});
}

function ExportarExcel(){

	$("#frmCabecera").submit();

}

function PrintReportnivel(Id){

	 
	url="templates/pdf-nivel.php?Id="+Id,"receta";
	open(url,"Receta","toolbal=0,width=800,resizable=1");
}





 function EditPeopleRed(id,redId){

 
 $.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"EditPeopleRed",
			id:id,redId:redId},
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


function ExportarExcelAll(){

	$("#frmLst").submit();

}



function mnuUpExcel(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"mnuUpExcel"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}


function Upexcel(){

	$("#frmUpexcel").submit();

}