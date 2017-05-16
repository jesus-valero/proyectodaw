/**
 * Created by juandaniel on 10/5/17.
 */

$(document).ready(function () {

    // MARK: Datepicker dosponibildiad inicial

    $(".crearTour").attr('disabled', 'disabled');

    // Obtenemos la fecha del datepicker
    $("#pre-datepicker-ini").bind('click', function () {
        $("#datepicker-ini").datepicker("show");
        $("#sin-limite-ini").prop('checked', false);
    });
    // Al cerrar el calendario, ponemos la fecha en su lugar


    $("#datepicker-ini").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onClose: function (selectedDate) {
            $("#lblFechaIni").text(selectedDate);
            $("#pre-datepicker-ini").attr('value', selectedDate);

        }
    });

    // Al seleccionar Sin limite, restablecemos el valor del calemdario
    $("#sin-limite-ini").bind('click', function () {
        $("#lblFechaIni").text("Seleccionar fecha");
        $("#pre-datepicker-ini").prop('checked', false);
    });

    // MARK: Datepicker disponibilidad fin

    // Obtenemos la fecha del datepicker
    $("#pre-datepicker-end").bind('click', function () {
        $("#datepicker-end").datepicker("show");
        $("#sin-limite-end").prop('checked', false);
    });
    //Al cerrar el calendario, ponemos la fecha en su lugar
    $("#datepicker-end").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "yy-mm-dd",
        onClose: function (selectedDate) {
            $("#lblFechaEnd").text(selectedDate);
            $("#pre-datepicker-end").attr('value', selectedDate);
        }
    });

    // Al seleccionar Sin limite, restablecemos el valor del calemdario
    $("#sin-limite-end").bind('click', function () {
        $("#lblFechaEnd").text("Seleccionar fecha");
        $("#pre-datepicker-end").attr('value', selectedDate);
        $("#pre-datepicker-end").prop('checked', false);
    });

    // MARK: - MAPS

    var date = new Date();
    var currentDate = date.getFullYear() + "-" + date.getMonth() + "-" + date.getDate() + " 00:00:00";
    $("#sin-limite-ini").attr('value', currentDate);
    $("#sin-limite-end").attr('value', "NULL");

    var currPos = {lat: 41.388845, lng: 2.175996};
    var markers = [];

    var myStyles = [
        {
            featureType: "poi.business",
            elementType: "labels",
            stylers: [
                {visibility: "off"}
            ]
        }
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        center: currPos,
        zoom: 14,
        mapTypeId: 'roadmap',
        disableDefaultUI: true,
        streetViewControl: false,
        styles: myStyles
    });

    var panorama = new google.maps.StreetViewPanorama(
        document.getElementById('mapCapture'),
        {
            position: currPos,
            pov: {heading: 165, pitch: 0},
            panControl: false,
            zoomControl: false,
            addressControl: false,
            motionTrackingControl: false,
            linksControl: false

        });

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var infoWindow = new google.maps.InfoWindow({map: map});
    // MARK: - Permiso de localizacion
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            currPos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
        }, function () {
            handleLocationError(true, infoWindow, map.getCenter());
            map.setCenter(currPos);

        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        map.setCenter(currPos);

    }

    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
    });

    google.maps.event.addListener(map, "rightclick", function (event) {
        clearMarkers();

        currPos = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng()
        };

        //
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
        //


        $("input[name='lat']").attr("value", event.latLng.lat());
        $("input[name='lng']").attr("value", event.latLng.lng());
        checkValidation();

        panorama = new google.maps.StreetViewPanorama(
            document.getElementById('mapCapture'),
            {
                position: currPos,
                pov: {heading: 165, pitch: 0},
                panControl: false,
                zoomControl: false,
                addressControl: false,
                motionTrackingControl: false,
                linksControl: false
            });

        markers.push(new google.maps.Marker({
            position: currPos,
            map: map,
            title: 'Hello World!'
        }));

    });

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        // Clear out the old markers.
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        panorama = new google.maps.StreetViewPanorama(
            document.getElementById('mapCapture'),
            {
                position: places[0].geometry.location,
                pov: {heading: 165, pitch: 0},
                panControl: false,
                zoomControl: false,
                addressControl: false,
                motionTrackingControl: false,
                linksControl: false

            });

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
    });

    function clearMarkers() {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }
    }

    // Check fields are complete!
    $("input[name='name'], textarea[name='description']").on('input', function () {
        if ($(this).length > 0) {
            checkValidation();
        }
    });

    $("#selectable").selectable({
        selected: function (event, ui) {
            $(".ui-selected", this).each(function () {
                $("input[name='category']").attr('value', $(this).attr('value'));
                checkValidation();
            });

        }
    });

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
    }

});