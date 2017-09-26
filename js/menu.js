
function m_addpaciente(){

$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"AddCabecera"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);
			},
		});
}

function m_addComunidad(){

$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"AddComunidad"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);
			},
		});
}

	

function mReporteCab(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"mReporteCab"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}

function reporte1(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"reporte1"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			console.log(response)
			$("#contenido").html(response);	
					
			},
		});
}




function reporte2(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"reporte2"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			console.log(response)
			$("#contenido").html(response);	
					
			},
		});
}



function reporte3(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"reporte3"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			console.log(response)
			$("#contenido").html(response);	
					
			},
		});
}


function mReporteCo(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/comunidad.php",
			data: {"type":"mReporteCo"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}



function mnuGraficas(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"mnuGraficas"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}



function mnuRMaster(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/master.php",
			data: {"type":"mnuRMaster"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}


function mnuTotales(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/master.php",
			data: {"type":"mnuTotales"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}




function mnuGrapMaster(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/master.php",
			data: {"type":"mnuGrapMaster"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}

function mnuaddVotos(){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data: {"type":"mnuaddVotos"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			$("#contenido").html(response);	
					
			},
		});
}




