<?php
    include_once("configBD.php");

    if(isset($_POST['submit'])){
        $curso = $_POST['nomeCurso'];
        $instituicao = $_POST['inputInstituicao'];

        $sql_chech_insituicao = "SELECT pk_instituicao FROM instituicoes WHERE pk_instituicao = '$instituicao'";
        $result = mysqli_query($conexao, $sql_chech_insituicao);

        if(mysqli_num_rows($result) > 0){
            $resultado = mysqli_query($conexao, "INSERT INTO cursos(pk_curso, fk_instituicao) VALUES('$curso','$instituicao')");
        }
        header("Location: ../cadastrarCurso.php");
        exit();
    }
?>