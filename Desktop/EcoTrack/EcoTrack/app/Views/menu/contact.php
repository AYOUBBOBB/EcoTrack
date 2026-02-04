<!-- ============================================================================
     EcoTrack - Page Contact
     ============================================================================
     Formulaire de contact et informations
============================================================================ -->

<!-- Page Header -->
<section class="page-hero">
    <div class="page-hero-bg">
        <div class="page-hero-gradient"></div>
        <div class="page-hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="page-hero-content text-center">
            <span class="page-badge animate-fade-in">
                <i class="fas fa-envelope"></i>
                Contactez-nous
            </span>
            <h1 class="page-title animate-fade-in-up">Nous Contacter</h1>
            <p class="page-subtitle animate-fade-in-up delay-1">
                Une question ? Un projet ? Nous sommes là pour vous aider
            </p>
            
            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav animate-fade-in-up delay-2" aria-label="Breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section contact-section">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Contact Info -->
            <div class="contact-info">
                <h2 class="contact-info-title">Restons en contact</h2>
                <p class="contact-info-text">
                    N'hésitez pas à nous contacter pour toute question concernant nos services, 
                    un partenariat ou simplement pour échanger sur vos projets éco-responsables.
                </p>
                
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-card-content">
                            <h3>Adresse</h3>
                            <p>123 Avenue Verte<br>Tunis, Tunisie</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-card-content">
                            <h3>Téléphone</h3>
                            <p><a href="tel:+21612345678">+216 12 345 678</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-card-content">
                            <h3>Email</h3>
                            <p><a href="mailto:contact@ecotrack.tn">contact@ecotrack.tn</a></p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-card-content">
                            <h3>Horaires</h3>
                            <p>Lun - Ven : 9h - 18h<br>Sam : 9h - 13h</p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div class="contact-social">
                    <h3>Suivez-nous</h3>
                    <div class="social-links">
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
            </div>
            
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <form class="contact-form" action="/contact" method="POST">
                    <h2 class="form-title">Envoyez-nous un message</h2>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name" class="form-label">Prénom</label>
                            <div class="input-wrapper">
                                <input type="text" id="first_name" name="first_name" class="form-input" placeholder="Votre prénom" required>
                                <i class="fas fa-user input-icon"></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="last_name" class="form-label">Nom</label>
                            <div class="input-wrapper">
                                <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Votre nom" required>
                                <i class="fas fa-user input-icon"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-wrapper">
                            <input type="email" id="email" name="email" class="form-input" placeholder="vous@exemple.com" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject" class="form-label">Sujet</label>
                        <div class="input-wrapper">
                            <select id="subject" name="subject" class="form-input form-select" required>
                                <option value="">Sélectionnez un sujet</option>
                                <option value="general">Question générale</option>
                                <option value="support">Support technique</option>
                                <option value="partnership">Partenariat</option>
                                <option value="feedback">Suggestion / Feedback</option>
                                <option value="other">Autre</option>
                            </select>
                            <i class="fas fa-chevron-down input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" class="form-input form-textarea" placeholder="Votre message..." rows="5" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" name="newsletter" class="checkbox-input">
                            <span class="checkbox-label">Je souhaite recevoir la newsletter EcoTrack</span>
                        </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        <span>Envoyer le message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section map-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-map-marked-alt"></i>
                Localisation
            </span>
            <h2 class="section-title">Où nous trouver</h2>
        </div>
        
        <div class="map-wrapper">
            <div class="map-placeholder">
                <i class="fas fa-map-marked-alt"></i>
                <p>Carte interactive</p>
                <span>123 Avenue Verte, Tunis, Tunisie</span>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section faq-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-question-circle"></i>
                FAQ
            </span>
            <h2 class="section-title">Questions fréquentes</h2>
        </div>
        
        <div class="faq-grid">
            <div class="faq-item">
                <button class="faq-question">
                    <span>Comment créer un compte EcoTrack ?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>Cliquez sur "Inscription" en haut de la page, remplissez le formulaire avec vos informations et validez votre email. C'est gratuit !</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    <span>EcoTrack est-il gratuit ?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>Oui, EcoTrack propose une version gratuite avec toutes les fonctionnalités de base. Des options premium sont disponibles pour les entreprises.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    <span>Comment contacter le support ?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>Vous pouvez nous contacter via ce formulaire, par email à support@ecotrack.tn ou par téléphone du lundi au vendredi de 9h à 18h.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <button class="faq-question">
                    <span>Mes données sont-elles sécurisées ?</span>
                    <i class="fas fa-plus"></i>
                </button>
                <div class="faq-answer">
                    <p>Absolument. Nous utilisons un chiffrement de bout en bout et respectons les normes RGPD pour protéger vos données personnelles.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ============================================================================
   Page Hero (réutilisé)
   ============================================================================ */
