<?php
require_once "../Config/db_connect.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM Produto WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: index.php?msg=excluido");
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