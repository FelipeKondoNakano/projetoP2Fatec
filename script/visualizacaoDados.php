<?php
include('configBD.php'); 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Conexão falhou: ' . $e->getMessage();
    }

    // Buscar comentários e avaliações de instituições, cursos e matérias
    $stmt = $pdo->prepare("SELECT a.id, u.nome AS usuario_nome, i.nome AS instituicao_nome, c.curso, m.materia, a.comentario, a.avaliacao, a.data
                        FROM avaliacoes a
                        JOIN usuarios u ON a.usuario_id = u.id
                        LEFT JOIN instituicoes i ON a.instituicao_id = i.id
                        LEFT JOIN cursos c ON a.curso_id = c.id
                        LEFT JOIN materias m ON a.materia_id = m.id");
    $stmt->execute();
    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retornar os dados no formato JSON
    echo json_encode($dados);
?>