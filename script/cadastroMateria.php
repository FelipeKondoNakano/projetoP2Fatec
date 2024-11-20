<?php
    include_once("configBD.php");

    if(isset($_POST["submit"])){
        $materia = $_POST['inputMateria'];
        $periodo = $_POST['inputPeriodo'];
        $curso = $_POST['inputCurso'];
        $resultado = mysqli_query($conexao, "INSERT INTO materias(pk_materia,periodo,fk_curso) VALUES('$materia','$periodo','$curso')");   
        header("Location: ../cadastrarMateria.php");
        exit();
    }
?>