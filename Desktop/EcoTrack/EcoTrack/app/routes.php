<?php
/**
 * ============================================================================
 * EcoTrack - Configuration des Routes
 * ============================================================================
 * 
 * Définition de toutes les routes de l'application
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

use App\Core\Router;

// Créer une instance du routeur
$router = new Router();

// ============================================================================
// Routes publiques (FrontOffice)
// ============================================================================

// Page d'accueil
$router->get('/', 'MenuController@index');
$router->get('/home', 'MenuController@index');

// Pages de menu
$router->get('/modules', 'MenuController@modules');
$router->get('/modules/{slug}', 'MenuController@showModule');
$router->get('/about', 'MenuController@about');
$router->get('/contact', 'MenuController@contact');

// ============================================================================
// Routes d'authentification
// ============================================================================

$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/register', 'AuthController@showRegister');
$router->post('/register', 'AuthController@register');
$router->get('/logout', 'AuthController@logout');

// ============================================================================
// Routes BackOffice (Administration)
// ============================================================================

$router->get('/admin', 'AdminController@dashboard');
$router->get('/admin/users', 'AdminController@users');
$router->get('/admin/modules', 'AdminController@modules');
$router->get('/admin/settings', 'AdminController@settings');

// ============================================================================
// Résolution de la requête
// ============================================================================

// Récupérer l'URI et la méthode de la requête
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Supprimer le chemin de base si nécessaire (pour les sous-dossiers)
$basePath = '';
if (!empty($basePath)) {
    $requestUri = '/' . ltrim(substr($requestUri, strlen($basePath)), '/');
}

// Exécuter la route correspondante
echo $router->resolve($requestUri, $requestMethod);
