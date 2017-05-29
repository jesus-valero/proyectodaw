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
        <img src="<?php echo base_url() ?>img/profile.png">
        <h1><?php echo $_SESSION['username'] ?></h1>
        <p id="address">Addesss</p>
        <a href="<?php echo base_url() . "Profile/travels" ?>">Mis grupos</a>
        <a href="<?php echo base_url() . "Profile/tours" ?>">Mis tours</a>
        <a href="">Editar</a>
    </aside>
    <section id="section">
        {data}
        <a class="itemTour" href="<?php echo base_url() . "Tour/tourPreview" ?>/{pk}">
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

        var sizeResults = document.getElementsByClassName("itemTour");

        if (sizeResults.length == 0) {

            var root = $("<div style='display: flex; flex-direction: column'></div>");
            $("#section").append(root);


            var imagen = $("<div style='height: 35vh;width: 35vh;'></div>");
            imagen.css("background","url('<? echo base_url(); ?>img/airplane.png')");
            imagen.css("background-size","cover");

            var texto = $("<p style='text-align: center; font-size: 2vh; color: white'>Aún no te has unido a ningún viaje</p>");
            var boton = $("<a href='<? echo base_url(); ?>Tour' style='padding: 1vh; font-size: 2vh; color: white; background: rgb(59, 142, 186); width: 15vh;text-align:center; margin-left: auto; margin-right: auto;text-decoration: none'>Buscar</a>");

            root.append(imagen);
            root.append(texto);
            root.append(boton);
        }

    });

    $.getJSON("http://ip-api.com/json", function(data) {
        $("#address").text(data.city + ", " + data.regionName);
    });

    var imagenesTotales = document.getElementsByClassName("imgTour");

    for (var i = 0; i < imagenesTotales.length; i++) {
        imagenesTotales[i].style.background = "url('https://source.unsplash.com/category/nature/45" + i + "x450')";
    }
</script>