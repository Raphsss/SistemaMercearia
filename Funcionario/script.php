<?php
$host = "localhost";
$user = "root";
$pass = "senai.123";
$db = "Mercearia";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Erro na conexão: " . $conn->connect_error);
}

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
