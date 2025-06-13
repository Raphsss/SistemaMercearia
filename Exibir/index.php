<?php

require_once "../Config/db_connect.php";

include '../Funcionario/listarFunc.php';
include '../Produto/listarProd.php';
include '../Usuario/listarUser.php';

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
            <?php
            $funcionarios = getFuncionarios($conn);
            if (!empty($funcionarios)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Matrícula</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Telefone</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">CPF</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Salário</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Cargo</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Data de Admissão</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['Num_Matricula']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['Nome']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['Telefone']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['cpf']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['salario']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['cargo']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($funcionario['data_adamissao']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <a href="../Funcionario/excluirFunc.php?matricula=<?= urlencode($funcionario['Num_Matricula']) ?>"
                                           onclick="return confirm('Tem certeza que deseja excluir este funcionário?')"
                                           class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 transition">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-600">Nenhum funcionário cadastrado.</p>
            <?php endif; ?>
        </div>

        <!-- Usuários -->
        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Usuários Cadastrados</h2>
            <?php
            $usuarios = getUsuarios($conn);
            if (!empty($usuarios)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Matrícula</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Telefone</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Endereço</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">CPF</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($usuario['Num_Matricula']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($usuario['Nome']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($usuario['Telefone']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($usuario['Endereco']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($usuario['cpf']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <a href="../Usuario/excluirUser.php?matricula=<?= urlencode($usuario['Num_Matricula']) ?>"
                                           onclick="return confirm('Tem certeza que deseja excluir este usuário?')"
                                           class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 transition">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-600">Nenhum usuário cadastrado.</p>
            <?php endif; ?>
        </div>

        <!-- Produtos -->
        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Produtos Cadastrados</h2>
            <?php
            $produtos = getProdutos($conn);
            if (!empty($produtos)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Nome</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Tipo</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantidade</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Data de Validade</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Descrição</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['id']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['nome']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['tipo']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['quantidade']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['data_validade']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($produto['descricao']) ?></td>
                                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                                        <a href="../Produto/excluirProd.php?id=<?= urlencode($produto['id']) ?>"
                                           onclick="return confirm('Tem certeza que deseja excluir este produto?')"
                                           class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800 transition">
                                            Excluir
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-gray-600">Nenhum produto cadastrado.</p>
            <?php endif; ?>
        </div>

    </div>
</body>
</html>