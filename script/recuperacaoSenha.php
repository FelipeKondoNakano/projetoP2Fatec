<?php
    include_once("configBD.php");

    try {
        // Criando uma conexão com PDO
        $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

            if ($email) {
                // Consultar o banco para verificar se o e-mail existe
                $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE email = :email");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Obtém a senha do usuário
                    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
                    $senhaRecuperada = $usuario['senha'];

                    // Enviar o e-mail com a senha
                    $assunto = "Recuperação de Senha - Sistema de Avaliação Educacional";
                    $mensagem = "Olá, \n\nSua senha cadastrada no sistema é: $senhaRecuperada\n\n";
                    $mensagem .= "Se não foi você quem solicitou, ignore este e-mail.\n";
                    $headers = "From: no-reply@sistemaavaliacao.com";

                    if (mail($email, $assunto, $mensagem, $headers)) {
                        echo "E-mail enviado com sucesso. Verifique sua caixa de entrada.";
                    } else {
                        echo "Falha ao enviar o e-mail. Tente novamente mais tarde.";
                    }
                } else {
                    echo "E-mail não encontrado. Verifique e tente novamente.";
                }
            } else {
                echo "Por favor, insira um e-mail válido.";
            }
        }
    } catch (PDOException $e) {
        echo "Erro na conexão com o banco de dados: " . $e->getMessage();
    }
?>
