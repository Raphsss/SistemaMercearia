<?php

require_once "../Config/db_connect.php";

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    $stmt = $conn->prepare("DELETE FROM Usuario WHERE Num_Matricula = ?");
    $stmt->bind_param("i", $matricula);
    if ($stmt->execute()) {
        // Após excluir do banco de dados:
        header("Location: ../Exibir/index.php?msg=excluido");
        exit();
    } else {
        header("Location: index.php?msg=erro");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>