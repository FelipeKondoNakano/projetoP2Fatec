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

        <li><a href="#Cadastro">Visualização</a></li>

        <li><a href="#Avaliacao">Avaliações</a></li>
    </nav>

    <main class="home-container">
        <h2>Painel do Usuário</h2>
        <h3>Cadastro de Matéria</h3>
        <section class="cadastro-container" id="cadastroContainer">
            <form method="POST" action="script/cadastroMateria.php">
                <input type="text" id="nome" placeholder="Digite o nome da matéria" name="inputMateria" required>

                <input type="text" id="estado" placeholder="Digite o período" name="inputPeriodo" required>

                <textarea id="comentario" placeholder="Deixe seu comentário" name="inputTexto" required></textarea>

                <label for="nota">Avaliação (0 a 5 estrelas)</label>
                <div class="stars">
                    <input type="radio" id="star1" name="rating" value="1" />
                    <label for="star1">★</label>
                    <input type="radio" id="star2" name="rating" value="2" />
                    <label for="star2">★</label>
                    <input type="radio" id="star3" name="rating" value="3" />
                    <label for="star3">★</label>
                    <input type="radio" id="star4" name="rating" value="4" />
                    <label for="star4">★</label>
                    <input type="radio" id="star5" name="rating" value="5" />
                    <label for="star5">★</label>
                </div>

                <button type="submit" name="submit">Cadastrar Matéria</button>
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>