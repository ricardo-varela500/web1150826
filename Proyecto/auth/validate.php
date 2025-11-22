<?php
session_start();
require_once "../config/db.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$usuario = $_POST['usuario'] ?? '';
$pass = $_POST['password'] ?? '';

if (!$usuario || !$pass) {
    $_SESSION['error'] = 'Usuario y contraseña requeridos';
    header('Location: login.php');
    exit;
}

// Obtener el usuario
$sql = "SELECT id, usuario, password, rol FROM login_users 
        WHERE usuario = :usuario LIMIT 1";

$stmt = $pdo->prepare($sql);
$stmt->execute([':usuario' => $usuario]);
$user = $stmt->fetch();

if ($user) {
    $stored = $user['password']; // contraseña guardada en la BD

    // Comparación DIRECTA sin hash
    if ($pass === $stored) {

        // Crear sesión
        $_SESSION['user'] = [
            'id' => $user['id'],
            'usuario' => $user['usuario'],
            'rol' => $user['rol']
        ];

        header('Location: ../dashboard.php');
        exit;
    }
}

// Si no coincide usuario o contraseña
$_SESSION['error'] = 'Usuario o contraseña incorrectos';
header('Location: login.php');
exit;
