<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Inicio</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="inicio.css">
    <link rel="icon" href="./Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar-menu">
        <div class="superior-part">
            <img src="./Images/LOGO.png" class="logo" alt="Level UP">
            <div class="user-part">
                <?php 
                    session_start();
                    include 'conexion.php';

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
                            <button class="logout-button" onclick="window.location.href='./logout.php'">
                                <img src="./Images/logoutIcon.png" class="logout-icon">
                            </button>
                            <span class="username"><a href="#user">@<?php echo htmlspecialchars($row["username"]); ?></a></span>
                <?php
                        } else {
                            // Usuario es administrador
                ?>
                            <div class="admin-buttons">
                                <button class="admin-button" onclick="window.location.href='./admin_menu.php'">
                                    <img src="./Images/adminIcon.png" class="admin-icon">
                                </button>
                                <button class="logout-button" onclick="window.location.href='./logout.php'">
                                    <img src="./Images/logoutIcon.png" class="logout-icon">
                                </button>
                            </div>
                            <span class="username"><a href="#user">@<?php echo htmlspecialchars($row["username"]); ?></a></span>
                <?php
                        }
                    } else {
                        // Usuario no logueado
                ?>
                        <button class="logout-button" onclick="window.location.href='./logout.php'" disabled>
                            <img src="./Images/logoutIcon.png" class="logout-icon">
                        </button>
                        <span class="username"><a href="./login.php">Iniciar sesión</a></span>
                <?php
                    }
                ?>   
            </div>
            <div class="white-line"></div>
        </div>
        <div class="menu-part">
            <ul class="menu">
                <li class = "actual-li"><a class="actual" href="./productos_usuario.php">Inicio</a></li>
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#amigos">Amigos</a></li>
                <li><a href="./acercade.php">Acerca de nosotros</a></li>
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
        <div class="superior-bar">
            <div class="search-bar">
                <input type="text" placeholder="Buscar...">
            </div>
            <button class="filter-button" onclick="">
                <img src="./Images/filterIcon.png" class="filter-icon">
            </button>
            <form action="usuario_carrito.php" method="POST">
                <button class="cart-button">
                    <img src="./Images/cartIcon.png" class="cart-icon">
                </button>
            </form>
        </div>
        <div class="full-carousel">
            <div class="preview-left">
                <img src="./Images/switch2.jpeg" alt="Preview Image"> <!-- Imagen de vista previa durante la primer carga -->
            </div>
            <div class="carousel">
                <button id="prev" class="prev-button">&#10094;</button>
                <div class="carousel-item active" id="carousel-item">
                    <img src="./Images/consolas.png" alt="Carousel Image 1">
                    <p class="carousel-text">¡Compra videojuegos de todas las plataformas!</p>
                </div>
                <div class="carousel-item">
                    <img src="./Images/xboxp.jpeg" id="carousel-item" alt="Carousel Image 2">
                    <p class="carousel-text">¡Competencia portatil de Xbox!</p>
                </div>
                <div class="carousel-item">
                    <img src="./Images/switch2.jpeg" id="carousel-item" alt="Carousel Image 3">
                    <p class="carousel-text">¡Nueva Nintendo Switch 2!</p>
                </div>
                <button id="next" class="next-button">&#10095;</button>
                <script src="carrusel.js"></script>
            </div>
            <div class="preview-right">
                <img src="./Images/xboxp.jpeg" alt="Preview Image">
            </div>
        </div>
        <div class="container">
            <?php 
                include 'conexion.php';

                // Obtener los datos del formulario
                $sql = mysqli_query($conexion, "SELECT * FROM videojuegos");

                while ($row = mysqli_fetch_array($sql)) {
            ?>
                <div class="videogames">
                    <div class="card">
                        <div class="left-side">
                            <img src="./Game/<?php echo $row["img"]; ?>" alt="<?php echo $row["title"]; ?>">
                            <p class="release-date"><?php echo $row["release_date"]; ?></p>
                            <p class="genre"><?php echo $row["genre"]; ?></p>
                            <div class="bottom-left-side">
                                <h2><?php echo $row["title"]; ?></h2>
                            </div>
                        </div>
                        <div class="right-side">
                            <p class="description"><?php echo $row["descr"]; ?></p>
                            <div class="bottom-right-side">
                                <p class="price">$<?php echo $row["price"]; ?></p>
                                <p class="rating">Rating: <?php echo $row["rating"]; ?>/5</p>
                                <?php
                                // Verificar si el videojuego ya está en el carrito
                                if (isset($_SESSION['username'])) {
                                    $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
                                    $sql_user = mysqli_query($conexion, "SELECT id FROM usuarios WHERE username = '$username'");
                                    $row_user = mysqli_fetch_assoc($sql_user);
                                    $id_user = $row_user['id'];

                                    $sql_cart = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_user = '$id_user' AND id_videogame = '" . $row["id"] . "'");
                                    
                                    if (mysqli_num_rows($sql_cart) > 0) {
                                ?>
                                <form action="eliminar_carrito.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button class="disabled-button">Ya en el carrito</button>
                                </form>
                                <?php
                                    }
                                    else {
                                ?>
                                <form action="agregar_carrito.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button type="submit">Agregar al carrito</button>
                                </form>
                                <?php
                                    }
                                } else {
                                ?>
                                <form action="agregar_carrito.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                    <button type="submit">Agregar al carrito</button>
                                </form>
                                <?php
                                }
                                // Fin de la verificación
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>  
        </div>
    </div>
</body>
</html>