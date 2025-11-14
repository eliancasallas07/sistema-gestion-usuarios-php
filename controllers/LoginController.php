<?php
// Incluir el modelo Usuario
require_once '../models/Usuario.php';

// Iniciar sesión
session_start();

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'mensaje' => 'Por favor completa todos los campos']);
    } else {
        $usuario = new Usuario();
    }

    $resultado = $usuario->verificarLogin($email, $password);

    if ($resultado) {
        //Login exitoso
        $_SESSION['usuario_id'] = $resultado['id'];
        $_SESSION['usuario_nombre'] = $resultado['nombre'];
        echo json_encode(['success' => true, 'mensaje' => 'Login exitoso']);
    } else {
        //Login fallido
        echo json_encode(['success' => false, 'mensaje' => 'Email o Contraseña incorrectos']);
    }
}
