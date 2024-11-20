<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style-cadastroGeral.css">
    <title>Painel do Usuário</title>
</head>

<body>
    <header class="head">
        <h1>Sistema de Avaliação Educacional</h1>
        <p><a href="userHome.php">Home</a></p>
    </header>

    <nav class="menu">
        <li><a href="#Cadastro">Cadastrar</a>
            <ul class="cadastro">
                <li><a href="cadastroInstituicao.php">Cadastrar Instituição</a></li>
                <li><a href="cadastrarCurso.php">Cadastrar Curso</a></li>
                <li><a href="cadastrarMateria.php">Cadastrar Matéria</a></li>
            </ul>
        </li>

        <li><a href="visualizacaoDados.html">Visualização</a></li>

        <li><a href="avaliacao.html">Avaliações</a></li>
    </nav>
    
    <main class="home-container">
        <h2>Painel do Usuário</h2>

        <section class="cadastro-container" id="cadastroContainer" style="display: none;">
            <h3>Cadastro de Instituição</h3>
            
            <form method="POST" action="script/cadastroIntituicao.php">
                <input type="text" id="nome" name="nome" placeholder="Digite o nome da instituição" required>
                
                <input type="text" id="cidade" name="cidade" placeholder="Digite a cidade" required>
                
                <input type="text" id="estado" name="estado" placeholder="Digite o estado" required>
                
                <button type="submit" name="submit">Cadastrar Instituição</button>
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>

    <script>
        document.getElementById("cadastro-instituicao").onclick = function() {
            document.getElementById("cadastroContainer").style.display = "block";
        };
    </script>
</body>

</html>