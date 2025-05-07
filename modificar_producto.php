<?php
    if (isset($_POST['update'])) {
        // Conexión a la base de datos
        include 'conexion.php';
        session_start();

        // Obtener los datos del formulario
        $product_id = $_POST['product_id'];
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $price = $_POST['price'];
        $descr = $_POST['descr'];
        $rating = $_POST['rating'];
        $img = $_POST['img'];
        $release_date = $_POST['release_date'];

        // Actualizar el producto en la base de datos
        $sql = "UPDATE videojuegos SET 
                title = '$title',
                genre = '$genre',
                price = '$price',
                descr = '$descr',
                rating = '$rating',
                img = '$img',
                release_date = '$release_date'
                WHERE id = '$product_id'";

        if (mysqli_query($conexion, $sql)) {
            // Redirigir al usuario a la página de productos
            header("Location: productos_admin.php?message=Producto actualizado con éxito");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            echo "Error al actualizar el producto: " . mysqli_error($conexion);
        }
    }
?>