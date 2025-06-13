<?php

require_once "../Config/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $salario = $_POST['salario'] ?? 0.0;
    $cargo = $_POST['cargo'] ?? '';
    $data_adamissao = $_POST['data_adamissao'] ?? '';

    $stmt = $conn->prepare("INSERT INTO Funcionario (Nome, Telefone, cpf, salario, cargo, data_adamissao) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        error_log("Erro na preparação da query de Funcionário: " . $conn->error);
        echo "<p>Ocorreu um erro interno. Por favor, tente novamente.</p>";
        exit();
    }

    $stmt->bind_param("sssdss", $nome, $telefone, $cpf, $salario, $cargo, $data_adamissao);

    if ($stmt->execute()) {
        echo "<p>Funcionário cadastrado com sucesso!</p>";
    } else {
        error_log("Erro ao cadastrar funcionário: " . $stmt->error);
        echo "<p>Erro ao cadastrar funcionário: " . $stmt->error . "</p>";
    }

    $stmt->close();
}

$conn->close();

?>
