<!-- ============================================================================
     EcoTrack - Page Modules
     ============================================================================
     Liste complète des modules avec détails et fonctionnalités
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
                <i class="fas fa-th-large"></i>
                Nos Solutions
            </span>
            <h1 class="page-title animate-fade-in-up">Nos Modules</h1>
            <p class="page-subtitle animate-fade-in-up delay-1">
                Des outils puissants et intuitifs pour gérer votre impact environnemental
            </p>
            
            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav animate-fade-in-up delay-2" aria-label="Breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Modules</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Modules Section -->
<section class="section modules-page-section">
    <div class="container">
        
        <!-- Modules Grid - Larger cards -->
        <div class="modules-grid-large">
            <?php if (isset($modules)): ?>
                <?php foreach ($modules as $index => $module): ?>
                    <article class="module-card-large module-theme module-theme--<?= htmlspecialchars($module['slug']) ?>" data-animate>
                        
                        <!-- Card Background Decoration -->
                        <div class="card-bg-decoration"></div>
                        
                        <!-- Card Content -->
                        <div class="card-large-inner">
                            <!-- Left: Icon & Info -->
                            <div class="card-large-header">
                                <div class="card-large-icon">
                                    <i class="fas <?= $module['icon'] ?>"></i>
                                </div>
                                <div class="card-large-badge">Module</div>
                            </div>
                            
                            <!-- Center: Content -->
                            <div class="card-large-body">
                                <h2 class="card-large-title"><?= htmlspecialchars($module['name']) ?></h2>
                                <p class="card-large-description"><?= htmlspecialchars($module['description']) ?></p>
                                
                                <!-- Features List -->
                                <ul class="card-features">
                                    <li><i class="fas fa-check-circle"></i> Suivi en temps réel</li>
                                    <li><i class="fas fa-check-circle"></i> Rapports détaillés</li>
                                    <li><i class="fas fa-check-circle"></i> Interface intuitive</li>
                                </ul>
                            </div>
                            
                            <!-- Right: Stats & Action -->
                            <div class="card-large-footer">
                                <!-- Stats -->
                                <div class="card-large-stats">
                                    <?php foreach ($module['stats'] as $key => $value): ?>
                                        <div class="large-stat">
                                            <span class="large-stat-value"><?= $value ?></span>
                                            <span class="large-stat-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                
                                <!-- Action Button -->
                                <a href="<?= $module['route'] ?>" class="card-large-action">
                                    <span>Accéder au module</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
    </div>
</section>

<!-- Features Comparison -->
<section class="section comparison-section">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-star"></i>
                Avantages
            </span>
            <h2 class="section-title">Pourquoi choisir EcoTrack ?</h2>
        </div>
        
        <div class="advantages-grid">
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3>Rapide</h3>
                <p>Interface optimisée pour une expérience fluide et réactive</p>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Sécurisé</h3>
                <p>Vos données sont protégées avec un chiffrement de bout en bout</p>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Synchronisé</h3>
                <p>Accédez à vos données depuis n'importe quel appareil</p>
            </div>
            
            <div class="advantage-card">
                <div class="advantage-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Support 24/7</h3>
                <p>Une équipe dédiée pour répondre à toutes vos questions</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section cta-section">
    <div class="cta-bg">
        <div class="cta-gradient"></div>
    </div>
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">Prêt à commencer ?</h2>
            <p class="cta-text">
                Créez votre compte gratuitement et commencez à suivre votre impact environnemental
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
