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

</head>

<body>
<header>
    <a href="<?php echo base_url('Home'); ?>">Home</a>
    <a href="<?php echo base_url('Tour/search'); ?>">Buscar tour</a>
    <a href="<?php echo base_url('Tour/create'); ?>">Crear tour</a>
    <a href="<?php echo base_url('Login/closeSession'); ?>">Cerrar Sesión</a>
</header>

</body>
</html>


