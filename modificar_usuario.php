<?php
include 'conexion.php';
session_start();

$username = $_POST['username'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$level = $_POST['level'];
$admin = $_POST['admin'];

$username2 = $_SESSION['username'];
mysqli_query($conexion, "SET @username = '$username2'");
$sql = "UPDATE usuarios SET
        username = '$username',
        mail = '$mail',
        phone = '$phone',
        level_ = '$level',
        admin_ = '$admin'
        WHERE id = '".$_POST['user_id']."'";

if (mysqli_query($conexion, $sql)) {
    header("Location: usuarios_admin.php?message=Usuario actualizado con éxito");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al actualizar el usuario: " . mysqli_error($conexion);
}
?>