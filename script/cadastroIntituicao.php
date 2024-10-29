<!-- cadastro_instituicao.php -->
<?php
include('conexao.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $query = "INSERT INTO instituicoes (nome, cidade, estado) VALUES ('$nome', '$cidade', '$estado')";
    
    if (mysqli_query($conn, $query)) {
        echo "Instituição cadastrada com sucesso!";
    } else {
        echo "Erro: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>