# 🌿 EcoTrack - Plateforme de Gestion Environnementale

EcoTrack est une application web moderne pour la gestion de l'impact environnemental, construite avec une architecture MVC propre et une interface utilisateur professionnelle.

## 📁 Architecture MVC

Le projet suit strictement le pattern **Model-View-Controller** pour une séparation claire des responsabilités :

```
EcoTrack/
├── app/                          # Code source de l'application
│   ├── Core/                     # Classes de base du framework
│   │   ├── BaseController.php    # Contrôleur parent avec méthodes communes
│   │   ├── BaseModel.php         # Modèle parent avec CRUD générique
│   │   ├── Database.php          # Connexion DB (Singleton Pattern)
│   │   └── Router.php            # Système de routage des URLs
│   │
│   ├── Controllers/              # Contrôleurs de l'application
│   │   ├── AuthController.php    # Gestion authentification
│   │   └── MenuController.php    # Gestion du menu/navigation
│   │
│   ├── Models/                   # Modèles de données
│   │   ├── MenuItemModel.php     # Éléments de menu
│   │   ├── ModuleModel.php       # Modules de l'application
│   │   └── UserModel.php         # Utilisateurs
│   │
│   ├── Views/                    # Vues (templates PHP)
│   │   ├── layouts/              # Layouts réutilisables
│   │   │   └── main.php          # Layout principal
│   │   ├── partials/             # Composants réutilisables
│   │   │   ├── navbar.php        # Barre de navigation
│   │   │   └── footer.php        # Pied de page
│   │   ├── menu/                 # Pages du menu
│   │   │   └── index.php         # Page d'accueil
│   │   ├── auth/                 # Pages d'authentification
│   │   │   └── login.php         # Page de connexion
│   │   └── errors/               # Pages d'erreur
│   │       └── 404.php           # Page 404
│   │
│   └── routes.php                # Configuration des routes
│
├── public/                       # Fichiers accessibles publiquement
│   ├── assets/                   # Ressources statiques
│   │   ├── css/                  # Feuilles de style
│   │   │   └── main.css          # CSS principal
│   │   ├── js/                   # Scripts JavaScript
│   │   │   └── main.js           # JS principal
│   │   └── images/               # Images et icônes
│   │       └── hero-earth.svg    # Illustration hero
│   ├── index.php                 # Point d'entrée (Front Controller)
│   └── .htaccess                 # Configuration Apache
│
├── FrontOffice/                  # Ancien code (conservé pour compatibilité)
├── BackOffice/                   # Administration (ancien code)
└── README.md                     # Documentation
```

## 🏗️ Rôle de chaque couche

### 📂 Model (Modèles)
- **Responsabilité** : Gestion des données et logique métier
- **Emplacement** : `app/Models/`
- **Caractéristiques** :
  - Accès à la base de données via PDO
  - Méthodes CRUD héritées de `BaseModel`
  - Validation des données
  - Aucune logique d'affichage

### 📂 View (Vues)
- **Responsabilité** : Affichage et présentation
- **Emplacement** : `app/Views/`
- **Caractéristiques** :
  - Templates PHP purs
  - Utilisation de layouts et partials
  - Aucune logique métier
  - Données reçues du contrôleur

### 📂 Controller (Contrôleurs)
- **Responsabilité** : Gestion des requêtes utilisateur
- **Emplacement** : `app/Controllers/`
- **Caractéristiques** :
  - Reçoit les requêtes HTTP
  - Interagit avec les modèles
  - Prépare les données pour les vues
  - Retourne les réponses appropriées

### 📂 Core (Noyau)
- **Responsabilité** : Infrastructure de base
- **Emplacement** : `app/Core/`
- **Caractéristiques** :
  - Classes abstraites et utilitaires
  - Routeur, connexion DB, classes parentes
  - Fonctionnalités transversales

## 🎨 Design UI/UX

### Fonctionnalités visuelles
- **Design moderne** : Glassmorphism, gradients, ombres douces
- **Responsive** : Adapté desktop, tablette et mobile
- **Animations** : Transitions fluides, hover effects, scroll animations
- **Accessibilité** : ARIA labels, navigation clavier, contrastes

### Palette de couleurs
```css
--color-primary: #10b981;     /* Vert émeraude */
--color-secondary: #0ea5e9;   /* Bleu ciel */
--color-accent: #8b5cf6;      /* Violet */
```

### Typographie
- **Titres** : Playfair Display (élégant, serif)
- **Corps** : Outfit (moderne, sans-serif)

## 🚀 Installation

### Prérequis
- PHP 8.0+
- MySQL 5.7+ ou MariaDB
- Apache avec mod_rewrite
- Composer (optionnel)

### Configuration

1. **Cloner le projet**
```bash
git clone https://github.com/votre-repo/ecotrack.git
cd ecotrack
```

2. **Configurer la base de données**
   - Modifier `app/Core/Database.php`
   - Renseigner host, dbname, username, password

3. **Configurer Apache**
   - Pointer le DocumentRoot vers `/public`
   - Activer mod_rewrite

4. **Accéder à l'application**
```
http://localhost/
```

## 📝 Routes disponibles

| Route | Méthode | Contrôleur | Description |
|-------|---------|------------|-------------|
| `/` | GET | MenuController@index | Page d'accueil |
| `/modules` | GET | MenuController@modules | Liste des modules |
| `/modules/{slug}` | GET | MenuController@showModule | Détail d'un module |
| `/about` | GET | MenuController@about | À propos |
| `/contact` | GET | MenuController@contact | Contact |
| `/login` | GET/POST | AuthController | Connexion |
| `/register` | GET/POST | AuthController | Inscription |
| `/logout` | GET | AuthController@logout | Déconnexion |

## 🔧 Bonnes pratiques appliquées

- ✅ **Separation of Concerns** : Chaque couche a une responsabilité unique
- ✅ **DRY** (Don't Repeat Yourself) : Composants réutilisables
- ✅ **Single Responsibility** : Chaque classe fait une seule chose
- ✅ **Dependency Injection** : Dépendances injectées via constructeurs
- ✅ **PSR-4** : Autoloading compatible
- ✅ **Sécurité** : Requêtes préparées, échappement XSS, headers sécurisés

## 📄 Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.

---

**EcoTrack** - Ensemble pour un avenir durable 🌍
