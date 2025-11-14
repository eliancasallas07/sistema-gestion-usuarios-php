<?php
//Incluir la clase Database
require_once "Database.php";

//Crear una INSTANCIA (objeto de la Database)
$database = new Database();

//Llamar al Metodo connect();
$connection = $database->connect();

//VERIFICAR si la conexion funcionando
if ($connection) {
    echo "<br>🎉 ¡La conexión está funcionando perfectamente!";
    //PRUEBA ADICIONAL : Consulta de Usuarios
    try {
        $stmt = $connection->query("SELECT * FROM usuarios");
        $usuarios = $stmt->fetch();

        echo "<br>👤 " . $usuario['nombre'] . " - " . $usuario['email'];

        foreach ($usuarios as $usuarios) {
            echo "<br>👤 " . $usuario['nombre'] . " - " . $usuario['email'];
        }
    } catch (PDOException $e) {
        echo "<br>⚠️ Error al consultar usuarios: " . $e->getMessage();
    }
} else {
    echo "<br>💥 No se pudo establecer la conexión.";
}
