<?php

use PHPMailer\PHPMailer\PHPMailer;

$rootPath = $_SERVER['DOCUMENT_ROOT'];

require_once("$rootPath/PHPMailer/src/PHPMailer.php");
require_once("$rootPath/PHPMailer/src/SMTP.php");
require_once("$rootPath/PHPMailer/src/Exception.php");

// Получение данных из формы
$form_email_adress = htmlspecialchars($_POST['email']);
$form_name = htmlspecialchars($_POST['name']);

// Инициализация данных для настройки
$host = 'smtp.mail.ru';
$hostUsername = 'testovoe_zadanie_pochta@mail.ru';
$hostPassword = "qTQS3fBzvGiQ0eQff8Ed"; // пароль для приложений
$port = '465';

// Проверка корректности адреса
function validateMail($form_email_adress){
    if(!filter_var($form_email_adress,FILTER_VALIDATE_EMAIL)){
        echo "Проверьте корректность адреса";
        die();
    }
}

/**
 * @param host - Сервер исходящей почты (SMTP-Сервер)
 * @param hostUsername - адрес, с которого отправляется письмо
 * @param hostPassword - пароль для приложений
 * @param port - порт для протокола
 * @param form_email_adress - адрес для отправки письма
 * @param subject - тема письма
 * @param body - тело письма
 */
function send($host, $hostUsername, $hostPassword, $port, $form_email_adress, $subject, $body){
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';  

    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = $hostUsername;
    $mail->Password = $hostPassword;
    $mail->SMTPSecure = 'tsl';
    $mail->port = $port;

    $mail->setFrom($mail->Username, 'test');

    $mail->addAddress($form_email_adress);

    $mail->Subject = $subject;
    $mail->Body = $body;
    if($mail->send()){
        echo 'Письмо отправлено';
    }else{
        echo 'Произошла ошибка';
    }
}
validateMail($form_email_adress);
send($host, $hostUsername, $hostPassword, $port, $form_email_adress, "Тестовое задание", "Имя: $form_name");