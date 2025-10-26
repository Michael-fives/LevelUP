<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Pago</title>
    <link rel="stylesheet" href="../../styles/sidebar.css">
    <link rel="stylesheet" href="../../styles/ticket.css">
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
        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require __DIR__ . '/PHPMailer/src/Exception.php';
        require __DIR__ . '/PHPMailer/src/PHPMailer.php';
        require __DIR__ . '/PHPMailer/src/SMTP.php';

        include '../functions/conexion.php';

        $username = mysqli_real_escape_string($conexion, $_SESSION['username']);

        // Obtener datos del usuario (id y correo)
        $user_query = mysqli_query($conexion, "SELECT id, mail FROM usuarios WHERE username = '$username'");
        $user_data = mysqli_fetch_assoc($user_query);
        $user_id = $user_data['id'];
        $user_email = $user_data['mail'];

        // Obtener la fecha actual
        $current_date = date("d/m/Y");

        // Inicializar total y contenedor de productos
        $total_price = 0;
        $items_html = "";

        // Obtener los productos en el carrito del usuario
        $cart_query = mysqli_query($conexion, "
            SELECT v.title, v.price 
            FROM videojuegos v
            INNER JOIN carrito c ON v.id = c.id_videogame
            WHERE c.id_user = '$user_id'
        ");

        // Recorrer cada producto y agregarlo al HTML del ticket
        while ($game = mysqli_fetch_assoc($cart_query)) {
            $title = htmlspecialchars($game['title']);
            $price = number_format($game['price'], 2);
            $items_html .= "<li>$title - \$$price USD</li>\n";
            $total_price += $game['price'];
        }

        // Configurar PHPMailer para enviar el correo
        $mail = new PHPMailer(true);

        try {
            // Configuración SMTP de Gmail
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '@gmail.com'; // Tu correo de Gmail
            $mail->Password = 'embk byhf snau aydj'; // Tu App Password, debido a que Gmail ya no permite contraseñas normales
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ]; // Saltar verificación, solo 

            $mail->setFrom('tu_email@gmail.com', 'Level UP');
            $mail->addAddress($user_email);

            $mail->isHTML(true);
            $mail->Subject = 'Tu Ticket de Compra - Level UP';

            $mail->Body = "
            <html>
            <head>
            <style>
                .ticket {
                    max-width: 500px;
                    margin: auto;
                    background-color: white;
                    border: 2px dashed #333;
                    border-radius: 10px;
                    padding: 20px;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                    margin-top: 3em;
                }
                .ticket h2 { text-align: center; color: darkred; margin-bottom: 10px; }
                .ticket p { margin: 5px 0; font-size: 15px; }
                .ticket ul { list-style-type: none; padding: 0; }
                .ticket ul li { border-bottom: 1px dashed darkgray; padding: 5px 0; }
                .total { font-weight: bold; text-align: right; margin-top: 15px; font-size: 16px; }
                .footer { margin-top: 20px; text-align: center; font-size: 13px; color: black; }
                .footer a { color: darkred; text-decoration: none; }
            </style>
            </head>
            <body>
            <div class='ticket'>
                <h2>Level UP - Ticket de Compra</h2>
                <p><strong>Usuario:</strong> @$username</p>
                <p><strong>Correo:</strong> $user_email</p>
                <p><strong>Fecha:</strong> $current_date</p>
                <p><strong>Productos:</strong></p>
                <ul>$items_html</ul>
                <p class='total'>Total pagado: \$" . number_format($total_price, 2) . " USD</p>
                <div class='footer'>
                    Gracias por tu compra.<br>
                    Level UP MX | <a href='#'>Términos</a> | <a href='#'>Privacidad</a>
                </div>
            </div>
            </body>
            </html>
            ";

            $mail->send();
            echo "<script>console.log('Correo enviado exitosamente a $user_email');</script>";
        } catch (Exception $e) {
            echo "<script>console.error('Error al enviar el correo: {$mail->ErrorInfo}');</script>";
        }

        /* Tabla compras:
        MariaDB [proyecto]> CREATE TABLE compras (
        -> id_user INT NOT NULL,
        -> id_videogame INT NOT NULL,
        -> date_buy DATETIME DEFAULT CURRENT_TIMESTAMP,
        -> PRIMARY KEY (id_user, id_videogame),
        -> FOREIGN KEY (id_user) REFERENCES usuarios(id) ON DELETE CASCADE,
        -> FOREIGN KEY (id_videogame) REFERENCES videojuegos(id) ON DELETE CASCADE
        -> );
        */
        // Incluir las compras del usuario en la tabla 'compras'
        $insert_query = "INSERT INTO compras (id_user, id_videogame) 
                        SELECT id_user, id_videogame FROM carrito WHERE id_user = '$user_id'";
        mysqli_query($conexion, $insert_query);
?>

        <div class="ticket">
            <img src="../../img/Images/LOGO.png" alt="Level UP Logo" class="logo">
            <h2>Level UP - Ticket de Compra</h2>

            <p><strong>Usuario:</strong> @<?php echo htmlspecialchars($username); ?></p>
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($user_email); ?></p>
            <p><strong>Fecha:</strong> <?php echo $current_date; ?></p>

            <p><strong>Productos:</strong></p>
            <ul>
                <?php echo $items_html; ?>
            </ul>

            <p class="total">Total pagado: $<?php echo number_format($total_price, 2); ?> USD</p>

            <div class="footer">
                Gracias por tu compra.<br>
                Level UP MX | <a href="#">Términos</a> | <a href="#">Privacidad</a>
            </div>
        </div>
        <button class="accept-button" onclick="window.location.href='../../productos_usuario.php'">Aceptar</button>
    </div>
</div>
<?php
        // Luego limpiar el carrito
        mysqli_query($conexion, "DELETE FROM carrito WHERE id_user = '$user_id'");

        // Cerrar la conexión a la base de datos
        mysqli_close($conexion);
?>