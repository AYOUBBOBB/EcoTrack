<!-- ============================================================================
     EcoTrack - Footer Component
     ============================================================================
     Composant réutilisable pour le pied de page
============================================================================ -->

<footer class="footer">
    <!-- Wave Decoration -->
    <div class="footer-wave">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
            <path d="M0,64 C480,150 960,-20 1440,64 L1440,120 L0,120 Z" fill="currentColor"/>
        </svg>
    </div>
    
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                
                <!-- Brand Column -->
                <div class="footer-brand">
                    <a href="/" class="footer-logo">
                        <div class="logo-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <span class="logo-text">
                            <span class="eco">Eco</span><span class="track">Track</span>
                        </span>
                    </a>
                    <p class="footer-tagline">
                        Ensemble pour un avenir durable. Gérez votre impact environnemental 
                        et contribuez à un monde plus vert.
                    </p>
                    <div class="footer-social">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="footer-links">
                    <h4 class="footer-title">Navigation</h4>
                    <ul class="link-list">
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/about">À propos</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/modules">Nos Modules</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Modules -->
                <div class="footer-links">
                    <h4 class="footer-title">Modules</h4>
                    <ul class="link-list">
                        <li>
                            <a href="/modules/transport">
                                <i class="fas fa-car-side"></i>
                                Transport Écologique
                            </a>
                        </li>
                        <li>
                            <a href="/modules/eco">
                                <i class="fas fa-leaf"></i>
                                Gestion Éco
                            </a>
                        </li>
                        <li>
                            <a href="/modules/evenements">
                                <i class="fas fa-calendar-alt"></i>
                                Événements
                            </a>
                        </li>
                        <li>
                            <a href="/modules/dons">
                                <i class="fas fa-heart"></i>
                                Dons & Solidarité
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="footer-contact">
                    <h4 class="footer-title">Contact</h4>
                    <ul class="contact-list">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Avenue Verte, Tunis, Tunisie</span>
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i>
                            <a href="tel:+21612345678">+216 12 345 678</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:contact@ecotrack.tn">contact@ecotrack.tn</a>
                        </li>
                    </ul>
                    
                    <!-- Newsletter -->
                    <div class="footer-newsletter">
                        <h5>Newsletter</h5>
                        <form class="newsletter-form" action="/newsletter" method="POST">
                            <div class="input-group">
                                <input type="email" 
                                       name="email" 
                                       placeholder="Votre email" 
                                       required 
                                       aria-label="Adresse email">
                                <button type="submit" class="btn-submit" aria-label="S'abonner">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p class="copyright">
                    &copy; <?= date('Y') ?> <strong>EcoTrack</strong>. Tous droits réservés.
                </p>
                <div class="footer-legal">
                    <a href="/privacy">Politique de confidentialité</a>
                    <span class="separator">•</span>
                    <a href="/terms">Conditions d'utilisation</a>
                </div>
            </div>
        </div>
    </div>
</footer>
