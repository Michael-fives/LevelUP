<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Acerca de nosotros</title>
    <link rel="stylesheet" href="../../styles/sidebar.css">
    <link rel="stylesheet" href="../../styles/acercade.css">
    <link rel="icon" href="../../img/Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <div class="sidebar-menu">
        <div class="superior-part">
            <img src="../../img/Images/LOGO.png" class="logo" alt="Level UP">
            <div class="user-part">
            <?php 
                    session_start();
                    include '../functions/conexion.php';

                    if (isset($_SESSION['username'])) {
                        // Usuario logueado
                        $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
                        $sql = mysqli_query($conexion, "SELECT username FROM usuarios WHERE username = '$username'");
                        $row = mysqli_fetch_assoc($sql);
                        
                        $result = mysqli_query($conexion, "SELECT admin_ FROM usuarios WHERE username = '$username'");
                        $admin_row = mysqli_fetch_assoc($result); 
                        $admin_status = $admin_row['admin_'];

                        if ($admin_status == 0) {
                            // Usuario no es administrador
                        
                ?>
                            <button class="logout-button" onclick="window.location.href='../functions/logout.php'">
                                <img src="../../img/Images/logoutIcon.png" class="logout-icon">
                            </button>
                            <span class="username"><a href="#user">@<?php echo htmlspecialchars($row["username"]); ?></a></span>
                <?php
                        } else {
                            // Usuario es administrador
                ?>
                            <div class="admin-buttons">
                                <button class="admin-button" onclick="window.location.href='../admin/admin_menu.php'">
                                    <img src="../../img/Images/adminIcon.png" class="admin-icon">
                                </button>
                                <button class="logout-button" onclick="window.location.href='../functions/logout.php'">
                                    <img src="../../img/Images/logoutIcon.png" class="logout-icon">
                                </button>
                            </div>
                            <span class="username"><a href="#user">@<?php echo htmlspecialchars($row["username"]); ?></a></span>
                <?php
                        }
                    } else {
                        // Usuario no logueado
                ?>
                        <button class="logout-button" onclick="window.location.href='../functions/logout.php'" disabled>
                            <img src="../../img/Images/logoutIcon.png" class="logout-icon">
                        </button>
                        <span class="username"><a href="../login/login.php">Iniciar sesión</a></span>
                <?php
                    }
                ?>   
            </div>
            <div class="white-line"></div>
        </div>
        <div class="menu-part">
            <ul class="menu">
                <li><a href="../../productos_usuario.php">Inicio</a></li>
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#amigos">Amigos</a></li>
                <li class="actual-li"><a href="./acercade.php" class="actual">Acerca de nosotros</a></li>
                <li><a href="#carga-actual">Carga actual</a></li>
            </ul>
        </div>
        <div class="bottom-part">
            <h3>Nuestras redes:</h3>
            <ul class="social-links">
                <li><img src="../../img/Images/instagramIcon.png"><a href="#">Icvelup</a></li>
                <li><img src="../../img/Images/xIcon.png"><a href="#">Icvelupmx</a></li>
                <li><img src="../../img/Images/facebookIcon.png"><a href="#">LevelUPmx</a></li>
            </ul>
        </div>
        <div class="terms_and_politics">
            <p>© 2025 LevelUP MX. Todos los derechos reservados.</p>
            <p><a href="#">Términos y condiciones</a> | <a href="#">Políticas de privacidad</a></p>
        </div>
    </div>
    <div class="main-content">
        <div class="mission">
            <h1>Misión</h1>
            <p>En LevelUP MX nuestra misión es <strong>proporcionar a los jugadores de México una plataforma segura, confiable y legal para la compra de videojuegos digitales.</strong> Nos comprometemos a ofrecer productos 100% originales, garantizando autenticidad y cumplimiento con las normativas oficiales del país.
                Buscamos transformar la experiencia de compra de videojuegos en línea mediante métodos de pago seguros y un servicio al cliente excepcional. </p>
            <p>Creemos en la importancia de construir una comunidad gamer basada en la confianza, ofreciendo precios justos, soporte accesible y contenido actualizado sobre la industria.
                En LevelUP MX, jugar con <strong>seguridad</strong> y <strong>legalidad</strong> no es solo una opción, es <strong>nuestra prioridad.</strong> 🚀🎮</p>
        </div>
        <div class="vision-ubication">
            <div class="vision">
                <h1>Visión</h1>
                <p>LevelUP MX es una tienda en línea dedicada a la venta de videojuegos digitales, <strong>asegurando autenticidad, precios competitivos y métodos de pago seguros.</strong> Nuestro objetivo es ofrecer a los jugadores mexicanos una plataforma confiable donde puedan comprar sus títulos favoritos con garantía de legalidad y soporte local.</p>
            </div>
            <div class="ubication">
                <h1><img src="../../img/Images/locationIcon.png" class="location">Ubicación</h1>
                <img src="../../img/Images/map.png" class="map">
                <p>C. Nueva Escocia 1885, Providencia 5a Secc., 44638 Guadalajara, Jal.</p>
            </div>
        </div>
    </div>
</body>
</html>