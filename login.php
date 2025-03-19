<?php

include "conexion.php";

$mail = mysqli_real_escape_string($conexion, $_POST["mail"]);
$passwd = mysqli_real_escape_string($conexion, $_POST["passwd"]);

$sql = "SELECT * FROM usuarios WHERE mail = '$mail'";
$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if (password_verify($passwd, $row["passwd"])) {
        session_start();
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["mail"] = $row["mail"];
        $_SESSION["phone"] = $row["phone"];
        $_SESSION["admin_"] = $row["admin_"];
        $_SESSION["profile_pic"] = $row["profile_pic"];
        $_SESSION["register"] = $row["register"];
        $_SESSION["level_"] = $row["level_"];
        $_SESSION["time_played"] = $row["time_played"];

        header("Location: acercade.html");
        exit();
    } else {
        echo "Contraseña incorrecta.";
        header("Location: login.html");
        exit();
    }
} else {
    echo "Usuario no encontrado.";
    header("Location: login.html");
    exit();
}

?>