<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Mail\ConfigSmtp;
use Mail\EmailSender;


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

    /**
     * @throws Exception
     */
    public function setSender(EmailSender $sender): void
    {
        $this->mail->setFrom($sender->getFromAddress(), $sender->getFromName());
        $this->mail->addAddress($sender->getAddress(), $sender->getName());
        $this->mail->addReplyTo($sender->getReplyTo());
        $this->mail->addCC($sender->getCc());
        $this->mail->addBCC($sender->getBcc());
    }
}