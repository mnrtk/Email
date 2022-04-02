<?php
namespace Mail;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


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
        $this->mail->SMTPSecure = 'tls';            // PHPMailer::ENCRYPTION_SMTPS Enable implicit TLS encryption
        $this->mail->SMTPAutoTLS = false;
        $this->mail->Port       = $configSmtp->getPort();
    }


    public function setSender(EmailSender $sender): void
    {
        $this->mail->setFrom($sender->getFromAddress(), $sender->getFromName());
        $this->mail->addAddress($sender->getAddress(), $sender->getName());
        $this->mail->addReplyTo($sender->getReplyTo());
        $this->mail->addCC($sender->getCc());
        $this->mail->addBCC($sender->getBcc());
    }

    /**
     * @param Content $content
     * @return void
     */
    public function setContent(Content $content): void
    {
        $this->mail->isHTML($content->isHtml());

        $this->mail->Subject = $content->getSubject();

        $this->mail->Body  = $content->getBody();

        $this->mail->AltBody = $content->getAltBody();
    }


    public function send(): void
    {
        try {

            if($this->mail->send()) {
                echo "success";
            }else {

                echo "<pre>".$this->mail->ErrorInfo."</pre>";
            }

        } catch (Exception $e) {

            echo "Can't send email. Error occurred";
        }
    }
}