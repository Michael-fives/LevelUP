<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Nuevo juego</title>
    <link rel="stylesheet" href="productos_usuario.css">
    <link rel="icon" href="./Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar-menu">
        <div class="superior-part">
            <img src= "./Images/LOGO.png" class="logo" alt="Level UP">
            <div class="user-part">
                <button class="logout-button">
                    <img src="./Images/logoutIcon.png" class="logout-icon">
                </button>
                <span class="username"><a href="./login.html">Iniciar sesión</a></span>
            </div>
            <div class="white-line"></div>
        </div>
        <div class="menu-part">
            <ul class="menu">
                <li class = "actual-li"><a class="actual" href="./productos_usuario.php">Inicio</a></li>
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#amigos">Amigos</a></li>
                <li><a href="./acercade.html">Acerca de nosotros</a></li>
                <li><a href="#carga-actual">Carga actual</a></li>
            </ul>
        </div>
        <div class="bottom-part">
            <h3>Nuestras redes:</h3>
            <ul class="social-links">
                <li><img src="./Images/instagramIcon.png"><a href="#">Icvelup</a></li>
                <li><img src="./Images/xIcon.png"><a href="#">Icvelupmx</a></li>
                <li><img src="./Images/facebookIcon.png"><a href="#">LevelUPmx</a></li>
            </ul>
        </div>
        <div class="terms_and_politics">
            <p>© 2025 LevelUP MX. Todos los derechos reservados.</p>
            <p><a href="#">Términos y condiciones</a> | <a href="#">Políticas de privacidad</a></p>
        </div>
    </div>
    <div class="main-content">
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