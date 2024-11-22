<?php
    session_start(); // Iniciar sessão para acompanhar progresso do usuário
    include('configBD.php');

    if(isset($_POST['instituicao_submit'])){
        $instituicao = $_POST['instituicao'];
        $rating = $_POST['instituicao_rating'];
        $avaliacao = $_POST['instituicao_comentario'];

        $sql = "INSERT INTO avaliacoes(texto,avaliacao,fk_instituicao) VALUES('$avaliacao','$rating','$instituicao')";
        $resultado = mysqli_query($conexao, $sql);
    }
    if(isset($_POST['curso_submit'])){
        $curso = $_POST['curso'];
        $rating = $_POST['curso_rating'];
        $avaliacao = $_POST['curso_comentario'];

        $sql = "INSERT INTO avaliacoes(texto,avaliacao,fk_curso) VALUES('$avaliacao','$rating','$curso')";
        $resultado = mysqli_query($conexao, $sql);
    }
    if(isset($_POST['materia_submit'])){
        $materia = $_POST['materia'];
        $rating = $_POST['materia_rating'];
        $avaliacao = $_POST['materia_comentario'];

        $sql = "INSERT INTO avaliacoes(texto,avaliacao,fk_materia) VALUES('$avaliacao','$rating','$materia')";
        $resultado = mysqli_query($conexao, $sql);
    }
    header("Location: ../avaliacao.php");
    exit();
?>