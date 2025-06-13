<?php

require_once "../Config/db_connect.php";

function getProdutos($conn) {

    $produtos = [];
    $sql = "SELECT id, nome, tipo, quantidade, data_validade, descricao FROM Produto ORDER BY nome ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Erro na preparação da query de produtos: " . $conn->error);
        $conn->close();
        return [];
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $produtos[] = $row;
        }
        $result->free();
    } else {
        error_log("Erro ao buscar produtos: " . $stmt->error);
    }

    $stmt->close();
    return $produtos;
}