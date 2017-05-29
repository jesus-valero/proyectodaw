<!DOCTYPE html>
<html>
<head>
    <title>Tour map</title>
    <style type="text/css">
        body {
            background-color: #F5F5F5;
        }

        .map_container {
            overflow: hidden;
            height: 95vh;
            width: 100vw;
            background: darkgray;
        }

        /* h1 { text-align: center; }*/
        #googleMap {
            height: 100%;
        }

        #legend {
            margin-right: 2vh;
            margin-top: 2vh;
            font-family: Arial, sans-serif;
            background: rgba(255,255,255,.5);
            padding: 2vh; /*border: 3px solid #000;*/
            text-align: left;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 25vh;
            font-size: 2vh;
        }

        #legend > span {
            color: blue;
            font-size:1.3vh;
            padding-bottom: 1.5vh;
            text-align: center;
        }

        #legend div {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 3.5vh;
            letter-spacing: 1px;
        }

        #legend img {
            vertical-align: middle;
            height: 3vh;
            padding-right: 1.5vh;
        }

        .info {
            display: block;
            text-align: center;
            font-size: 2vh;
            color: black;
            padding-top: 1vh;
            padding-bottom: 1vh;
        }

        .info a {
            text-decoration: none;

        }

        .info p {
            font-size: 1.4vh;
            font-style: italic;
        }

        .controls {
            margin-top: 10px;
            border: 1px solid transparent;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            height: 32px;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 300px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

    </style>
</head>
<body>
<div class="map_container">
    <input id="pac-input" class="controls" type="text" placeholder="Buscar">
    <div id="googleMap"></div>
    <div id="legend"><span>Leyenda</span></div>
</div>
<script>

    var pathname = window.location.pathname; // Returns path only
    var totalPaths = pathname.split("/");

    //var gLat =



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
            zoom: 14,
            mapTypeId: 'roadmap',
            disableDefaultUI: true,
            streetViewControl: false
        };

        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp); //el mapa se pintará en id googleMap

        //instanciamos InfoWindow para poder pintar ventanas de info al clicar location
        var infoWindow = new google.maps.InfoWindow();

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });

        // Añdimos marcadores contenidos en locations recorriendo el array y pintando segun position + label + icono
        var markers = locations.map(function (location, i) {

            //si tour activo pintamos cat_image, sino cat_image_off (icono con o sin reloj)
            if (location.active == 1) {
                var marker = new google.maps.Marker({
                    position: location,
                    icon: {
                        url: location.cat_image,
                    },
                });
            } else {
                var marker = new google.maps.Marker({
                    position: location,
                    icon: {
                        url: location.cat_image_off,
                    },
                });
            }

            //al clicar un punto mostramos title + decription
            google.maps.event.addListener(marker, 'click', function (evt) {
                if (loged) {
                    infoWindow.setContent('<div class="info"><a href="<?php echo base_url('Tour/tourInfo/');?>' + location.id + '">' + location.title + '</a><br><p>' + location.description + '</p></div>');
                } else {
                    infoWindow.setContent('<div class="info">' + location.title + '<br><p>' + location.description + '</p></div>');
                }
                infoWindow.open(map, marker);
            })

            return marker;
        });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

        google.maps.event.addDomListener(window,'resize',function(){

            if(map.get('bounds_listener')){
                google.maps.event.removeListener(map.get('bounds_listener'));
            }
            else{
                map.set('_center',map.getCenter());
            }

            map.setOptions({
                minZoom: Math.ceil(Math.log(map.getDiv().offsetWidth/256)/Math.log(2))
            });

            map.setCenter(map.get('_center'));

            map.set('bounds_listener', google.maps.event.addListener(map, 'bounds_changed', function(){
                this.set('_center',this.getCenter());
            }));
        });

//trigger resize to set initial value
        google.maps.event.trigger(window,'resize');

        //parte geolocalización

        // si el browser soporta geolocalización

        if(totalPaths.length> 4) {
            console.log(totalPaths[4]);
            console.log(totalPaths[5]);
            pos = {
                lat: parseFloat(totalPaths[4]),
                lng: parseFloat(totalPaths[5])
            };

            map.setCenter(pos);
        } else {

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(pos);
                }, function () {

                });
            }

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

</script>
<!-- cargamos .js markerclusterer -->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
<!--</script>-->
<!--<!-- cargamos .js de la api, le pasamos nuestra key y ejecutamos función que pintará nuestro mapa -->-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf3HlMS638SZdNMtrHTXzd1vUnq9XnKXQ&libraries=places&callback=myMap"></script>


</body>
</html>