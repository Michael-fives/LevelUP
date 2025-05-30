<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Editar juegos</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="agregar.css">
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
                        <button class="logout-button" onclick="window.location.href='./logout.php'">
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
                <li><a href="./productos_usuario.php">Inicio</a></li>
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
        <?php
            // Verificar si hay un ID en el POST
            if (isset($_POST['id'])) {
                $product_id = $_POST['id'];

                // Conexión a la base de datos
                include 'conexion.php';

                // Obtener datos del producto
                $sql = "SELECT * FROM videojuegos WHERE id = '$product_id'";
                $result = mysqli_query($conexion, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    // Se obtienen los datos del producto para mostrarlos en el formulario
                    $title = $row['title'];
                    $genre = $row['genre'];
                    $price = $row['price'];
                    $descr = $row['descr'];
                    $rating = $row['rating'];
                    $img = $row['img'];
                    $release_date = $row['release_date'];
                } else {
                    // Si no se encuentra el producto, redirigir a la página de error o inicio
                    echo "Producto no encontrado.";
                    }
            }
        ?>
        <h1>Modificar juego</h1>
        <form method="POST" action="modificar_producto.php" name="signin-form">
        <!-- Campo oculto para enviar el ID del producto -->
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product_id); ?>">

        <label>Título</label>
        <input type="text" placeholder="LevelGame" id="title" name="title" required value="<?php echo htmlspecialchars($title); ?>">

        <label>Genero</label>
        <input type="text" placeholder="Soulslike" id="genre" name="genre" required value="<?php echo htmlspecialchars($genre); ?>">

        <label>Costo</label>
        <input type="number" placeholder="Moneyyy" id="price" name="price" required min="0" step="0.01" value="<?php echo htmlspecialchars($price); ?>">

        <label>Descripción</label>
        <input type="text" placeholder="This is a really good game" id="descr" name="descr" required value="<?php echo htmlspecialchars($descr); ?>">

        <label>Puntuación</label>
        <input type="number" placeholder="5 stars!" id="rating" name="rating" required min="0" max="5" step="0.01" value="<?php echo htmlspecialchars($rating); ?>">

        <label>Imagen</label>
        <input type="text" placeholder="URL" id="img" name="img" required value="<?php echo htmlspecialchars($img); ?>">

        <label>Fecha de lanzamiento</label>
        <input type="date" id="release_date" name="release_date" required value="<?php echo htmlspecialchars($release_date); ?>">
        
        <div class="modify-buttons">
            <button type="button" onclick="window.location.href='productos_admin.php'">Cancelar</button>
            <button type="submit" name="update" value="update">Actualizar juego</button>
        </div>
    </form>
    </div>
</body>
</html>