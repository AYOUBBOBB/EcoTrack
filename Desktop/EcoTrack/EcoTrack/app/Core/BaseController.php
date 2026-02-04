<?php
/**
 * ============================================================================
 * EcoTrack - Base Controller Class
 * ============================================================================
 * 
 * Fichier: Core/BaseController.php
 * Rôle: Classe de base pour tous les contrôleurs
 *       Fournit les méthodes communes (rendu de vues, redirections, etc.)
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Core;

abstract class BaseController
{
    /** @var array Données à passer aux vues */
    protected array $viewData = [];
    
    /** @var string Chemin vers le dossier des vues */
    protected string $viewPath;

    /**
     * Constructeur - initialise le chemin des vues
     */
    public function __construct()
    {
        $this->viewPath = dirname(__DIR__) . '/Views/';
    }

    /**
     * Rend une vue avec les données fournies
     * 
     * @param string $view   Nom de la vue (ex: 'menu/index')
     * @param array  $data   Données à passer à la vue
     * @param string $layout Layout à utiliser (null = pas de layout)
     * @return string
     */
    protected function render(string $view, array $data = [], ?string $layout = 'main'): string
    {
        // Extraction des données pour les rendre accessibles dans la vue
        extract($data);
        
        // Capture le contenu de la vue
        ob_start();
        $viewFile = $this->viewPath . $view . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \Exception("View file not found: {$viewFile}");
        }
        
        require $viewFile;
        $content = ob_get_clean();
        
        // Si un layout est spécifié, l'utiliser
        if ($layout !== null) {
            ob_start();
            require $this->viewPath . 'layouts/' . $layout . '.php';
            return ob_get_clean();
        }
        
        return $content;
    }

    /**
     * Rend une vue partielle (composant réutilisable)
     * 
     * @param string $partial Nom du partial (ex: 'partials/navbar')
     * @param array  $data    Données à passer au partial
     * @return string
     */
    protected function partial(string $partial, array $data = []): string
    {
        extract($data);
        
        ob_start();
        require $this->viewPath . $partial . '.php';
        return ob_get_clean();
    }

    /**
     * Redirige vers une autre URL
     * 
     * @param string $url URL de destination
     * @return void
     */
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    /**
     * Retourne une réponse JSON
     * 
     * @param mixed $data    Données à encoder
     * @param int   $status  Code HTTP
     * @return string
     */
    protected function json(mixed $data, int $status = 200): string
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Vérifie si la requête est AJAX
     * 
     * @return bool
     */
    protected function isAjax(): bool
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    /**
     * Récupère un paramètre GET
     * 
     * @param string $key     Clé du paramètre
     * @param mixed  $default Valeur par défaut
     * @return mixed
     */
    protected function getParam(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }

    /**
     * Récupère un paramètre POST
     * 
     * @param string $key     Clé du paramètre
     * @param mixed  $default Valeur par défaut
     * @return mixed
     */
    protected function postParam(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Définit un message flash en session
     * 
     * @param string $type    Type de message (success, error, warning, info)
     * @param string $message Contenu du message
     * @return void
     */
    protected function setFlash(string $type, string $message): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash'][$type] = $message;
    }

    /**
     * Récupère et supprime un message flash
     * 
     * @param string $type Type de message
     * @return string|null
     */
    protected function getFlash(string $type): ?string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $message = $_SESSION['flash'][$type] ?? null;
        unset($_SESSION['flash'][$type]);
        
        return $message;
    }
}
