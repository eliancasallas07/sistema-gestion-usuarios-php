<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Usuarios</title>
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

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: #333;
            margin: 0;
            font-size: 28px;
        }

        .login-header p {
            color: #666;
            margin: 10px 0 0 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error {
            background-color: #fee;
            border: 1px solid #fcc;
            color: #c66;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #efe;
            border: 1px solid #cfc;
            color: #6c6;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>🔐 Iniciar Sesión</h1>
            <p>Accede a tu sistema de usuarios</p>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn">Iniciar Sesión</button>
        </form>

        <div class="register-link">
            <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Validaciones básicas
            if (!email || !password) {
                alert('Por favor, completa todos los campos');
                return;
            }

            // Aquí irá la lógica de autenticación
            console.log('Intentando login con:', {
                email,
                password
            });

            fetch('../controllers/LoginController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `email=${email}&password=${password}`

                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.mensaje);
                        window.location.href = 'index.php';
                    } else {
                        alert(data.mensaje);
                    }

                })

                .catch(error => {
                    alert('Error de conexion');

                });
        });
    </script>
</body>

</html>