<?php

$server = "localhost";
$database = "proyecto";
$user = "root";
$password = "1234";

$conexion = mysqli_connect($server, $user, $password, $database);

if ($conexion) {
    null;
} else {
    echo "No se pudo conectar";
}

?>