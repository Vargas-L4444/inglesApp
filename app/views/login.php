<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="/inglesApp/public/css/styles.css">
    <title>Iniciar Sesión</title>
</head>
<body class="img-page"> <!-- Clase 'register-page' para aplicar el fondo de imagen -->
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="post" action="../controllers/AuthController.php">
            <input type="hidden" name="action" value="login">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>