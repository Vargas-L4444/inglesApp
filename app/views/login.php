<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="/inglesApp/public/css/styles.css">
    <title>inglesApp | Login</title>
    <style>
        /* Estilo para el mensaje flotante */
        .floating-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(0, 128, 0, 0.9); /* Verde semitransparente */
            color: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 2px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: none; /* Oculto por defecto */
        }

        .floating-message.error {
            background-color: rgba(220, 38, 38, 0.9); /* Rojo intenso */
        }
    </style>
</head>
<body class="img-page">
    <div class="container">
        <h2>Iniciar Sesión</h2>

        <form method="post" action="../controllers/AuthController.php">
            <input type="hidden" name="action" value="login">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>

        <!-- Mensaje de éxito o error -->
        <?php if (isset($_GET['success'])): ?>
            <div id="message" class="floating-message"><?= htmlspecialchars($_GET['success']) ?></div>
            <script>
                document.getElementById('message').style.display = 'block';
                setTimeout(function() {
                    window.location.href = '/inglesApp/public/index.html'; // Redirección a la página deseada
                }, 2000); // 2 segundos
            </script>
        <?php elseif (isset($_GET['error'])): ?>
            <div id="message" class="floating-message error"><?= htmlspecialchars($_GET['error']) ?></div>
            <script>
                document.getElementById('message').style.display = 'block';
                setTimeout(function() {
                    document.getElementById('message').style.display = 'none';
                }, 2000); // Ocultar después de 2 segundos
            </script>
        <?php endif; ?>

        <p>¿No tienes una cuenta? <a href="register.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
