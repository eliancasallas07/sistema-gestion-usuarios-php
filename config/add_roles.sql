-- Agregar columna de rol a la tabla usuarios
ALTER TABLE usuarios 
ADD COLUMN rol ENUM('Admin', 'Manager', 'Usuario') DEFAULT 'Usuario' AFTER password;

-- Actualizar el primer usuario como Admin (opcional)
-- UPDATE usuarios SET rol = 'Admin' WHERE id = 1;

-- Ver la estructura actualizada
DESCRIBE usuarios;
