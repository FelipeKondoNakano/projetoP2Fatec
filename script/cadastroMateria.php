<?php
    include_once("configBD.php");

    if(isset($_POST["submit"])){
        $materia = $_POST['inputMateria'];
        $periodo = $_POST['inputPeriodo'];
        $curso = $_POST['inputCurso'];

        $sql_check_curso = "SELECT pk_curso FROM cursos WHERE pk_curso = '$curso'";
        $result = mysqli_query($conexao, $sql_check_curso);

        if(mysqli_num_rows($result) > 0){
            $insertMateria = mysqli_query($conexao, "INSERT INTO materias(pk_materia,periodo,fk_curso) VALUES('$materia','$periodo','$curso')");   
        }
        header("Location: ../cadastrarMateria.php");
        exit();
    }
?>