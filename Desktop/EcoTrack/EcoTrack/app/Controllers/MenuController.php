<?php
/**
 * ============================================================================
 * EcoTrack - Menu Controller
 * ============================================================================
 * 
 * Fichier: Controllers/MenuController.php
 * Rôle: Contrôleur pour la gestion de l'affichage du menu principal
 *       Gère les pages de navigation et les modules
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ModuleModel;
use App\Models\MenuItemModel;

class MenuController extends BaseController
{
    /** @var ModuleModel */
    private ModuleModel $moduleModel;
    
    /** @var MenuItemModel */
    private MenuItemModel $menuItemModel;

    /**
     * Constructeur - initialise les modèles
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleModel = new ModuleModel();
        $this->menuItemModel = new MenuItemModel();
    }

    /**
     * Affiche la page d'accueil avec le menu principal
     * 
     * @return string
     */
    public function index(): string
    {
        $modules = $this->moduleModel->getModulesWithStats();
        $menuItems = $this->menuItemModel->getMainMenu();
        
        return $this->render('menu/index', [
            'pageTitle' => 'EcoTrack - Accueil',
            'modules' => $modules,
            'menuItems' => $menuItems,
            'heroTitle' => 'Ensemble pour un avenir durable',
            'heroSubtitle' => 'Gérez votre impact environnemental avec EcoTrack',
            'currentPage' => 'home'
        ]);
    }

    /**
     * Affiche la page des modules
     * 
     * @return string
     */
    public function modules(): string
    {
        $modules = $this->moduleModel->getModulesWithStats();
        $menuItems = $this->menuItemModel->getMainMenu();
        
        return $this->render('menu/modules', [
            'pageTitle' => 'Nos Modules - EcoTrack',
            'modules' => $modules,
            'menuItems' => $menuItems,
            'extraStyles' => ['/assets/css/modules.css'],
            'currentPage' => 'modules'
        ]);
    }

    /**
     * Affiche un module spécifique
     * 
     * @param string $slug Identifiant du module
     * @return string
     */
    public function showModule(string $slug): string
    {
        $module = $this->moduleModel->findBySlug($slug);
        $moduleMeta = $this->moduleModel->getModuleMeta($slug);
        $menuItems = $this->menuItemModel->getMainMenu();
        
        if (!$module || !$moduleMeta) {
            http_response_code(404);
            return $this->render('errors/404', [
                'message' => 'Module non trouvé'
            ]);
        }
        
        return $this->render('menu/module-detail', [
            'pageTitle' => $module['name'] . ' - EcoTrack',
            'module' => $module,
            'moduleMeta' => $moduleMeta,
            'menuItems' => $menuItems,
            'extraStyles' => ['/assets/css/modules.css'],
            'currentPage' => 'modules'
        ]);
    }

    /**
     * Affiche la page À propos
     * 
     * @return string
     */
    public function about(): string
    {
        $menuItems = $this->menuItemModel->getMainMenu();
        
        return $this->render('menu/about', [
            'pageTitle' => 'À propos - EcoTrack',
            'menuItems' => $menuItems,
            'currentPage' => 'about'
        ]);
    }

    /**
     * Affiche la page Contact
     * 
     * @return string
     */
    public function contact(): string
    {
        $menuItems = $this->menuItemModel->getMainMenu();
        
        return $this->render('menu/contact', [
            'pageTitle' => 'Contact - EcoTrack',
            'menuItems' => $menuItems,
            'currentPage' => 'contact'
        ]);
    }
}
