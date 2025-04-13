<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && !isset($_GET['from_registro'])) {
    $error = null;
}

// Guardar el error en sesión solo si existe
if (isset($error)) {
    $_SESSION['login_error'] = $error;
    // Redirigir para evitar reenvío del formulario al recargar
    header("Location: login.php");
    exit();
}

// Recuperar error de sesión si existe
if (isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']); // Limpiar inmediatamente después de usarlo
}

// 1. Primero el código PHP (funciones y lógica)
function doLogin() {
    include "conexion.php";

    $mail = mysqli_real_escape_string($conexion, $_POST["mail"]);
    $passwd = $_POST["passwd"];

    $sql = "SELECT * FROM usuarios WHERE mail = '$mail'";
    $result = mysqli_query($conexion, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($passwd, $row["passwd"])) {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            // Guardar solo los datos necesarios en sesión
            
            header("Location: productos_usuario.php");
            exit();
        } else {
            return "Contraseña incorrecta";
        }
    } else {
        return "El correo no está registrado";
    }
}

// 2. Verificar si se envió el formulario
$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $error = doLogin();
}
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level UP - Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="./Images/LOGO.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="background">
        <div class="image left"></div>
        <div class="image center"></div>
        <div class="image right"></div>
    </div>
    <div class="login-container">
        <img src= "./Images/LOGO.png" class="logo" alt="Level UP">
        <div class="register"><p>¿No tienes una cuenta? <a href="registros.html">¡Regístrate!</a></p></div>
        <form method="POST" action="login.php" name="login-form">
            <label>Correo</label>
            <input type="email" placeholder="levelup@gmail.com" id="mail" name="mail" required>
            <label>Contraseña</label>
            <input type="password" placeholder="••••••••" id="passwd" name="passwd" required>
            <a href="#">Olvidé mi contraseña</a>
            <button type="submit" name="login" value="login">Aceptar</button>
        </form>
        <p>ó iniciar sesión con</p>
        <div class="social-icons">
            <button class="google">
                <img src="./Images/GooglePNG.png" alt="Google">
            </button>
            <button class="discord">
                <img src="./Images/DiscordPNG.png" alt="Discord">
            </button>
        </div>
    </div>
    <div class="terms_and_politics">
        <p>© 2025 LevelUP MX. Todos los derechos reservados.</p>
        <p><a href="#">Términos y condiciones</a> | <a href="#">Políticas de privacidad</a></p>
    </div>
    <script>
        <?php if ($error): ?>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?php echo $error; ?>',
                confirmButtonColor: 'red',
                background: 'rgba(255, 253, 250, 0.85)',
                customClass: {
                    popup: 'custom-swal-popup'
                },
                grow: false,  // Evita que mueva el contenido
                scrollbarPadding: false,  // Evita que se mueva el contenido al abrir el modal
                position: 'top',
                timer: 5000,
                toast: true
            });
        <?php endif; ?>
    </script>
</body>
</html>