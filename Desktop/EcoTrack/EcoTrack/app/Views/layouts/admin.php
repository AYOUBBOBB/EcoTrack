<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'EcoTrack Admin') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Admin Styles -->
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-header">
                <a href="/admin" class="sidebar-brand">
                    <div class="brand-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <span class="brand-text">
                        <span class="eco">Eco</span><span class="track">Track</span>
                    </span>
                </a>
                <button class="sidebar-close" id="sidebar-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <nav class="sidebar-nav">
                <?php if (isset($sidebarMenu)): ?>
                    <?php foreach ($sidebarMenu as $section): ?>
                        <div class="nav-section">
                            <span class="nav-section-title"><?= htmlspecialchars($section['section']) ?></span>
                            <ul class="nav-list">
                                <?php foreach ($section['items'] as $item): ?>
                                    <li class="nav-item <?= isset($item['children']) ? 'has-submenu' : '' ?>">
                                        <?php if (isset($item['children'])): ?>
                                            <button class="nav-link nav-toggle">
                                                <i class="fas <?= $item['icon'] ?>"></i>
                                                <span><?= htmlspecialchars($item['label']) ?></span>
                                                <i class="fas fa-chevron-down nav-arrow"></i>
                                            </button>
                                            <ul class="nav-submenu">
                                                <?php foreach ($item['children'] as $child): ?>
                                                    <li>
                                                        <a href="<?= $child['url'] ?>" class="nav-sublink">
                                                            <?= htmlspecialchars($child['label']) ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php else: ?>
                                            <a href="<?= $item['url'] ?>" class="nav-link <?= ($currentPage ?? '') === strtolower($item['label']) ? 'active' : '' ?>">
                                                <i class="fas <?= $item['icon'] ?>"></i>
                                                <span><?= htmlspecialchars($item['label']) ?></span>
                                                <?php if (isset($item['badge'])): ?>
                                                    <span class="nav-badge" style="background: var(--color-<?= $item['badge']['type'] ?>)">
                                                        <?= $item['badge']['count'] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </nav>
            
            <div class="sidebar-footer">
                <a href="/" class="sidebar-link" target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    <span>Voir le site</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="admin-main">
            
            <!-- Top Header -->
            <header class="admin-header">
                <div class="header-left">
                    <button class="sidebar-toggle" id="sidebar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher...">
                    </div>
                </div>
                
                <div class="header-right">
                    <button class="header-btn" title="Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-dot"></span>
                    </button>
                    
                    <button class="header-btn" title="Messages">
                        <i class="fas fa-envelope"></i>
                    </button>
                    
                    <div class="user-dropdown">
                        <button class="user-btn">
                            <div class="user-avatar">
                                <span>A</span>
                            </div>
                            <span class="user-name">Admin</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="/admin/profile" class="dropdown-item">
                                <i class="fas fa-user"></i> Mon Profil
                            </a>
                            <a href="/admin/settings" class="dropdown-item">
                                <i class="fas fa-cog"></i> Paramètres
                            </a>
                            <hr class="dropdown-divider">
                            <a href="/logout" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="admin-content">
                <?= $content ?>
            </main>
            
        </div>
        
    </div>
    
    <!-- Admin Scripts -->
    <script src="/assets/js/admin.js"></script>
</body>
</html>