.page-hero {
    position: relative;
    padding: calc(80px + var(--space-16)) 0 var(--space-16);
    overflow: hidden;
}

.page-hero-bg {
    position: absolute;
    inset: 0;
    z-index: -1;
}

.page-hero-gradient {
    position: absolute;
    inset: 0;
    background: 
        radial-gradient(ellipse 80% 60% at 50% 0%, rgba(16, 185, 129, 0.15), transparent),
        linear-gradient(180deg, var(--color-gray-50) 0%, var(--color-white) 100%);
}

.page-hero-shapes .shape {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.4;
}

.page-hero-shapes .shape-1 {
    width: 300px;
    height: 300px;
    background: var(--color-primary);
    top: -100px;
    right: 10%;
}

.page-hero-shapes .shape-2 {
    width: 200px;
    height: 200px;
    background: var(--color-secondary);
    bottom: -50px;
    left: 10%;
}

.page-badge {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    background: rgba(16, 185, 129, 0.1);
    color: var(--color-primary);
    font-size: var(--font-size-sm);
    font-weight: 600;
    border-radius: var(--radius-full);
    margin-bottom: var(--space-4);
}

.page-title {
    font-family: var(--font-display);
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
}

.page-subtitle {
    font-size: var(--font-size-lg);
    color: var(--color-gray-500);
    max-width: 600px;
    margin: 0 auto var(--space-6);
}

.breadcrumb-nav { display: inline-block; }

.breadcrumb {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--space-2);
    list-style: none;
    padding: var(--space-2) var(--space-4);
    background: var(--color-white);
    border-radius: var(--radius-full);
    box-shadow: var(--shadow-sm);
    font-size: var(--font-size-sm);
}

.breadcrumb-item a {
    color: var(--color-gray-500);
    text-decoration: none;
}

.breadcrumb-item a:hover { color: var(--color-primary); }

.breadcrumb-item.active {
    color: var(--color-gray-800);
    font-weight: 600;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: '/';
    margin-right: var(--space-2);
    color: var(--color-gray-300);
}

/* ============================================================================
   Contact Section
   ============================================================================ */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.2fr;
    gap: var(--space-12);
}

.contact-info-title {
    font-family: var(--font-display);
    font-size: var(--font-size-2xl);
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
}

.contact-info-text {
    font-size: var(--font-size-base);
    color: var(--color-gray-500);
    line-height: 1.7;
    margin-bottom: var(--space-8);
}

.contact-cards {
    display: grid;
    gap: var(--space-4);
}

.contact-card {
    display: flex;
    align-items: flex-start;
    gap: var(--space-4);
    padding: var(--space-5);
    background: var(--color-gray-50);
    border-radius: var(--radius-xl);
    transition: all var(--transition-base);
}

.contact-card:hover {
    background: var(--color-white);
    box-shadow: var(--shadow-md);
}

.contact-card-icon {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    border-radius: var(--radius-lg);
    color: white;
    font-size: var(--font-size-lg);
    flex-shrink: 0;
}

.contact-card-content h3 {
    font-size: var(--font-size-base);
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-1);
}

.contact-card-content p {
    font-size: var(--font-size-sm);
    color: var(--color-gray-500);
    line-height: 1.5;
}

.contact-card-content a {
    color: var(--color-primary);
    text-decoration: none;
}

.contact-card-content a:hover {
    text-decoration: underline;
}

/* Social */
.contact-social {
    margin-top: var(--space-8);
}

