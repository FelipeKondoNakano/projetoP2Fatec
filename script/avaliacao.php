<?php
    session_start(); // Iniciar sessão para acompanhar progresso do usuário
    include('configBD.php');

    // Verificar etapa de avaliação
    $etapa = isset($_GET['etapa']) ? $_GET['etapa'] : null; 

    // Processar formulários enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($etapa === 'instituicao' && isset($_POST['instituicao_submit'])) {
            $instituicao_id = $_POST['instituicao'];
            $rating = $_POST['instituicao_rating'];
            $comentario = $_POST['instituicao_comentario'];

            $sql = "INSERT INTO avaliacoes_instituicoes (instituicao_id, rating, comentario) VALUES ('$instituicao_id', '$rating', '$comentario')";
            if (mysqli_query($conexao, $sql)) {
                $_SESSION['etapa'] = 'curso'; // Avançar para avaliação de curso
            }
        } elseif ($etapa === 'curso' && isset($_POST['curso_submit'])) {
            $curso_id = $_POST['curso'];
            $rating = $_POST['curso_rating'];
            $comentario = $_POST['curso_comentario'];

            $sql = "INSERT INTO avaliacoes_cursos (curso_id, rating, comentario) VALUES ('$curso_id', '$rating', '$comentario')";
            if (mysqli_query($conexao, $sql)) {
                $_SESSION['etapa'] = 'materia'; // Avançar para avaliação de matéria
            }
        } elseif ($etapa === 'materia' && isset($_POST['materia_submit'])) {
            $materia_id = $_POST['materia'];
            $rating = $_POST['materia_rating'];
            $comentario = $_POST['materia_comentario'];

            $sql = "INSERT INTO avaliacoes_materias (materia_id, rating, comentario) VALUES ('$materia_id', '$rating', '$comentario')";
            if (mysqli_query($conexao, $sql)) {
                unset($_SESSION['etapa']); // Finalizar avaliação
                echo "<script>alert('Obrigado por completar todas as avaliações!'); window.location.href = 'userHome.php';</script>";
                exit;
            }
        }
    }
?>