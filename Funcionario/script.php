<?php

require_once "../Config/db_connect.php";

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];

$sql = "INSERT INTO Funcionario (Nome, Telefone, Endereco, cpf) VALUES ('$nome', '$telefone', '$endereco', '$cpf')";

if ($conn->query($sql) === TRUE) {
  echo "Funcionário cadastrado com sucesso.";
} else {
  echo "Erro: " . $conn->error;
}

$conn->close();
?>
