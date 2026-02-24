<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Portfolio</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div id="top" aria-hidden="true"></div>
    <?php
    include 'includes/header.php';
    ?>

    <main>
        <section class="hero-section">
            <div class="container hero-inner">
                <div class="hero-media reveal">
                    <div class="hero-copy">
                        <p class="hero-kicker">Guillaume Maignaut · Développeur Web</p>
                        <h1 class="hero-title">Je conçois des sites web modernes, rapides et maintenables.</h1>
                        <p class="hero-subtitle">
                            Intégration soignée, accessibilité, performance et SEO. Je transforme des idées en expériences web
                            claires et efficaces.
                        </p>

                        <div class="hero-actions">
                            <a class="btn btn-primary" href="#projects">Voir mes projets</a>
                            <a class="btn btn-ghost" href="#contact">Me contacter</a>
                        </div>

                        <div class="hero-badges" aria-label="Points forts">
                            <span class="badge">Responsive</span>
                            <span class="badge">Performance</span>
                            <span class="badge">UX &amp; UI</span>
                        </div>
                    </div>

                    <div class="hero-terminal" aria-hidden="true">
                        <div class="terminal-bar">
                            <span class="terminal-dot dot-r"></span>
                            <span class="terminal-dot dot-y"></span>
                            <span class="terminal-dot dot-g"></span>
                            <span class="terminal-title">developer.php</span>
                        </div>
                        <div class="terminal-body">
                            <p class="tl"><span class="t-dim">01</span> <span class="t-kw">class</span> <span class="t-cls">Developer</span> {</p>
                            <p class="tl"><span class="t-dim">02</span> <span class="t-kw">public</span> <span class="t-var">$name</span> = <span class="t-str">'Guillaume'</span>;</p>
                            <p class="tl"><span class="t-dim">03</span> <span class="t-kw">public</span> <span class="t-var">$skills</span> = [</p>
                            <p class="tl"><span class="t-dim">04</span> <span class="t-str">'HTML'</span>, <span class="t-str">'CSS'</span>, <span class="t-str">'JS'</span>,</p>
                            <p class="tl"><span class="t-dim">05</span> <span class="t-str">'PHP'</span>, <span class="t-str">'Git'</span>, <span class="t-str">'A11y'</span></p>
                            <p class="tl"><span class="t-dim">06</span> ];</p>
                            <p class="tl t-blank"></p>
                            <p class="tl"><span class="t-dim">07</span> <span class="t-kw">public function</span> <span class="t-fn">build</span>(<span class="t-var">$idea</span>) {</p>
                            <p class="tl"><span class="t-dim">08</span> <span class="t-kw">return</span> <span class="t-str">"quelque chose de beau"</span>;</p>
                            <p class="tl"><span class="t-dim">09</span> }</p>
                            <p class="tl"><span class="t-dim">10</span> }</p>
                            <p class="tl t-blank"></p>
                            <p class="tl"><span class="t-dim">11</span> <span class="t-comment">// $ php -r "(new Developer)->build($idea);"</span></p>
                            <p class="tl"><span class="t-dim">12</span> <span class="t-ok">✓ Prêt à construire votre projet</span></p>
                            <p class="tl"><span class="t-dim">13</span> <span class="t-cur">▌</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-scroll-hint" aria-hidden="true">
                <span class="scroll-line"></span>
            </div>
        </section>

        <section id="projects" class="section">
            <div class="container">
                <header class="section-header reveal">
                    <span class="section-num">01 &mdash; Réalisations</span>
                    <h2 class="section-title">Projets</h2>
                    <p class="section-lead">Une sélection de réalisations. Remplace les liens et descriptions par les tiennes.</p>
                </header>

                <div class="cards-grid">
                    <article class="card reveal">
                        <div class="card-body">
                            <span class="card-num">01</span>
                            <div class="card-top">
                                <h3 class="card-title">Site vitrine</h3>
                                <p class="card-text">Landing page performante, sections claires, et design responsive.</p>
                            </div>
                        </div>
                        <div class="tag-row" aria-label="Technologies">
                            <span class="tag">HTML</span>
                            <span class="tag">CSS</span>
                            <span class="tag">PHP</span>
                        </div>
                        <div class="card-actions">
                            <a class="card-link" href="#" aria-label="Voir le projet 1">Voir le projet</a>
                        </div>
                    </article>

                    <article class="card reveal">
                        <div class="card-body">
                            <span class="card-num">02</span>
                            <div class="card-top">
                                <h3 class="card-title">Application web</h3>
                                <p class="card-text">Interface propre, composants réutilisables et flux utilisateur simple.</p>
                            </div>
                        </div>
                        <div class="tag-row" aria-label="Technologies">
                            <span class="tag">UI</span>
                            <span class="tag">API</span>
                            <span class="tag">Sécurité</span>
                        </div>
                        <div class="card-actions">
                            <a class="card-link" href="#" aria-label="Voir le projet 2">Voir le projet</a>
                        </div>
                    </article>

                    <article class="card reveal">
                        <div class="card-body">
                            <span class="card-num">03</span>
                            <div class="card-top">
                                <h3 class="card-title">Optimisation perf</h3>
                                <p class="card-text">Amélioration des performances, accessibilité et SEO technique.</p>
                            </div>
                        </div>
                        <div class="tag-row" aria-label="Technologies">
                            <span class="tag">Lighthouse</span>
                            <span class="tag">A11y</span>
                            <span class="tag">SEO</span>
                        </div>
                        <div class="card-actions">
                            <a class="card-link" href="#" aria-label="Voir le projet 3">Voir le projet</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="skills" class="section">
            <div class="container">
                <header class="section-header reveal">
                    <span class="section-num">02 &mdash; Stack technique</span>
                    <h2 class="section-title">Compétences</h2>
                    <p class="section-lead">Stack orientée front-end, avec bases solides côté back.</p>
                </header>

                <div class="chips-grid" aria-label="Compétences">
                    <span class="chip reveal" data-cat="markup">HTML · Sémantique</span>
                    <span class="chip reveal" data-cat="style">CSS · Responsive</span>
                    <span class="chip reveal" data-cat="script">JavaScript · DOM</span>
                    <span class="chip reveal" data-cat="backend">PHP · Bases</span>
                    <span class="chip reveal" data-cat="tool">Git · Workflow</span>
                    <span class="chip reveal" data-cat="a11y">Accessibilité</span>
                </div>
            </div>
        </section>

        <section id="about" class="section">
            <div class="container about-grid">
                <header class="section-header reveal">
                    <span class="section-num">03 &mdash; À propos</span>
                    <h2 class="section-title">À propos</h2>
                    <p class="section-lead">Je privilégie des interfaces lisibles, rapides, et faciles à maintenir.</p>
                </header>

                <div class="about-card reveal">
                    <p class="about-text">
                        J’aime construire des pages qui vont droit au but&nbsp;: une hiérarchie claire, une typographie soignée,
                        et des composants réutilisables. Mon objectif&nbsp;: un rendu «&nbsp;pro&nbsp;» sans complexité inutile.
                    </p>
                    <p class="about-text">
                        Si tu veux me parler d’un projet, le plus simple est de passer par le bouton «&nbsp;Me contacter&nbsp;» ou
                        directement via le mail en pied de page.
                    </p>
                    <div class="about-stats">
                        <div class="stat">
                            <span class="stat-num">3+</span>
                            <span class="stat-label">Projets réalisés</span>
                        </div>
                        <div class="stat">
                            <span class="stat-num">6</span>
                            <span class="stat-label">Technologies</span>
                        </div>
                        <div class="stat">
                            <span class="stat-num">100</span>
                            <span class="stat-label">Score Lighthouse</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="section section-contact">
            <div class="container">
                <div class="contact-card reveal">
                    <div class="contact-inner">
                        <div>
                            <p class="contact-kicker">Travaillons ensemble</p>
                            <h2 class="contact-title">Un projet en tête&nbsp;?</h2>
                            <p class="contact-lead">Disponible pour des missions freelance, des collaborations ou simplement pour discuter de vos idées.</p>
                        </div>
                        <div class="contact-actions">
                            <a class="btn btn-primary btn-lg" href="mailto:guillaume.maignaut@outlook.fr">M’envoyer un email</a>
                            <a class="btn btn-ghost btn-lg" href="https://www.linkedin.com/" target="_blank" rel="noreferrer">LinkedIn</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <?php include 'includes/footer.php'; ?>
    </footer>


    <script type="module" src="js/main.js"></script>
</body>

</html>