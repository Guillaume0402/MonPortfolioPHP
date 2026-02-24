<footer class="site-footer">
    <div class="container footer-inner">
        <div class="footer-brand">
            <a class="brand footer-brand-link" href="#top" aria-label="Retour en haut">
                <span class="brand-logo" aria-hidden="true"></span>
                <span class="brand-name">Guillaume</span>
                <span class="brand-tag">Développeur Web</span>
            </a>

            <p class="footer-text">
                Je construis des interfaces propres, rapides et maintenables.
                Disponible pour missions freelance et projets web.
            </p>

            <div class="footer-actions">
                <a class="footer-cta" href="mailto:guillaume.maignaut@outlook.fr">guillaume.maignaut@outlook.fr</a>
                <span class="footer-sep" aria-hidden="true">•</span>
                <a class="footer-link" href="tel:+33000000000">+33 0 00 00 00 00</a>
            </div>
        </div>

        <nav class="footer-nav" aria-label="Navigation de pied de page">
            <div class="footer-col">
                <h3 class="footer-title">Navigation</h3>
                <a class="footer-link" href="#projects">Projets</a>
                <a class="footer-link" href="#skills">Compétences</a>
                <a class="footer-link" href="#about">À propos</a>
                <a class="footer-link" href="#contact">Contact</a>
            </div>

            <div class="footer-col">
                <h3 class="footer-title">Réseaux</h3>
                <a class="footer-link" href="https://github.com/" target="_blank" rel="noreferrer">GitHub</a>
                <a class="footer-link" href="https://www.linkedin.com/" target="_blank" rel="noreferrer">LinkedIn</a>
                <a class="footer-link" href="#" target="_blank" rel="noreferrer">Portfolio PDF</a>
            </div>

            <div class="footer-col">
                <h3 class="footer-title">Infos</h3>
                <a class="footer-link" href="#top">Retour en haut</a>
                <a class="footer-link" href="#" onclick="alert('À remplacer par ta page mentions légales'); return false;">Mentions légales</a>
                <a class="footer-link" href="#" onclick="alert('À remplacer par ta page politique de confidentialité'); return false;">Confidentialité</a>
            </div>
        </nav>
    </div>

    <div class="container footer-bottom">
        <span class="footer-copy">© <span id="year"></span> Guillaume. Tous droits réservés.</span>
        <span class="footer-mini">Fait avec HTML/CSS/JS.</span>
    </div>

    <script>
        document.querySelector("#year").textContent = new Date().getFullYear();
    </script>
</footer>