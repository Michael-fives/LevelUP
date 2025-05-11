<?php
include 'conexion.php';
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Buscar el usuario
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = mysqli_query($conexion, $sql);

    // Eliminar si existe
    if (mysqli_num_rows($result) > 0) {
        if ($id == $_SESSION['id']) {
            header("Location: usuarios_admin.php?message=No puedes eliminar tu propio usuario");
            exit();
        }
        $delete_sql = "DELETE FROM usuarios WHERE id = '$id'";
        if (mysqli_query($conexion, $delete_sql)) {
            header("Location: usuarios_admin.php?message=Usuario eliminado con éxito");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . mysqli_error($conexion);
        }
    } else {
        echo "No se encontró el usuario con ID: $id";
    }
} else {
    echo "No se recibió el ID del usuario.";
}
?>