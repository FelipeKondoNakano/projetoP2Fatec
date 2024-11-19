<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id']; // Usuário autenticado

    if (isset($_POST['instituicao_submit'])) {
        $entidadeId = $_POST['instituicao'];
        $rating = $_POST['instituicao_rating'];
        $comentario = mysqli_real_escape_string($conexao, $_POST['instituicao_comentario']);
        $tabela = "instituicoes";

    } elseif (isset($_POST['curso_submit'])) {
        $entidadeId = $_POST['curso'];
        $rating = $_POST['curso_rating'];
        $comentario = mysqli_real_escape_string($conexao, $_POST['curso_comentario']);
        $tabela = "cursos";

    } elseif (isset($_POST['materia_submit'])) {
        $entidadeId = $_POST['materia'];
        $rating = $_POST['materia_rating'];
        $comentario = mysqli_real_escape_string($conexao, $_POST['materia_comentario']);
        $tabela = "materias";
    }

    $sql = "SELECT * FROM avaliacoes WHERE user_id = $userId AND entidade_id = $entidadeId AND tipo = '$tabela'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $updateSql = "UPDATE avaliacoes SET rating = $rating, comentario = '$comentario', data_avaliacao = NOW() 
                      WHERE user_id = $userId AND entidade_id = $entidadeId AND tipo = '$tabela'";
        mysqli_query($conexao, $updateSql);
        echo "Avaliação atualizada com sucesso!";
    } else {
        echo "Nenhuma avaliação encontrada para reavaliar.";
    }
}
?>