.contact-social h3 {
    font-size: var(--font-size-base);
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-4);
}

.social-links {
    display: flex;
    gap: var(--space-3);
}

.social-link {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-gray-100);
    color: var(--color-gray-600);
    border-radius: var(--radius-lg);
    font-size: var(--font-size-lg);
    text-decoration: none;
    transition: all var(--transition-fast);
}

.social-link:hover {
    background: var(--color-primary);
    color: white;
    transform: translateY(-2px);
}

/* Contact Form */
.contact-form-wrapper {
    background: var(--color-white);
    padding: var(--space-10);
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
}

.form-title {
    font-family: var(--font-display);
    font-size: var(--font-size-xl);
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-6);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-4);
}

.form-group {
    margin-bottom: var(--space-5);
}

.form-label {
    display: block;
    font-size: var(--font-size-sm);
    font-weight: 600;
    color: var(--color-gray-700);
    margin-bottom: var(--space-2);
}

.input-wrapper {
    position: relative;
}

.form-input {
    width: 100%;
    padding: var(--space-3) var(--space-4) var(--space-3) var(--space-12);
    font-family: var(--font-primary);
    font-size: var(--font-size-base);
    color: var(--color-gray-800);
    background: var(--color-gray-50);
    border: 2px solid transparent;
    border-radius: var(--radius-lg);
    outline: none;
    transition: all var(--transition-fast);
}

.form-input::placeholder {
    color: var(--color-gray-400);
}

.form-input:focus {
    background: var(--color-white);
    border-color: var(--color-primary);
    box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
}

.input-icon {
    position: absolute;
    left: var(--space-4);
    top: 50%;
    transform: translateY(-50%);
    color: var(--color-gray-400);
    font-size: var(--font-size-base);
    pointer-events: none;
}

.form-select {
    appearance: none;
    cursor: pointer;
}

.form-textarea {
    padding: var(--space-4);
    padding-left: var(--space-4);
    resize: vertical;
    min-height: 120px;
}

.checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    cursor: pointer;
}

.checkbox-input {
    width: 20px;
    height: 20px;
    accent-color: var(--color-primary);
}

.checkbox-label {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
}

.btn-block {
    width: 100%;
}

/* ============================================================================
   Map Section
   ============================================================================ */
.map-section {
    background: var(--color-gray-50);
}

.map-wrapper {
    border-radius: var(--radius-2xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
}

.map-placeholder {
    height: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-gray-100), var(--color-gray-200));
    color: var(--color-gray-500);
}

.map-placeholder i {
    font-size: 4rem;
    margin-bottom: var(--space-4);
    color: var(--color-primary);
    opacity: 0.5;
}

.map-placeholder p {
    font-size: var(--font-size-lg);
    font-weight: 600;
    margin-bottom: var(--space-2);
}

.map-placeholder span {
    font-size: var(--font-size-sm);
}

/* ============================================================================
   FAQ Section
   ============================================================================ */
.faq-grid {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.faq-item {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.faq-question {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-5) var(--space-6);
    font-family: var(--font-primary);
    font-size: var(--font-size-base);
    font-weight: 600;
    color: var(--color-gray-900);
    background: transparent;
    border: none;
    cursor: pointer;
    text-align: left;
    transition: all var(--transition-fast);
}

.faq-question:hover {
    color: var(--color-primary);
}

.faq-question i {
    color: var(--color-primary);
    transition: transform var(--transition-fast);
}

.faq-item.active .faq-question i {
    transform: rotate(45deg);
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height var(--transition-base);
}

.faq-item.active .faq-answer {
    max-height: 200px;
}

.faq-answer p {
    padding: 0 var(--space-6) var(--space-5);
    font-size: var(--font-size-sm);
    color: var(--color-gray-500);
    line-height: 1.7;
}

/* ============================================================================
   Responsive
   ============================================================================ */
@media (max-width: 1024px) {
    .contact-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .contact-form-wrapper {
        padding: var(--space-6);
    }
}
</style>

<script>
// FAQ Toggle
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const item = button.closest('.faq-item');
        item.classList.toggle('active');
    });
});
</script>
