<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMAILER\PHPMailer\Exception;

class MailerServices
{
    private $mail;

    function __construct()
    {
        $this->mail = new PHPMailer();  

        // Server settings
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $this->mail->isSMTP();                                            // Send using SMTP
        $this->mail->Host       = $_ENV['phpmailer.host'];                // Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->mail->Username   = $_ENV['phpmailer.username'];            // SMTP username
        $this->mail->Password   = $_ENV['phpmailer.password'];            // SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $this->mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $this->mail->setFrom('osonline@mallon.com.br', 'OS Online - Recapadora');

        $this->mail->addReplyTo('ti@mallon.com.br', 'TI MALLON');

        // $this->mail->addAddress('recapadora@mallon.com.br', 'Atendimento Recapadora');

        // $this->mail->addCC('financeiro.m2@mallon.com.br', 'Financeiro Mallon Mafra');
        $this->mail->addCC('developer@leandro47.com', 'Leandro da Silva');

        // Content
        $this->mail->isHTML(true);                                    

    }

    public function sendMailer(string $subject = '', $body = '')
    {
        $this->mail->Subject = $subject;
        $this->mail->Body    = $body;
        // $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        try {
            $this->mail->send();
            return false;
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
