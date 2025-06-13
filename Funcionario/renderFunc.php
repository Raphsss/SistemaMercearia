<?php

function renderFuncionarios($funcionarios) {
    if (empty($funcionarios)) {
        echo '<p class="text-gray-600">Nenhum funcionário cadastrado.</p>';
        return;
    }
    ?>
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
                <?php foreach ($funcionarios as $f): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['Num_Matricula']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['Nome']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['Telefone']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['cpf']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['salario']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['cargo']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($f['data_adamissao']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <a href="../Funcionario/excluirFunc.php?matricula=<?= urlencode($f['Num_Matricula']) ?>"
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
    <?php
}