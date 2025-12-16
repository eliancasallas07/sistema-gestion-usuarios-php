<?php
// Helper simple para gestionar sesiones y roles
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('auth_get_current_user')) {
    function auth_get_current_user() {
        if (isset($_SESSION['usuario_id'])) {
            return [
                'id' => $_SESSION['usuario_id'],
                'nombre' => isset($_SESSION['usuario_nombre']) ? $_SESSION['usuario_nombre'] : null,
                'email' => isset($_SESSION['usuario_email']) ? $_SESSION['usuario_email'] : null,
                'rol' => isset($_SESSION['usuario_rol']) ? $_SESSION['usuario_rol'] : null
            ];
        }
        return null;
    }
}

if (!function_exists('auth_has_role')) {
    function auth_has_role($roles) {
        if (!is_array($roles)) $roles = [$roles];
        $user = auth_get_current_user();
        if (!$user) return false;
        foreach ($roles as $r) {
            if (strcasecmp($user['rol'], $r) === 0) return true;
        }
        return false;
    }
}

if (!function_exists('auth_require_role_or_exit')) {
    function auth_require_role_or_exit($roles) {
        if (!auth_has_role($roles)) {
            // Si la petición viene de una API devolver cadena de error o JSON
            if (php_sapi_name() === 'cli') {
                exit("Permisos insuficientes\n");
            }
            // Responder según el contexto: si es petición AJAX/Fetch, normalmente el controlador gestionará
            return false;
        }
        return true;
    }
}
