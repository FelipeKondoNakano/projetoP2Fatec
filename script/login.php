<?php
session_start();

if (isset($_POST['submit'])) {
    include_once("configBD.php");

    // Receber os dados do formulário
    $email = trim($_POST['email']); // Remove espaços em branco
    $senha = $_POST['password'];

    // Validação inicial
    if (empty($email) && empty($senha)) {
        $_SESSION['erro_login'] = "Por favor, preencha o e-mail e a senha.";
    } elseif (empty($email)) {
        $_SESSION['erro_login'] = "Por favor, preencha o e-mail.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erro_login'] = "Formato de e-mail inválido.";
    } elseif (empty($senha)) {
        $_SESSION['erro_login'] = "Por favor, preencha a senha.";
    } else {
        // Consulta SQL usando prepared statements
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Obtém o usuário
            $usuario = $result->fetch_assoc();

            // Verifica a senha
            if (password_verify($senha, $usuario['senha'])) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id'];
                header("Location: ../userHome.php");
                exit();
            } else {
                $_SESSION['erro_login'] = "Senha incorreta!";
                $_SESSION['email_preservado'] = $email; // Preserva o email
            }
        } else {
            $_SESSION['erro_login'] = "E-mail não cadastrado!";
        }
    }

    // Redireciona para a página de login com a mensagem de erro
    header("Location: ../login.php");
    exit();
}
?>
