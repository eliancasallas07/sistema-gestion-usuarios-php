<?php
class Database {
    // Propiedades - Datos de conexion a la base de datos
    private $host = "localhost";          // Servidor de la BD
    private $db_name = "sistema_gestion"; // Nombre de tu base de datos
    private $username = "root";           // Usuario de MySQL
    private $password = "";               // Contraseña (vacía en XAMPP)
    public $conn;                         // Objeto de conexión PDO
     
    // Metodo connect - Establece la conexion
    public function connect(){
        //Inicializar conexion como null
        $this->conn =null;
    

        try {
            //Crear conexion PDO 
            //DSN = data source name (informacion de la base de datos)
            $dsn = "mysql:host=" . $this->host . ";port=3307;dbname=" . $this->db_name . ";charset=utf8";

            $this->conn = new PDO($dsn, $this->username, $this->password);

            //Configurar PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            //Si hay errores, lo capturamos y mostramos
            echo " Error de conexion " . $e->getMessage();
        }

        return $this->conn;

        }
}
?>
