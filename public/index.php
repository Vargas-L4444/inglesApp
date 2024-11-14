<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /inglesApp/app/views/login.php");
    exit();
}
?>