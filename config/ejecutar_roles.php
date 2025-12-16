<?php
// Script temporal para agregar columna de roles
require_once 'Database.php';

try {
    $database = new Database();
    $db = $database->connect();
    
    // Agregar columna rol
    $sql = "ALTER TABLE usuarios ADD COLUMN rol ENUM('Admin', 'Manager', 'Usuario') DEFAULT 'Usuario' AFTER password";
    
    $db->exec($sql);
    
    echo "✅ Columna 'rol' agregada exitosamente\n";
    
    // Verificar estructura
    $stmt = $db->query("DESCRIBE usuarios");
    echo "\n📋 Estructura actual de la tabla usuarios:\n";
    echo str_repeat("-", 60) . "\n";
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo sprintf("%-20s %-30s %-10s\n", $row['Field'], $row['Type'], $row['Null']);
    }
    
    echo "\n✨ ¡Listo! Ahora puedes continuar con el sistema de roles.\n";
    
} catch(PDOException $e) {
    if (strpos($e->getMessage(), 'Duplicate column name') !== false) {
        echo "ℹ️  La columna 'rol' ya existe en la tabla.\n";
    } else {
        echo "❌ Error: " . $e->getMessage() . "\n";
    }
}
?>
