<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EcoTrack - Plateforme de gestion environnementale">
    <title><?= htmlspecialchars($pageTitle ?? 'EcoTrack') ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/favicon.png">
    
    <!-- Google Fonts - Moderne et distinctif -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.css">
    
    <!-- Page-specific styles -->
    <?php if (isset($extraStyles)): ?>
        <?php foreach ($extraStyles as $style): ?>
            <link rel="stylesheet" href="<?= $style ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body class="<?= $bodyClass ?? '' ?>">
    <!-- Page Loader -->
    <div id="page-loader" class="page-loader">
        <div class="loader-content">
            <div class="loader-logo">
                <span class="eco">Eco</span><span class="track">Track</span>
            </div>
            <div class="loader-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
            </div>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div id="app" class="app-wrapper">
        
        <!-- Navigation -->
        <?php include dirname(__DIR__) . '/partials/navbar.php'; ?>
        
        <!-- Main Content -->
        <main id="main-content" class="main-content">
            <?= $content ?>
        </main>
        
        <!-- Footer -->
        <?php include dirname(__DIR__) . '/partials/footer.php'; ?>
        
    </div>

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="Retour en haut">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script src="/assets/js/main.js"></script>
    
    <!-- Page-specific scripts -->
    <?php if (isset($extraScripts)): ?>
        <?php foreach ($extraScripts as $script): ?>
            <script src="<?= $script ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
