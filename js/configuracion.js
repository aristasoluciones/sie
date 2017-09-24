function AddConfig(id){
	var intervalo = $("#intervalo").val(); 
	var horainicio = $("#horainicio").val(); 
	

	if(intervalo == false)
	{
	alert("Se necesita el campo intervalo");
	}
	else if (horainicio == false)
	{
	alert("Se necesita el campo hora de Inicio");
	}
	else{		
		$.ajax({
			type :"POST",
			url : "ajax/configuracion.php",
			data : $("#formconfiguracion").serialize(true),
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			
			$("#loader_gif").hide();
			
			var splitResp = response.split("[#]");
			
			if($.trim(splitResp[0]) == 'ok'){	
			$("#Respuestaajax").show();
			// $("#contenido").html(splitResp[1]);
			$("#Respuestaajax").html(splitResp[1]);
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
