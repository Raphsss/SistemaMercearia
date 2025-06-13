<?php
require_once "../Config/db_connect.php";

if (!isset($_GET['matricula'])) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}

$matricula = $_GET['matricula'];

$stmt = $conn->prepare("SELECT * FROM usuario WHERE Num_Matricula = ?");
$stmt->execute([$matricula]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cpf = $_POST['cpf'];

    $stmt = $conn->prepare("UPDATE usuario SET Nome=?, Telefone=?, Endereco=?, cpf=? WHERE Num_Matricula=?");
    if ($stmt->execute([$nome, $telefone, $endereco, $cpf, $matricula])) {
        header("Location: ../Exibir/index.php?msg=atualizado");
        exit;
    } else {
        echo "<div>Erro ao atualizar.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Usuário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Atualizar Usuário</h2>
        <form method="post">
            <label class="block mb-2">Nome:
                <input type="text" name="nome" value="<?= htmlspecialchars($usuario['Nome']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Telefone:
                <input type="text" name="telefone" value="<?= htmlspecialchars($usuario['Telefone']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Endereço:
                <input type="text" name="endereco" value="<?= htmlspecialchars($usuario['Endereco']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">CPF:
                <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" class="w-full border rounded p-2 mb-4" required>
            </label>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Salvar</button>
            <a href="../Exibir/index.php" class="ml-2 text-gray-600">Cancelar</a>
        </form>
    </div>
</body>
</html>