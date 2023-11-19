<?php

require_once('dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE username = :username AND password = :password";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->rowCount();

    if ($count > 0) {
	header("Location: main.html");
        // Aquí puedes redirigir al usuario a otra página o realizar otras acciones después de iniciar sesión.
    } else {
        header("Location: index.html");
    }
}
?>
