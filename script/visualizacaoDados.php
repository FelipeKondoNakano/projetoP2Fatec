<?php
// Inclua o arquivo de configuração para a conexão com o banco de dados
include('configBD.php');

// Estabelecer a conexão com o banco de dados usando MySQLi
$conn = new mysqli($host, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if (isset($_POST['pesquisar'])) {
    $nome_instituicao = $conn->real_escape_string($_POST['nome_instituicao']);

    // Query de busca
    $sql = "SELECT nome, cidade, estado FROM instituicoes WHERE nome LIKE '%$nome_instituicao%'";
    $result = $conn->query($sql);

    // Depuração
    if ($result === false) {
        die("Erro na consulta: " . $conn->error);
    }
}

// Buscar comentários e avaliações de instituições, cursos e matérias
$sql = "SELECT nome, cidade, estado FROM instituicoes WHERE nome LIKE '%$nome_instituicao%'";
$result = $conn->query($sql);

if ($result === false) {
    echo "Erro na consulta: " . $conn->error;
    exit;
} elseif ($result->num_rows === 0) {
    echo "<p>Nenhuma instituição encontrada com o nome fornecido.</p>";
    exit;
} else {
    echo "<p>Consulta executada com sucesso. Resultados encontrados: {$result->num_rows}</p>";
}

// Apresentar as avaliações em um formato legível
/* if ($result->num_rows > 0) {
    echo "<h2>Avaliações e Comentários:</h2>";
    echo "<table border='1'>";
    echo "<tr>
            <th>ID</th><th>Usuário</th><th>Instituição</th>
            <th>Curso</th><th>Matéria</th><th>Comentário</th>
            <th>Avaliação</th><th>Data</th>
          </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['usuario_nome']}</td>
                <td>{$row['instituicao_nome']}</td>
                <td>{$row['curso']}</td>
                <td>{$row['materia']}</td>
                <td>{$row['comentario']}</td>
                <td>{$row['avaliacao']}</td>
                <td>{$row['data']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhuma avaliação encontrada.</p>";
} */
return $result;

// Fechar a conexão
$conn->close();
?>
