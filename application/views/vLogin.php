<div id="background">

</div>

<div class="left">
    <h1>No tienes una cuenta?</h1>

    <a href="<?php echo base_url('Register');?>">Registrar</a>

</div>

<div class="line"></div>

<form method="post" action="<?php echo base_url('Login/doLogin');?>">
    <h1>Iniciar sesión</h1>
    <label>Email:</label>
    <input type="text" name="email">
    <br/>
    <label>Contraseña:</label>
    <input type="password" name="password">
    <br/>
    <a href="#">Olvidaste la contraseña?</a>
    <br/>
    <br/>
    <input type="submit" value="Acceder">
</form>

<style>

    body {
        padding: 0;
        margin:0;

        display: flex;
        align-items: center;
        justify-content: center;


    }

    #background {
        left:0;
        height:100vh;
        width: 100vw;
        position: absolute;
        margin:0;
        padding:0;

        background: url("<?php echo base_url(); ?>img/back<?php echo mt_rand(1,2); ?>.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        z-index:-1;
        filter: blur(3px);
    }

    h1 {
        padding: 0;
        margin: 0;
    }


    .left {
        width: 45vh;
        height: 50vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .left a {
        text-decoration: none;
        color: white;
        margin-top: 3vh;
        background: rgb(59, 142, 186);
        border-radius: 10px;
        padding: 1.5vh;

    }

    .left h1 {
        color: white;
        font-size: 5vh;
    }

    .line {
        height: 50vh;
        width: 0.2vh;
        background: silver;
        margin-left: 10vh;
        margin-right: 10vh;
    }

    form {
        height: 50vh;
        width: 45vh;
        padding: 0;
        margin: 0;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form h1 {
        text-align: center;
        color: white;
        margin-bottom: 2vh;
    }

    form label {
        font-size: 2vh;
        color: white;
    }

    form input[type='text'],form input[type='password'] {
        font-size: 2vh;
        width: 50%;
    }

    form input[type='submit'] {
        font-size: 5vh;
    }

</style>