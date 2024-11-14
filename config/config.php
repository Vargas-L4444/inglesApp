<?php
define('DB_HOST', 'localhost:3308');  // Ajustamos el puerto a 3308
define('DB_USER', 'root');      // Usuario de MySQL
define('DB_PASS', '');   // Contraseña de MySQL
define('DB_NAME', 'inglesapp');       // Nombre de la base de datos

// Autoload para cargar las clases automáticamente
spl_autoload_register(function ($className) {
    $path = __DIR__ . '/../app/models/' . $className . '.php';
    if (file_exists($path)) {
        include_once $path;
    }
});
?>