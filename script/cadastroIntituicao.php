<?php
    // Supondo que você já tenha a conexão com o banco de dados em $conexao
    include("configBD.php");
    // Receber os dados do formulário
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Preparar a consulta para verificar se a instituição já existe
    $sql = "SELECT pk_instituicao FROM instituicoes WHERE pk_instituicao = ? AND cidade = ? AND estado = ?";
    $stmt = mysqli_prepare($conexao, $sql);

    // Bind dos parâmetros
    mysqli_stmt_bind_param($stmt, "sss", $nome, $cidade, $estado); // 'sss' indica que os três parâmetros são strings

    // Executar a consulta
    mysqli_stmt_execute($stmt);

    // Obter o resultado da consulta
    mysqli_stmt_store_result($stmt);

    // Verificar se a instituição já existe
    if (mysqli_stmt_num_rows($stmt) == 0) {
        // Inserir a nova instituição
        $insertSql = "INSERT INTO instituicoes (pk_instituicao, cidade, estado) VALUES (?, ?, ?)";
        $insertStmt = mysqli_prepare($conexao, $insertSql);
        
        // Bind dos parâmetros
        mysqli_stmt_bind_param($insertStmt, "sss", $nome, $cidade, $estado);
        
        // Executar a inserção
        if (mysqli_stmt_execute($insertStmt)) {
            echo "Instituição cadastrada com sucesso!";
        } else {
            echo "Erro ao cadastrar a instituição.";
        }
        
        // Fechar a declaração de inserção
        mysqli_stmt_close($insertStmt);
    } else {
        echo "Instituição já cadastrada.";
    }

    // Fechar a declaração de verificação
    mysqli_stmt_close($stmt);
?>
