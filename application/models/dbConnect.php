<?php

function getdb()
{
    return new PDO('mysql:host=localhost;dbname=proyectodaw;charset=utf8mb4', 'root', 'root');
}