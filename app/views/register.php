<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="/inglesApp/public/css/styles.css">
    <title>InglesApp | Registro</title>
</head>
<body class="img-page"> <!-- Clase 'register-page' para aplicar el fondo de imagen -->
    <div class="container">
        <h2>Crear una cuenta</h2>
        <form method="post" action="../controllers/AuthController.php">
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
</body>
</html>