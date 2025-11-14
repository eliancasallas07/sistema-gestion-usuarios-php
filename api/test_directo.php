<?php
echo "=== PRUEBA DIRECTA DEL MODELO USUARIO ===\n";

// Incluir el controlador
require_once '../controllers/UsuarioController.php';

// Crear controlador
$controller = new UsuarioController();

echo "1. Probando crear usuario directamente...\n";

// Probar crear usuario
$resultado = $controller->crear("Ana Test", "ana.test@email.com");

echo "Resultado: " . $resultado . "\n";

echo "2. Listando usuarios después de crear...\n";

// Listar usuarios para ver si se creó
$usuarios = $controller->listar();
echo "Total usuarios: " . count($usuarios) . "\n";

foreach($usuarios as $usuario) {
    echo "- ID: " . $usuario['id'] . ", Nombre: " . $usuario['nombre'] . ", Email: " . $usuario['email'] . "\n";
}

echo "=== FIN PRUEBA ===\n";
?>