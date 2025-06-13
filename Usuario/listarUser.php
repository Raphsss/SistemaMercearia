<?php

require_once "../Config/db_connect.php";

function getUsuarios($conn) {

    $clientes = [];
    $sql = "SELECT Num_Matricula, Nome, Telefone, Endereco, cpf FROM Usuario ORDER BY Nome ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Erro na preparação da query de clientes: " . $conn->error);
        $conn->close();
        return [];
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
        $result->free();
    } else {
        error_log("Erro ao buscar clientes: " . $stmt->error);
    }
    
    $stmt->close();
    return $clientes;
}