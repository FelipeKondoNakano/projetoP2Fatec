<?php
    include_once("configBD.php");

    if(isset($_POST['submit'])){
        $curso = $_POST['nomeCurso'];
        $texto = $_POST['inputTexto'];
        $avaliacao = $_POST['rating'];

        $resultado = mysqli_query($conexao, "INSERT INTO cursos(curso,texto,avaliacao) VALUES('$curso','$texto','$avaliacao')");
        header("Location: ../cadastrarCurso.html");
        exit();
    }
?>