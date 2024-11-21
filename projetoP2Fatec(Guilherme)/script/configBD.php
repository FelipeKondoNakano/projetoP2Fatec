<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "avaliaedu";

    $conexao = new mysqli($host, $username, $password, $database);
    if ($conexao->connect_error) {
        die("Erro ao conectar ao banco de dados: " . $conexao->connect_error);
    }
?>