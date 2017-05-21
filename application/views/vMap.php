<!DOCTYPE html>
<html>
<head>
	<title>Tour map</title>
	<style type="text/css">
    body { background-color: #F5F5F5; }
    /* h1 { text-align: center; }*/
    #googleMap { width: 100%; height: 500px; text-align: center; }
    #legend { font-family: Arial, sans-serif; background: #fff; padding: 5px; /*border: 3px solid #000;*/ text-align: left;}    
    #legend img { vertical-align: middle; width: 30px;}
    .info { font-size: 14px; color:black; }

    .buscador {
      text-align:center;
      padding:30px 0px;
    }

    .buscador #direccion {
      margin:10px auto;
      width:100%;
      padding:7px;
      max-width:250px;
    }

    .buscador #buscar {
      margin:0 auto;
      max-width:250px;
      padding:7px;
      color:#FFFFFF;
      background:#f2777a;
      border:2px solid #f2777a;
      cursor:pointer;
    }

  }
</style>
</head>
<body>
	<!-- <h1>Tour map</h1> -->
	<div class="map_container">
    <!-- <div class="buscador">
      <h2>Ingrese una dirección</h2>
      <input type="text" id="direccion">
      <div id="buscar">Buscar</div>
    </div> -->
    <div id="googleMap"></div>
    <div id="legend"></div>    
  </div>
  <script>

    function myMap(elemento = null, direccion = null) {

      //array que contiene los datos que recibimos de la BBDD
      var locations = <?php echo $locations; ?>
      //array iconos para leyenda (viene del controlador con json_encode)
      var icons = <?php echo $categories; ?>
      //loged true o false
      var loged = <?php echo $loged; ?>

      /*...........ini...............*/
     /* var geocoder = new google.maps.Geocoder();*/
      /*..........fin............*/

      var pos = {lat: -36.828611, lng: 2.1178017};   

      var mapProp = {
        center: pos, //coordenadas decimales
        zoom:15, //valores de 1 a 23
        mapTypeId: google.maps.MapTypeId.ROADMAP, // valores ROADMAP, SATELLITE, HYBRID, TERRAIN        
      };      

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp); //el mapa se pintará en id googleMap

      //instanciamos InfoWindow para poder pintar ventanas de info al clicar location
      var infoWindow = new google.maps.InfoWindow();

      /*.......ini.......*/

      /*geocoder.geocode({'address': direccion}, function(results, status) {
        if (status === 'OK') {
          var resultados = results[0].geometry.location,
          resultados_lat = resultados.lat(),
          resultados_long = resultados.lng();

         var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        });

        } else {
          var mensajeError = "";
          if (status === "ZERO_RESULTS") {
            mensajeError = "No hubo resultados para la dirección ingresada.";
          } else if (status === "OVER_QUERY_LIMIT" || status === "REQUEST_DENIED" || status === "UNKNOWN_ERROR") {
            mensajeError = "Error general del mapa.";
          } else if (status === "INVALID_REQUEST") {
            mensajeError = "Error de la web. Contacte con Name Agency.";
          }
          alert(mensajeError);
        }
      });*/

      /*.......fin.......*/

			// Añdimos marcadores contenidos en locations recorriendo el array y pintando segun position + label + icono 
      var markers = locations.map(function(location, i) {

        //si tour activo pintamos cat_image, sino cat_image_off (icono con o sin reloj)
        if(location.active == 1){
          var marker = new google.maps.Marker({
            position: location,
            icon: {
              url: location.cat_image,
            },                  
          }); 
        }else{
          var marker = new google.maps.Marker({
            position: location,
            icon: {
              url: location.cat_image_off,
            },                  
          }); 
        }

        //al clicar un punto mostramos title + decription
        google.maps.event.addListener(marker, 'click', function(evt) {
          if(loged){
            infoWindow.setContent('<div class="info"><a href="<?php echo base_url('Tour/tourPreview/');?>?id='+location.id+'">'+location.title+'</a><br>'+location.description+'</div>');
          }else{
            infoWindow.setContent('<div class="info">'+location.title+'<br>'+location.description+'</div>');
          }
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
        var indice = icons[key];
        var category = indice.name;
        var icon = indice.icon;
        var div = document.createElement('div');
        div.innerHTML = '<img src="' + icon + '"> ' + category;
        legend.appendChild(div);
      }

      //indicamos la posicion donde queremos la leyenda
      map.controls[google.maps.ControlPosition.RIGHT_TOP].push(legend);

    }    

    /*........INI.............*/

    /*$("#buscar").click(function() {
            var direccion = $("#direccion").val();
      if (direccion !== "") {
        myMap("mapa-geocoder", direccion);
      }
        });*/

    /*.............FIN...............*/

  </script>
  <!-- cargamos .js markerclusterer -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&callback=myMap"></script>
</body>
</html>