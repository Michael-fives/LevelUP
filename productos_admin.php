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
    <div class="container">
        <?php 
            include 'conexion.php';

            // Obtener los datos del formulario
            $sql = mysqli_query($conexion, "SELECT * FROM videojuegos");
        ?>
        <div class="table container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Genero</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Puntuación</th>
                        <th>Imagen</th>
                        <th>Fecha de lanzamiento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($sql)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["title"] . "</td>";
                            echo "<td>" . $row["genre"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td>" . $row["descr"] . "</td>";
                            echo "<td>" . $row["rating"] . "</td>";
                            echo "<td>" . $row["img"] . "</td>";
                            echo "<td>" . $row["release_date"] . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>