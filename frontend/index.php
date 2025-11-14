<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Usuarios - Moderno</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>🚀 Sistema de Usuarios Moderno</h1>
        <p>Datos cargados via API + JavaScript</p>

        <button class="btn" onclick="cargarUsuarios()">🔄 Cargar Usuarios</button>
        <button class="btn" onclick="ExportarUsuarios()">⬇️ Exportar Usuarios</button>

        <div style="background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 8px;">
            <form id="controles">
                <div style="margin-bottom: 10px;">
                    <label>🔍Buscar:</label>
                    <input type="text" id="busqueda" placeholder="Buscar por ID, nombre o email..." style="width: 200px; padding: 5px;">
                </div>

            </form>
        </div>

        <!-- Formulario para crear usuario -->
        <div style="background: #f8f9fa; padding: 20px; margin: 20px 0; border-radius: 8px;">
            <h3>➕ Crear Nuevo Usuario</h3>
            <form id="formularioUsuario">
                <div style="margin-bottom: 10px;">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" style="width: 200px; padding: 5px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label>Email:</label>
                    <input type="text" id="email" style="width: 200px; padding: 5px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label>Contraseña:</label>
                    <input type="password" id="password" style="width: 200px; padding: 5px;">
                </div>
                <button type="submit" class="btn">➕ Crear Usuario</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaUsuarios">
                <!-- Los usuarios aparecerán aquí -->

            </tbody>
        </table>
    </div>



    <script>
        //Variables globales para controlar el modo 

        let modoEdicion = false;
        let idEditado = null;
        let listaCompleta = [];

        // JavaScript
        function cargarUsuarios() {
            console.log('🔄 Cargando Usuarios')

            //Llamar la API
            fetch('http://localhost/Sistema%20de%20Gesti%C3%B3n%20B%C3%A1sico%20con%20PHP%20%28POO%20%2B%20PDO%29/api/usuarios.php')
                .then(response => {
                    console.log('Respuesta recibia', response);
                    return response.json(); // Convertir a JSON
                })
                .then(usuarios => {
                    console.log('Usuarios Recibidos:', usuarios);
                    listaCompleta = usuarios 
                    mostrarUsuarios(usuarios);
                })
                .catch(error => {
                    console.log('Error:', error);
                    alert('Error al cargar usuarios');
                });

        }

        
       

        //funcion que actualiza la tabla HTML
        function mostrarUsuarios(usuarios) {

            const tabla = document.getElementById('tablaUsuarios');
            tabla.innerHTML = ''; //Limpiar tabla

            //Recorrer cada usuario y crear fila
            usuarios.forEach(usuario => {
                const fila = `
            <tr>
                <td>${usuario.id}</td>
                <td>${usuario.nombre}</td>
                <td>${usuario.email}</td>
                <td>${usuario.fecha_creacion}</td>
                <td>
                    <button class="btn" onclick="borrarUsuario(${usuario.id})" style="background-color: #dc3545;">
                        🗑️ Borrar
                    </button>
                    <button class="btn" onclick="editarUsuario(${usuario.id})" style="background-color: #28a745;">
                         ✏️ Editar  
                    </button>
                </td>
            </tr>
        `;

                tabla.innerHTML += fila;
            });

            console.log('Tabla actualizada con', usuarios.length, 'usuarios');
        }

        //Cargar usuarios al abrir la página
        document.addEventListener('DOMContentLoaded', cargarUsuarios);

        //Function  para crear un nuevo usuario

        function crearUsuario(nombre, email, password) {
            console.log('📝 Datos a enviar:', {
                nombre: nombre,
                email: email,
                password: password
            });

            //Crear objeto con los datos
            const datosUsuario = {
                nombre: nombre,
                email: email,
                password: password
            };

            //Enviar POST a la API
            fetch('../controllers/RegistroController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `nombre=${encodeURIComponent(nombre)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}`
                })
                .then(response => response.json())
                .then(resultado => {
                    console.log('Usuario creado:', resultado);
                    
                    if (resultado.success) {
                        alert(resultado.mensaje); // "Usuario creado exitosamente"
                        //Limpiar formulario
                        document.getElementById('formularioUsuario').reset();
                        //Recargar la lista de cargarUsuarios
                        cargarUsuarios();
                    } else {
                        alert(resultado.mensaje); // "Error: Este email ya esta registrado"
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al crear usuario')
                });
        }


        // Cargar usuarios al abrir la página y configurar formulario
        document.addEventListener('DOMContentLoaded', function() {
            //  Cargar usuarios
            cargarUsuarios();

            //Configurar busqueda 
            document.getElementById('busqueda').addEventListener('input', function() {
                const texto = this.value;
                filtrarUsuarios(texto)
            });

            //  Configurar formulario
            const formulario = document.getElementById('formularioUsuario');

            if (formulario) { // Verificar que existe
                formulario.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const nombre = document.getElementById('nombre').value;
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;

                    // Validaciones del lado cliente
                    if (nombre.trim().length < 2) {
                        alert('Error: El nombre debe tener al menos 2 caracteres');
                        return;
                    }

                    // Validar formato de email
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email.trim())) {
                        alert('Error: El email debe tener un formato válido (ejemplo@dominio.com)');
                        return;
                    }

                    if (password.trim().length < 6) {
                        alert('Error: La contraseña debe tener al menos 6 caracteres')
                        return;
                    }

                    if (modoEdicion) {
                        actualizarUsuario(idEditado, nombre, email);
                    } else {
                        crearUsuario(nombre, email, password);
                    }
                });
            }

            // Función para actualizar usuario existente
            function actualizarUsuario(id, nombre, email) {
                console.log('Actualizar usuario ID:', id, {nombre, email});

                const datosUsuario = {
                    nombre: nombre,
                    email: email
                };

                fetch(`../api/usuarios.php?id=${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(datosUsuario)
                })
                .then(response => response.json())
                .then(resultado => {
                    console.log('Usuario actualizado', resultado);
                    alert('Usuario actualizado exitosamente:');

                    //Resetear modo Edicion
                    resetearModoFormulario();

                    //Recargar la tabla
                    cargarUsuarios();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al actualizar usuario')
                });
            }

            // Función para resetear modo formulario
            function resetearModoFormulario() {
                //Desactivar modo edicion
                modoEdicion = false;
                idEditado = null;

                //Restaurar boton original
                const boton = document.querySelector('#formularioUsuario button[type="submit"]');
                boton.innerHTML = '➕ Crear Usuario';
                boton.style.backgroundColor = '#007bff';

                //Limpiar formulario
                document.getElementById('formularioUsuario').reset();

                console.log('Modo formulario reseteado');
            }
        });

        // Función para borrar usuario
        function borrarUsuario(id) {
            // Paso 1: Confirmar con el usuario
            const confirmacion = confirm('¿Estás seguro de que quieres borrar este usuario?');

            if (confirmacion) {
                fetch('../api/usuarios.php?id=' + id, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(resultado => {
                        console.log('Usuario borrado:', resultado);
                        alert('Usuario borrado exitosamente');

                        //Limpiar formulario
                        document.getElementById('formularioUsuario').reset();

                        //Recargar la lista de cargarUsuarios
                        cargarUsuarios();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error al borrar Usuario')
                    });
            } else {
                alert('Cancelado');
            }
        }

        function editarUsuario(id) {
            
                fetch('../api/usuarios.php?id=' + id,{
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'

                    }
                })
                .then(response => response.json())
                .then(usuario => {
                    //LLenar formualario con los datos
                    document.getElementById('nombre').value = usuario.nombre;
                    document.getElementById('email').value = usuario.email;

                    console.log('✅ Datos cargados para editar:', usuario);

                    //Activar modo edicion
                    modoEdicion = true;
                    idEditado = usuario.id;

                    //Cambiar el boton del formulario
                    const boton = document.querySelector('#formularioUsuario button[type="submit"]');
                    boton.innerHTML = 'Actualizar ';
                    boton.style.backgroundColor = '#28a745';

                    console.log ('Modo edicion activado para usuarios ID:', usuario.id);

                })
                .catch(error => {
                        console.error('Error:', error);
                        alert('Error al editar Usuario')
                    });
            }

        function filtrarUsuarios(textoBuscar) {
           
            if (textoBuscar === "") {
            mostrarUsuarios(listaCompleta);
            } else {
            const usuariosFiltrados = listaCompleta.filter(usuario => {
                usuario.nombre.toLowerCase().includes(textoBuscar.toLowerCase())

            return usuario.nombre.toLowerCase().includes(textoBuscar.toLowerCase()) ||
                   usuario.email.toLowerCase().includes(textoBuscar.toLowerCase()) ||
                   usuario.id.toString().includes(textoBuscar)
        });
        mostrarUsuarios(usuariosFiltrados);
        }

        }

        function ExportarUsuarios() {
            // Verificar que hay datos
            if (listaCompleta.length === 0) {
                alert("No hay usuarios para exportar. Primero carga los usuarios.");
                return;
            }
            
            let csvContent = "ID,Nombre,Email,Fecha\n";
            
            listaCompleta.forEach(usuario => {
                const linea = usuario.id + "," + usuario.nombre + "," + usuario.email + "," + usuario.fecha_creacion + "\n";
                csvContent += linea;
            });
            
            // 1. Crear "archivo" en memoria
            const blob = new Blob([csvContent], { type: 'text/csv' });
            // 2. Crear enlace especial
            const url = window.URL.createObjectURL(blob);
            const link = document.createElement('a');
            // 3. Configurar enlace
            link.href = url;
            link.download = 'usuarios.csv';
            
            // 4. "Hacer click automático"
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            window.URL.revokeObjectURL(url);
            
            alert("¡Archivo CSV descargado exitosamente!");
        }
        
    </script>



</body>

</html>