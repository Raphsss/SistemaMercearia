<?php

function getFuncionarios() {
    $dbHost = 'localhost';
    $dbUserName = 'root';
    $dbPassWord = 'senai.123';
    $dbName = 'Mercearia';

    $conn = new mysqli($dbHost, $dbUserName, $dbPassWord, $dbName);
    if ($conn->connect_error) {
        error_log("Erro de conexão com o banco de dados (Funcionários): " . $conn->connect_error);
        return [];
    }

    $funcionarios = [];
    $sql = "SELECT Num_Matricula, Nome, Telefone, Endereco, cpf FROM Funcionario ORDER BY Nome ASC";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        error_log("Erro na preparação da query de funcionários: " . $conn->error);
        $conn->close();
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
    $conn->close();
    return $funcionarios;
}

function getUsuarios() {
    $dbHost = 'localhost';
    $dbUserName = 'root';
    $dbPassWord = 'senai.123';
    $dbName = 'Mercearia';

    $conn = new mysqli($dbHost, $dbUserName, $dbPassWord, $dbName);
    if ($conn->connect_error) {
        error_log("Erro de conexão com o banco de dados (Usuários): " . $conn->connect_error);
        return [];
    }

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
    $conn->close();
    return $clientes;
}

function getProdutos() {
    $dbHost = 'localhost';
    $dbUserName = 'root';
    $dbPassWord = 'senai.123';
    $dbName = 'Mercearia';

    $conn = new mysqli($dbHost, $dbUserName, $dbPassWord, $dbName);
    if ($conn->connect_error) {
        error_log("Erro de conexão com o banco de dados (Produtos): " . $conn->connect_error);
        return [];
    }

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
    $conn->close();
    return $produtos;
}