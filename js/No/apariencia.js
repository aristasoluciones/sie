function SaveApariencia(Id){
		$.ajax({
			type :"POST",
			url : "ajax/configuracion.php",
			data: {"type":"SaveApariencia",
			Id:Id},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){

				var splitResp = response.split("[#]");
		
				if($.trim(splitResp[0]) == 'ok'){	
					window.location.href='index.php';
				}
				else if ($.trim(splitResp[0]) == 'fail')
				{
				$("#Respuestaajax").show();
				$("#Respuestaajax").html(splitResp[2]);
				}

			},
		});
		
}
