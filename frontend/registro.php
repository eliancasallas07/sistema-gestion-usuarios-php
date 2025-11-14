<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .registro-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .registro-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .registro-header h1 {
            color: #333;
            margin: 0;
            font-size: 28px;
        }

        .registro-header p {
            color: #666;
            margin: 10px 0 0 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4CAF50;
        }

        .btn-registro {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-registro:hover {
            background-color: #45a049;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="registro-container">
        <div class="registro-header">
            <h1>Registro</h1>
            <p>Crea tu cuenta nueva</p>
        </div>

        <form id="registroForm">
            <div class="form-group">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirmar_password">Confirmar contraseña:</label>
                <input type="password" id="confirmar_password" name="confirmar_password" required>
            </div>

            <button type="submit" class="btn-registro">Registrarse</button>
        </form>

        <div class="login-link">
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
        </div>
    </div>

    <script>
        document.getElementById('registroForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmarPassword = document.getElementById('confirmar_password').value;

            // Validaciones básicas
            if (!nombre || !email || !password || !confirmarPassword) {
                alert('Por favor, completa todos los campos');
                return;
            }

            if (password !== confirmarPassword) {
                alert('Las contraseñas no coinciden');
                return;
            }

            // Enviar datos al controlador
            fetch('../controllers/RegistroController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `nombre=${encodeURIComponent(nombre)}&email=${encodeURIComponent(email)}&password=${encodeURIComponent(password)}&confirmar_password=${encodeURIComponent(confirmarPassword)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.mensaje);
                    window.location.href = 'login.php';
                } else {
                    alert(data.mensaje);
                }
            })
            .catch(error => {
                alert('Error de conexión');
            });
        });
    </script>
</body>

</html>
