<?php
require_once __DIR__ . '/../../config/config.php';  // Incluye el archivo config.php

require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->userModel->register($username, $email, $password)) {
                header("Location: /inglesApp/app/views/login.php");
            } else {
                echo "Error en el registro.";
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user->id;
                header("Location: /inglesApp/public/index.html");
            } else {
                echo "Credenciales incorrectas.";
            }
        }
    }
}

// Comprobamos qué acción ejecutar según el formulario enviado
if (isset($_POST['action'])) {
    $authController = new AuthController();
    if ($_POST['action'] == 'register') {
        $authController->register();
    } elseif ($_POST['action'] == 'login') {
        $authController->login();
    }
}
?>
