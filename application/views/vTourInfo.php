<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 22/5/17
 * Time: 19:05
 */

?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/TourInfoStyle.css"/>

<section>

    <img src="{background}">
    <div id="content">
        <div id="card">
            <h1>{tur_name}</h1>
            <p id="address">{city}</p>
            <p id="description">{tur_description}</p>

            <?php

            $link = $_SERVER['PHP_SELF'];
            $link_array = explode('/', $link);
            //            echo $_SESSION['pk'];
            //            echo end($link_array);

            $pdo = new PDO('mysql:host=localhost;dbname=proyectodaw;charset=utf8mb4', 'root', 'root');

            $stmt = $pdo->prepare("SELECT count(*) as ene FROM tours WHERE tur_pk = :turPK and tur_FK_usr_PK = :usrPK");
            $stmt->bindValue('turPK', end($link_array));
            $stmt->bindValue('usrPK', $_SESSION['pk']);
            $stmt->execute();
            $result = $stmt->fetchAll();

            // Es tuyo! hide
            if (intval($result[0]['ene']) == 1) {
                echo "<a id='join' href='" . base_url() . "/Tour/tourAdd/" . "{pk}' style='display:none'>Unirse</a>";
            } else {
                // Comprobar si ya te has apuntado o no
                $pdo = new PDO('mysql:host=localhost;dbname=proyectodaw;charset=utf8mb4', 'root', 'root');
                $stmt = $pdo->prepare("SELECT count(*) as ene FROM users_tours where ust_FK_tur_PK = :turPK and ust_FK_usr_PK = :usrPK");
                $stmt->bindValue(':turPK', end($link_array));
                $stmt->bindValue(':usrPK', $_SESSION['pk']);
                $stmt->execute();
                $max = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if (intval($max[0]['ene']) == 0) {
                    echo "<a id='join' href='" . base_url() . "/Tour/tourAdd/" . "{pk}'>Unirse</a>";
                } else {
                    echo "<a id='leave' href='" . base_url() . "/Tour/tourRemove/" . "{pk}'>Abandonar</a>";
                }

            }

            ?>

            <p style="text-align: center; font-style: italic">{people}</p>
            <div id="fecha">
                <p>{dt_ini}</p>
                <p>{dt_end}</p>
            </div>
        </div>

        <p id="lat" hidden>{loc_lat}</p>
        <p id="lng" hidden>{loc_lng}</p>
    </div>

</section>


<script>
    $(document).ready(function () {

        var lat = $("#lat").text();
        var lng = $("#lng").text();

        $("#content").click(function(){
            $(this).children(".children").toggle();
            window.location.replace("http://[::1]/proyectodaw/Tour/index/"+lat+"/"+lng);

        });
        $("#content div").click(function(e) {
            e.stopPropagation();
        });
    });
</script>