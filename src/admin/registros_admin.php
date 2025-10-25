<?php
include '../functions/conexion.php';
session_start();

$username = $_POST["username"];
$mail = $_POST["mail"];
$phone = $_POST["phone"];
$passwd = $_POST["passwd"];
$passwdc = $_POST["passwdc"];

if ($passwd == $passwdc) {
    // Encriptar la contraseña
    $passwd = password_hash($passwd, PASSWORD_DEFAULT);

    // Preparar la consulta SQL
    $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (username, passwd, mail, phone, admin_, profile_pic, register, level_, time_played) 
                                       VALUES (?, ?, ?, ?, FALSE, NULL, NOW(), 1, '00:00:00')");

    // Vincular los valores a los placeholders
    mysqli_stmt_bind_param($stmt, "ssss", $username, $passwd, $mail, $phone);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Verificar si la inserción fue exitosa
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        // Redirigir al usuario a login.html
        header("Location: agregar_usuarios.php?message=Usuario añadido con éxito");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    header("Location: agregar_usuarios?error=Las contraseñas no coinciden");
}

// Cerrar la conexión
mysqli_close($conexion);
?>