<!-- cadastro_usuario.php -->
<?php
include('conexao.php'); // Conecta ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Encriptação da senha

    $query = "INSERT INTO usuarios (nome, codigo, email, senha) VALUES ('$nome', '$codigo', '$email', '$senha')";
    
    if (mysqli_query($conn, $query)) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>