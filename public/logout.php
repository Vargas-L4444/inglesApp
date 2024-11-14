<?php
session_start();
session_unset();   // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

header("Location: /inglesApp/app/views/login.php");
exit;
?>
