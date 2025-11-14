<?php
//Incluir el modelo Usuario
require_once '../models/Usuario.php';

class UsuarioController
{
    private $usuarioModel;

    //Constructor
    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    // Aquí van los métodos del controlador

    public function crear($nombre, $email)
    {
        // Validar datos
        if (empty($nombre) || empty($email)) {
            return "Error: Nombre y email son obligatorios";
        }
        // Asignar valores al modelo
        $this->usuarioModel->nombre = $nombre;
        $this->usuarioModel->email = $email;

        $existe = $this->usuarioModel->emailExistente();

        if ($existe) {
            error_log("RETORNANDO ERROR: Este email ya esta registrado");
            return "Error: Este email ya esta registrado";
        }
        // Llamar al método del modelo
        if ($this->usuarioModel->crearUsuario()) {
            return "Usuario creado exitosamente";
        } else {
            return "Error al crear usuario";
        }
    }
    public function listar()
    {
        // Obtener usuarios del modelo
        $resultado = $this->usuarioModel->obtenerUsuarios();

        //Obtener todos los usuarios como array
        $usuarios = $resultado->fetchAll();

        // Retorna los usuarios
        return $usuarios;
    }

    public function editar($id, $nombre, $email)
    {
        // Validar datos
        if (empty($id) || empty($nombre) || empty($email)) {
            return "Error: ID, nombre y email son obligatorios";
        }

        //Asignar valores al modelo (incluyendo el ID)
        $this->usuarioModel->id = $id;
        $this->usuarioModel->nombre = $nombre;
        $this->usuarioModel->email = $email;

        //llamar al metodo modelo
        if ($this->usuarioModel->actualizarUsuario()) {
            return "Usuario actualizado exitosamente";
        } else {
            return "Error al actulizar usuario";
        }
    }

    public function borrar($id)
    {
        // Eliminar usuario por ID  
        if (empty($id)) {
            return "Error: ID es obligatorio";
        }
        //Asignar ID al modelo
        $this->usuarioModel->id = $id;
        //Llamar al metodo del modelo
        if ($this->usuarioModel->eliminarUsuario()) {
            return "Usuario eliminado exitosamente";
        } else {
            return "Error: al eliminar usuario";
        }
    }

    public function obtenerPorId($id)
    {
        //Validar que el ID exista
        if (empty($id)) {
            return "Errror: ID es obligatorio";
        }

        //Asignar ID al modelo
        $this->usuarioModel->id = $id;

        //Llamar al metodo del modelo
        $resultado = $this->usuarioModel->obtenerUsuarioPorId();

        //Retornar el usuario encontrado
        if ($resultado) {
            return $resultado->fetch();
        } else {
            return "Error: Usuario no encontrado";
        }
    }
}
