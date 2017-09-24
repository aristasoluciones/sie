function SerchMaster(){

$.ajax({
			type :"POST",
			url : "ajax/master.php",
			data : $("#frmMaster").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				$("#loader_gif").hide();
				$("#DivMaster").html(response);
				
			},
		});

}




function GraficarMaster(){

$.ajax({
			type :"POST",
			url : "ajax/master.php",
			data : $("#frmgraficasmast").serialize(true),
			beforeSend: function(){
				
				$("#loader_gif").show();
			},
			success: function (response){
				console.log(response)
				$("#loader_gif").hide();
				$("#DivGraphm").html(response);
				
			},
		});

}