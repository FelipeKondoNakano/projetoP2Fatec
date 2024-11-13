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

    <nav class="menu">
        <li><a href="#Cadastro">Cadastrar</a>
            <ul class="cadastro">
                <li><a href="cadastroInstituicao.php">Cadastrar Instituição</a></li>
                <li><a href="cadastrarCurso.php">Cadastrar Curso</a></li>
                <li><a href="cadastroUsuario.php">Cadastrar Usuário</a></li>
                <li><a href="cadastrarMateria.php">Cadastrar Matéria</a></li>
            </ul>
        </li>
        <li><a href="#Cadastro">Visualização</a>
            <ul class="visualizar">
                <li><a href="#">Visualizar Instituições</a></li>
                <li><a href="#">Visualizar Curso</a></li>
                <li><a href="#">Visualizar Usuário</a></li>
                <li><a href="#">Visualizar Matérias</a></li>
            </ul>
        </li>
        <li><a href="#Avaliacao">Avaliações</a>
            <ul class="avaliacao">
                <li><a href="#">Avaliar Instituições</a></li>
                <li><a href="#">Avaliar Cursos</a></li>
                <li><a href="#">Avaliar Matérias</a></li>
            </ul>
        </li>
    </nav>

    <div class="cadastro-container">
        <h2>Cadastro de Usuário</h2>
        
        <form method="POST" action="script/cadastroUsuario.php">
            <input type="text" id="name" name="inputNome" placeholder="Digite seu nome" required>
            
            <input type="text" id="id" name="inputId" placeholder="Digite seu iD" required>
            
            <input type="email" id="email" name="inputEmail" placeholder="Digite seu email" required>
            <input type="text" id="ra" name="inputRa" placeholder="Digite seu RA" required>
            
            <input type="text" id="instituicao" name="inputInstituicao" placeholder="Digite o nome da instituição" required>
            
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
        
        <p class="login-link">Já possui uma conta? <a href="login.html">Faça login</a></p>
    </div>
    

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>