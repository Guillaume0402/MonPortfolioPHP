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
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact · Guillaume Maignaut</title>
    <meta name="description" content="Contactez Guillaume Maignaut, développeur web. Disponible pour missions freelance, collaborations et projets web.">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <div id="top" aria-hidden="true"></div>

    <?php include '../includes/header.php'; ?>

    <main>
        <!-- ── Hero / intro ── -->
        <section class="contact-page-hero">
            <div class="container">
                <div class="contact-avatar-wrap reveal">
                    <img class="contact-avatar" src="/images/photo_profil.jpg" alt="Photo de Guillaume Maignaut" width="120" height="120">
                    <span class="contact-avatar-ring" aria-hidden="true"></span>
                </div>
                <div class="contact-hero-copy reveal">
                    <span class="contact-hero-kicker">04 &mdash; Contact</span>
                    <h1 class="contact-hero-title">Parlons de votre projet</h1>
                    <p class="contact-hero-sub">
                        Disponible pour missions freelance, collaborations techniques ou simplement pour échanger
                        autour d'une idée. Je réponds généralement sous&nbsp;24&nbsp;h.
                    </p>
                </div>
            </div>
        </section>

        <!-- ── Main layout ── -->
        <section class="section" style="padding-top: 0;">
            <div class="container contact-layout">

                <!-- ── Contact form ── -->
                <div class="form-card reveal">
                    <h2 class="form-card-title">Envoyer un message</h2>

                    <?php if ($success): ?>
                        <div class="alert alert-success" role="alert">
                            <svg style="width:18px;height:18px;fill:currentColor;flex-shrink:0;margin-top:1px" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9 16.17 4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span>Votre message a bien été envoyé&nbsp;! Je vous répondrai dans les plus brefs délais.</span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errors) && !$success): ?>
                        <div class="alert alert-error" role="alert">
                            <svg style="width:18px;height:18px;fill:currentColor;flex-shrink:0;margin-top:1px" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z" />
                            </svg>
                            <span><?= isset($errors['mail'])
                                        ? e($errors['mail'])
                                        : "Veuillez corriger les erreurs ci-dessous avant d'envoyer." ?></span>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" novalidate>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="name">Nom complet</label>
                                <input
                                    class="form-input<?= isset($errors['name']) ? ' is-error' : '' ?>"
                                    type="text" id="name" name="name"
                                    placeholder="Jean Dupont"
                                    value="<?= e($fields['name']) ?>"
                                    autocomplete="name" required>
                                <?php if (isset($errors['name'])): ?>
                                    <span class="field-error"><?= e($errors['name']) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">Adresse e-mail</label>
                                <input
                                    class="form-input<?= isset($errors['email']) ? ' is-error' : '' ?>"
                                    type="email" id="email" name="email"
                                    placeholder="jean@exemple.fr"
                                    value="<?= e($fields['email']) ?>"
                                    autocomplete="email" required>
                                <?php if (isset($errors['email'])): ?>
                                    <span class="field-error"><?= e($errors['email']) ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="subject">Sujet</label>
                            <input
                                class="form-input<?= isset($errors['subject']) ? ' is-error' : '' ?>"
                                type="text" id="subject" name="subject"
                                placeholder="Création d'un site vitrine, refonte, collaboration…"
                                value="<?= e($fields['subject']) ?>"
                                required>
                            <?php if (isset($errors['subject'])): ?>
                                <span class="field-error"><?= e($errors['subject']) ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="message">Message</label>
                            <textarea
                                class="form-textarea<?= isset($errors['message']) ? ' is-error' : '' ?>"
                                id="message" name="message"
                                placeholder="Décrivez votre projet, vos besoins ou votre question…"
                                required><?= e($fields['message']) ?></textarea>
                            <?php if (isset($errors['message'])): ?>
                                <span class="field-error"><?= e($errors['message']) ?></span>
                            <?php endif; ?>
                        </div>

                        <button class="btn btn-primary btn-lg form-submit" type="submit">
                            <svg style="width:16px;height:16px;fill:currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M2.01 21 23 12 2.01 3 2 10l15 2-15 2z" />
                            </svg>
                            Envoyer le message
                        </button>
                    </form>
                </div>

                <!-- ── Sidebar ── -->
                <aside class="info-stack" aria-label="Informations de contact">
                    <!-- Availability -->
                    <div class="info-card reveal">
                        <p class="info-card-title">Disponibilité</p>
                        <span class="avail-badge">
                            <span class="avail-dot" aria-hidden="true"></span>
                            Disponible pour missions
                        </span>
                        <p style="margin:14px 0 0;color:var(--muted);font-size:13px;line-height:1.6;">
                            Ouvert aux missions freelance,<br>alternances et projets collaboratifs.
                        </p>
                    </div>

                    <!-- Contact info -->
                    <div class="info-card reveal">
                        <p class="info-card-title">Me joindre</p>
                        <ul class="info-list">
                            <li>
                                <a class="info-item" href="mailto:g.maignaut@gmail.com">
                                    <span class="info-icon">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z" />
                                        </svg>
                                    </span>
                                    <span class="info-item-text">
                                        <span class="info-item-label">E-mail</span>
                                        <span class="info-item-value">g.maignaut@gmail.com</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="info-item" href="tel:+33650428039">
                                    <span class="info-icon">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                        </svg>
                                    </span>
                                    <span class="info-item-text">
                                        <span class="info-item-label">Téléphone</span>
                                        <span class="info-item-value">+33 6 50 42 80 39</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Social -->
                    <div class="info-card reveal">
                        <p class="info-card-title">Réseaux</p>
                        <ul class="info-list">
                            <li>
                                <a class="info-item" href="https://github.com/Guillaume0402" target="_blank" rel="noopener noreferrer">
                                    <span class="info-icon">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M12 .5C5.73.5.75 5.64.75 12c0 5.11 3.29 9.44 7.86 10.97.58.11.79-.26.79-.57v-2.02c-3.2.71-3.87-1.4-3.87-1.4-.53-1.36-1.29-1.72-1.29-1.72-1.05-.73.08-.72.08-.72 1.16.08 1.77 1.22 1.77 1.22 1.03 1.8 2.7 1.28 3.36.98.1-.76.4-1.28.72-1.57-2.55-.3-5.23-1.31-5.23-5.84 0-1.29.45-2.34 1.19-3.17-.12-.3-.52-1.52.11-3.16 0 0 .97-.32 3.18 1.21.92-.26 1.9-.39 2.88-.39.98 0 1.97.13 2.88.39 2.2-1.53 3.18-1.21 3.18-1.21.63 1.64.23 2.86.11 3.16.74.83 1.19 1.88 1.19 3.17 0 4.54-2.69 5.54-5.25 5.83.41.36.78 1.09.78 2.2v3.26c0 .31.21.68.8.57 4.56-1.53 7.85-5.86 7.85-10.97C23.25 5.64 18.27.5 12 .5z" />
                                        </svg>
                                    </span>
                                    <span class="info-item-text">
                                        <span class="info-item-label">Code source</span>
                                        <span class="info-item-value">GitHub</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="info-item" href="https://www.linkedin.com/in/guillaume-maignaut-9b3464340/" target="_blank" rel="noopener noreferrer">
                                    <span class="info-icon">
                                        <svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="M20.45 20.45H16.9v-5.6c0-1.34-.02-3.06-1.87-3.06-1.87 0-2.16 1.46-2.16 2.97v5.69H9.33V9h3.4v1.56h.05c.47-.9 1.62-1.86 3.34-1.86 3.57 0 4.23 2.35 4.23 5.41v6.34zM5.34 7.43a2.06 2.06 0 1 1 0-4.12 2.06 2.06 0 0 1 0 4.12zM7.11 20.45H3.56V9h3.55v11.45z" />
                                        </svg>
                                    </span>
                                    <span class="info-item-text">
                                        <span class="info-item-label">Profil professionnel</span>
                                        <span class="info-item-value">LinkedIn</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

            </div>
        </section>
    </main>

    <footer>
        <?php include '../includes/footer.php'; ?>
    </footer>

    <script type="module" src="../js/main.js"></script>
</body>

</html>