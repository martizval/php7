<?php
/*Usé XAMPP, le puse clave al usuario root*/
/*nombre del host*/
$host="localhost";
/*nombre del usuario de phpmyadmin*/
$user="root";
/*clave del phpmyadmin*/
$pw="root";
/*Nombre de la base de datos*/
$bd="prueba";

$conexion = new mysqli($host, $user, $pw, $bd);
