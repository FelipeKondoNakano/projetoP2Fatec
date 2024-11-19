<!DOCTYPE html>
<html lang="en">

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

        <li><a href="visualizacaoDados.html">Visualização</a></li>

        <li><a href="avaliacao.html">Avaliações</a></li>
    </nav>

    <main class="home-container">
        <section class="search-section">
            <form action="script/visualizacaoDados.php " method="POST">
                <input type="text" name="nome_instituicao" placeholder="Digite o nome da instituição" required>
                <button type="submit" name="pesquisar">Pesquisar</button>
            </form>
        </section>

        <section class="dados">
            <table>
                <?php
                if (isset($result) && $result->num_rows > 0) {
                    echo "<h2>Resultados encontrados:</h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>Nome</th><th>Cidade</th><th>Estado</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['nome']}</td>
                                <td>{$row['cidade']}</td>
                                <td>{$row['estado']}</td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>Nenhuma instituição encontrada com o nome fornecido.</p>";
                }
                ?>
            </table>
        </section>
    </main>
    <script>
        // Função para carregar os dados da tabela a partir do arquivo PHP
        fetch('visualizacaoDados.php')
            .then(response => response.json())
            .then(data => {
                const tabelaDados = document.getElementById('tabela-dados');

                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.id}</td>
                        <td>${row.usuario_nome}</td>
                        <td>${row.instituicao_nome || 'N/A'}</td>
                        <td>${row.curso || 'N/A'}</td>
                        <td>${row.materia || 'N/A'}</td>
                        <td>${row.avaliacao}</td>
                        <td>${row.comentario}</td>
                        <td>${row.data}</td>
                    `;
                    tabelaDados.appendChild(tr);
                });
            })
            .catch(error => console.error('Erro ao carregar os dados:', error));
    </script>
</body>

</html>