<?php
/*
Tabla carrito:
+----------------+--------------+------+-----+-------------------+-----------------------------+
MariaDB [proyecto]> CREATE TABLE carrito (
    -> id_user INT NOT NULL,
    -> id_videogame INT NOT NULL,
    -> PRIMARY KEY (id_user, id_videogame),
    -> FOREIGN KEY (id_user) REFERENCES usuarios(id) ON DELETE CASCADE,
    -> FOREIGN KEY (id_videogame) REFERENCES videojuegos(id) ON DELETE CASCADE
    -> );
*/
include 'conexion.php';

// Obtener datos del formulario
$id_videogame = $_POST["id"];
// Obtener la id del usuario desde la sesión
session_start();
if (isset($_SESSION['username'])) {
    $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
    $sql = mysqli_query($conexion, "SELECT id FROM usuarios WHERE username = '$username'");
    $row = mysqli_fetch_assoc($sql);
    $id_user = $row['id'];

    // Preparar la consulta SQL
    $stmt = mysqli_prepare($conexion, "INSERT INTO carrito (id_user, id_videogame) VALUES (?, ?)");
    
    // Vincular los valores a los placeholders
    mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_videogame);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Verificar si la inserción fue exitosa
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirigir al usuario a login.html
        header("Location: productos_usuario.php?message=Producto añadido al carrito con éxito");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
    
    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    header("Location: login.php?error=Debes iniciar sesión para agregar productos al carrito");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>