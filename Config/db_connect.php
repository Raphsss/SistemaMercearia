<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "mercearia";

// Cria a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

?>