<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ProfileToursStyle.css"/> -->
<style type="text/css">
    #profileContent {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        background: silver;
        height: 95vh;
    }

    aside {
        display: flex;
        flex-direction: column;
        height: 60vh;
        width: 20vw;
        background: #333333;
        margin-top: 10vh;
        align-items: center;
    }

    aside img {
        border: 1vh solid rgb(59, 142, 186);
        background: silver;
        border-radius: 50%;
        height: 20vh;
        margin-top: 2vh;
        margin-bottom: 3vh;
    }

    aside a {
        width: 100%;
        background: silver;
        font-size: 2vh;
        text-align: center;
        padding-top: 1vh;
        padding-bottom: 1vh;
        text-decoration: none;
        color: #333333;
    }

    aside > a:hover {
        background: rgb(59, 142, 186);
        color: white;

    }

    aside h1, aside p {
        color: white;
    }

    h1 {
        margin: 0;
    }

    aside :nth-child(5), aside :nth-child(6) {
        margin-top: .5vh;
    }

    section {
        display: block;
        flex-wrap: wrap;
        align-items: flex-start;
        text-align: center;
        margin-top: 10vh;
        width: 50vw;
        background: #333333;
        margin-left: 2vh;
        overflow-y: scroll;
        padding: 2vh;
        font-size: 18px;
    }

    section * {
        text-align: left;
        color: white;
    }

    .tur_name, .tur_description,.active_date {
        color: black;
        font-size: 2vh;
    }

    .left, .right {
        display: flex;
        justify-content: space-between;
    }

    .left>:nth-child(2), .right>:nth-child(2) {
        width: 25vh;
        margin-right: 5vh;
    }

    .label + div {
        color: white;
    }

    input[type='submit'] {
        margin-top: 5vh;
        font-size: 2vh;
        color: black;
        margin-left: auto;
        margin-right: auto;

        display: block;
    }

</style>

<div id="profileContent">
    <aside>
        <img src="<?php echo base_url() ?>img/profile.png">
        <h1><?php echo $_SESSION['username'] ?></h1>
        <p id="address">Addesss</p>
        <a href="<?php echo base_url() . "Profile/travels" ?>">Mis grupos</a>
        <a href="<?php echo base_url() . "Profile/tours" ?>">Mis tours</a>
        <a href="">Editar</a>
    </aside>
    <section>
        <form action="<?php echo base_url(); ?>Tour/newDataTour" method="post">
            <h3 class="label">Nombre del tour:</h3>
            <input class="data tur_name" type="text" name="tur_name" value="{tur_name}"><br>
            <h3 class="label">Descripción:</h3>
            <textarea class="data tur_description" type="text" name="tur_description" value="{tur_description}" rows="5"
                      cols="40"></textarea>

            <div class="left">
                <div>
                    <h3 class="label">Fecha y hora de inicio actual:</h3>
                    <div class="data active_date">{dt_ini}</div>
                </div>
                <div>
                    <h3 class="label">Nueva fecha y hora de inicio:</h3>
                    <input class="data active_date" type="datetime-local" name="dt_ini" value="{dt_ini}"><br>
                </div>

            </div>

            <div class="right">
                <div>
                    <h3 class="label">Fecha y hora de finalización actual:</h3>
                    <div class="data active_date">{dt_end}</div>
                </div>
                <div>
                    <h3 class="label">Nueva fecha y hora de finalización:</h3>
                    <input class="data active_date" type="datetime-local" name="dt_end" value="{dt_end}"><br>
                </div>
            </div>

            <input type="hidden" name="pk" value="{pk}">
            <input class="data" type="submit" name="">
        </form>

    </section>
</div>

<script>

    $.getJSON("http://ip-api.com/json", function(data) {
        $("#address").text(data.city + ", " + data.regionName);
    });

</script>