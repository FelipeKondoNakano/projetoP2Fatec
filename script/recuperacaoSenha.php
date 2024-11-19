<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Certifique-se de ter o PHPMailer corretamente instalado via Composer

include_once("configBD.php");

try {
    // Criando uma conexão com PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
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

                // Inicializar o PHPMailer
                $mail = new PHPMailer(true);

                try {
                    // Configuração do servidor SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP (exemplo: Gmail)
                    $mail->SMTPAuth = true;
                    $mail->Username = 'seu-email@gmail.com'; // Seu e-mail
                    $mail->Password = 'sua-senha'; // Sua senha ou senha de app
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Destinatário
                    $mail->setFrom('seu-email@gmail.com', 'Sistema de Avaliação Educacional');
                    $mail->addAddress($email, 'Usuário'); // E-mail do destinatário

                    // Conteúdo do e-mail
                    $mail->isHTML(true);
                    $mail->Subject = 'Recuperação de Senha - Sistema de Avaliação Educacional';
                    $mail->Body = 'Olá, <br><br> Sua senha cadastrada no sistema é: <b>' . $senhaRecuperada . '</b><br><br> Se não foi você quem solicitou, ignore este e-mail.';

                    // Enviar e-mail
                    $mail->send();
                    echo 'E-mail enviado com sucesso. Verifique sua caixa de entrada.';
                } catch (Exception $e) {
                    echo "A mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
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