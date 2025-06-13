<?php
function renderUsuarios($usuarios) {
    if (empty($usuarios)) {
        echo '<p class="text-gray-600">Nenhum usuário cadastrado.</p>';
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
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Endereço</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">CPF</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $u): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($u['Num_Matricula']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($u['Nome']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($u['Telefone']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($u['Endereco']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($u['cpf']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <a href="../Usuario/excluirUser.php?matricula=<?= urlencode($u['Num_Matricula']) ?>"
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
    <?php
}