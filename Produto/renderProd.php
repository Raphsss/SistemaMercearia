<?php
function renderProdutos($produtos) {
    if (empty($produtos)) {
        echo '<p class="text-gray-600">Nenhum produto cadastrado.</p>';
        return;
    }
    ?>
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
                <?php foreach ($produtos as $p): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['id']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['nome']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['tipo']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['quantidade']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['data_validade']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm"><?= htmlspecialchars($p['descricao']) ?></td>
                    <td class="px-5 py-3 border-b border-gray-200 bg-white text-sm">
                        <a href="../Produto/excluirProd.php?id=<?= urlencode($p['id']) ?>"
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
    <?php
}