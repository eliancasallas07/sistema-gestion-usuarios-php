<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Usuarios</title>
    <style>
        :root {
            /* Variables CSS */
            --color-primary: #007bff;
            --color-primary-dark: #0056b3;
            --color-primary-hover: #0069d9;
            --color-bg: #f5f5f5;
            --color-white: #ffffff;
            --color-text: #333333;
            --color-text-light: #666666;
            --color-border: #dddddd;
            
            /* Colores de error */
            --color-error: #dc3545;
            --color-error-light: #fee;
            --color-error-dark: #c66;

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

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--color-bg) 0%, #e8e8e8 100%);
            margin: 0;
            padding: var(--spacing-md);
            min-height: 100vh;
            display: grid;
            place-items: center;
        }

        .registro-container {
            background: var(--color-white);
            padding: var(--spacing-xl);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-lg);
            width: 100%;
            max-width: 450px;
            display: grid;
            gap: var(--spacing-lg);
            animation: slideIn 0.4s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .registro-header {
            text-align: center;
            display: grid;
            gap: var(--spacing-sm);
        }

        .registro-header h1 {
            color: var(--color-text);
            margin: 0;
            font-size: clamp(24px, 5vw, 32px);
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .registro-header p {
            color: var(--color-text-light);
            margin: 0;
            font-size: 15px;
        }

        .form-group {
            display: grid;
            gap: var(--spacing-xs);
            margin-bottom: var(--spacing-md);
        }

        label {
            color: var(--color-text);
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 0.2px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: var(--spacing-sm);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-sm);
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: var(--color-white);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            transform: translateY(-1px);
        }

        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="password"]:hover {
            border-color: var(--color-primary-dark);
        }

        .btn-registro {
            width: 100%;
            padding: var(--spacing-sm) var(--spacing-md);
            background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
            color: var(--color-white);
            border: none;
            border-radius: var(--radius-sm);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-sm);
        }

        .btn-registro:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-registro:active {
            transform: translateY(0);
            box-shadow: var(--shadow-sm);
        }

        .login-link {
            text-align: center;
            margin-top: var(--spacing-md);
            padding-top: var(--spacing-md);
            border-top: 1px solid var(--color-border);
            display: grid;
            gap: var(--spacing-xs);
        }

        .login-link p {
            color: var(--color-text-light);
            font-size: 14px;
            margin: 0;
        }

        .login-link a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .login-link a:hover {
            color: var(--color-primary-dark);
            transform: translateX(2px);
            display: inline-block;
        }

        /* Diseño Responsivo */
        @media (max-width: 480px) {
            body {
                padding: var(--spacing-sm);
            }

            .registro-container {
                padding: var(--spacing-md);
                gap: var(--spacing-md);
            }

            .registro-header h1 {
                font-size: 24px;
            }
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
