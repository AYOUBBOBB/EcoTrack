<!-- ============================================================================
     EcoTrack - Navigation Bar Component
     ============================================================================
     Composant réutilisable pour la barre de navigation principale
     Design: Glassmorphism + animations fluides
============================================================================ -->

<header id="navbar" class="navbar">
    <div class="navbar-container">
        
        <!-- Logo -->
        <a href="/" class="navbar-brand" aria-label="EcoTrack - Accueil">
            <div class="brand-icon">
                <i class="fas fa-leaf"></i>
            </div>
            <div class="brand-text">
                <span class="brand-eco">Eco</span><span class="brand-track">Track</span>
            </div>
        </a>
        
        <!-- Navigation Links - Desktop -->
        <nav class="navbar-nav" aria-label="Navigation principale">
            <ul class="nav-list">
                <?php if (isset($menuItems)): ?>
                    <?php foreach ($menuItems as $item): ?>
                        <li class="nav-item <?= isset($item['children']) ? 'has-dropdown' : '' ?>">
                            <?php if (isset($item['children'])): ?>
                                <!-- Item avec sous-menu -->
                                <button class="nav-link dropdown-toggle" 
                                        aria-expanded="false" 
                                        aria-haspopup="true">
                                    <span><?= htmlspecialchars($item['label']) ?></span>
                                    <i class="fas fa-chevron-down dropdown-arrow"></i>
                                </button>
                                
                                <!-- Dropdown Menu -->
                                <div class="dropdown-menu">
                                    <div class="dropdown-grid">
                                        <?php foreach ($item['children'] as $child): ?>
                                            <a href="<?= htmlspecialchars($child['url']) ?>" class="dropdown-item">
                                                <div class="dropdown-icon">
                                                    <i class="fas <?= $child['icon'] ?>"></i>
                                                </div>
                                                <div class="dropdown-content">
                                                    <span class="dropdown-title"><?= htmlspecialchars($child['label']) ?></span>
                                                    <?php if (isset($child['description'])): ?>
                                                        <span class="dropdown-desc"><?= htmlspecialchars($child['description']) ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php else: ?>
                                <!-- Item simple -->
                                <a href="<?= htmlspecialchars($item['url']) ?>" 
                                   class="nav-link <?= ($currentPage ?? '') === strtolower($item['label']) ? 'active' : '' ?>">
                                    <span><?= htmlspecialchars($item['label']) ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </nav>
        
        <!-- Actions (Login / User) -->
        <div class="navbar-actions">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                <!-- Utilisateur connecté -->
                <div class="user-menu">
                    <button class="user-toggle" aria-expanded="false">
                        <div class="user-avatar">
                            <span><?= strtoupper(substr($_SESSION['user']['first_name'] ?? 'U', 0, 1)) ?></span>
                        </div>
                        <span class="user-name"><?= htmlspecialchars($_SESSION['user']['first_name'] ?? 'Utilisateur') ?></span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="user-dropdown">
                        <a href="/profile" class="user-dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Mon Profil</span>
                        </a>
                        <a href="/settings" class="user-dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Paramètres</span>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="/logout" class="user-dropdown-item logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Déconnexion</span>
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- Utilisateur non connecté -->
                <a href="/login" class="btn btn-ghost">
                    <span>Connexion</span>
                </a>
                <a href="/register" class="btn btn-primary">
                    <span>Inscription</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            <?php endif; ?>
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-toggle" id="mobile-toggle" aria-label="Menu mobile" aria-expanded="false">
            <span class="hamburger">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </span>
        </button>
        
    </div>
    
    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobile-nav" aria-hidden="true">
        <div class="mobile-nav-content">
            <nav class="mobile-nav-list">
                <?php if (isset($menuItems)): ?>
                    <?php foreach ($menuItems as $item): ?>
                        <?php if (isset($item['children'])): ?>
                            <div class="mobile-nav-group">
                                <button class="mobile-nav-toggle">
                                    <span><?= htmlspecialchars($item['label']) ?></span>
                                    <i class="fas fa-plus"></i>
                                </button>
                                <div class="mobile-nav-submenu">
                                    <?php foreach ($item['children'] as $child): ?>
                                        <a href="<?= htmlspecialchars($child['url']) ?>" class="mobile-nav-subitem">
                                            <i class="fas <?= $child['icon'] ?>"></i>
                                            <span><?= htmlspecialchars($child['label']) ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="<?= htmlspecialchars($item['url']) ?>" class="mobile-nav-link">
                                <?= htmlspecialchars($item['label']) ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </nav>
            
            <div class="mobile-nav-actions">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
                    <a href="/profile" class="btn btn-outline btn-block">Mon Profil</a>
                    <a href="/logout" class="btn btn-ghost btn-block">Déconnexion</a>
                <?php else: ?>
                    <a href="/login" class="btn btn-outline btn-block">Connexion</a>
                    <a href="/register" class="btn btn-primary btn-block">Inscription</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
