<!DOCTYPE html>
<html>
<head>
	<title>Tour map</title>
	<style type="text/css">
    body { background-color: #F5F5F5; }
    /* h1 { text-align: center; }*/
    #googleMap { width: 100%; height: 90vh; text-align: center; }
    #legend { font-family: Arial, sans-serif; background: #fff; padding: 5px; /*border: 3px solid #000;*/ text-align: left;}    
    #legend img { vertical-align: middle; width: 30px;}
    .info { font-size: 14px; color:black; }



  }
</style>
</head>
<body>
	<!-- <h1>Tour map</h1> -->
	<div class="map_container">
      <input id="pac-input" class="controls" type="text" placeholder="Buscar">  
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
      // Create the search box and link it to the UI element.
      /*var input = document.getElementById('pac-input');
     var searchBox = new google.maps.places.SearchBox(input);*/

      // Bias the SearchBox results towards current map's viewport.
     /* map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
      });

      var placeName = "";
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        "latLng": event.latLng
      }, function (results, status) {
        console.log(results, status);
        if (status == google.maps.GeocoderStatus.OK) {
          console.log(results);
          var lat = results[0].geometry.location.lat(),
          lng = results[0].geometry.location.lng(),
          latlng = new google.maps.LatLng(lat, lng);

          placeName = results[0].formatted_address;

          $("#address").attr("value", placeName);

        }
      });

      $("input[name='lat']").attr("value", event.latLng.lat());
      $("input[name='lng']").attr("value", event.latLng.lng());
      checkValidation();*/

      /*..........fin............*/

      var pos = {lat: 41.5667, lng: 2.0167};

      var mapProp = {
        center: pos, //coordenadas decimales
        zoom:15, //valores de 1 a 23
        mapTypeId: google.maps.MapTypeId.ROADMAP, // valores ROADMAP, SATELLITE, HYBRID, TERRAIN        
      };      

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp); //el mapa se pintará en id googleMap

      //instanciamos InfoWindow para poder pintar ventanas de info al clicar location
      var infoWindow = new google.maps.InfoWindow();

      /*.......ini.......*/

     /* searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
          marker.setMap(null);
        });
        markers = [];

        $("input[name='lat']").attr("value", places[0].geometry.location.lat());
        $("input[name='lng']").attr("value", places[0].geometry.location.lng());
        checkValidation();

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }

          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
            });
        map.fitBounds(bounds);
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
            infoWindow.setContent('<div class="info"><a href="<?php echo base_url('Tour/tourInfo/');?>'+location.id+'">'+location.title+'</a><br>'+location.description+'</div>');
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

    /*function clearMarkers() {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
    }

    function checkValidation() {

      if ($("#lat").attr("value") === "0") {
        return;
      }

      if ($("#lng").attr("value") === "0") {
        return;
      }

      if ($("#category").attr("value") === "0") {
        return;
      }

      if ($("input[name='name']").val().trim().length > 0 && $("textarea[name='description']").val().trim().length > 0) {
        $(".crearTour").removeAttr('disabled');
      }
    }*/

    /*.............FIN...............*/

  </script>
  <!-- cargamos .js markerclusterer -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&libraries=places&callback=myMap"></script>
</body>
</html>