<?php
// Incluir el modelo Usuario
require_once '../models/Usuario.php';

// Iniciar sesión
session_start();

// Verificar que sea una petición POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener y sanear datos del formulario
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $rolSeleccionado = isset($_POST['rol']) ? trim($_POST['rol']) : null;

    if ($email === '' || $password === '') {
        echo json_encode(['success' => false, 'mensaje' => 'Por favor completa todos los campos']);
        exit;
    }

    $usuario = new Usuario();
    $resultado = $usuario->verificarLogin($email, $password);

    if ($resultado) {
        // Si el cliente envió un rol, validarlo
        if ($rolSeleccionado !== null) {
            $rolesValidos = ['Admin', 'Manager', 'Usuario'];
            if (!in_array($rolSeleccionado, $rolesValidos, true)) {
                echo json_encode(['success' => false, 'mensaje' => 'Rol inválido.']);
                exit;
            }

            // Comparar sin distinguir mayúsculas/minúsculas
            $rolCuenta = isset($resultado['rol']) ? $resultado['rol'] : null;
            if ($rolCuenta === null || strcasecmp($rolSeleccionado, $rolCuenta) !== 0) {
                echo json_encode(['success' => false, 'mensaje' => 'El rol seleccionado no coincide con tu cuenta.']);
                exit;
            }
        }

        // Login exitoso - Guardar datos en sesión incluyendo el rol
        $_SESSION['usuario_id'] = $resultado['id'];
        $_SESSION['usuario_nombre'] = $resultado['nombre'];
        $_SESSION['usuario_email'] = $resultado['email'];
        $_SESSION['usuario_rol'] = isset($resultado['rol']) ? $resultado['rol'] : null;

        echo json_encode([
            'success' => true,
            'mensaje' => 'Login exitoso',
            'rol' => isset($resultado['rol']) ? $resultado['rol'] : null
        ]);
    } else {
        // Login fallido
        echo json_encode(['success' => false, 'mensaje' => 'Email o contraseña incorrectos']);
    }
}
