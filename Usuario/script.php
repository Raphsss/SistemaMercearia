<?php

require_once "../Config/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $endereco = $_POST['endereco'] ?? '';
    $cpf = $_POST['cpf'] ?? '';

    $stmt = $conn->prepare("INSERT INTO Usuario (Nome, Telefone, Endereco, cpf) VALUES (?, ?, ?, ?)");

    if ($stmt === false) {
        error_log("Erro na preparação da query de Usuário: " . $conn->error);
        echo "<p>Ocorreu um erro interno ao tentar cadastrar o usuário. Por favor, tente novamente.</p>";
        exit();
    }

    $stmt->bind_param("ssss", $nome, $telefone, $endereco, $cpf);

    if ($stmt->execute()) {
        echo "<p>Usuário cadastrado com sucesso!</p>";
    } else {
        error_log("Erro ao cadastrar usuário: " . $stmt->error);
        echo "<p>Erro ao cadastrar usuário: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();

?>