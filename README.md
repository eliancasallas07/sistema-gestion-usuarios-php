# 🚀 Sistema de Gestión de Usuarios - PHP MVC

## 📋 Descripción del Proyecto

Sistema completo de gestión de usuarios desarrollado con PHP orientado a objetos, implementando el patrón MVC y utilizando PDO para la gestión de base de datos.

## ✨ Funcionalidades Implementadas

### 🔐 Sistema de Autenticación
- ✅ Registro de usuarios con encriptación de contraseñas (`password_hash()`)
- ✅ Login seguro con verificación de contraseñas (`password_verify()`)
- ✅ Gestión de sesiones para usuarios logueados
- ✅ Validación de emails únicos
- ✅ Formulario de registro público
- ✅ Interfaz de login profesional

### 🛠️ Sistema CRUD
- ✅ Crear usuarios desde panel administrativo con campo de contraseña
- ✅ Listar todos los usuarios con funcionalidad de búsqueda en tiempo real
- ✅ Actualizar información de usuarios
- ✅ Eliminar usuarios con confirmación
- ✅ Funcionalidad de exportar a CSV
- ✅ Validación de datos del lado cliente y servidor

### 🏗️ Arquitectura Técnica
- ✅ Patrón **Modelo-Vista-Controlador (MVC)**
- ✅ **PHP orientado a objetos** con PDO
- ✅ **Consultas preparadas** para prevenir inyección SQL
- ✅ **Sanitización y validación** de datos
- ✅ Respuestas **API RESTful con JSON**
- ✅ **JavaScript moderno** con Fetch API
- ✅ Diseño **responsive** con interfaz profesional

## 🔧 Stack Técnico

| Tecnología | Versión | Propósito |
|------------|---------|-----------|
| PHP | 8+ | Backend con POO |
| MySQL | 5.7+ | Base de datos |
| JavaScript | ES6+ | Frontend dinámico |
| HTML5/CSS3 | - | Interfaz de usuario |
| PDO | - | Conexión segura a BD |

## 📁 Estructura del Proyecto

```
Sistema de Gestión Básico con PHP (POO + PDO)/
├── config/
│   ├── Database.php          # Configuración de base de datos
│   └── test_connection.php   # Test de conexión
├── models/
│   └── Usuario.php           # Modelo de usuario (CRUD + Auth)
├── controllers/
│   ├── UsuarioController.php # Controlador CRUD
│   ├── LoginController.php   # Controlador de autenticación
│   └── RegistroController.php# Controlador de registro
├── frontend/
│   ├── index.php            # Panel principal CRUD
│   ├── login.php            # Interfaz de login
│   └── registro.php         # Formulario de registro
└── api/
    └── usuarios.php         # API REST para operaciones CRUD
```

## 🔐 Seguridad Implementada

- **Encriptación de contraseñas** con `password_hash()`
- **Verificación segura** con `password_verify()`
- **Consultas preparadas** para prevenir SQL injection
- **Sanitización de datos** con `htmlspecialchars()`
- **Validación de emails únicos** en la base de datos
- **Sesiones seguras** para mantener estado de autenticación

## 🚀 Funcionalidades por Implementar

### 🎯 Próximas Características
- [ ] Sistema de roles (Admin, Manager, Usuario)
- [ ] Dashboard especializado por rol
- [ ] Permisos específicos según nivel de acceso
- [ ] Protección de páginas según autenticación
- [ ] Interfaces diferenciadas por tipo de usuario
- [ ] Sistema de notificaciones
- [ ] Recuperación de contraseñas
- [ ] Historial de actividades

## 💻 Instalación y Configuración

### Prerequisitos
- XAMPP (Apache + MySQL + PHP)
- Navegador web moderno
- Git (para clonar el repositorio)

### Pasos de Instalación
1. Clonar el repositorio en la carpeta `htdocs` de XAMPP
2. Crear base de datos MySQL
3. Configurar conexión en `config/Database.php`
4. Ejecutar estructura de tablas SQL
5. Iniciar Apache y MySQL desde XAMPP
6. Acceder a `http://localhost/[nombre-proyecto]/frontend/`

## 🧪 Testing

- ✅ Registro de usuarios probado
- ✅ Login y autenticación funcionando
- ✅ CRUD completo operativo
- ✅ Validaciones frontend y backend verificadas
- ✅ Seguridad de contraseñas confirmada

## 📝 Notas de Desarrollo

Este proyecto forma parte de un portafolio profesional, desarrollado paso a paso con enfoque en:
- Buenas prácticas de programación
- Seguridad en aplicaciones web
- Arquitectura escalable y mantenible
- Experiencia de usuario profesional

---

**Desarrollado con ❤️ en PHP**

*Última actualización: Noviembre 2025*