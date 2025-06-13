<?php

require_once "../Config/db_connect.php";

function getFuncionarios($conn) {
    $funcionarios = [];
    $sql = "SELECT Num_Matricula, Nome, Telefone, cpf, salario, cargo, data_adamissao FROM Funcionario ORDER BY Nome ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Erro na preparação da query de funcionários: " . $conn->error);
        return [];
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $funcionarios[] = $row;
        }
        $result->free();
    } else {
        error_log("Erro ao buscar funcionários: " . $stmt->error);
    }

    $stmt->close();
    return $funcionarios;
}


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