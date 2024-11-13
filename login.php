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
        <p><a href="home.php">Voltar para a Home</a></p>
    </header>

    <section class="login-container">
        <h2>Login</h2>
        <form  method="POST" action="script/login.php">
            <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>

            <button type="submit" name="submit">Entrar</button>
        </form>

        <p class="signup">Ainda não tem uma conta? <a href="cadastroUsuario.php">Cadastre-se aqui</a></p>
    </section>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>

</body>

</html>