<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/style-home.css">
    <title>Sistema de Avaliação Educacional</title>
</head>

<body>

    <header class="head">
        <h1>Sistema de Avaliação Educacional</h1>
        <p class="login"><a href="login.php">Login</a></p>
        <p class="cadastro"><a href="cadastroUsuario.php">Cadastre-se</a></p>

    </header>

    <nav class="alerta">
        <h5>Para futuros estudantes, todas as informações e avaliaçãoes aqui presentes foram feitas pela comunidade de estudantes cadastrados no sistema.</h5>
    </nav>
    <!-- Formulário de pesquisa de instituição -->
    <section class="search-section">
        <form action="" method="POST">
            <input type="text" name="nome_instituicao" placeholder="Digite o nome da instituição" required>
            <button type="submit" name="pesquisar">Pesquisar</button>
        </form>
    </section>
    
    <section class="body">
        <section class="content">
            <h1 class="titulo">Como funciona nosso sistema web de avaliação?</h1>
            <p class="texto">Nosso sistema web permite que <span>estudantes do ensino superior</span>
                compartilhem suas experiências e avaliações sobre<span> cursos, matérias e Instituições de Ensino</span>. Dessa forma, <span>futuros ingressantes</span>
                têm acesso a <span>informações detalhadas e imparciais</span>, ajudando-os a tomar
                decisões mais bem fundamentadas sobre onde e o que estudar.
            </p>
            <p class="texto">Por trás desse sistema, há uma estrutura que conecta os estudantes
                a um<span> banco de dados seguro e organizado</span>. Quando um usuário acessa o
                site, ele interage com uma <span>interface intuitiva e amigável</span>, projetada
                para facilitar a navegação e a criação de avaliações. Cada avaliação
                é armazenada em nossa base de dados, onde é vinculada aos respectivos cursos,
                professores ou instituições. Assim, quando um futuro aluno realiza uma busca,
                ele pode visualizar uma média das avaliações e detalhes específicos
                com base no que outros estudantes avaliaram.
            </p>
        </section>
        <img src="img/university.jpg" alt="Universidade">
    </section>
    <section class="body">
        <img src="img/aluno.jpg" alt="grupodealunos">
        <section class="content">
            <h1 class="titulo">Para você aluno</h1>
            <h3 class="texto">O que você pode avaliar?</h3>
            <p class="texto">
                <span>Instituições:</span> Faça uma análise completa da sua universidade ou faculdade.
                Descreva como é o ambiente, os métodos de ensino e avalie desde a direção até os funcionários,
                destacando os pontos fortes e as áreas que precisam de melhoria.
            </p>

            <p class="texto">
                <span>Cursos: </span>Avalie o curso que você está cursando! Fale sobre a coordenação, a
                estrutura curricular e a interação entre os alunos. Esta é a sua chance de compartilhar se o
                curso atende às suas expectativas e como ele poderia evoluir.
            </p>

            <p class="texto">
                <span>Matérias:</span> Se desejar, você também pode avaliar matérias específicas. Informe como é a
                didática do professor, a abordagem dos conteúdos e o impacto da disciplina no curso. Avaliar matérias
                individuais ajuda futuros alunos a entender a fundo o que esperar do currículo.
            </p>
        </section>
    </section>

    <footer class="foot">
        <p>&copy; Direitos Acadêmicos reservados</p>
    </footer>
</body>

</html>