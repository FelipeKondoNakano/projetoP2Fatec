
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
        <section class="menu-right">
            <section class="dropdown">
                <p><a href="#">Aluno</a></p>
                <section class="dropdown-content">
                    <a href="perfil.html">Perfil</a> <!--Possível página futura-->
                    <a href="configuracoes.html">Configurações</a> <!--Possível página futura-->
                    <a href="login.php">Sair</a>
                </section>
            </section>
        </section>
    </header>

    <nav class="menu">
        <li><a href="#Cadastro">Cadastrar</a>
            <ul class="cadastro">
                <li><a href="cadastroInstituicao.php">Cadastrar Instituição</a></li>
                <li><a href="cadastrarCurso.php">Cadastrar Curso</a></li>
                <li><a href="cadastrarMateria.php">Cadastrar Matéria</a></li>
            </ul>
        </li>

        <li><a href="visualizacaoDados.php">Visualização</a></li>

        <li><a href="avaliacao.php">Avaliações</a></li>
        <li><a href="reavaliacao.php">Reavaliações</a></li>
    </nav>

    <main class="home-container">
        <h2>Painel do Usuário</h2>
        <h3>Cadastro de Curso</h3>
        <section class="cadastro-container" id="cadastroContainer">
            <form method="POST" action="script/cadastroCurso.php">
                <input type="text" id="nome" name="nomeCurso" placeholder="Digite o nome do curso" required>
                <label for="instituicao">Selecione a Instituição</label>
                <select id="instituicao" name="inputInstituicao" required>
                    <option value="">Escolha uma Instituição</option>
                    <?php
                        // Conexão com o banco de dados
                        include_once("script/configBD.php");

                        $sql = "SELECT pk_instituicao FROM instituicoes"; // Aqui você deve trazer o campo de nome do curso
                        $result = mysqli_query($conexao, $sql);

                        // Loop para preencher os cursos no <select>
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo"<option value='" . $row["pk_instituicao"] . "'>" . $row["pk_instituicao"] . "</option>";
                        }
                    ?>
                </select>
                
                <button type="submit" name="submit">Cadastrar Curso</button>
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>
