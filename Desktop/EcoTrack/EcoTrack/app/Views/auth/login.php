<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Connexion - EcoTrack') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        :root {
            --color-primary: #10b981;
            --color-primary-dark: #059669;
            --color-secondary: #0ea5e9;
            --color-gray-50: #f9fafb;
            --color-gray-100: #f3f4f6;
            --color-gray-200: #e5e7eb;
            --color-gray-400: #9ca3af;
            --color-gray-500: #6b7280;
            --color-gray-600: #4b5563;
            --color-gray-800: #1f2937;
            --color-gray-900: #111827;
            --color-error: #ef4444;
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
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            overflow: hidden;
        }

        /* Layout */
        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Left Panel - Visual */
        .auth-visual {
            flex: 1;
            display: none;
            position: relative;
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-secondary) 100%);
            overflow: hidden;
        }

        @media (min-width: 1024px) {
            .auth-visual {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        .visual-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: white;
            padding: 3rem;
        }

        .visual-logo {
            font-family: var(--font-display);
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .visual-logo span:first-child {
            opacity: 0.9;
        }

        .visual-title {
            font-family: var(--font-display);
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .visual-text {
            font-size: 1.125rem;
            opacity: 0.9;
            max-width: 400px;
            margin: 0 auto;
        }

        /* Animated shapes */
        .auth-visual::before,
        .auth-visual::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 15s infinite ease-in-out;
        }

        .auth-visual::before {
            width: 400px;
            height: 400px;
            top: -100px;
            right: -100px;
        }

        .auth-visual::after {
            width: 300px;
            height: 300px;
            bottom: -50px;
            left: -50px;
            animation-delay: -5s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(30px, -30px) scale(1.1); }
        }

        /* Right Panel - Form */
        .auth-form-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* Logo Mobile */
        .mobile-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        @media (min-width: 1024px) {
            .mobile-logo {
                display: none;
            }
        }

        .mobile-logo-link {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            border-radius: 12px;
            color: white;
            font-size: 1.25rem;
        }

        .logo-text {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 700;
        }

        .logo-text .eco { color: var(--color-primary); }
        .logo-text .track { color: var(--color-gray-800); }

        /* Form Card */
        .auth-card {
            background: white;
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .auth-title {
            font-family: var(--font-display);
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--color-gray-900);
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: var(--color-gray-500);
            font-size: 0.9375rem;
        }

        /* Error Message */
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            color: var(--color-error);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--color-gray-700);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--color-gray-400);
            font-size: 1rem;
            pointer-events: none;
            transition: color 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            font-family: var(--font-primary);
            font-size: 0.9375rem;
            color: var(--color-gray-800);
            background: var(--color-gray-50);
            border: 2px solid transparent;
            border-radius: 12px;
            outline: none;
            transition: all 0.2s;
        }

        .form-input::placeholder {
            color: var(--color-gray-400);
        }

        .form-input:focus {
            background: white;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .form-input:focus + .input-icon,
        .input-wrapper:focus-within .input-icon {
            color: var(--color-primary);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--color-gray-400);
            cursor: pointer;
            padding: 0.25rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: var(--color-gray-600);
        }

        /* Form Actions */
        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            accent-color: var(--color-primary);
            cursor: pointer;
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: var(--color-gray-600);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.875rem;
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--color-primary-dark);
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            font-family: var(--font-primary);
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
            border: none;
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all 0.3s;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.4);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Divider */
        .auth-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--color-gray-200);
        }

        .auth-divider span {
            font-size: 0.8125rem;
            color: var(--color-gray-400);
        }

        /* Social Login */
        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1rem;
            font-family: var(--font-primary);
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--color-gray-700);
            background: var(--color-gray-50);
            border: 2px solid var(--color-gray-200);
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .social-btn:hover {
            border-color: var(--color-gray-300);
            background: var(--color-gray-100);
        }

        .social-btn i {
            font-size: 1.125rem;
        }

        .social-btn.google i { color: #ea4335; }
        .social-btn.facebook i { color: #1877f2; }

        /* Register Link */
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.9375rem;
            color: var(--color-gray-600);
        }

        .auth-footer a {
            color: var(--color-primary);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-footer a:hover {
            color: var(--color-primary-dark);
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .auth-card {
            animation: fadeInUp 0.6s ease forwards;
        }

        .visual-content {
            animation: fadeInUp 0.8s ease forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Visual Panel -->
        <div class="auth-visual">
            <div class="visual-content">
                <div class="visual-logo">
                    <span>Eco</span><span>Track</span>
                </div>
                <h1 class="visual-title">Bienvenue sur<br>votre espace éco</h1>
                <p class="visual-text">
                    Connectez-vous pour accéder à vos outils de gestion environnementale 
                    et suivre votre impact positif.
                </p>
            </div>
        </div>

        <!-- Form Panel -->
        <div class="auth-form-panel">
            <div class="auth-form-wrapper">
                <!-- Mobile Logo -->
                <div class="mobile-logo">
                    <a href="/" class="mobile-logo-link">
                        <div class="logo-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <span class="logo-text">
                            <span class="eco">Eco</span><span class="track">Track</span>
                        </span>
                    </a>
                </div>

                <!-- Auth Card -->
                <div class="auth-card">
                    <div class="auth-header">
                        <h2 class="auth-title">Se connecter</h2>
                        <p class="auth-subtitle">Connectez-vous avec votre compte EcoTrack</p>
                    </div>

                    <?php if (isset($error)): ?>
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span><?= htmlspecialchars($error) ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="/login" method="POST">
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <div class="input-wrapper">
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-input" 
                                       placeholder="vous@exemple.com"
                                       value="<?= htmlspecialchars($email ?? '') ?>"
                                       required
                                       autocomplete="email">
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <div class="input-wrapper">
                                <input type="password" 
                                       id="password" 
                                       name="password" 
                                       class="form-input" 
                                       placeholder="••••••••"
                                       required
                                       autocomplete="current-password">
                                <i class="fas fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="password-icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="checkbox-wrapper">
                                <input type="checkbox" id="remember" name="remember" class="checkbox-input">
                                <label for="remember" class="checkbox-label">Se souvenir de moi</label>
                            </div>
                            <a href="/forgot-password" class="forgot-link">Mot de passe oublié ?</a>
                        </div>

                        <button type="submit" class="btn-submit">
                            <span>Se connecter</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <div class="auth-divider">
                        <span>ou continuer avec</span>
                    </div>

                    <div class="social-login">
                        <a href="#" class="social-btn google">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                        </a>
                        <a href="#" class="social-btn facebook">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </a>
                    </div>

                    <div class="auth-footer">
                        Pas encore de compte ? <a href="/register">Créer un compte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('password-icon');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
