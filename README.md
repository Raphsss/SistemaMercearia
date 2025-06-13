# Sistema Mercearia

Este é um sistema simples de cadastro e exibição de Funcionários, Usuários e Produtos para uma mercearia, desenvolvido em PHP com MySQL.

## Pré-requisitos

- [XAMPP](https://www.apachefriends.org/index.html) (inclui Apache e MySQL)
- [Git](https://git-scm.com/)

## Como executar o projeto

1. **Clone o repositório:**

```sh
git clone https://github.com/Raphsss/SistemaMercearia
```

2. **Coloque o projeto na pasta do XAMPP:**

Copie a pasta do projeto para o diretório `htdocs` do XAMPP. Exemplo:
- `C:\xampp\htdocs\SistemaMercearia`

3. **Inicie o XAMPP:**

Abra o XAMPP Control Panel e inicie os serviços **Apache** e **MySQL**.

4. **Crie o banco de dados:**

- Acesse o [phpMyAdmin](http://localhost/phpmyadmin/)
- Importe o arquivo [`Config/mercearia_db.sql`](Config/mercearia_db.sql) para criar o banco e as tabelas.

5. **Acesse o sistema:**

Abra o navegador e acesse:
```
http://localhost/SistemaMercearia/Home/index.html
```

## Estrutura do Projeto

- `Config/` - Configurações e scripts SQL
- `Funcionario/` - CRUD de funcionários
- `Usuario/` - CRUD de usuários
- `Produto/` - CRUD de produtos
- `Exibir/` - Página para exibir todos os dados
- `Home/` - Página inicial

## Referências

- [Documentação do PHP](https://www.php.net/manual/pt_BR/)
- [Documentação do MySQL](https://dev.mysql.com/doc/)
- [W3Schools PHP Tutorial](https://www.w3schools.com/php/)
- [Tailwind CSS](https://tailwindcss.com/docs)
- [XAMPP](https://www.apachefriends.org/index.html)
- Exemplos de CRUD em PHP:  
  - https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php
---
