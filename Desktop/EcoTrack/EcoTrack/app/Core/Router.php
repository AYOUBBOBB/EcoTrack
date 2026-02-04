<?php
/**
 * ============================================================================
 * EcoTrack - Router Class
 * ============================================================================
 * 
 * Fichier: Core/Router.php
 * Rôle: Gestion du routage des requêtes HTTP vers les contrôleurs appropriés
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Core;

class Router
{
    /** @var array Routes enregistrées */
    private array $routes = [];
    
    /** @var string Préfixe de namespace pour les contrôleurs */
    private string $controllerNamespace = 'App\\Controllers\\';

    /**
     * Enregistre une route GET
     * 
     * @param string $path   Chemin de la route
     * @param string $action Action (Controller@method)
     * @return self
     */
    public function get(string $path, string $action): self
    {
        $this->addRoute('GET', $path, $action);
        return $this;
    }

    /**
     * Enregistre une route POST
     * 
     * @param string $path   Chemin de la route
     * @param string $action Action (Controller@method)
     * @return self
     */
    public function post(string $path, string $action): self
    {
        $this->addRoute('POST', $path, $action);
        return $this;
    }

    /**
     * Ajoute une route au registre
     * 
     * @param string $method Méthode HTTP
     * @param string $path   Chemin de la route
     * @param string $action Action du contrôleur
     */
    private function addRoute(string $method, string $path, string $action): void
    {
        // Convertit les paramètres dynamiques {param} en regex
        $pattern = preg_replace('/\{([a-zA-Z_]+)\}/', '(?P<$1>[^/]+)', $path);
        $pattern = "#^" . $pattern . "$#";
        
        $this->routes[] = [
            'method'  => $method,
            'pattern' => $pattern,
            'action'  => $action,
            'path'    => $path
        ];
    }

    /**
     * Résout la requête et exécute le contrôleur approprié
     * 
     * @param string $requestUri    URI de la requête
     * @param string $requestMethod Méthode HTTP
     * @return mixed
     */
    public function resolve(string $requestUri, string $requestMethod): mixed
    {
        // Nettoie l'URI
        $uri = parse_url($requestUri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';
        
        foreach ($this->routes as $route) {
            if ($route['method'] !== $requestMethod) {
                continue;
            }
            
            if (preg_match($route['pattern'], $uri, $matches)) {
                // Filtre les paramètres nommés
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                return $this->executeAction($route['action'], $params);
            }
        }
        
        // Route non trouvée - 404
        http_response_code(404);
        return $this->render404();
    }

    /**
     * Exécute l'action du contrôleur
     * 
     * @param string $action Action (Controller@method)
     * @param array  $params Paramètres de la route
     * @return mixed
     */
    private function executeAction(string $action, array $params): mixed
    {
        [$controllerName, $methodName] = explode('@', $action);
        
        $controllerClass = $this->controllerNamespace . $controllerName;
        
        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller {$controllerClass} not found");
        }
        
        $controller = new $controllerClass();
        
        if (!method_exists($controller, $methodName)) {
            throw new \Exception("Method {$methodName} not found in {$controllerClass}");
        }
        
        return call_user_func_array([$controller, $methodName], $params);
    }

    /**
     * Affiche la page 404
     * 
     * @return string
     */
    private function render404(): string
    {
        return require_once dirname(__DIR__) . '/Views/errors/404.php';
    }
}
