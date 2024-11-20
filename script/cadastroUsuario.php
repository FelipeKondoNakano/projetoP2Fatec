<?php
// Incluindo a conexão com o banco de dados
include_once("configBD.php");

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
    $checkInstituicao = "SELECT pk_instituicao FROM instituicoes WHERE pk_instituicao = '$instituicao'";
    $resultInstituicao = mysqli_query($conexao, $checkInstituicao);

    if (mysqli_num_rows($resultInstituicao) == 0) {
        // Inserir instituição, caso não exista
        $insertInstituicao = "INSERT INTO instituicoes (pk_instituicao, cidade, estado)
                                VALUES ('$instituicao', '$cidade', '$estado')";
        mysqli_query($conexao, $insertInstituicao);
    }

    // Verificar se o curso já existe
    $checkCurso = "SELECT pk_curso FROM cursos WHERE pk_curso = '$curso'";
    $resultCurso = mysqli_query($conexao, $checkCurso);

    if (mysqli_num_rows($resultCurso) == 0) {
        // Inserir curso, caso não exista
        $insertCurso = "INSERT INTO cursos (pk_curso, fk_instituicao) VALUES ('$curso', '$instituicao')";
        mysqli_query($conexao, $insertCurso);
    }

    if ($senha === $confirmacao) {
        // Gerar o hash da senha
        $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

        // Inserir o usuário
        $insertUsuario = "INSERT INTO usuarios (nome, id, email, pk_Ra, fk_instituicao, fk_curso, periodo, senha)
                          VALUES ('$nome', '$id', '$email', '$ra', '$instituicao', '$curso', '$periodo', '$senhaHash')";
        mysqli_query($conexao, $insertUsuario);
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

mysqli_close($conexao);
?>
