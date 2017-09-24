function SaveSoporte(){

var sopModulo = $("#sopModulo").val(); 
var sopComentario = $("#sopComentario").val(); 
var sopCaptura = $("#sopCaptura").val(); 

if(sopModulo == false)
	{
	alert("Se necesita el campo Modulo");
	}
	else if(sopComentario == false)
	{
	alert("Se necesita el campo Comentario");
	}
	else if(sopCaptura == false)
	{
	alert("Se necesita el campo Captura");
	}
	else
	{
		var inputFileImage=document.getElementById("sopCaptura");
		if($(inputFileImage).val()!=""){
		var filea = inputFileImage.files[0];
		var fd = new FormData();
		fd.append( 'sopCaptura', filea);
		$("#sopCapturaHidd").val(filea.name);
		}

		$.ajax({
		type: "POST",
		url: "ajax/soporte.php",
		data: $("#frmsoporte").serialize(true),
		beforeSend: function(){
			$("#btnSavesop").attr("disabled",false);
			$("#loader_gif").show();
		},
		success: function(response) {
		console.log(response)
		$("#btnSavesop").attr("disabled",false);
		$("#loader_gif").hide();
		 var splitResp = response.split("[#]");

			if($.trim(splitResp[0]) == "ok"){				
				
				$.ajax({
					  url:"ajax/upload-file.php?type=Soporte&imagename="+$.trim(splitResp[1]),
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
									// $(".txtpaciente").html("");
								}
								else if($.trim(splitResp[0]) == "fail"){	
											alert("Ocurrio un error favor de intentar de nuevo")	
							}
					  }
				});			
			}else if($.trim(splitResp[0]) == "fail"){	
						alert("Ocurrio un error favor de intentar de nuevo")		
			}else{
				alert("Ocurrio un error favor de intentar de nuevo")
			}
			
		}
		});
	}
}




function SaveApariencia(Id){
$("#Respuestaajax").hide();
$.ajax({
			type :"POST",
			url : "ajax/soporte.php",
			data: {"type":"SaveApariencia",
			Id:Id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){

			// Tabs
			
			// $("#contenido").html(response);
			
			},
		});
		
}

