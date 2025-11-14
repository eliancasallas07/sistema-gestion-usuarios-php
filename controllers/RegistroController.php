<?php
// Incluir el modelo Usuario
require_once '../models/Usuario.php';

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmar_password = isset($_POST['confirmar_password']) ? $_POST['confirmar_password'] : $password;

    // Validaciones básicas
    if (empty($nombre) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'mensaje' => 'Por favor completa todos los campos']);
    } elseif (isset($_POST['confirmar_password']) && $password !== $confirmar_password) {
        echo json_encode(['success' => false, 'mensaje' => 'Las contraseñas no coinciden']);
    } else {
        // Aquí va la lógica de registro

        $usuario = new Usuario();
        $usuario->email = $email;

        if ($usuario->emailExistente()) {
            echo json_encode(['success' => false, 'mensaje' => 'El email ya esta registrado']);
        } else {
            // Registrar usuario
            $usuario->nombre = $nombre;
            $usuario->password = $password;

            if ($usuario->registrarUsuario()) {
                echo json_encode(['success' => true, 'mensaje' => 'Usuario registro exitosamente']);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Error al registrar usuario ']);
            }
        }
    }
}
