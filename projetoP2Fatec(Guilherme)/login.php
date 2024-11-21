<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style-login.css">
    <title>Sistema de Avaliação Educacional</title>
</head>

<body>
    <header class="head">
        <h1>Sistema de Avaliação Educacional</h1>
        <p><a href="home.php">Home</a></p>
    </header>

    <section class="login-container">
        <h2>Login</h2>

        <!-- Exibe a mensagem de erro -->
        <?php
        if (isset($_SESSION['erro_login'])) {
            echo "<p style='color: red; text-align: center;'>" . $_SESSION['erro_login'] . "</p>";
            unset($_SESSION['erro_login']); // Remove a mensagem após exibir
        }
        ?>

        <form method="POST" action="script/login.php">
            <!-- Campo de email -->
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Digite seu email" 
                required
                value="<?php echo isset($_SESSION['email_preservado']) ? $_SESSION['email_preservado'] : ''; ?>"
            >

            <!-- Campo de senha -->
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Digite sua senha" 
                required
            >

            <button type="submit" name="submit">Entrar</button>
        </form>

        <p class="signup"><a href="recuperacaoSenha.php">Esqueceu sua senha?</a></p>
    </section>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>
