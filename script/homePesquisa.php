<?php
    include('configBD.php'); 

    if (isset($_POST['pesquisar'])) {
        $nomeInstituicao = $_POST['nome_instituicao'];

        // Consulta ao banco de dados para buscar a instituição
        $sql = "SELECT * FROM instituicoes WHERE nome LIKE '%$nomeInstituicao%'";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            // Exibe os dados da instituição e suas avaliações
            while ($instituicao = mysqli_fetch_assoc($resultado)) {
                echo "<section class='instituicao-info'>";
                echo "<h2>Instituição: " . $instituicao['nome'] . "</h2>";
                echo "<p>Cidade: " . $instituicao['cidade'] . "</p>";
                echo "<p>Estado: " . $instituicao['estado'] . "</p>";
                echo "<p>Descrição: " . $instituicao['texto'] . "</p>";
                echo "<p>Avaliação: " . $instituicao['avaliacao'] . "/5</p>";
                echo "</section>";

                // Buscando cursos e matérias relacionadas à instituição
                $sqlCursos = "SELECT * FROM cursos WHERE id_instituicao = " . $instituicao['id'];
                $resultadoCursos = mysqli_query($conexao, $sqlCursos);
                echo "<h3>Cursos</h3>";
                while ($curso = mysqli_fetch_assoc($resultadoCursos)) {
                    echo "<p>Curso: " . $curso['curso'] . "</p>";
                    echo "<p>Descrição: " . $curso['texto'] . "</p>";
                    echo "<p>Avaliação: " . $curso['avaliacao'] . "/5</p>";
                }

                $sqlMaterias = "SELECT * FROM materias WHERE id_instituicao = " . $instituicao['id'];
                $resultadoMaterias = mysqli_query($conexao, $sqlMaterias);
                echo "<h3>Matérias</h3>";
                while ($materia = mysqli_fetch_assoc($resultadoMaterias)) {
                    echo "<p>Matéria: " . $materia['materia'] . "</p>";
                    echo "<p>Descrição: " . $materia['texto'] . "</p>";
                    echo "<p>Avaliação: " . $materia['avaliacao'] . "/5</p>";
                }
            }
        } else {
            // Mensagem caso a instituição não esteja cadastrada
            echo "<p>Instituição não encontrada. Verifique o nome ou cadastre a instituição.</p>";
        }
    }
?>