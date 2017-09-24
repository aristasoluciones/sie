function Cancel(){
	$("#wideditpaciente").hide();
	$("#widcita").hide();
	$("#wideditmedico").hide();
	$("#ShowCita").hide();
}

function CerraMjsCon(){
	$("#divmsjok").hide();
	$("#divmsjfail").hide();
	$("#Rsptaajaxc").hide();
}


function CloseAccount(){
		$.ajax({
			type :"POST",
			url : "ajax/login.php",
			data: {"type":"CloseAccount"},
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
			window.location.href ="login.php";
			},
		});
}

$(window).load(function(){
$("#windowedit").dialog("option", "title", "Editar paciente");	
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
})



function Cambiarestatus(Id,key){
	// $("#type").val("Cambiarestatus");
	$.ajax({
			type :"POST",
			url : "ajax/cabecera.php",
			data : $("#frm_"+Id+"_"+key).serialize(true),
			beforeSend: function(){
				$("#loader_gifEdit").show();
			},
			success: function (response){
				alert(response)
				console.log(response)
				if($.trim(splitResp[0]) == 'ok'){	
				
					alert("ok")
				}else{
					alert("error")
				}

			},
		});

}
