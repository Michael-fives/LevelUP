<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Ad_productos</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="vistas_admin.css">
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
                            <th>Acciones</th>
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
                                echo "<td>";
                                // Formulario para editar el producto
                                echo "<form method='POST' action='modificar_productos.php'>";
                                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                                echo "<button>Editar</button></form>";
                                // Formulario para eliminar el producto
                                echo "<form method='POST' action='eliminar_productos.php'>";
                                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                                echo "<button>Eliminar</button></form>";

                                echo "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>