<!-- ============================================================================
     EcoTrack - Page d'accueil / Menu Principal
     ============================================================================
     Design moderne avec Hero section, modules interactifs et animations
============================================================================ -->

<!-- Hero Section -->
<section class="hero">
    <!-- Animated Background -->
    <div class="hero-bg">
        <div class="hero-gradient"></div>
        <div class="hero-particles" id="particles"></div>
        <div class="hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="hero-content">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-text">
                    <span class="hero-badge animate-fade-in">
                        <i class="fas fa-seedling"></i>
                        Plateforme Éco-responsable
                    </span>
                    
                    <h1 class="hero-title animate-fade-in-up">
                        <?= htmlspecialchars($heroTitle ?? 'Ensemble pour un avenir durable') ?>
                    </h1>
                    
                    <p class="hero-subtitle animate-fade-in-up delay-1">
                        <?= htmlspecialchars($heroSubtitle ?? 'Gérez votre impact environnemental avec EcoTrack') ?>
                    </p>
                    
                    <div class="hero-actions animate-fade-in-up delay-2">
                        <a href="/modules" class="btn btn-primary btn-lg">
                            <span>Découvrir nos modules</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="/about" class="btn btn-outline-light btn-lg">
                            <span>En savoir plus</span>
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="hero-stats animate-fade-in-up delay-3">
                        <div class="stat-item">
                            <span class="stat-value" data-count="150">0</span>
                            <span class="stat-label">Bornes de recharge</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value" data-count="2500">0</span>
                            <span class="stat-label">Utilisateurs actifs</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-value" data-count="45">0</span>
                            <span class="stat-label">Événements/mois</span>
                        </div>
                    </div>
                </div>
                
                <div class="hero-visual animate-fade-in-left delay-2">
                    <div class="hero-card-stack">
                        <div class="floating-card card-1">
                            <i class="fas fa-leaf"></i>
                            <span>-25% CO₂</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-bolt"></i>
                            <span>Énergie verte</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-heart"></i>
                            <span>Solidarité</span>
                        </div>
                        <div class="hero-main-visual">
                            <div class="hero-planet" role="img" aria-label="Planète éco-responsable">
                                <div class="hero-planet-glow" aria-hidden="true"></div>
                                <img src="/assets/images/hero-earth.svg" alt="Planète éco-responsable" class="hero-planet-image">
                                <span class="hero-planet-label">Notre planète, notre responsabilité</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <span>Scroll</span>
    </div>
</section>

<!-- Modules Section -->
<section class="section modules-section" id="modules">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-th-large"></i>
                Nos Solutions
            </span>
            <h2 class="section-title">Explorez nos modules</h2>
            <p class="section-subtitle">
                Des outils puissants pour gérer votre impact environnemental au quotidien
            </p>
        </div>
        
        <!-- Modules Grid -->
        <div class="modules-grid">
            <?php if (isset($modules)): ?>
                <?php foreach ($modules as $index => $module): ?>
                    <article class="module-card" 
                             style="--module-color: <?= $module['color'] ?>; --module-gradient: <?= $module['gradient'] ?>; --delay: <?= $index * 0.1 ?>s">
                        
                        <!-- Card Glow Effect -->
                        <div class="card-glow"></div>
                        
                        <!-- Card Content -->
                        <div class="card-inner">
                            <!-- Icon -->
                            <div class="card-icon">
                                <i class="fas <?= $module['icon'] ?>"></i>
                            </div>
                            
                            <!-- Content -->
                            <div class="card-content">
                                <h3 class="card-title"><?= htmlspecialchars($module['name']) ?></h3>
                                <p class="card-description"><?= htmlspecialchars($module['description']) ?></p>
                                
                                <!-- Stats Mini -->
                                <div class="card-stats">
                                    <?php foreach ($module['stats'] as $key => $value): ?>
                                        <div class="mini-stat">
                                            <span class="mini-stat-value"><?= $value ?></span>
                                            <span class="mini-stat-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            
                            <!-- Action -->
                            <a href="<?= $module['route'] ?>" class="card-action">
                                <span>Explorer</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        
                        <!-- Decorative Elements -->
                        <div class="card-decoration">
                            <div class="decoration-circle"></div>
                            <div class="decoration-dots"></div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section features-section">
    <div class="container">
        <div class="features-grid">
            
            <!-- Feature 1 -->
            <div class="feature-card glass">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Sécurisé</h3>
                <p class="feature-text">
                    Vos données sont protégées avec les standards les plus stricts de sécurité
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="feature-card glass">
                <div class="feature-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 class="feature-title">Responsive</h3>
                <p class="feature-text">
                    Accessible sur tous vos appareils, mobile, tablette ou ordinateur
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="feature-card glass">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Analytics</h3>
                <p class="feature-text">
                    Suivez votre progression avec des statistiques détaillées
                </p>
            </div>
            
            <!-- Feature 4 -->
            <div class="feature-card glass">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Communauté</h3>
                <p class="feature-text">
                    Rejoignez une communauté engagée pour l'environnement
                </p>
            </div>
            
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section">
    <div class="cta-bg">
        <div class="cta-gradient"></div>
    </div>
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">Prêt à faire la différence ?</h2>
            <p class="cta-text">
                Rejoignez des milliers d'utilisateurs qui agissent pour l'environnement chaque jour
            </p>
            <div class="cta-actions">
                <a href="/register" class="btn btn-white btn-lg">
                    <span>Créer un compte gratuit</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>
