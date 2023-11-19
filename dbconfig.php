<?php
$host = "instancia-db.csb95vx9ycsv.us-east-1.rds.amazonaws.com";
$dbname = "bdproyecto";
$user = "postgres";
$password = "postgres";

try {
    $dbh = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
