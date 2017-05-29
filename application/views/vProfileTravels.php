<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 17/5/17
 * Time: 16:03
 */

?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ProfileTravelsStyle.css"/>

<div id="profileContent">
    <aside>
        <img src="http://www.lorempixel.com/200/200">
        <h1><?php echo $_SESSION['username'] ?></h1>
        <p id="address">Addesss</p>
        <a href="<?php echo base_url()."Profile/travels" ?>">Mis viajes</a>
        <a href="<?php echo base_url()."Profile/tours" ?>">Mis tours</a>
        <a href="">Editar</a>
    </aside>
    <section id="section">
        {data}
        <a class="itemTrour" href="<?php echo base_url(). "Tour/tourEdit" ?>/{tur_PK}">
            <h1>{tur_name}</h1>
            <p>{tur_description}</p>
            <p>{tur_dt_ini}</p>
        </a>
        {/data}
    </section>
</div>

<script>

    $(document).ready(function () {
        var sizeResults = document.getElementsByClassName("itemTrour");

        if (sizeResults.length === 0) {

            var root = $("<div style='display: flex; flex-direction: column'></div>");
            $("#section").append(root);


            var imagen = $("<div style='height: 35vh;width: 35vh;'></div>");
            imagen.css("background","url('<? echo base_url(); ?>img/home.png')");
            imagen.css("background-size","cover");

            var texto = $("<p style='text-align: center; font-size: 2vh; color: white'>No has creado ningún evento</p>");
            var boton = $("<a href='<? echo base_url(); ?>Tour/create' style='padding: 1vh; font-size: 2vh; color: white; background: rgb(59, 142, 186); width: 15vh;text-align:center; margin-left: auto; margin-right: auto;text-decoration: none'>Añadir</a>");

            root.append(imagen);
            root.append(texto);
            root.append(boton);
        }


    });

$.get("http://ipinfo.io", function(response) {
    var address = response.city + ", " + response.region + ", " + response.country;
    $("#address").text(address);

}, "jsonp");
</script>