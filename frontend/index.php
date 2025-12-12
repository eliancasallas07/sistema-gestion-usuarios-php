<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Usuarios - Moderno</title>
    <style>
        :root {
            /* Variables CSS */
            --color-primary: #007bff;
            --color-primary-dark: #0056b3;
            --color-primary-hover: #0069d9;
            --color-success: #28a745;
            --color-success-dark: #218838;
            --color-danger: #dc3545;
            --color-danger-dark: #c82333;
            --color-bg: #f5f5f5;
            --color-white: #ffffff;
            --color-text: #333333;
            --color-text-light: #666666;
            --color-border: #dddddd;
            --color-table-header: #f8f9fa;

            /* Espaciados */
            --spacing-xs: 5px;
            --spacing-sm: 10px;
            --spacing-md: 20px;
            --spacing-lg: 30px;
            --spacing-xl: 40px;

            /* Bordes */
            --radius-sm: 5px;
            --radius-md: 10px;

            /* Sombras */
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--color-bg) 0%, #e8e8e8 100%);
            margin: 0;
            padding: var(--spacing-md);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--color-white);
            padding: var(--spacing-xl);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            display: grid;
            gap: var(--spacing-lg);
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: var(--color-text);
            margin: 0;
            font-size: clamp(24px, 4vw, 32px);
            font-weight: 600;
            display: grid;
            gap: var(--spacing-sm);
        }

        h1 + p {
            color: var(--color-text-light);
            margin: 0;
            font-size: 15px;
        }

        .btn-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: var(--spacing-sm);
            margin-bottom: var(--spacing-md);
        }

        .btn {
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: var(--color-white);
            padding: var(--spacing-sm) var(--spacing-md);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        .search-section {
            background: var(--color-table-header);
            padding: var(--spacing-md);
            border-radius: var(--radius-sm);
            display: grid;
            gap: var(--spacing-sm);
        }

        .search-section label {
            color: var(--color-text);
            font-weight: 500;
            font-size: 14px;
        }

        .search-section input {
            padding: var(--spacing-sm);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-sm);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .search-section input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        .form-section {
            background: var(--color-table-header);
            padding: var(--spacing-md);
            border-radius: var(--radius-sm);
            display: grid;
            gap: var(--spacing-md);
        }

        .form-section h3 {
            color: var(--color-text);
            margin: 0;
            font-size: 18px;
            font-weight: 600;
        }

        .form-section form {
            display: grid;
            gap: var(--spacing-sm);
        }

        .form-group {
            display: grid;
            gap: var(--spacing-xs);
        }

        .form-group label {
            color: var(--color-text);
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input {
            padding: var(--spacing-sm);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-sm);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: var(--radius-sm);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        th,
        td {
            padding: var(--spacing-sm);
            text-align: left;
            border-bottom: 1px solid var(--color-border);
        }

        th {
            background-color: var(--color-table-header);
            color: var(--color-text);
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            color: var(--color-text-light);
            font-size: 14px;
        }

        tr:hover {
            background-color: rgba(0, 123, 255, 0.05);
        }

        .btn-delete {
            background: linear-gradient(135deg, var(--color-danger), var(--color-danger-dark));
        }

        .btn-edit {
            background: linear-gradient(135deg, var(--color-success), var(--color-success-dark));
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: var(--spacing-xs);
        }

        /* Diseño Responsivo */
        @media (max-width: 768px) {
            body {
                padding: var(--spacing-xs);
            }

            .container {
                padding: var(--spacing-sm);
                gap: var(--spacing-sm);
            }

            h1 {
                font-size: 20px;
            }

            h1 + p {
                font-size: 13px;
            }

            .btn-group {
                grid-template-columns: 1fr;
            }

            .btn {
                font-size: 13px;
                padding: var(--spacing-xs) var(--spacing-sm);
            }

            .search-section,
            .form-section {
                padding: var(--spacing-sm);
            }

            .form-section h3 {
                font-size: 16px;
            }

            .form-group input {
                font-size: 14px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
                font-size: 11px;
            }

            th, td {
                padding: var(--spacing-xs);
                font-size: 11px;
            }

            .action-buttons {
                grid-template-columns: 1fr;
                gap: 2px;
            }

            .action-buttons .btn {
                font-size: 11px;
                padding: 4px 8px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: var(--spacing-xs);
            }

            h1 {
                font-size: 18px;
            }

            table {
                font-size: 10px;
            }

            th, td {
                padding: 3px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1>🚀 Sistema de Usuarios Moderno</h1>
            <p>Datos cargados via API + JavaScript</p>
        </div>

        <div class="btn-group">
            <button class="btn" onclick="cargarUsuarios()">🔄 Cargar Usuarios</button>
            <button class="btn" onclick="ExportarUsuarios()">⬇️ Exportar Usuarios</button>
        </div>

        <div class="search-section">
            <form id="controles">
                <div class="form-group">
                    <label>🔍 Buscar:</label>
                    <input type="text" id="busqueda" placeholder="Buscar por ID, nombre o email...">
                </div>
            </form>
        </div>

        <!-- Formulario para crear usuario -->
        <div class="form-section">
            <h3>➕ Crear Nuevo Usuario</h3>
            <form id="formularioUsuario">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" id="nombre" placeholder="Ingresa el nombre completo">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" id="email" placeholder="ejemplo@correo.com">
                </div>
                <div class="form-group">
                    <label>Contraseña:</label>
                    <input type="password" id="password" placeholder="Mínimo 6 caracteres">
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
                    <div class="action-buttons">
                        <button class="btn btn-delete" onclick="borrarUsuario(${usuario.id})">
                            🗑️ Borrar
                        </button>
                        <button class="btn btn-edit" onclick="editarUsuario(${usuario.id})">
                            ✏️ Editar  
                        </button>
                    </div>
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