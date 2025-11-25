<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Pago</title>
    <link rel="stylesheet" href="../../styles/sidebar.css">
    <link rel="stylesheet" href="../../styles/pago.css">
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
        include '../functions/conexion.php';

        $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
        $result = mysqli_query($conexion, "SELECT id FROM usuarios WHERE username = '$username'");
        $row = mysqli_fetch_assoc($result);
        $id_user = $row['id'];

        $total = 0;
        $query = mysqli_query($conexion, "SELECT price FROM videojuegos WHERE id IN (SELECT id_videogame FROM carrito WHERE id_user = '$id_user')");
        while ($r = mysqli_fetch_assoc($query)) {
            $total += $r['price'];
        }
        ?>
        <button class="back-button" onclick="window.location.href='./usuario_carrito.php'">&#10094;</button>
        <div class="payment-container">
            <script src="https://www.sandbox.paypal.com/sdk/js?client-id=AakNZcwVU6KJMHDELwRhEM1SVpqFqYC7cv7sE5LEoKSqcSiDpohLHn5OfyQZ8eCcDAFsDLVul7rlkTRm&currency=USD"></script>
            <h1>Procesar pago con PayPal</h1>
            <p>Total a pagar: <strong>$<?php echo number_format($total, 2); ?> USD</strong></p>
            <div id="paypal-button-container"></div>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '<?php echo number_format($total, 2, '.', ''); ?>'
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            alert('Pago completado por: ' + details.payer.name.given_name);
                            window.location.href = "pago_exitoso.php";
                        });
                    }
                }).render('#paypal-button-container');
            </script>
        </div>
    </div>
</body>
</html>