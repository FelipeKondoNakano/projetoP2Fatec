<?php
    include_once("configBD.php");

    if(isset($_POST["submit"])){
        $materia = $_POST['inputMateria'];
        $periodo = $_POST['inputPeriodo'];
        $texto = $_POST['inputTexto'];
        $avaliacao = $_POST['rating'];

        $resultado = mysqli_query($conexao, "INSERT INTO materias(materia,periodo,texto,avaliacao) VALUES('$materia','$periodo','$texto','$avaliacao')");   
        header("Location: ../cadastrarMateria.html");
        exit();
    }
?>