<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP</title>
</head>
<body>

<?php
// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración de la conexión a la base de datos
    $host = "instancia-db.csb95vx9ycsv.us-east-1.rds.amazonaws.com";
    $port = "5432";
    $dbname = "bdproyecto";
    $user = "postgres";
    $password = "postgres";

    try {
        $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");
        // Configura PDO para lanzar excepciones en caso de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibe los datos del formulario
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Consulta para verificar las credenciales
        $consulta = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND password = :contrasena");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->bindParam(':contrasena', $contrasena);
        $consulta->execute();

        // Verifica si las credenciales son válidas
        if ($consulta->rowCount() > 0) {
            // Usuario autenticado, puedes redirigir a una página de bienvenida
            header("Location: bienvenida.php");
            exit(); // Asegura que el script se detenga después de la redirección
        } else {
            // Credenciales incorrectas, redirigir al formulario de login con un mensaje de error
            header("Location: formulario_login.html?error=1");
            exit();
        }

    } catch (PDOException $e) {
        die("Error de conexión a la base de datos: " . $e->getMessage());
    }
}
?>

<!-- Resto del contenido HTML aquí -->

</body>
</html>
