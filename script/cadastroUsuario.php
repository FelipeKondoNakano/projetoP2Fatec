<?php
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

    mysqli_begin_transaction($conexao);

    try {
        // Verificar se o curso já existe
            $checkCurso = "SELECT pk_curso FROM cursos WHERE pk_curso = '$curso'";
            $resultCurso = mysqli_query($conexao, $checkCurso);

            if (mysqli_num_rows($resultCurso) == 0) {
                // Inserir curso, caso não exista
                $insertCurso = "INSERT INTO cursos (pk_curso) VALUES ('$curso')";
                mysqli_query($conexao, $insertCurso);
            }

            // Verificar se a instituição já existe
            $checkInstituicao = "SELECT pk_instituicao FROM instituicoes WHERE pk_instituicao = '$instituicao'";
            $resultInstituicao = mysqli_query($conexao, $checkInstituicao);

            if (mysqli_num_rows($resultInstituicao) == 0) {
                // Inserir instituição, caso não exista
                $insertInstituicao = "INSERT INTO instituicoes (pk_instituicao, cidade, estado, fk_curso)
                                    VALUES ('$instituicao', '$cidade', '$estado', '$curso')";
                mysqli_query($conexao, $insertInstituicao);
            }
            if ($senha === $confirmacao) {
                // Gerar o hash da senha
                $senhaHash = password_hash($senha, PASSWORD_BCRYPT); // Utilizando bcrypt para criar o hash
                // Cadastrar o usuário relacionado à instituição
                $insertUsuario = "INSERT INTO usuarios (nome, id, email, pk_Ra, fk_instituicao, fk_curso, periodo, senha)
                                VALUES ('$nome', '$id', '$email', '$ra', '$instituicao', '$curso', '$periodo', '$senhaHash')";              
            }
            if (mysqli_query($conexao, $insertUsuario)) {
                // Se tudo der certo, confirmar transação
                mysqli_commit($conexao);
                header("Location: ../login.php");
            } else {
                throw new Exception("Erro ao cadastrar o usuário: " . mysqli_error($conexao));
            }
        } catch (Exception $e) {
            // Em caso de erro, desfazer transação
            mysqli_rollback($conexao);
            echo "Erro: " . $e->getMessage();
        }
        mysqli_close($conexao);
?>