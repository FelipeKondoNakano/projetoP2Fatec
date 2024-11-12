<?php
    include_once("configBD.php");

    if(isset($_POST["submit"])) {
        // Atribuir valores das variáveis
        $nome = $_POST["inputNome"];
        $id = $_POST["inputId"];
        $email = $_POST["inputEmail"];
        $ra = $_POST["inputRa"];
        $instituicao = $_POST["inputInstituicao"];
        $curso = $_POST["inputCurso"];
        $periodo = $_POST["periodo"];
        $senha = $_POST["password"];
        $confirmacao = $_POST["checkPassword"];

        // Verificar se as senhas coincidem
        if ($senha === $confirmacao) {
            // Gerar o hash da senha
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT); // Utilizando bcrypt para criar o hash

            // Preparar a consulta para inserir os dados no banco
            $resultado = mysqli_query($conexao, "INSERT INTO usuarios(nome, id, email, ra, instituicao, curso, periodo, senha) 
                                                VALUES('$nome', '$id', '$email', '$ra', '$instituicao', '$curso', '$periodo', '$senhaHash')");

            if ($resultado) {
                // Redirecionar para a página de login após o cadastro
                header("Location: ../login.html");
                exit(); 
            } else {
                // Caso ocorra algum erro na inserção
                echo "Erro ao cadastrar o usuário: " . mysqli_error($conexao);
            }
        } else {
            // As senhas não coincidem
            echo "As senhas não coincidem. Tente novamente.";
        }
    } else {
        // Caso algum campo obrigatório não tenha sido preenchido
        echo "Por favor, preencha todos os campos.";
    }
?>