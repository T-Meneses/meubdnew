<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'MEUBDNEW';

// Criação do banco de dados
try {
    // Conectando ao servidor MySQL sem especificar o banco de dados
    $pdo = new PDO("mysql:host=$host", $username, $password);
    // Configurando o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Criando o banco de dados
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    $pdo->exec($sql);
    echo "Banco de dados '$dbname' criado com sucesso!<br>";

    // Selecionando o banco de dados recém-criado
    $pdo->exec("USE $dbname");

    // Criando a tabela
    $sql = "CREATE TABLE IF NOT EXISTS MINHATABELA (
        ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        NOME VARCHAR(50) NOT NULL,
        LASTNAME VARCHAR(50) NOT NULL,
        CPF CHAR(11) NOT NULL,
        ENDERECO VARCHAR(100) NOT NULL,
        CIDADE VARCHAR(50) NOT NULL
    )";
    $pdo->exec($sql);
    echo "Tabela 'MINHATABELA' criada com sucesso!<br>";

    // Inserindo usuários
    $sql = "INSERT INTO MINHATABELA (NOME, LASTNAME, CPF, ENDERECO, CIDADE) VALUES
        ('Thiago', 'Silva', '12345678900', 'Rua A, 123', 'Brasilia'),
        ('Micael', 'Jordan', '98765432100', 'Avenida B, 456', 'Estados Unidos'),
        ('Murilo', 'Henrique', '11122334455', 'Rua C, 789', 'Canada')";
    $pdo->exec($sql);
    echo "Usuários inseridos com sucesso!<br>";

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechando a conexão
$pdo = null;
?>
