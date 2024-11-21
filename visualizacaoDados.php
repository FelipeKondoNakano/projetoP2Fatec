<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style-visualizacao.css">
    <title>Visualização</title>
</head>

<body>
    <header class="head">
        <h1>Sistema de Avaliação Educacional</h1>
        <section class="menu-right">
            <section class="dropdown">
                <p><a href="#">Aluno</a></p>
                <section class="dropdown-content">
                    <a href="perfil.html">Perfil</a>
                    <a href="configuracoes.html">Configurações</a> <!--Possível página futura-->
                    <a href="login.php">Sair</a>
                </section>
            </section>
        </section>
    </header>

    <nav class="menu">
        <li> <a href="userHome.php">Home</a></li>
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
        <section class="search-section">
            <form  method="POST" action="script/visualizacaoDados.php">
                <input type="text" name="nome_instituicao" placeholder="Digite o nome da instituição" required>
                <button type="submit" name="pesquisar">Pesquisar</button>
            </form>
        </section>

        <section class="dados">
            <section class="visualizaDados">
                <table>
                    <?php
                        require("script/visualizacaoDados.php");
                        $listaInstituicao;
                        echo "<tr>
                                <th>Instituição</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                            </tr>";
                        while($instituicao = mysqli_fetch_assoc($listaInstituicao)){
                            echo "<tr>";
                            echo "<td>" . $instituicao["pk_instituicao"] . "</td>";
                            echo "<td>". $instituicao["cidade"] . "</td>";
                            echo "<td>". $instituicao["estado"] . "</td>";
                            echo "</tr>";
                        }                
                    ?>
                </table>
            </section>
        </section>
    </main>
    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>