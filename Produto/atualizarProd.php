<?php
require_once "../Config/db_connect.php";

if (!isset($_GET['id'])) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM produto WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    header("Location: ../Exibir/index.php?msg=erro");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $quantidade = $_POST['quantidade'];
    $data_validade = $_POST['data_validade'];
    $descricao = $_POST['descricao'];

    $stmt = $conn->prepare("UPDATE produto SET nome=?, tipo=?, quantidade=?, data_validade=?, descricao=? WHERE id=?");
    if ($stmt->execute([$nome, $tipo, $quantidade, $data_validade, $descricao, $id])) {
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
    <title>Atualizar Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Atualizar Produto</h2>
        <form method="post">
            <label class="block mb-2">Nome:
                <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Tipo:
                <input type="text" name="tipo" value="<?= htmlspecialchars($produto['tipo']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Quantidade:
                <input type="number" name="quantidade" value="<?= htmlspecialchars($produto['quantidade']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Data de Validade:
                <input type="date" name="data_validade" value="<?= htmlspecialchars($produto['data_validade']) ?>" class="w-full border rounded p-2 mb-2" required>
            </label>
            <label class="block mb-2">Descrição:
                <input type="text" name="descricao" value="<?= htmlspecialchars($produto['descricao']) ?>" class="w-full border rounded p-2 mb-4" required>
            </label>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Salvar</button>
            <a href="../Exibir/index.php" class="ml-2 text-gray-600">Cancelar</a>
        </form>
    </div>
</body>
</html>