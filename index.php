<?php
require_once './vendor/autoload.php';

use Mail\ConfigSmtp;
use Mail\Content;
use Mail\Email;
use Mail\EmailSender;

$config  = new ConfigSmtp(
    'smtp.gmail.com',
    'qsdqsd2022@gmail.com',
    'qsdqsd123123',
    587
);

$content = new Content(
    true,
    'Email subject',
    '<p>This is <b>the</b> body of the email</p>',
    '<p>This is an alternative body for non-html clients </p>'
);
$emailSender = new EmailSender(
    'qsdqsd2020@gmail.com',
    'name',
    'takimunir@gmail.com',
    'receiver name',
    'takimunir@gmail.com',
    'takimunir@gmail.com',
  'takimunir@gmail.com'
);

$mail = new Email($config);
$mail->setSender($emailSender);
$mail->setContent($content);

$mail->send();