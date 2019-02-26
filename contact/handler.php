<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
/*$validator->fields(['Name','Email'])->areRequired()->maxLength(50);*/
$validator->fields(['Name'])->maxLength(50);
$validator->field('Email')->isEmail();
$validator->field('Message')->maxLength(6000);

$mailer = $pp->getMailer();
$mailer->IsSMTP();
$mailer->SMTPAuth   = true;
$mailer->SMTPSecure = "ssl";
$mailer->Port 		= 465;
$mailer->Host       = "";
$mailer->Username   = "";
$mailer->Password   = "";

$mailer->setFrom('@tfljamcams.net', 'TfLJamcams.net');
$mailer->AddReplyTo('@tfljamcams.net', 'TfLJamCams');
/*$mailer->AddCC(field('Email'), fields(['Name']));*/

$pp->requireReCaptcha();
$pp->getReCaptcha()->initSecretKey('');


$pp->sendEmailTo('@tfljamcams.net'); // ← Your email here

echo $pp->process($_POST);