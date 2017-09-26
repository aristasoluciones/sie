
function initialize() {
		$.ajax({
			// type :"POST",
			// dataType: 'json',
			// url : "ajax/cabecera.php",
			// data: {"type":"datas"},
			
			url : "ajax/cabecera.php",
			type: "POST",
			data: {"type":"datas"},
			// contentType: "application/json; charset=utf-8",
			// dataType: "json",
			
			beforeSend: function(){
				$("#loader_gif").show();
			},
			success: function (response){
				
		var marcadores = response;
		
      // var marcadores = [
        // ['La Especial', 16.7472113, -93.1187726],
        // ['2a Oriente', 16.749802, -93.115205],
        // ['La Chiapaneca', 16.748474, -93.115898],
        // ['El Amigo', 16.751135, -93.119278],
        // ['San Roque', 16.750017, -93.113493],
        // ['San Roque', 16.744996, -93.091516]
      // ];
	  
      var map = new google.maps.Map(document.getElementById('map_canvas'), {
        zoom: 15,
        center: new google.maps.LatLng(16.748211,  -93.105762),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < marcadores.length; i++) {  
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
          map: map
        });
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(marcadores[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
	  
	  console.log(response)
				return response;
					
			},
		});
    }
    // google.maps.event.addDomListener(window, 'load', initialize);
		
		
		