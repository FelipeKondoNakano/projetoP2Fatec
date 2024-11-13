<?php
    include_once("configBD.php");

    if (isset($_POST["submit"])) {
        // Recebe os dados do formulário
        $email = $_POST['email'];
        $senha = $_POST['password'];

        // Consulta SQL para buscar o usuário pelo email
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $conexao->query($sql);

        if ($result->num_rows > 0) {
            // Obtém o usuário do banco de dados
            $usuario = $result->fetch_assoc();

            // Verifica a senha utilizando password_verify
            if (password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                header("Location: ../userHome.php");
                exit();
            } else {
                // Senha incorreta
                echo "Email ou senha incorretos!";
            }
        } else {
            // Usuário não encontrado
            echo "Email ou senha incorretos!";
        }
    }
?>