<?php
/**
 * Created by PhpStorm.
 * User: juandaniel
 * Date: 10/5/17
 * Time: 20:13
 */

function isUserLogged()
{
    if (isset($_SESSION['pk'])) {
        return true;
    } else {
        return false;
    }
}

function goHome()
{
    header('location: ' . base_url('Tour'));
}

function getUrl($controller)
{
    echo base_url() . "/" . $controller;
}

function getHeader()
{
    if (isset($_SESSION['pk'])) {
        return 'vHeaderLogged';
    } else {
        return 'vHeader';

    }
}

