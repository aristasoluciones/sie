function Login(){


var user = $("#user").val(); 
var pass = $("#pass").val();

if(user == false)
{
alert("Se necesita el campo usuario")
}
else if(pass == false)
{
alert("Se necesita el campo password")
}
else 
{
	$.ajax({
		type :"POST",
		url : "ajax/login.php",
		data: {"type":"Login",
		pass:pass,
		user:user},
		beforeSend: function(){
			$("#msjloading").hide();
			$("#loader_gif").show();
		},
		success: function (response){
		console.log(response)
		$("#loader_gif").hide();
		var splitResp = response.split("[#]");
		if($.trim(splitResp[0]) == 'ok'){
		window.location.href ="index.php";		
		}
		else if($.trim(splitResp[0]) == 'fail') {
			$("#msjloading").show();
			$("#msjloading").html(splitResp[1]);
		}
		
		},
	});
}
}


$(window).load(function() {
	$('#user').bind("keypress", function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) Login();
	})

	$('#pass').bind("keypress", function(event){ 
		var key = event.which || event.keyCode;
		if(key == 13) Login();
	})

});

