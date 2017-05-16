<!DOCTYPE html>
<html>
<head>
	<title>Pruebas con API Google</title>
	<style type="text/css">
		#googleMap { width: 80%; height: 400px; text-align: center;}

    #legend { font-family: Arial, sans-serif; background: #fff; padding: 10px; margin: 10px; border: 3px solid #000; }
    #legend h3 { margin-top: 0; }
    #legend img { vertical-align: middle; width: 30px;}
    .info { font-size: 14px; color:hotpink; }
  }
</style>
</head>
<body>
	<h1>My First Google Map</h1>
	<div class="map_container">
		<div id="googleMap"></div>
    <div id="legend"><h3>Legend</h3></div>
    <div class="search"></div>
  </div>
  <script>

    function myMap() {

      //array que contiene los datos que recibimos de la BBDD
      var locations = <?php echo $locations; ?>

      var pos = {lat: -36.828611, lng: 2.1178017};

      //array iconos para leyenda
      var icons = {
        bar: {
          name: 'Bar',
          icon: '../img/map/icons/bar.png'
        },
        arts: {
          name: 'Arts',
          icon: '../img/map/icons/arts.png'
        },
        sport: {
          name: 'Sport',
          icon: '../img/map/icons/sport.png'
        }
      };

      var mapProp = {
        center: pos, //coordenadas decimales
        zoom:15, //valores de 1 a 23
        mapTypeId: google.maps.MapTypeId.ROADMAP, // valores ROADMAP, SATELLITE, HYBRID, TERRAIN
        //estilos del mapa(descomentar y dar valores para modificar estilo)       
      };      

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp); //el mapa se pintará en id googleMap

      //instanciamos InfoWindow para poder pintar ventanas de info al clicar location
      var infoWindow = new google.maps.InfoWindow();

			// Añdimos marcadores contenidos en locations recorriendo el array y pintando segun position + label + icono 
      var markers = locations.map(function(location, i) {
        var marker = new google.maps.Marker({
          position: location,
          icon: '/proyectodaw/img/map/icons/'+location.type+'.png',         
        }); 

        //al clicar un punto mostramos title + text
        google.maps.event.addListener(marker, 'click', function(evt) {
          infoWindow.setContent('<div class="info">'+location.title+'<br>'+location.text+'<br><img src="/proyectodaw/img/map/icons/arts.png"></div>');
          infoWindow.open(map, marker);
        })

        return marker;
      });

      // Add a marker clusterer to manage the markers.
      var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      
      //parte geolocalización     

      // si el browser soporta geolocalización
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude        			
          };

          map.setCenter(pos);
        }, function() {

        });
      }     

      //pintamos leyenda
      var legend = document.getElementById('legend');
      for (var key in icons) {
        var type = icons[key];
        var name = type.name;
        var icon = type.icon;
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + icon + '"> ' + name;
        legend.appendChild(div);
      }

      //indicamos la posicion donde queremos la leyenda
      map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);

    }    

  </script>
  <!-- cargamos .js markerclusterer -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&callback=myMap"></script>
</body>
</html>