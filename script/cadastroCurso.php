<?php
    include_once("configBD.php");

    if(isset($_POST['submit'])){
        $curso = $_POST['nomeCurso'];


        $resultado = mysqli_query($conexao, "INSERT INTO cursos(curso,texto,avaliacao) VALUES('$curso')");
        header("Location: ../cadastrarCurso.php");
        exit();
    }
?>