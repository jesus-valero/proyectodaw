<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 27/5/17
 * Time: 17:26
 */


?>

<p id="title">BIENVENIDO A TOUR!</p>

<div class="present">

    <a id="tdp" href="<?php echo base_url(); ?>Tour/index/43.722890/10.396449">
        <div></div>
    </a>
    <a id="te" href="<?php echo base_url(); ?>Tour/index/48.858327/2.294469">
        <div></div>
    </a>
    <a id="sf" href="<?php echo base_url(); ?>Tour/index/41.403638/2.174077">
        <div></div>
    </a>
    <a id="cr" href="<?php echo base_url(); ?>Tour/index/-22.952015/-43.210734">
        <div></div>
    </a>
    <a id="ls" href="<?php echo base_url(); ?>Tour/index/40.690169/-74.045900">
        <div></div>
    </a>
</div>


<div class="center">

    <div class="left">
        <div class="pin-image"></div>
    </div>
    <div class="right">
        <h1>Descubre nuevos destinos y apuntate a aventuras increíbles</h1>
        <p>Ámsterdam, Barcelona, Los Ángeles o Venecia... son solo algunos de los maravillosos destinos que podrían
            interesar visitar. Descubre ahora la oferta de viajes que hay alrededor del mundo. Se anfitrión o huésped de
            un destino turístico. Las reglas las pones tú.</p>
        <a href="<?php echo base_url(); ?>/Tour">Explorar</a>
    </div>
</div>
<div class="comments">
    <div class="box">
        <img src="<?php echo base_url() ?>img/user1.png">
        <div class="stars">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
        </div>

        <h4 class="author">Manuel</h4>
        <p class="description">Gracias a XXX organizo quedadas con gente de otros paises y les enseno mi ciudad.</p>
        <p class="from">Italia</p>
    </div>
    <div class="box">
        <img src="<?php echo base_url() ?>img/user2.png">
        <div class="stars">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
        </div>

        <h4 class="author">Manuel</h4>
        <p class="description">Gracias a XXX organizo quedadas con gente de otros paises y les enseno mi ciudad.</p>
        <p class="from">Italia</p>
    </div>

    <div class="box">
        <img src="<?php echo base_url() ?>img/user3.png">
        <div class="stars">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
            <img src="<?php echo base_url(); ?>img/star.png">
        </div>

        <h4 class="author">Manuel</h4>
        <p class="description">Gracias a XXX organizo quedadas con gente de otros paises y les enseno mi ciudad.</p>
        <p class="from">Italia</p>
    </div>

</div>
<style>

    body {
        margin: 0;
        padding: 0;
        width: 100vw !important;
        overflow-y: hidden;
    }

    #title {
        position: absolute;
        font-size: 20vh;
        color: #ffffff;
        width: 100%;
        margin-top: 75vh;
        z-index: 99;
        text-align: center;
        opacity: 0;
        transition: all 3s;
    }

    .present {
        display: flex;
        height: 95vh;
        width: inherit;
    }

    #tdp div {
        background: url("<?php echo base_url();?>img/torreDePisa.png");
    }

    #te > div {
        background: url("<?php echo base_url();?>img/torreEiffel.png");
    }

    #sf > div {
        background: url("<?php echo base_url();?>img/sagradaFamilia.png");
    }

    #cr > div {
        background: url("<?php echo base_url();?>img/cristoRedentor.png");
    }

    #ls div {
        background: url("<?php echo base_url();?>img/libertyStatue.png");
    }

    .present > a {
        overflow: hidden;
    }

    .present > a > div:hover {
        transform: scale(1.5);
    }

    .present > a > div {
        width: 20vw;
        height: 95vh;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        background-position: center !important;
        transition: all 15s;
    }

    .center {
        display: flex;
        height: 50vh;
        width: 100vw;
    }

    .left {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50vw;
    }

    .right {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 50vw;
    }

    .right h1 {
        color: rgb(59, 142, 186);

    }

    .right p {
        text-align: center;
        font-size: 2vh;
        padding: 7vh;
    }

    .right a {
        text-decoration: none;
        padding: 2vh;
        color: white;
        border-radius: 20%;
        background: linear-gradient(rgb(59, 142, 186),#ffffff);
        border: 1px solid rgb(59, 142, 186);

    }

    .pin-image {
        width: 50%;
        height: 50%;
        background: url("<?php echo base_url(); ?>/img/ubicacion.png");
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        transition: all .4s;
    }

    .pin-image:hover {
        transform: scale(1.2);
    }

    .comments {
        display: flex;
        align-items: center;
        justify-content: space-around;
        height: 50vh;
        width: 100vw;
        background: rgb(59, 142, 186);

    }

    .box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
        width: 13vw;
        height: 33vh;
        padding-top: 2vh;
        border-radius: 05%;
        border: 1px solid silver;
        background: rgba(255,255,255,0.3);
    }

    .box > img {
        width: 15vh;
        height: 15vh;
        border-radius: 50%;
        padding-bottom: 1vh;
    }

    .stars img {
        height: 3.5vh;
        width: 3.5vh;
    }

    .author, .description {
        padding: 0;
        margin: 0;
    }

    .description {
        text-align: center;
        padding: 2vh;
    }

    .from {
        font-style: italic;
    }

</style>


<script>
    $(document).ready(function () {
        $("#title").css('transform', 'translateY(-45vh)');
        $("#title").css('opacity', '1');
    });

</script>
