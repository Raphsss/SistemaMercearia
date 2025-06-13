<?php
require_once "../Config/db_connect.php";

if (!isset($_GET['matricula'])) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}

$matricula = $_GET['matricula'];

// Buscar dados atuais
$stmt = $conn->prepare("SELECT Nome, Telefone, cpf, salario, cargo, data_adamissao FROM funcionario WHERE Num_Matricula = ?");
$stmt->bind_param("i", $matricula);
$stmt->execute();
$stmt->bind_result($nome, $telefone, $cpf, $salario, $cargo, $data_adamissao);

if (!$stmt->fetch()) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}
$stmt->close();

// Atualizar no banco
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $salario = $_POST['salario'];
    $cargo = $_POST['cargo'];
    $data_adamissao = $_POST['data_adamissao'];

    $stmt = $conn->prepare("UPDATE funcionario SET Nome=?, Telefone=?, cpf=?, salario=?, cargo=?, data_adamissao=? WHERE Num_Matricula=?");
    $stmt->bind_param("ssssssi", $nome, $telefone, $cpf, $salario, $cargo, $data_adamissao, $matricula);
    if ($stmt->execute()) {
        header("Location: ../Exibir/index.php?msg=atualizado");
        exit;
    } else {
        echo "<div>Erro ao atualizar.</div>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Atualizar Funcionário</h2>
        <form method="post">
            <label class="block mb-2">Nome:
                <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Telefone:
                <input type="text" name="telefone" value="<?= htmlspecialchars($telefone) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">CPF:
                <input type="text" name="cpf" value="<?= htmlspecialchars($cpf) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Salário:
                <input type="number" name="salario" value="<?= htmlspecialchars($salario) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Cargo:
                <input type="text" name="cargo" value="<?= htmlspecialchars($cargo) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Data de Admissão:
                <input type="date" name="data_adamissao" value="<?= htmlspecialchars($data_adamissao) ?>" class="w-full border rounded p-2 mb-4" required>
            </label>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Salvar</button>
            <a href="../Exibir/index.php" class="ml-2 text-gray-600">Cancelar</a>
        </form>
    </div>
</body>
</html>