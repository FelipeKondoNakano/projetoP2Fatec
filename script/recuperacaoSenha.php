<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

require 'vendor/autoload.php'; // Certifique-se de ter o PHPMailer corretamente instalado via Composer

include("configBD.php");

try {
    // Estabelecer a conexão com o banco de dados usando MySQLi
    $conexao = new mysqli($host, $username, $password, $database);

    // Verificar conexão
    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if ($email) {
            // Consultar o banco para verificar se o e-mail existe
            $stmt = $conexao->prepare("SELECT senha FROM usuarios WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Obtém a senha do usuário
                $usuario = $result->fetch_assoc();
                $senhaRecuperada = $usuario['senha'];

                // Inicializar o PHPMailer
                $mail = new PHPMailer(true);

                try {
                    // Configuração do servidor SMTP
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
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
} catch (Exception $e) {
    echo "Erro ao processar a solicitação: " . $e->getMessage();
}
?>
