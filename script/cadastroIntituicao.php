<!-- cadastro_instituicao.php -->
<?php
    include('configBD.php'); 

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $texto = $_POST['inputTexto'];
        $stars = $_POST['rating'];

        $resultado = mysqli_query($conexao, "INSERT INTO instituicoes(nome, cidade, estado, texto, avaliacao) VALUES ('$nome', '$cidade', '$estado','$texto','$stars')");
        header("Location: ../cadastroInstituicao.php");
        exit();
    }
?>