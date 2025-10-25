<?php
session_start();
session_destroy();
header("Location: ../../productos_usuario.php");
exit();
?>