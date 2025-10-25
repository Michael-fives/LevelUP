<?php
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
    $stmt = mysqli_prepare($conexion, "DELETE FROM carrito WHERE id_user = ? AND id_videogame = ?");
    
    // Vincular los valores a los placeholders
    mysqli_stmt_bind_param($stmt, "ii", $id_user, $id_videogame);
    
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    
    // Verificar si la eliminación fue exitosa
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirigir al usuario a login.html
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?message=Producto eliminado del carrito con éxito");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
    
    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    header("Location: login.php?error=Debes iniciar sesión para eliminar productos del carrito");
    exit(); // Asegura que el script se detenga después de la redirección
}
?>