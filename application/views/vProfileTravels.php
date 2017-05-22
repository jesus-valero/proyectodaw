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
        <img src="www.lorempixel.com/200/200">
        <h1>Juan Daniel Quispe</h1>
        <p id="address">Addesss</p>
        <a href="<?php echo base_url()."Profile/travels" ?>">Mis viajes</a>
        <a href="<?php echo base_url()."Profile/tours" ?>">Mis tours</a>
        <a href="">Editar</a>
    </aside>
    <section>
        {data}
        <a class="itemTrour" href="#">
            <h1>{tur_name}</h1>
            <p>{tur_description}</p>
            <p>{tur_dt_ini}</p>
        </a>
        {/data}
    </section>
</div>

<script>

$.get("http://ipinfo.io", function(response) {
    var address = response.city + ", " + response.region + ", " + response.country;
    $("#address").text(address);

}, "jsonp");
</script>