<?php
/*
Tabla videojuegos:
+----------------+--------------+------+-----+-------------------+-----------------------------+
MariaDB [proyecto]> CREATE TABLE videojuegos (
    -> id INT AUTO_INCREMENT PRIMARY KEY,
    -> title VARCHAR(60) NOT NULL UNIQUE,
    -> genre VARCHAR(30) NOT NULL,
    -> price DECIMAL(10,2) NOT NULL CHECK (price >= 0),
    -> descr VARCHAR(700) NOT NULL,
    -> rating DECIMAL(3,2) NOT NULL CHECK (rating BETWEEN 1 AND 5),
    -> img VARCHAR(150) NOT NULL,
    -> release_date DATE NOT NULL
    -> );
*/
include 'conexion.php';
session_start();

// Obtener los datos del formulario
$title = $_POST["title"];
$genre = $_POST["genre"];
$price = $_POST["price"];
$descr = $_POST["descr"];
$rating = $_POST["rating"];
$img = $_POST["img"];
$release_date = $_POST["release_date"];

// Preparar la consulta SQL
$username = $_SESSION['username'];
mysqli_query($conexion, "SET @username = '$username'");
$stmt = mysqli_prepare($conexion, "INSERT INTO videojuegos (title, genre, price, descr, rating, img, release_date) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?)");

// Vincular los valores a los placeholders
mysqli_stmt_bind_param($stmt, "ssdsdss", $title, $genre, $price, $descr, $rating, $img, $release_date);

// Ejecutar la consulta
mysqli_stmt_execute($stmt);

// Verificar si la inserción fue exitosa
if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Redirigir al usuario a login.html
    echo "Registro exitoso";
    header("Location: agregar_juegos.php?message=Producto añadido con éxito");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error: " . mysqli_error($conexion);
}

// Cerrar la consulta preparada
mysqli_stmt_close($stmt);
?>