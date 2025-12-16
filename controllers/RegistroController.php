<?php
// Incluir el modelo Usuario
require_once '../models/Usuario.php';
require_once '../helpers/auth.php';

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmar_password = isset($_POST['confirmar_password']) ? $_POST['confirmar_password'] : $password;
    $rol = isset($_POST['rol']) ? trim($_POST['rol']) : 'Usuario';
    $rolesValidos = ['Admin' , 'Manager' , 'Usuario'];
    if (!in_array($rol, $rolesValidos, true)) {
        // Si vienen valores fuera de la lista, asignar rol por defecto
        $rol = 'Usuario';
    }

    // Si hay sesión activa y el rol de la sesión es 'Usuario', no permitir crear usuarios desde el panel
    $current = auth_get_current_user();
    if ($current && isset($current['rol']) && strcasecmp($current['rol'], 'Usuario') === 0) {
        echo json_encode(['success' => false, 'mensaje' => 'Permisos insuficientes para crear usuarios']);
        exit;
    }

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
            $usuario->rol = $rol;

            if ($usuario->registrarUsuario()) {
                echo json_encode(['success' => true, 'mensaje' => 'Usuario registro exitosamente']);
            } else {
                echo json_encode(['success' => false, 'mensaje' => 'Error al registrar usuario ']);
            }
        }
    }
}
