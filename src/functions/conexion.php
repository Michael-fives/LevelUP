<?php

$server = "localhost";
$database = "levelup";
$user = "root";
$password = "";

$conexion = mysqli_connect($server, $user, $password, $database);

if ($conexion) {
    null;
} else {
    echo "No se pudo conectar";
}
/* Tabla de la bitácora
+----------------+--------------+------+-----+-------------------+-----------------------------+
MariaDB [proyecto]> CREATE TABLE bitacora (
    -> id INT AUTO_INCREMENT PRIMARY KEY,
    -> username VARCHAR(40) NOT NULL,
    -> tb_affected VARCHAR(20) NOT NULL,
    -> sentence_sql VARCHAR(700) NOT NULL,
    -> counter_sentence VARCHAR(700) NOT NULL,
    -> time_ DATETIME DEFAULT CURRENT_TIMESTAMP
    -> )
*/
?>