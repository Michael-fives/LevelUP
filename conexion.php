<?php

$server = "localhost";
$database = "proyecto";
$user = "root";
$password = "1234";

$conexion = mysqli_connect($server, $user, $password, $database);

if ($conexion) {
    echo "Conexion exitosa";
} else {
    echo "No se pudo conectar";
}

?>