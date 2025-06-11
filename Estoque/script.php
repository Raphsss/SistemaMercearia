<?php
require_once "../Config/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? '';
    $tipo = $_POST["tipo"] ?? '';
    $quantidade = $_POST["quantidade"] ?? 0;
    $validade = $_POST["validade"] ?? null;
    $descricao = $_POST["descricao"] ?? '';

    $stmt = $conn->prepare("INSERT INTO Produto (nome, tipo, quantidade, data_validade, descricao) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $nome, $tipo, $quantidade, $validade, $descricao);

    if ($stmt->execute()) {
        echo "<p>Produto cadastrado com sucesso!</p>";
    } else {
        echo "<p>Erro ao cadastrar produto: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>
