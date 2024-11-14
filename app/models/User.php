<?php
require_once __DIR__ . '/../../config/config.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    }

    // Método para verificar si un correo ya existe
    public function emailExists($email) {
        $query = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetchColumn() > 0;  // Devuelve true si el correo ya existe
    }

    public function register($username, $email, $password) {
        // Verifica si el correo ya está registrado
        if ($this->emailExists($email)) {
            echo "El correo electrónico ya está registrado.";
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hashedPassword);

        try {
            return $query->execute();
        } catch (PDOException $e) {
            echo "Error al registrar: " . $e->getMessage();
            return false;
        }
    }

    public function login($email, $password) {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        return false;
    }
}
?>

