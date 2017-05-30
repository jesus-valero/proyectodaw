<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 19:47
 */
?>

<html>
<head>
    <!--    Extern CSS and JS   -->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>css/jquery-ui-1.9.2.custom.min.css"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js"></script>
    <!--    Web JS/CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/HeaderStyle.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/FooterStyle.css"/>

</head>

<body>
<header>
    <a href="<?php echo base_url(); ?>/">BeMates</a>
    <div class="submenu">
        <a href="<?php echo base_url('Tour'); ?>">Explorar</a>
        <a href="<?php echo base_url('Tour/create'); ?>">Crear actividad</a>
        <a href="<?php echo base_url('Profile/travels'); ?>">Perfil</a>
        <a href="<?php echo base_url('Login/closeSession'); ?>">Cerrar sesión</a>
        <p style="color: white; padding: 0; margin: 0; align-self: center" >Bienvenido <?php echo $_SESSION['username'] ?></p>
    </div>
</header>

<style>
    .submenu {
        margin-left: auto;
        margin-right: 10vh;
        display: flex;
        justify-content: space-between;
        width: 75vw;
    }


    .submenu > a {
        text-decoration: none;
        color: white;
        padding: .75vh;
        border: 2px solid rgb(59, 142, 186);
        border-radius: 5px;

    }
</style>

</body>
</html>


