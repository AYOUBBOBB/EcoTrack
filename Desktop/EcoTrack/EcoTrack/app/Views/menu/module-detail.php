<!-- ============================================================================
     EcoTrack - Module Detail Page
     ============================================================================
     Page de détail d'un module spécifique
============================================================================ -->

<?php if (isset($module)): ?>

<!-- Page Header -->
<section class="module-hero module-theme module-theme--<?= htmlspecialchars($module['slug']) ?>">
    <div class="module-hero-bg">
        <div class="module-hero-gradient"></div>
        <div class="module-hero-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="module-hero-content">
            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav animate-fade-in" aria-label="Breadcrumb">
                <ol class="breadcrumb breadcrumb-light">
                    <li class="breadcrumb-item">
                        <a href="/"><i class="fas fa-home"></i> Accueil</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/modules">Modules</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($module['name']) ?></li>
                </ol>
            </nav>
            
            <div class="module-hero-grid">
                <div class="module-hero-text">
                    <span class="module-kicker animate-fade-in">
                        <i class="fas fa-layer-group"></i>
                        Module EcoTrack
                    </span>
                    <div class="module-icon-large animate-fade-in">
                        <i class="fas <?= $module['icon'] ?>"></i>
                    </div>
                    
                    <h1 class="module-hero-title animate-fade-in-up">
                        <?= htmlspecialchars($module['name']) ?>
                    </h1>
                    
                    <p class="module-hero-description animate-fade-in-up delay-1">
                        <?= htmlspecialchars($module['description']) ?>
                    </p>
                    
                    <div class="module-hero-stats animate-fade-in-up delay-2">
                        <?php foreach ($module['stats'] as $key => $value): ?>
                            <div class="hero-stat">
                                <span class="hero-stat-value"><?= $value ?></span>
                                <span class="hero-stat-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="module-hero-actions animate-fade-in-up delay-3">
                        <a href="/register" class="btn btn-white btn-lg">
                            <span>Commencer maintenant</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="#features" class="btn btn-outline-white btn-lg">
                            <span>Voir les fonctionnalités</span>
                        </a>
                    </div>
                </div>

                <!-- Impact (résumé court, sans changer la structure fonctionnelle) -->
                <aside class="module-hero-side" aria-label="Impact du module">
                    <div class="impact-card" data-animate>
                        <div class="impact-card__top">
                            <div>
                                <div class="impact-card__title">Impact environnemental</div>
                            </div>
                            <div class="impact-card__icon" aria-hidden="true">
                                <i class="fas fa-earth-europe"></i>
                            </div>
                        </div>
                        <p class="impact-card__text">
                            <?= htmlspecialchars($moduleMeta['impact'] ?? 'Un impact positif, mesurable et accessible.') ?>
                        </p>

                        <?php if (!empty($moduleMeta['level'])): ?>
                            <div class="indicator" aria-label="Niveau de prise en main">
                                <div class="indicator__row">
                                    <span class="indicator__label">Niveau</span>
                                    <span class="indicator__value"><?= htmlspecialchars($moduleMeta['level']['label']) ?></span>
                                </div>
                                <div class="indicator__track" aria-hidden="true">
                                    <div class="indicator__bar" style="--pct: <?= (int) round(($moduleMeta['level']['value'] ?? 0.5) * 100) ?>%"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($moduleMeta['badges']) && is_array($moduleMeta['badges'])): ?>
                        <div class="pill-row" aria-label="Points clés" data-animate>
                            <?php foreach ($moduleMeta['badges'] as $badge): ?>
                                <span class="pill"><?= htmlspecialchars($badge) ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section module-features" id="features">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-star"></i>
                Fonctionnalités
            </span>
            <h2 class="section-title">Ce que vous pouvez faire</h2>
            <p class="section-subtitle">
                Découvrez toutes les possibilités offertes par ce module
            </p>
        </div>
        
        <div class="features-grid-large">
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Suivi en temps réel</h3>
                    <p>Visualisez vos données et statistiques en temps réel avec des graphiques interactifs et des tableaux de bord personnalisables.</p>
                </div>
            </div>
            
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Notifications intelligentes</h3>
                    <p>Recevez des alertes personnalisées pour ne jamais manquer une information importante ou une action à effectuer.</p>
                </div>
            </div>
            
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-file-export"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Rapports détaillés</h3>
                    <p>Générez des rapports complets exportables en PDF ou Excel pour analyser vos performances et partager vos résultats.</p>
                </div>
            </div>
            
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Accessible partout</h3>
                    <p>Accédez à toutes les fonctionnalités depuis votre ordinateur, tablette ou smartphone, où que vous soyez.</p>
                </div>
            </div>
            
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Collaboration</h3>
                    <p>Travaillez en équipe avec des fonctionnalités de partage et de collaboration intégrées.</p>
                </div>
            </div>
            
            <div class="feature-item" data-animate>
                <div class="feature-item-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="feature-item-content">
                    <h3>Sécurité maximale</h3>
                    <p>Vos données sont protégées avec un chiffrement de bout en bout et des sauvegardes automatiques.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How it Works -->
<section class="section how-it-works">
    <div class="container">
        <div class="section-header text-center">
            <span class="section-badge">
                <i class="fas fa-lightbulb"></i>
                Comment ça marche
            </span>
            <h2 class="section-title">Simple et efficace</h2>
        </div>
        
        <div class="steps-grid">
            <div class="step-item" data-animate>
                <div class="step-number">1</div>
                <h3 class="step-title">Créez votre compte</h3>
                <p class="step-text">Inscrivez-vous gratuitement en quelques secondes</p>
            </div>
            
            <div class="step-connector">
                <i class="fas fa-arrow-right"></i>
            </div>
            
            <div class="step-item" data-animate>
                <div class="step-number">2</div>
                <h3 class="step-title">Configurez le module</h3>
                <p class="step-text">Personnalisez selon vos besoins</p>
            </div>
            
            <div class="step-connector">
                <i class="fas fa-arrow-right"></i>
            </div>
            
            <div class="step-item" data-animate>
                <div class="step-number">3</div>
                <h3 class="step-title">Commencez à utiliser</h3>
                <p class="step-text">Profitez de toutes les fonctionnalités</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section module-theme module-theme--<?= htmlspecialchars($module['slug']) ?>">
    <div class="cta-bg">
        <div class="cta-gradient"></div>
    </div>
    <div class="container">
        <div class="cta-content text-center">
            <h2 class="cta-title">Prêt à commencer ?</h2>
            <p class="cta-text">
                Rejoignez des milliers d'utilisateurs qui utilisent déjà ce module
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

<?php else: ?>
    <div class="container" style="padding: 100px 0; text-align: center;">
        <h1>Module non trouvé</h1>
        <p>Le module demandé n'existe pas.</p>
        <a href="/modules" class="btn btn-primary">Voir tous les modules</a>
    </div>
<?php endif; ?>
