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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="../Home/index.html" class="back-link">Voltar para Home</a>

    <div class="container">
        <h1>Dados Cadastrados na Mercearia</h1>

        <div class="section-container">
            <h2>Funcionários Cadastrados</h2>
            <?php
            $funcionarios = getFuncionarios($conn);
            if (!empty($funcionarios)): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>CPF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($funcionarios as $funcionario): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($funcionario['Num_Matricula']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['Nome']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['Telefone']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['Endereco']); ?></td>
                                <td><?php echo htmlspecialchars($funcionario['cpf']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum funcionário cadastrado.</p>
            <?php endif; ?>
        </div>

        <div class="section-container">
            <h2>Usuários (Clientes) Cadastrados</h2>
            <?php
            $clientes = getUsuarios($conn);
            if (!empty($clientes)): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Endereço</th>
                            <th>CPF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($cliente['Num_Matricula']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['Nome']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['Telefone']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['Endereco']); ?></td>
                                <td><?php echo htmlspecialchars($cliente['cpf']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum usuário (cliente) cadastrado.</p>
            <?php endif; ?>
        </div>

        <div class="section-container">
            <h2>Estoque de Produtos</h2>
            <?php
            $produtos = getProdutos($conn);
            if (!empty($produtos)): ?>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Quantidade</th>
                            <th>Data de Validade</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($produto['id']); ?></td>
                                <td><?php echo htmlspecialchars($produto['nome']); ?></td>
                                <td><?php echo htmlspecialchars($produto['tipo']); ?></td>
                                <td><?php echo htmlspecialchars($produto['quantidade']); ?></td>
                                <td><?php echo htmlspecialchars($produto['data_validade']); ?></td>
                                <td><?php echo htmlspecialchars($produto['descricao']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Nenhum produto cadastrado no estoque.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>