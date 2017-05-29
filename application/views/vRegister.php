<!DOCTYPE html>
<html>
<head>
    <title>Tour Register</title>
</head>
<body>

<div id="background">

</div>

<form method="post" action="<?php echo base_url('Register/check');?>">

    <label>Usuario:</label>
    <input type="text" name="username">
    <label>Email:</label>
    <input type="text" name="email">
    <br/>
    <label>Contraseña</label>
    <input type="password" name="password">
    <br/>
    <label>Repite la contraseña</label>
    <input type="password" name="repassword"/>
    <br/>
    <input type="submit" value="Registrarse">

</form>

</body>
</html>

<style>

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        padding:0;
        margin:0;
        height:100vh;
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
        opacity: 0.6;
    }
    form {
        height: 50vh;
        width: 45vh;

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
        color: gold;
    }

    form input[type='text'],form input[type='password'] {
        font-size: 2vh;
        width: 50%;
    }

    form input[type='submit'] {
        font-size: 5vh;
        width: 10vh;
    }

</style>