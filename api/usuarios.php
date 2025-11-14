<?php
// Headers para permitir CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Si es una petición OPTIONS (preflight), responder OK
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}

//Incluir controlador
require_once '../controllers/UsuarioController.php';

//DEBUG: Verificar que la API se ejecuta
error_log("API EJECUTÁNDOSE - Método: " . $_SERVER['REQUEST_METHOD']);

//Crear el controlador
$controller = new UsuarioController();

//Verificar que metodo HTTP se esta usando
$metodo = $_SERVER['REQUEST_METHOD'];

if ($metodo == 'GET') {
    if (isset($_GET['id'])) {
        //Obtener un usuario especifico
        $usuario = $controller->obtenerPorId($_GET['id']);
        echo json_encode($usuario);
    } else {
        //Listar todos los usuarios 
        $usuarios = $controller->listar();
        echo json_encode($usuarios);
    }
    
} elseif ($metodo == 'POST') {
    //Crear usuario nuevo
    
    //Obtener datos JSON del body
    $input = json_decode(file_get_contents('php://input'), true);

    //Crear usuario con el controlador
    $resultado = $controller->crear($input['nombre'], $input['email']);

    //DEBUG: Ver qué resultado llegó
    error_log("RESULTADO DEL CONTROLADOR: " . $resultado);

    //Responder con resultado
    if (strpos($resultado, 'exitosamente') !== false){
        error_log("ENVIANDO SUCCESS");
        echo json_encode(['success' => true, 'message' => $resultado]);
    } else {
        error_log("ENVIANDO ERROR");
        echo json_encode(['success' => false, 'message' => $resultado]);
    }
    //Borrar usuario
} elseif ($metodo == 'DELETE') {
    //Obtener ID del parametro URL
    $id = $_GET['id'] ?? null;

    $resultado = $controller->borrar($id);

    if (strpos($resultado, 'exitosamente') !== false) {
        echo json_encode(['success' => true , 'message' => $resultado]);
    } else {
        echo json_encode(['success' => false , 'message' => $resultado]);

    } 
} else if ($metodo == 'PUT'){
    //Actualizar usuario existente

    //Obtener ID del parametro URL
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo json_encode(['success' => false, 'message' => 'ID requerido']);
        exit();
    }

    //Obtener datos JSON del body
    $input = json_decode(file_get_contents('php://input'), true);

    //Actualizar usuario con el controlador
    $resultado = $controller->editar($id, $input['nombre'], $input['email']);

    // Responder con resultado
    if (strpos($resultado, 'exitosamente') !== false) {
        echo json_encode(['success' => true, 'message' => $resultado]);
    } else {
        echo json_encode(['success' => false, 'message' => $resultado]);
    }

}

?>