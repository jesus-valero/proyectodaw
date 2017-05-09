<!DOCTYPE html>
<html>
<head>
	<title>Pruebas con API Google</title>
	<style type="text/css">
		#googleMap { width: 80%; height: 400px; text-align: center;}
	}
</style>
</head>
<body>
	<h1>My First Google Map</h1>
	<div class="map_container">
		<div id="googleMap"></div>
		<div class="search"></div>
	</div>
	<script>
		
		function myMap() {

			var pos = {lat: 41.5053463, lng: 2.1178017};
			
			var locations = [
        	{lat: -31.563910, lng: 147.154312},
        	{lat: -33.718234, lng: 150.363181},
        	{lat: -33.727111, lng: 150.371124},
        	{lat: -33.848588, lng: 151.209834},
        	{lat: -33.851702, lng: 151.216968},
        	{lat: -34.671264, lng: 150.863657},
        	{lat: -35.304724, lng: 148.662905},
        	{lat: -36.817685, lng: 175.699196},
        	{lat: -36.828611, lng: 175.790222},
        	{lat: -37.750000, lng: 145.116667},
        	{lat: -37.759859, lng: 145.128708},
        	{lat: -37.765015, lng: 145.133858},
        	{lat: -37.770104, lng: 145.143299},
        	{lat: -37.773700, lng: 145.145187},
        	{lat: -37.774785, lng: 145.137978},
        	{lat: -37.819616, lng: 144.968119},
        	{lat: -38.330766, lng: 144.695692},
        	{lat: -39.927193, lng: 175.053218},
        	{lat: -41.330162, lng: 174.865694},
        	{lat: -42.734358, lng: 147.439506},
        	{lat: -42.734358, lng: 147.501315},
        	{lat: -42.735258, lng: 147.438000},
        	{lat: -43.999792, lng: 170.463352}
        	]
			/*var etiqueta = 'H';*/
			// Create an array of alphabetical characters used to label the markers.
			var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

			var mapProp = {
				center: pos, //coordenadas decimales
				zoom:15, //valores de 1 a 23
				mapTypeId: google.maps.MapTypeId.ROADMAP, // valores ROADMAP, SATELLITE, HYBRID, TERRAIN
			};			
			
			var map=new google.maps.Map(document.getElementById("googleMap"),mapProp); //el mapa se pintará en id googleMap

			//indicamos la posición donde queremos el marcador y si queremos una etiqueta
			/*var marker = new google.maps.Marker({
				position: pos,
				map: map,
				label: etiqueta,
			});*/

			// Add some markers to the map.
        	// Note: The code uses the JavaScript Array.prototype.map() method to
       	 	// create an array of markers based on a given "locations" array.
        	// The map() method here has nothing to do with the Google Maps API.
        	var markers = locations.map(function(location, i) {
        		return new google.maps.Marker({
        			position: location,
        			label: labels[i % labels.length]
        		});
        	});

        	// Add a marker clusterer to manage the markers.
        	var markerCluster = new MarkerClusterer(map, markers,
        		{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

        	

        	var infoWindow = new google.maps.InfoWindow({map: map});

        // si el browser soporta geolocalización
        if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(function(position) {
        		pos = {
        			lat: position.coords.latitude,
        			lng: position.coords.longitude        			
        		};
        		/*infoWindow.setPosition(pos);
        		infoWindow.setContent('Location found.');
        		map.setCenter(pos);*/
        	}, function() {
        		handleLocationError(true, infoWindow, map.getCenter());
        	});
        } else {
          // si el browser no soporta geolocalización
          handleLocationError(false, infoWindow, map.getCenter());
      }

  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  	infoWindow.setPosition(pos);
  	infoWindow.setContent(browserHasGeolocation ?
  		'Error: The Geolocation service failed.' :
  		'Error: Your browser doesn\'t support geolocation.');
  }

 /* function myMap() {
  var uluru = {lat: -25.363, lng: 131.044};
  var map = new google.maps.Map(document.getElementById('googleMap'), {
    zoom: 4,
    center: uluru
  });
  var marker = new google.maps.Marker({
    position: uluru,
    map: map
  });
}*/

</script>

<!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&callback=myMap"></script>
</body>
</html>


