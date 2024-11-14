<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style-cadastroGeral.css">
    <title>Cadastrar Curso</title>
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

        <nav class="actions">
            <button id="cadastro-curso">Cadastrar Curso</button>
            <button id="reavaliar-curso">Reavaliar Curso</button>
            <button id="pesquisar-curso">Pesquisar Curso</button>
        </nav>

        <section class="cadastro-container" id="cadastroContainer" style="display: none;">
            <h3>Cadastro de Curso</h3>

            <form method="POST" action="script/cadastroCurso.php">
                <input type="text" id="nome" name="nomeCurso" placeholder="Digite o nome do curso" required>

                <textarea id="comentario" name="inputTexto" placeholder="Deixe seu comentário" required></textarea>

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

                <button type="submit" name="submit">Cadastrar Curso</button>
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>

    <script>
        document.getElementById("cadastro-curso").onclick = function () {
            document.getElementById("cadastroContainer").style.display = "block";
        };

        document.getElementById("pesquisar-curso").onclick = function () {
            // Lógica para pesquisar a instituição pode ser implementada aqui.
            alert("Funcionalidade de pesquisa ainda não implementada.");
        };
    </script>
</body>

</html>