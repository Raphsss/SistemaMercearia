<?php
require_once "../Config/db_connect.php";
include '../Funcionario/listarFunc.php';
include '../Funcionario/renderFunc.php';
include '../Usuario/listarUser.php';
include '../Usuario/renderUser.php';
include '../Produto/listarProd.php';
include '../Produto/renderProd.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Mercearia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="p-4 bg-gray-100">
    <a href="../Home/index.html" class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition duration-300 mb-6" aria-label="Voltar para Home">Voltar</a>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'excluido'): ?>
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">Registro excluído com sucesso.</div>
    <?php elseif (isset($_GET['msg']) && $_GET['msg'] == 'erro'): ?>
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">Erro ao excluir registro.</div>
    <?php endif; ?>

    <div class="container mx-auto p-6 bg-white rounded-lg shadow-xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Dados Cadastrados na Mercearia</h1>

        <!-- Funcionários -->
        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Funcionários Cadastrados</h2>
            <?php renderFuncionarios(getFuncionarios($conn)); ?>
        </div>

        <!-- Usuários -->
        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Usuários Cadastrados</h2>
            <?php renderUsuarios(getUsuarios($conn)); ?>
        </div>

        <!-- Produtos -->
        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Produtos Cadastrados</h2>
            <?php renderProdutos(getProdutos($conn)); ?>
        </div>
    </div>
</body>
</html>