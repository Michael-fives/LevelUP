<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Editar usuarios</title>
    <link rel="stylesheet" href="../../styles/sidebar.css">
    <link rel="stylesheet" href="../../styles/agregar.css">
    <link rel="icon" href="../../img/Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
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
                                <button class="admin-button" onclick="window.location.href='./admin_menu.php'">
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
                        <button class="logout-button" onclick="window.location.href='../functions/logout.php'">
                            <img src="../../img/Images/logoutIcon.png" class="logout-icon">
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
                <li><a href="../../productos_usuario.php">Inicio</a></li>
                <li><a href="#perfil">Perfil</a></li>
                <li><a href="#amigos">Amigos</a></li>
                <li><a href="../page/acercade.php">Acerca de nosotros</a></li>
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
        <?php
            // Verificar si hay un ID en el POST
            if (isset($_POST['id'])) {
                $user_id = $_POST['id'];

                // Conexión a la base de datos
                include '../functions/conexion.php';

                // Obtener datos del producto
                $sql = "SELECT * FROM usuarios WHERE id = '$user_id'";
                $result = mysqli_query($conexion, $sql);

                if ($row = mysqli_fetch_assoc($result)) {
                    // Se obtienen los datos del producto para mostrarlos en el formulario
                    $username = $row['username'];
                    $mail = $row['mail'];
                    $phone = $row['phone'];
                    $level = $row['level_'];
                    $admin = $row['admin_'];
                } else {
                    // Si no se encuentra el producto, redirigir a la página de error o inicio
                    echo "Producto no encontrado.";
                    }
            }
        ?>
        <h1>Modificar usuario</h1>
        <form method="POST" action="../functions/modificar_usuario.php" name="signin-form">
        <!-- Campo oculto para enviar el ID del producto -->
        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">

        <label>Username</label>
        <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($username); ?>">

        <label>Correo</label>
        <input type="email" id="mail" name="mail" required value="<?php echo htmlspecialchars($mail); ?>">

        <label>Télefono</label>
        <input type="tel" id="phone" name="phone" required value="<?php echo htmlspecialchars($phone); ?>">

        <label>Nivel</label>
        <input type="number" id="level" name="level" step="1" required value="<?php echo htmlspecialchars($level); ?>">

        <label>Permisos de administrador</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="admin" value="1" <?php echo ($admin == 1) ? 'checked' : ''; ?> required> Sí
            </label>
            <label>
                <input type="radio" name="admin" value="0" <?php echo ($admin == 0) ? 'checked' : ''; ?> required> No
            </label>
        </div>
        
        <div class="modify-buttons">
            <button type="button" onclick="window.location.href='usuarios_admin.php'">Cancelar</button>
            <button type="submit" name="update" value="update">Actualizar usuario</button>
        </div>
    </form>
    </div>
</body>
</html>