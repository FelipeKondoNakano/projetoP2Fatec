<?php
// Incluindo a conexão com o banco de dados
include_once("configBD.php");

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Receber os dados do formulário
    $nome = $_POST["inputNome"];
    $id = $_POST["inputId"];
    $email = $_POST["inputEmail"];
    $ra = $_POST["inputRa"];
    $instituicao = $_POST["inputInstituicao"];
    $cidade = $_POST["inputCidade"];
    $estado = $_POST["inputEstado"];
    $curso = $_POST["inputCurso"];
    $periodo = $_POST["periodo"];
    $senha = $_POST["password"];
    $confirmacao = $_POST["checkPassword"];

    // Iniciar transação para garantir integridade
    mysqli_begin_transaction($conexao);

    try {
        // Verificar se a instituição já existe
        $checkInstituicao = "SELECT pk_instituicao FROM instituicoes WHERE pk_instituicao = ?";
        $stmtInstituicao = $conexao->prepare($checkInstituicao);
        $stmtInstituicao->bind_param("s", $instituicao);
        $stmtInstituicao->execute();
        $resultInstituicao = $stmtInstituicao->get_result();

        if ($resultInstituicao->num_rows == 0) {
            // Inserir instituição, caso não exista
            $insertInstituicao = "INSERT INTO instituicoes (pk_instituicao, cidade, estado) VALUES (?, ?, ?)";
            $stmtInsertInstituicao = $conexao->prepare($insertInstituicao);
            $stmtInsertInstituicao->bind_param("sss", $instituicao, $cidade, $estado);
            $stmtInsertInstituicao->execute();
        }

        // Verificar se o curso já existe
        $checkCurso = "SELECT pk_curso FROM cursos WHERE pk_curso = ?";
        $stmtCurso = $conexao->prepare($checkCurso);
        $stmtCurso->bind_param("s", $curso);
        $stmtCurso->execute();
        $resultCurso = $stmtCurso->get_result();

        if ($resultCurso->num_rows == 0) {
            // Inserir curso, caso não exista
            $insertCurso = "INSERT INTO cursos (pk_curso, fk_instituicao) VALUES (?, ?)";
            $stmtInsertCurso = $conexao->prepare($insertCurso);
            $stmtInsertCurso->bind_param("ss", $curso, $instituicao);
            $stmtInsertCurso->execute();
        }

        // Verificar se as senhas coincidem
        if ($senha === $confirmacao) {
            // Gerar o hash da senha
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir o usuário
            $insertUsuario = "INSERT INTO usuarios (nome, id, email, pk_Ra, fk_instituicao, fk_curso, periodo, senha) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtInsertUsuario = $conexao->prepare($insertUsuario);
            $stmtInsertUsuario->bind_param("ssssssss", $nome, $id, $email, $ra, $instituicao, $curso, $periodo, $senhaHash);
            $stmtInsertUsuario->execute();
        } else {
            throw new Exception("As senhas não coincidem.");
        }

        // Confirmar transação se tudo ocorreu corretamente
        mysqli_commit($conexao);
        header("Location: ../login.php");
        exit();
    } catch (Exception $e) {
        // Reverter transação em caso de erro
        mysqli_rollback($conexao);
        echo "Erro: " . $e->getMessage();
    }

    // Fechar conexão com o banco
    mysqli_close($conexao);
}
?>
