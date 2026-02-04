<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? "Inscription - EcoTrack") ?></title>
    
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
            --color-gray-300: #d1d5db;
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

        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

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
            max-width: 420px;
            margin: 0 auto;
        }

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

        .auth-form-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 460px;
        }

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

        .error-list {
            margin: 0;
            padding-left: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
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

        .input-wrapper:focus-within .input-icon {
            color: var(--color-primary);
        }

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

        .form-hint {
            font-size: 0.8125rem;
            color: var(--color-gray-500);
            margin-top: 0.5rem;
        }

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
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.5);
        }

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
                <h1 class="visual-title">Rejoignez<br>la communauté éco</h1>
                <p class="visual-text">
                    Créez votre compte et commencez à suivre votre impact environnemental 
                    dès aujourd'hui.
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
                        <h2 class="auth-title">Créer un compte</h2>
                        <p class="auth-subtitle">Rejoignez EcoTrack en quelques secondes</p>
                    </div>

                    <?php if (!empty($error)): ?>
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span><?= htmlspecialchars($error) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errors) && is_array($errors)): ?>
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i>
                            <ul class="error-list">
                                <?php foreach ($errors as $field => $message): ?>
                                    <li><?= htmlspecialchars($message) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="/register" method="POST">
                        <div class="form-group">
                            <label for="first_name" class="form-label">Prénom</label>
                            <div class="input-wrapper">
                                <input type="text"
                                       id="first_name"
                                       name="first_name"
                                       class="form-input"
                                       placeholder="Votre prénom"
                                       value="<?= htmlspecialchars($data['first_name'] ?? "") ?>"
                                       required
                                       autocomplete="given-name">
                                <i class="fas fa-user input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="form-label">Nom</label>
                            <div class="input-wrapper">
                                <input type="text"
                                       id="last_name"
                                       name="last_name"
                                       class="form-input"
                                       placeholder="Votre nom"
                                       value="<?= htmlspecialchars($data['last_name'] ?? "") ?>"
                                       required
                                       autocomplete="family-name">
                                <i class="fas fa-user input-icon"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <div class="input-wrapper">
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-input"
                                       placeholder="vous@exemple.com"
                                       value="<?= htmlspecialchars($data['email'] ?? "") ?>"
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
                                       autocomplete="new-password">
                                <i class="fas fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" onclick="togglePassword('password', 'password-icon')">
                                    <i class="fas fa-eye" id="password-icon"></i>
                                </button>
                            </div>
                            <div class="form-hint">Au moins 8 caractères.</div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
                            <div class="input-wrapper">
                                <input type="password"
                                       id="password_confirm"
                                       name="password_confirm"
                                       class="form-input"
                                       placeholder="••••••••"
                                       required
                                       autocomplete="new-password">
                                <i class="fas fa-lock input-icon"></i>
                                <button type="button" class="password-toggle" onclick="togglePassword('password_confirm', 'password-confirm-icon')">
                                    <i class="fas fa-eye" id="password-confirm-icon"></i>
                                </button>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <span>Créer un compte</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>

                    <div class="auth-footer">
                        Vous avez déjà un compte ? <a href="/login">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>
