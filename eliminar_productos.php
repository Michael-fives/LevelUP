<?php
include 'conexion.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Buscar el producto
    $sql = "SELECT * FROM videojuegos WHERE id = '$id'";
    $result = mysqli_query($conexion, $sql);

    // Eliminar si existe
    if (mysqli_num_rows($result) > 0) {
        $delete_sql = "DELETE FROM videojuegos WHERE id = '$id'";
        if (mysqli_query($conexion, $delete_sql)) {
            header("Location: productos_admin.php?message=Producto eliminado con éxito");
            exit();
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($conexion);
        }
    } else {
        echo "No se encontró el producto con ID: $id";
    }
} else {
    echo "No se recibió el ID del producto.";
}
?>