<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Nuevo juego</title>
    <link rel="icon" href="./Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Productos Usuario</h1>

    <div>
        <div class="container">
            <?php 
                include 'conexion.php';

                // Obtener los datos del formulario
                $sql = mysqli_query($conexion, "SELECT * FROM videojuegos");

                while ($row = mysqli_fetch_array($sql)) {
            ?>
                <div class="videogames">
                    <div class="card">
                        <img src="<?php echo $row["img"]; ?>" alt="<?php echo $row["title"]; ?>">
                        <h2><?php echo $row["title"]; ?></h2>
                        <p><?php echo $row["descr"]; ?></p>
                        <p><?php echo $row["price"]; ?></p>
                        <p><?php echo $row["rating"]; ?></p>
                        <p><?php echo $row["release_date"]; ?></p>
                        <button type="submit">Agregar carrito</button>
                    </div>
                </div>
            <?php
                }
            ?>  
        </div>
    </div>
</body>
</html>