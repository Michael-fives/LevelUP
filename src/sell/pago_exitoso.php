<?php
session_start();
?>
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
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar-menu">
        <div class="superior-part">
            <img src="../../img/Images/LOGO.png" class="logo" alt="Level UP">
            <div class="user-part">
                <?php
                    include '../functions/conexion.php';

                    if (isset($_SESSION['username'])) {
                        $username = mysqli_real_escape_string($conexion, $_SESSION['username']);
                        $sql = mysqli_query($conexion, "SELECT username FROM usuarios WHERE username = '$username'");
                        $row = mysqli_fetch_assoc($sql);

                        $result = mysqli_query($conexion, "SELECT admin_ FROM usuarios WHERE username = '$username'");
                        $admin_row = mysqli_fetch_assoc($result);
                        $admin_status = $admin_row['admin_'];

                        if ($admin_status == 0) {
                ?>
                            <button class="logout-button" onclick="window.location.href='../functions/logout.php'">
                                <img src="../../img/Images/logoutIcon.png" class="logout-icon">
                            </button>
                            <span class="username"><a href="#user">@<?php echo htmlspecialchars($row["username"]); ?></a></span>
                <?php
                        } else {
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
                ?>
                        <button class="logout-button" disabled>
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
use Dompdf\Dompdf;

require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

require __DIR__ . '/dompdf/autoload.inc.php';

include '../functions/conexion.php';

$username = mysqli_real_escape_string($conexion, $_SESSION['username']);
$user_query = mysqli_query($conexion, "SELECT id, mail FROM usuarios WHERE username = '$username'");
$user_data = mysqli_fetch_assoc($user_query);
$user_id = $user_data['id'];
$user_email = $user_data['mail'];

$current_date = date("d/m/Y");
$current_datetime = date("Ymd_His"); // Nuevo: Formato para nombre de archivo único

$total_price = 0;
$items_html = "";

$cart_query = mysqli_query($conexion, "
    SELECT v.title, v.price
    FROM videojuegos v
    INNER JOIN carrito c ON v.id = c.id_videogame
    WHERE c.id_user = '$user_id'
");

while ($game = mysqli_fetch_assoc($cart_query)) {
    $title = htmlspecialchars($game['title']);
    $price = number_format($game['price'], 2);
    $items_html .= "<li>$title - \$$price USD</li>\n";
    $total_price += $game['price'];
}


// --- INICIO DE CÓDIGO AÑADIDO / MODIFICADO ---

// 1. Definir la ruta de la carpeta y crearla si no existe
$tickets_dir = __DIR__ . "/tickets"; // La carpeta "tickets" dentro de /sell
if (!is_dir($tickets_dir)) {
    mkdir($tickets_dir, 0777, true); // Crea la carpeta con permisos
}

// 2. Definir el nombre de archivo único
// Formato: Ticket_UsuarioID_FechaHora.pdf
$filename = "Ticket_{$user_id}_{$current_datetime}.pdf";
$pdf_path = $tickets_dir . "/" . $filename; 

// --- FIN DE CÓDIGO AÑADIDO / MODIFICADO ---

$html_pdf = "
<div style='font-family: Arial; border:2px dashed #333; padding:20px;'>
    <h2 style='text-align:center;'>Level UP - Ticket de Compra</h2>
    <p><strong>Usuario:</strong> @$username</p>
    <p><strong>Correo:</strong> $user_email</p>
    <p><strong>Fecha:</strong> $current_date</p>
    <p><strong>Productos:</strong></p>
    <ul>$items_html</ul>
    <p style='font-weight:bold; text-align:right;'>Total pagado: \$" . number_format($total_price, 2) . " USD</p>
</div>
";

$dompdf = new Dompdf();
$dompdf->loadHtml($html_pdf);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$pdf_output = $dompdf->output();
// Se usa $pdf_path definido arriba para guardar en la carpeta "tickets"
file_put_contents($pdf_path, $pdf_output);


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';

    // ← OPCIONES OBLIGATORIAS PARA QUE GMAIL NO BLOQUEE (Originales)
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ];

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mikegilpinca3@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('mikegilpinca3@gmail.com', 'Level UP');
    $mail->addAddress($user_email);

    // Se usa $pdf_path para adjuntar el ticket guardado
    // Se usa $current_datetime para el nombre del archivo adjunto
    $mail->addAttachment($pdf_path, "Ticket_LevelUP_{$current_datetime}.pdf"); 

    $mail->isHTML(true);
    $mail->Subject = 'Tu Ticket de Compra - Level UP';
    $mail->Body = "
        Hola @$username,<br><br>
        Gracias por tu compra en <strong>Level UP</strong>.<br><br>
        🧾 Se adjunta tu ticket en formato PDF.<br><br>

        Saludos,<br>
        <strong>Level UP MX</strong>
    ";

    if (!$mail->send()) {
        echo "<script>alert('ERROR AL ENVIAR EL CORREO: " . $mail->ErrorInfo . "');</script>";
        exit;
    }

} catch (Exception $e) {
    echo "<script>alert('ERROR EN ENVÍO: " . $mail->ErrorInfo . "');</script>";
    exit;
}


mysqli_query($conexion, "
    INSERT INTO compras (id_user, id_videogame)
    SELECT id_user, id_videogame FROM carrito WHERE id_user = '$user_id'
");

mysqli_query($conexion, "DELETE FROM carrito WHERE id_user = '$user_id'");

mysqli_close($conexion);
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
</body>
</html>