<?php
echo "<h2>Hostname del contenedor: " . gethostname() . "</h2>";

$host = 'mysql'; // Cambiado de superapp_mysql a mysql
$user = 'superapp_user';
$password = 'superpassword';
$database = 'superapp_db';

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Verificar si existe la tabla
$tableCheck = $conn->query("SHOW TABLES LIKE 'clientes'");
if ($tableCheck->num_rows == 0) {
    // Crear tabla si no existe
    $conn->query("CREATE TABLE clientes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellido VARCHAR(50),
        email VARCHAR(100)
    )");

    // Insertar datos iniciales
    $conn->query("INSERT INTO clientes (nombre, apellido, email) VALUES 
        ('Juan', 'Pérez', 'juan@example.com'),
        ('Ana', 'Gómez', 'ana@example.com'),
        ('Carlos', 'López', 'carlos@example.com'),
        ('María', 'Rodríguez', 'maria@example.com'),
        ('Pedro', 'Fernández', 'pedro@example.com')");
}

// Mostrar datos en HTML
$result = $conn->query("SELECT * FROM clientes");
echo "<h1>Lista de Clientes</h1><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>{$row['nombre']} {$row['apellido']} - {$row['email']}</li>";
}
echo "</ul>";

$conn->close();
?>
