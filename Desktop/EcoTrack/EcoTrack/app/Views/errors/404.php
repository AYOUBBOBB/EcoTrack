<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée - EcoTrack</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --color-primary: #10b981;
            --color-secondary: #0ea5e9;
            --color-gray-50: #f9fafb;
            --color-gray-400: #9ca3af;
            --color-gray-500: #6b7280;
            --color-gray-800: #1f2937;
            --color-gray-900: #111827;
            --font-primary: 'Outfit', sans-serif;
            --font-display: 'Playfair Display', serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-gray-50) 0%, #e2e8f0 100%);
            position: relative;
            overflow: hidden;
        }

        /* Background Shapes */
        .bg-shapes {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: var(--color-primary);
            top: -100px;
            right: -100px;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            background: var(--color-secondary);
            bottom: -100px;
            left: -100px;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -30px) scale(1.1); }
        }

        /* Content */
        .error-container {
            position: relative;
            z-index: 1;
            text-align: center;
            padding: 2rem;
            max-width: 600px;
        }

        .error-code {
            font-family: var(--font-display);
            font-size: clamp(8rem, 20vw, 12rem);
            font-weight: 700;
            line-height: 1;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            animation: pulse 3s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }

        .error-title {
            font-family: var(--font-display);
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 600;
            color: var(--color-gray-900);
            margin-bottom: 1rem;
        }

        .error-message {
            font-size: 1.125rem;
            color: var(--color-gray-500);
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .error-icon {
            font-size: 4rem;
            color: var(--color-primary);
            margin-bottom: 1.5rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .error-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 1.75rem;
            font-family: var(--font-primary);
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            color: white;
            border: none;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }

        .btn-outline {
            background: transparent;
            color: var(--color-gray-800);
            border: 2px solid var(--color-gray-300);
        }

        .btn-outline:hover {
            border-color: var(--color-primary);
            color: var(--color-primary);
        }

        /* Back link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 2rem;
            color: var(--color-gray-400);
            text-decoration: none;
            font-size: 0.9375rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--color-primary);
        }
    </style>
</head>
<body>
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-seedling"></i>
        </div>
        
        <div class="error-code">404</div>
        
        <h1 class="error-title">Page non trouvée</h1>
        
        <p class="error-message">
            Oups ! La page que vous recherchez semble avoir disparu dans la nature.
            <?php if (isset($message)): ?>
                <br><small><?= htmlspecialchars($message) ?></small>
            <?php endif; ?>
        </p>
        
        <div class="error-actions">
            <a href="/" class="btn btn-primary">
                <i class="fas fa-home"></i>
                <span>Retour à l'accueil</span>
            </a>
            <a href="/contact" class="btn btn-outline">
                <i class="fas fa-envelope"></i>
                <span>Contactez-nous</span>
            </a>
        </div>
        
        <a href="javascript:history.back()" class="back-link">
            <i class="fas fa-arrow-left"></i>
            <span>Revenir en arrière</span>
        </a>
    </div>
</body>
</html>
