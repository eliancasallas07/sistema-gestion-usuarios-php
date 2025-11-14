<?php
//Incluir la clase Database
require_once '../config/Database.php';

class Usuario
{
    //Aqui van las propiedades y metodos

    //Propiedades de conexion y tabla
    private $conn;
    private $table = "usuarios";

    //Propiedades del usuario
    public $id;
    public $nombre;
    public $email;
    public $password;
    public $fecha_creacion;


    //Constructor - recibe la conexion a la base de datos
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    //Metodo 1: Crear Usuario
    public function crearUsuario()
    {
        //Consultar SQL para insertar crearUsuario
        $query = "INSERT INTO " . $this->table . " (nombre, email) VALUES (:nombre, :email)";

        //Preparar la consulta
        $stmt = $this->conn->prepare($query);

        //Limpiar y validar datos
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->email = htmlspecialchars(strip_tags($this->email));

        //Vincular cada parametro
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);

        //Ejecutar la consulta 
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function registrarUsuario()
    {

        $query = "INSERT INTO " . $this->table . " (nombre, email, password) VALUES (:nombre, :email, :password)";

        $stmt = $this->conn->prepare($query);

        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $this->nombre = htmlspecialchars(strip_tags($this->nombre));

        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function verificarLogin($email, $password)
    {

        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $usuario = $stmt->fetch();

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Usuario existe Y contraseña es correcta
            return $usuario;
        } else {
            // Usuario no existe O contraseña incorrecta
            return false;
        }
    }

    // Método 2: Obtener todos los usuarios
    public function obtenerUsuarios()
    {
        // Consulta SQL para obtener todos los usuarios
        $query = "SELECT * FROM " . $this->table . " ORDER BY id ASC";

        // Preparar la consulta
        $stmt = $this->conn->prepare($query);

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar los resultados
        return $stmt;
    }

    // Método 3: Actualizar usuario
    public function actualizarUsuario()
    {
        // Consulta SQL para actualizar crearUsuario
        $query = "UPDATE " . $this->table . " SET nombre = :nombre, email = :email WHERE id = :id";
        //Preparar la consulta
        $stmt = $this->conn->prepare($query);
        //Vincular Parametros
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        //Ejecutar en consola
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Método 4: Eliminar usuario
    public function eliminarUsuario()
    {
        // Consultar SQL para eliminar crearUsuario
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";

        //Preparar la consulta
        $stmt = $this->conn->prepare($query);

        //Limpiar y validar el ID
        $this->id = htmlspecialchars(strip_tags($this->id));

        //Vincular parametro
        $stmt->bindParam(':id', $this->id);

        //Ejecutar en consola
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    //Metodo para obtener usuario por id
    public function obtenerUsuarioPorId()
    {
        try {
            // Consulta SQL
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

            // Preparar consulta
            $stmt = $this->conn->prepare($query);

            // Vincular parámetro
            $stmt->bindParam(':id', $this->id);

            // Ejecutar
            $stmt->execute();

            return $stmt;
        } catch (Exception $e) {
            return false;
        }
    }


    //Metodo para verificar si un email ya existe

    public function emailExistente()
    {
        // DEBUG: Ver qué email estamos buscando
        error_log("DEBUG: Buscando email: " . $this->email);

        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        // Preparar la consulta
        $stmt = $this->conn->prepare($query);

        // Vincular parámetro
        $stmt->bindParam(':email', $this->email);

        // Ejecutar la consulta
        $stmt->execute();

        // Intentar obtener un resultado
        $resultado = $stmt->fetch();

        // DEBUG: Ver qué encontramos
        error_log("DEBUG: Resultado encontrado: " . ($resultado ? 'SÍ' : 'NO'));

        // Si fetch devuelve algo, significa que existe
        if ($resultado) {
            error_log("DEBUG: Retornando TRUE");
            return true;
        } else {
            error_log("DEBUG: Retornando FALSE");
            return false;
        }
    }
}
