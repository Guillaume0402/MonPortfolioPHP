<?php
require_once '../includes/helpers.php';
require_once __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

$mailConfig = require __DIR__ . '/../config/mail.php';

$success = false;
$errors  = [];
$fields  = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields['name']    = trim($_POST['name']    ?? '');
    $fields['email']   = trim($_POST['email']   ?? '');
    $fields['subject'] = trim($_POST['subject'] ?? '');
    $fields['message'] = trim($_POST['message'] ?? '');

    if ($fields['name'] === '')                         $errors['name']    = 'Le nom est requis.';
    if (!filter_var($fields['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Adresse e-mail invalide.';
    if ($fields['subject'] === '')                      $errors['subject'] = 'Le sujet est requis.';
    if (strlen($fields['message']) < 10)                $errors['message'] = 'Le message doit contenir au moins 10 caractères.';

    if (empty($errors)) {
        try {
            $mail = new PHPMailer(true);

            // SMTP (Mailpit en local)
            $mail->isSMTP();
            $mail->Host = $mailConfig['host'];   // 127.0.0.1
            $mail->Port = $mailConfig['port'];   // 1025

            // Encryption (Mailpit = aucune)
            if (!empty($mailConfig['encryption'])) {
                $mail->SMTPSecure = $mailConfig['encryption']; // 'tls' ou 'ssl'
            }

            // Auth (Mailpit = non)
            $mail->SMTPAuth = !empty($mailConfig['username']) && !empty($mailConfig['password']);
            if ($mail->SMTPAuth) {
                $mail->Username = $mailConfig['username'];
                $mail->Password = $mailConfig['password'];
            }

            // Headers
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
            $mail->addAddress($mailConfig['to_email'], $mailConfig['to_name']);
            $mail->addReplyTo($fields['email'], $fields['name']);

            // Contenu
            $mail->Subject = '[Portfolio] ' . $fields['subject'];
            $mail->Body    = "De : {$fields['name']} <{$fields['email']}>\n\n{$fields['message']}";
            $mail->isHTML(false);

            $mail->send();

            $success = true;
            $fields  = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
        } catch (Throwable $e) {
            $success = false;
            $errors['mail'] = "Impossible d'envoyer le message pour le moment.";
            // debug local si besoin :
            // error_log($e->getMessage());
        }
    }
}
?>