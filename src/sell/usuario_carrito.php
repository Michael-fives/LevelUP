<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Tu carrito</title>
    <link rel="stylesheet" href="../../styles/sidebar.css">
    <link rel="stylesheet" href="../../styles/carrito.css">
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
        <div class="content">
            <table>
                <tr>
                    <th>Tu carrito:</th>
                    <th>Videojuego</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <?php
                if (isset($_SESSION['username'])) {
                    $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
                    
                    // Obtener ID del usuario
                    $result = mysqli_query($conexion, "SELECT id FROM usuarios WHERE username = '$username'");
                    $row = mysqli_fetch_assoc($result);
                    $id_user = $row['id'];

                    // Obtener los videojuegos en el carrito del usuario
                    $query = mysqli_query($conexion, "SELECT id_videogame FROM carrito WHERE id_user = '$id_user'");

                    while ($row = mysqli_fetch_assoc($query)) {
                        $id_videogame = $row['id_videogame'];

                        // Obtener info del videojuego
                        $stmt = mysqli_prepare($conexion, "SELECT title, price, img FROM videojuegos WHERE id = ?");
                        mysqli_stmt_bind_param($stmt, "i", $id_videogame);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_bind_result($stmt, $title, $price, $img);
                        mysqli_stmt_fetch($stmt);

                        // Mostrar
                        echo "<tr>";
                        echo "<td><img src='../../img/Game/$img' class='product-image'></td>";
                        echo "<td>" . htmlspecialchars($title) . "</td>";
                        echo "<td>" . htmlspecialchars($price) . " USD" . "</td>";
                        echo "<td>";
                        echo "<form action='../functions/eliminar_carrito.php' method='POST'>";
                        echo "<input type='hidden' name='id' value='" . htmlspecialchars($id_videogame) . "'>";
                        echo "<button type='submit' class='remove-button'>X</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        mysqli_stmt_close($stmt);
                    }
                } else {
                    header("Location: ../login/login.php?error=Debes iniciar sesión para ver tu carrito");
                    exit();
                }
                ?>
            </table>
        </div>
        <div class="actions">
            <div class="pay-box">
                <h2>Total a pagar:</h2>
                <p id="total-price">
                    <?php
                    // Calcular el total
                    $total = 0;
                    $query = mysqli_query($conexion, "SELECT price FROM videojuegos WHERE id IN (SELECT id_videogame FROM carrito WHERE id_user = '$id_user')");
                    while ($row = mysqli_fetch_assoc($query)) {
                        $total += $row['price'];
                    }
                    echo "$" . number_format($total, 2);
                    ?> USD
                </p>
                <div class="pay-button-container">
                    <button class="pay-button" onclick="window.location.href='./pago.php'">Pagar</button>
                </div>
            </div>
            <button class="clean-button" onclick="window.location.href='../functions/vaciar_carrito.php'">Vaciar carrito</button>
            <button class="continue-button" onclick="window.location.href='../../productos_usuario.php'">Seguir comprando</button>
        </div>
    </div>
</body>
</html>