<?php
$host = "instancia-db.csb95vx9ycsv.us-east-1.rds.amazonaws.com"; // Cambia esto por la dirección del servidor de PostgreSQL
$port = "5432"; // Cambia esto por el puerto de PostgreSQL (generalmente 5432)
$dbname = "bdproyecto"; // Cambia esto por el nombre de tu base de datos
$user = "postgres"; // Cambia esto por tu nombre de usuario de PostgreSQL
$password = "postgres"; // Cambia esto por tu contraseña de PostgreSQL

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
    echo "Conexión exitosa a PostgreSQL!";
} catch (PDOException $e) {
    echo "Error de conexión a PostgreSQL: " . $e->getMessage();
}
?>
