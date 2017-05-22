<?php

/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 17/5/17
 * Time: 19:00
 */
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ProfileToursStyle.css"/>

<div id="profileContent">
    <aside>
        <img src="www.lorempixel.com/200/200">
        <h1>Juan Daniel Quispe</h1>
        <p id="address">Addesss</p>
        <a href="<?php echo base_url()."Profile/travels" ?>">Mis viajes</a>
        <a href="<?php echo base_url()."Profile/tours" ?>">Mis tours</a>
        <a href="">Editar</a>
    </aside>
    <section>
        {data}
        <a class="itemTour" href="#">
            <div class="imgTour"></div>
            <h1>{city}</h1>
            <p>{tur_name}</p>
            <p>Creado por: {owner}</p>
        </a>
        {/data}
    </section>
</div>

<script>

    $(document).ready(function () {


    });

    // Imagenes: https://source.unsplash.com
//    $.get("ipinfo.io/json", function(response) {
//        console.log(response.city + ", " + response.region);
//        var address = response.city + ", " + response.region + ", " + response.country;
//        $("#address").text(address);
//
//    }, "jsonp");

    $.get("https://ipinfo.io", function(response) {
        console.log(response.ip, response.country);
    }, "jsonp");


    var imagenesTotales = document.getElementsByClassName("imgTour");

    for(var i = 0; i < imagenesTotales.length; i++) {
        imagenesTotales[i].style.background = "url('https://source.unsplash.com/category/nature/45"+i+"x450')";
    }
</script>