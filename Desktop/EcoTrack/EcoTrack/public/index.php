<?php
/**
 * ============================================================================
 * EcoTrack - Point d'entrée principal (Front Controller)
 * ============================================================================
 * 
 * Ce fichier est le point d'entrée unique de l'application.
 * Toutes les requêtes HTTP sont redirigées vers ce fichier via .htaccess
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

// Définir le chemin de base de l'application
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('PUBLIC_PATH', __DIR__);

// Activer l'affichage des erreurs en développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Démarrer la session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoloader simple pour les classes
spl_autoload_register(function ($class) {
    // Convertir le namespace en chemin de fichier
    $prefix = 'App\\';
    $baseDir = APP_PATH . '/';
    
    // Vérifier si la classe utilise le préfixe du namespace
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    // Récupérer le nom relatif de la classe
    $relativeClass = substr($class, $len);
    
    // Remplacer les séparateurs de namespace par des séparateurs de dossier
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
    
    // Si le fichier existe, le charger
    if (file_exists($file)) {
        require $file;
    }
});

// Charger les routes
require_once APP_PATH . '/routes.php';
