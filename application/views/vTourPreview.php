<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/ProfileToursStyle.css"/> -->
<style type="text/css">
    #profileContent {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        background: silver;
        padding-bottom: 38vh;
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

    h1 {
        margin: 0;
    }

    aside :nth-child(5), aside :nth-child(6) {
        margin-top: .5vh;
    }

    aside h1, aside p {
        color: white;
    }

    #tabs {
        margin-top: 10vh;
        padding: 0;
        margin-left: 2vh;
    }

    #tabs-1 {
        display: block;
        flex-wrap: wrap;
        align-items: flex-start;
        text-align: center;
        background: #333333;
        font-size: 18px;
        color: white;
        margin: .5vh;
    }

    #tabs-1 .tur_name {
        font-weight: bold;
        font-size: 32px;
        margin-top: 1vh;
    }

    #tabs-1 .tur_description {
        font-size: 22px;
        padding: 3vh;
        letter-spacing: 0.5px;
    }

    #tabs-1 .username {
        margin-bottom: 10px;
    }

    #tabs-1 .loc_place {
        margin-bottom: 10px;
        font-style: italic;
        margin-top: 1vh;
    }

    #tabs-1 .active_date {
        margin-bottom: 10px;
        font-weight: bold;
    }

    #messages {
        background: #333333;
    }

    .message {
        background: rgb(59, 142, 186);
        color: white;
        height: 15vh;
        box-sizing: border-box;

        margin-bottom: 2vh;
        margin-top: 2vh;
        display: flex;
        align-items: center;
        justify-content: space-around;

    }

    #tabs-2 form {
        height: 10vh;
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    #tabs-2 form textarea {
        width: 75vh;
        height: 100%;
        resize: none;
    }

    #tabs-2 form input {

        padding: 1vh;
    }

    #text {
        resize: none;
        height: 90%;
        width: 73%;

    }

    #user-info {
        width: 20%;
        height: inherit;

        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;
    }

    #user-info p {
        padding: 0;
        margin: 0;
    }

    #user-info img {
        height: 7vh;
        width: 7vh;
        border-radius: 50%;
    }

    /*
    TABS
    */

    #tabs {
        width: 50vw;
    }

    #tabs-2 {
        background: #333333;
        margin: 0.5vh;
    }

    .ui-tabs .ui-tabs-nav {
        display: flex;
    }

    .ui-tabs .ui-tabs-nav li {
        flex: 1;
        display: flex;
        /* If placed in a small width sidebar or something like that disabling nowrap will fix the overflow issue */
        white-space: normal;
    }

    .ui-tabs .ui-tabs-nav li a {
        flex: 1;
        /* If you want to align tab titles center */
        text-align: center;
    }

    #image {
        width: 50vh;
        height: 50vh;
        border-radius: 20px;
    }

    .loc_place ~ * {
        text-align: left;
    }

    .container {
        margin-top: 2vh;
        display: flex;
        justify-content: space-between;
    }

    .active_date {
        text-align: center;
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

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Información</a></li>
            <li><a href="#tabs-2">Chat</a></li>
        </ul>
        <div id="tabs-1">
            <div class="tur_name">{tur_name}</div>
            <div class="tur_description">{tur_description}</div>
            <img id="image"
                 src="https://maps.googleapis.com/maps/api/staticmap?center={loc_lat},{loc_lng}&zoom=14&size=400x400&key=AIzaSyBpBLlnU2tupzhrdh4uXNmHeZhSSkHk4k8">
            <div class="loc_place">{loc_place}</div>


            <div style="text-align: center" >Creado por: <span class="username">{username}</span></div>
            <div class="container">
                <div>
                    <div>Fecha y hora de inicio:</div>
                    <div class="active_date">{dt_ini}</div>
                </div>
                <div>
                    <div>Fecha y hora de finalización:</div>
                    <div class="active_date">{dt_end}</div>
                </div>
            </div>



        </div>
        <div id="tabs-2">
            <div id="messages">
                {messages}
                <div class="message">
                    <textarea id="text" disabled>{mes_message}</textarea>
                    <div id="user-info">
                        <img src="{usr_image}">

                        <p>{usr_name}</p>
                        <p>{mes_date}</p>
                    </div>
                </div>
                {/messages}
            </div>

            <form method="post" action="<? echo base_url() . "Tour/postNewMessage/" ?>{tur_PK}">
                <textarea name="message"></textarea>
                <input type="submit" value="Enviar">
                <input id="pk" name="pk" value="{tur_PK}" hidden>
            </form>

        </div>

    </div>


</div>

<script>
    $(function () {

        var pathname = window.location.pathname; // Returns path only
        var totalPaths = pathname.split("/");


        if (totalPaths[totalPaths.length - 1] == "chat") {
            $("#tabs").tabs({
                collapsible: false,
                active: 1

            })
        } else {
            $("#tabs").tabs({
                collapsible: false,
                active: 0

            })
        }
    });
</script>