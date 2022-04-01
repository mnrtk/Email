<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Mail\ConfigSmtp;


//Load Composer's autoloader
require 'vendor/autoload.php';

class Email
{
    protected PHPMailer $mail;


    public function __construct(ConfigSmtp $configSmtp)
    {
        $this->mail  = new PHPMailer();

        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $configSmtp->getHost();                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $configSmtp->getUsername();                     //SMTP username
        $this->mail->Password   = $configSmtp->getPassword();                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = $configSmtp->getPort();
    }

    public function setSender(EmailSender $sender)
    {
        $this->mail->setFrom('from@example.com', 'Mailer');
        $this->mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $this->mail->addAddress('ellen@example.com');               //Name is optional
        $this->mail->addReplyTo('info@example.com', 'Information');
        $this->mail->addCC('cc@example.com');
        $this->mail->addBCC('bcc@example.com');
    }
}