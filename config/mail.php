<?php
// config/mail.php

return [
    // SMTP (dev = Mailpit, prod = vrai SMTP)
    'host' => getenv('SMTP_HOST') ?: '127.0.0.1',
    'port' => (int) (getenv('SMTP_PORT') ?: 1025),
    'username' => getenv('SMTP_USER') ?: null,
    'password' => getenv('SMTP_PASS') ?: null,

    // Encryption: 'tls', 'ssl' ou null (Mailpit = null)
    'encryption' => getenv('SMTP_ENCRYPTION') ?: null,

    // Expéditeur (doit être une adresse de TON domaine en prod)
    'from_email' => getenv('MAIL_FROM_EMAIL') ?: 'noreply@monportfolio.local',
    'from_name'  => getenv('MAIL_FROM_NAME')  ?: 'Portfolio Guillaume',

    // Destinataire (toi)
    'to_email' => getenv('MAIL_TO_EMAIL') ?: 'g.maignaut@gmail.com',
    'to_name'  => getenv('MAIL_TO_NAME')  ?: 'Guillaume Maignaut',
];