<?php
// Conexão com o banco de dados
$servername = "localhost"; // Servidor onde o banco de dados está hospedado
$username = "root";        // Usuário do banco de dados
$password = "";            // Senha do banco de dados
$dbname = "nome_do_banco"; // Nome do banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificação da conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificação de envio do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['password'];

    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se o usuário for encontrado
        echo "Login realizado com sucesso!";
    } else {
        // Se o usuário não for encontrado
        echo "Email ou senha incorretos!";
    }
}

// Fechamento da conexão
$conn->close();
?>