<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "Mercearia!";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

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
