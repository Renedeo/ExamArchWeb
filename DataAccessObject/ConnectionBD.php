<?php

$servername="localhost";
$dbname="exambdbanquegestion";
$dsn = "pgsql:host=".$servername.";dbname=".$dbname;
$username="postgres";
$password="Demonone@12345";

try {
    $pdo = new PDO(
        $dsn,
        $username,
        $password
    );
    
} catch (\PDOException $pDOException) {
    echo "Connection failed:". $pDOException->getMessage();
}
