<!-- cadastro_instituicao.php -->
<?php
    include('configBD.php'); 

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $texto = $_POST['inputTexto'];
        $stars = $_POST['rating'];

        // Verifica se a instituição já está cadastrada
        $sql = "SELECT * FROM instituicoes WHERE nome = '$nome' AND cidade = '$cidade' AND estado = '$estado'";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
        // Exibe uma mensagem de erro se a instituição já existir
        echo "<script>alert('Instituição já cadastrada.'); window.location.href = '../cadastroInstituicao.php';</script>";
        } else {
        // Insere a nova instituição no banco de dados
        $sql = "INSERT INTO instituicoes(nome, cidade, estado, texto, avaliacao) VALUES ('$nome', '$cidade', '$estado', '$texto', '$stars')";
        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Instituição cadastrada com sucesso!'); window.location.href = '../cadastroInstituicao.php';</script>";
        } else {
            echo "Erro ao cadastrar a instituição: " . mysqli_error($conexao);
        }
    }

        $resultado = mysqli_query($conexao, "INSERT INTO instituicoes(nome, cidade, estado, texto, avaliacao) VALUES ('$nome', '$cidade', '$estado','$texto','$stars')");
        header("Location: ../cadastroInstituicao.php");
        exit();
    }
?>