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

        <li><a href="#Cadastro">Visualização</a></li>

        <li><a href="#Avaliacao">Avaliações</a></li>
    </nav>

    <main class="home-container">
        <h2>Painel do Usuário</h2>
        <h3>Cadastro de Matéria</h3>
        <section class="cadastro-container" id="cadastroContainer">
            <form method="POST" action="script/cadastroMateria.php">
                
                <input type="text" id="estado" placeholder="Digite o período" name="inputPeriodo" required>
                <input type="text" id="nome" placeholder="Digite o nome da matéria" name="inputMateria" required>
                
                <label for="cursos">Selecione o Curso</label>
                <select id="cursos" name="inputCurso" required>
                    <option value="">Escolha um Curso</option>
                    <?php
                        // Conexão com o banco de dados
                        include_once("script/configBD.php");

                        // Consulta para pegar os cursos
                        $sql = "SELECT pk_curso FROM cursos"; // Aqui você deve trazer o campo de nome do curso
                        $result = mysqli_query($conexao, $sql);

                        // Loop para preencher os cursos no <select>
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo"<option value='" . $row["pk_curso"] . "'>" . $row["pk_curso"] . "</option>";
                        }
                    ?>
                </select>

                <button type="submit" name="submit">Cadastrar Matéria</button>
            </form>
        </section>
    </main>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>