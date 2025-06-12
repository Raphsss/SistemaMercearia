<?php

require_once "../Config/db_connect.php";

include 'exibirDados.php';

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

    <div class="container mx-auto p-6 bg-white rounded-lg shadow-xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Dados Cadastrados na Mercearia</h1>

        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Funcionários Cadastrados</h2>
            <?php
            $funcionarios = getFuncionarios($conn);
            if (!empty($funcionarios)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Matrícula
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Telefone
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    CPF
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Salário
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Cargo
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Data de Admissão
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($funcionarios as $funcionario): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['Num_Matricula']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['Nome']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['Telefone']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['cpf']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['salario']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['cargo']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($funcionario['data_adamissao']); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="info-message text-gray-600 text-center py-4 bg-gray-50 rounded-md">Nenhum funcionário cadastrado.</p>
            <?php endif; ?>
        </div>

        <div class="section-container mb-10">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Usuários (Clientes) Cadastrados</h2>
            <?php
            $clientes = getUsuarios($conn);
            if (!empty($clientes)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Matrícula
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Telefone
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Endereço
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    CPF
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clientes as $cliente): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($cliente['Num_Matricula']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($cliente['Nome']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($cliente['Telefone']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($cliente['Endereco']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($cliente['cpf']); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="info-message text-gray-600 text-center py-4 bg-gray-50 rounded-md">Nenhum usuário (cliente) cadastrado.</p>
            <?php endif; ?>
        </div>

        <div class="section-container">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4 border-b pb-2">Estoque de Produtos</h2>
            <?php
            $produtos = getProdutos($conn);
            if (!empty($produtos)): ?>
                <div class="overflow-x-auto rounded-lg shadow">
                    <table class="min-w-full leading-normal data-table">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tipo
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Quantidade
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Data de Validade
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Descrição
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produtos as $produto): ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['id']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['nome']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['tipo']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['quantidade']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['data_validade']); ?>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <?php echo htmlspecialchars($produto['descricao']); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="info-message text-gray-6a00 text-center py-4 bg-gray-50 rounded-md">Nenhum produto cadastrado no estoque.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
