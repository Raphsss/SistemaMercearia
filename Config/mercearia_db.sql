CREATE DATABASE mercearia;
USE mercearia;

CREATE TABLE Funcionario(
	Num_Matricula INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(11) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    salario DOUBLE NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    data_adamissao DATE NOT NULL
);

CREATE TABLE Produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(50),
    quantidade INT,
    data_validade DATE,
    descricao TEXT
);	

CREATE TABLE Usuario(
	Num_Matricula INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(11) NOT NULL,
    Endereco VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) UNIQUE NOT NULL
);


