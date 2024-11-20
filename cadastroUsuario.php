<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style-cadastroUsuario.css">
    <title>Cadastro de Usuário</title>
</head>

<body>
    <header class="head">
        <h1>Sistema de Avaliação Educacional</h1>
        <p><a href="home.php">Home</a></p>
    </header>

    <div class="cadastro-container">
        <h2>Cadastro de Usuário</h2>
        
        <form method="POST" action="script/cadastroUsuario.php">
            <input type="text" id="name" name="inputNome" placeholder="Digite seu nome" required>
            
            <input type="text" id="id" name="inputId" placeholder="Digite seu iD" required>
            
            <input type="email" id="email" name="inputEmail" placeholder="Digite seu email" required>
            <input type="text" id="ra" name="inputRa" placeholder="Digite seu RA" required>
            
            <input type="text" id="instituicao" name="inputInstituicao" placeholder="Digite o nome da instituição" required>
            <input type="text" id="cidade" name="inputCidade" placeholder="Digite a cidade" required>
            <input type="text" id="estado" name="inputEstado" placeholder="Digite o seu estado" required>
            <input type="text" id="curso" name="inputCurso" placeholder="Digite seu curso" required>
            
            <!-- Seleção de período -->
            <label for="periodo">Selecione o período:</label>
            <div class="periodo-container">
                <label class="periodo-option">
                    <input type="radio" name="periodo" value="diurno" required>
                    <span class="periodo-dot"></span> Diurno
                </label>
                <label class="periodo-option">
                    <input type="radio" name="periodo" value="noturno" required>
                    <span class="periodo-dot"></span> Noturno
                </label>
            </div>
            
            <!-- Senha e confirmação de senha -->
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            <input type="password" id="passwordConfirm" name="checkPassword" placeholder="Confirme a sua senha" required>
            
            <button type="submit" name="submit">Cadastrar</button>
        </form>
        
        <p class="login-link">Já possui uma conta? <a href="login.php">Faça login</a></p>
    </div>
    

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>