<!DOCTYPE html>
<html>
<head>
	<title>Pruebas con API Google</title>
	<style type="text/css">
		#googleMap { width: 80%; height: 400px; text-align: center;}

    #legend { font-family: Arial, sans-serif; background: #fff; padding: 10px; margin: 10px; border: 3px solid #000; }
    #legend h3 { margin-top: 0; }
    #legend img { vertical-align: middle; width: 30px;}
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
        styles: [
        /*{elementType: 'geometry', stylers: [{color: '#242f3e'}]},*/
        /* {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},*/
        /*{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},*/
            /*{
              featureType: 'administrative.locality',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },*/
            /*{
              featureType: 'poi',
              elementType: 'labels.text.fill',
              stylers: [{color: '#102EB3'}]
            },*/
           /* {
              featureType: 'poi.park',
              elementType: 'geometry',
              stylers: [{color: '#263c3f'}]
            },*/
            /*{
              featureType: 'poi.park',
              elementType: 'labels.text.fill',
              stylers: [{color: '#6b9a76'}]
            },*/
            /*{
              featureType: 'road',
              elementType: 'geometry',
              stylers: [{color: '#38414e'}]
            },*/
            /*{
              featureType: 'road',
              elementType: 'geometry.stroke',
              stylers: [{color: '#212a37'}]
            },*/
            /*{
              featureType: 'road',
              elementType: 'labels.text.fill',
              stylers: [{color: '#9ca5b3'}]
            },*/
            /*{
              featureType: 'road.highway',
              elementType: 'geometry',
              stylers: [{color: '#746855'}]
            },*/
            /*{
              featureType: 'road.highway',
              elementType: 'geometry.stroke',
              stylers: [{color: '#1f2835'}]
            },*/
           /* {
              featureType: 'road.highway',
              elementType: 'labels.text.fill',
              stylers: [{color: '#f3d19c'}]
            },*/
            /*{
              featureType: 'transit',
              elementType: 'geometry',
              stylers: [{color: '#2f3948'}]
            },*/
            /*{
              featureType: 'transit.station',
              elementType: 'labels.text.fill',
              stylers: [{color: '#d59563'}]
            },*/
            /*{
              featureType: 'water',
              elementType: 'geometry',
              stylers: [{color: '#17263c'}]
            },*/
            /*{
              featureType: 'water',
              elementType: 'labels.text.fill',
              stylers: [{color: '#515c6d'}]
            },*/
            /*{
              featureType: 'water',
              elementType: 'labels.text.stroke',
              stylers: [{color: '#17263c'}]
            }*/
            ]
          };      

      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp); //el mapa se pintará en id googleMap

      //seguramente prescindiremos de labels mas adelante!!!!! en tal caso revisar var markers
      // Create an array of alphabetical characters used to label the markers.
      var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';    

			// Añdimos marcadores contenidos en locations recorriendo el array y pintando segun position + label + icono      
      var markers = locations.map(function(location, i) {
        return new google.maps.Marker({
         position: location,
         label: labels[i % labels.length],
         icon: '/proyectodaw/img/map/icons/'+location.type+'.png'
       });
      });

      // Add a marker clusterer to manage the markers.
      var markerCluster = new MarkerClusterer(map, markers,
        {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

      //parte geolocalización
      var infoWindow = new google.maps.InfoWindow({map: map});

      // si el browser soporta geolocalización
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude        			
          };
          //comentar las siguientes dos lineas para eliminar info
          /*infoWindow.setPosition(pos);
          infoWindow.setContent('Estás aqui, gañán!');*/          
          map.setCenter(pos);
        }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
        });
      } else {
        // si el browser no soporta geolocalización
        handleLocationError(false, infoWindow, map.getCenter());
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

    //control de errores para geolocalización
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    } 

    //array que contiene los datos que mas adelante recibiremos de la BBDD
    var locations = [
    {lat: 41.5053062, lng: 2.1176510000000004, type: 'bar'},
    {lat: 41.5153062, lng: 2.1176510000000004, type: 'sport'},
    {lat: 41.5153062, lng: 2.1276510000000004, type: 'arts'},
    {lat: 41.5053062, lng: 2.1276510000000004, type: 'bar'},
    {lat: -33.851702, lng: 151.216968, type: 'bar'},
    {lat: -34.671264, lng: 150.863657, type: 'sport'},
    {lat: -35.304724, lng: 148.662905, type: 'arts'},
    {lat: -36.817685, lng: 175.699196, type: 'bar'},
    {lat: -36.828611, lng: 175.790222, type: 'sport'},
    {lat: -37.750000, lng: 145.116667, type: 'arts'},
    {lat: -37.759859, lng: 145.128708, type: 'bar'},
    {lat: -37.765015, lng: 145.133858, type: 'sport'},
    {lat: -37.770104, lng: 145.143299, type: 'sport'},
    {lat: -37.773700, lng: 145.145187, type: 'arts'},
    {lat: -37.774785, lng: 145.137978, type: 'bar'},
    {lat: -37.819616, lng: 144.968119, type: 'sport'},
    {lat: -38.330766, lng: 144.695692, type: 'arts'},
    {lat: -39.927193, lng: 175.053218, type: 'sport'},
    {lat: -41.330162, lng: 174.865694, type: 'arts'},
    {lat: -42.734358, lng: 147.439506, type: 'bar'},
    {lat: -42.734358, lng: 147.501315, type: 'arts'},
    {lat: -42.735258, lng: 147.438000, type: 'bar'},
    {lat: -43.999792, lng: 170.463352, type: 'arts'}
    ]

  </script>
  <!-- cargamos .js markerclusterer -->
  <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
  </script>
  <!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&callback=myMap"></script>
</body>
</html>


