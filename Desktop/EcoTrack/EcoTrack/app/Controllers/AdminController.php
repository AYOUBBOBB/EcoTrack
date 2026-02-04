<?php
/**
 * ============================================================================
 * EcoTrack - Admin Controller (BackOffice)
 * ============================================================================
 * 
 * Fichier: Controllers/AdminController.php
 * Rôle: Contrôleur pour le panneau d'administration
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\ModuleModel;
use App\Models\MenuItemModel;

class AdminController extends BaseController
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
     * Dashboard principal du BackOffice
     * 
     * @return string
     */
    public function dashboard(): string
    {
        $sidebarMenu = $this->menuItemModel->getSidebarMenu();
        
        // Statistiques pour le dashboard
        $stats = [
            'users' => ['count' => 2547, 'trend' => '+12%', 'icon' => 'fa-users', 'color' => '#3498db'],
            'events' => ['count' => 45, 'trend' => '+8%', 'icon' => 'fa-calendar', 'color' => '#e67e22'],
            'donations' => ['count' => '15,420 €', 'trend' => '+25%', 'icon' => 'fa-hand-holding-heart', 'color' => '#9b59b6'],
            'bornes' => ['count' => 156, 'trend' => '+5%', 'icon' => 'fa-charging-station', 'color' => '#27ae60'],
        ];
        
        // Activités récentes
        $recentActivities = [
            ['type' => 'user', 'message' => 'Nouvel utilisateur inscrit', 'user' => 'Ahmed M.', 'time' => 'Il y a 5 min'],
            ['type' => 'donation', 'message' => 'Don reçu', 'amount' => '50 €', 'time' => 'Il y a 15 min'],
            ['type' => 'event', 'message' => 'Événement créé', 'name' => 'Nettoyage Plage', 'time' => 'Il y a 1h'],
            ['type' => 'borne', 'message' => 'Réservation confirmée', 'borne' => 'Borne #42', 'time' => 'Il y a 2h'],
            ['type' => 'user', 'message' => 'Profil mis à jour', 'user' => 'Sara T.', 'time' => 'Il y a 3h'],
        ];
        
        return $this->render('admin/dashboard', [
            'pageTitle' => 'Dashboard - EcoTrack Admin',
            'sidebarMenu' => $sidebarMenu,
            'stats' => $stats,
            'recentActivities' => $recentActivities,
            'currentPage' => 'dashboard'
        ], 'admin');
    }

    /**
     * Page de gestion des utilisateurs
     * 
     * @return string
     */
    public function users(): string
    {
        $sidebarMenu = $this->menuItemModel->getSidebarMenu();
        
        // Données fictives pour les utilisateurs
        $users = [
            ['id' => 1, 'name' => 'Ahmed Mohamed', 'email' => 'ahmed@example.com', 'role' => 'Admin', 'status' => 'active', 'joined' => '2024-01-15'],
            ['id' => 2, 'name' => 'Sara Trabelsi', 'email' => 'sara@example.com', 'role' => 'User', 'status' => 'active', 'joined' => '2024-02-20'],
            ['id' => 3, 'name' => 'Karim Ben Ali', 'email' => 'karim@example.com', 'role' => 'User', 'status' => 'inactive', 'joined' => '2024-03-10'],
            ['id' => 4, 'name' => 'Fatma Bouazizi', 'email' => 'fatma@example.com', 'role' => 'Moderator', 'status' => 'active', 'joined' => '2024-03-25'],
            ['id' => 5, 'name' => 'Youssef Khelifi', 'email' => 'youssef@example.com', 'role' => 'User', 'status' => 'active', 'joined' => '2024-04-01'],
        ];
        
        return $this->render('admin/users', [
            'pageTitle' => 'Utilisateurs - EcoTrack Admin',
            'sidebarMenu' => $sidebarMenu,
            'users' => $users,
            'currentPage' => 'users'
        ], 'admin');
    }

    /**
     * Page de gestion des modules
     * 
     * @return string
     */
    public function modules(): string
    {
        $sidebarMenu = $this->menuItemModel->getSidebarMenu();
        $modules = $this->moduleModel->getModulesWithStats();
        
        return $this->render('admin/modules', [
            'pageTitle' => 'Modules - EcoTrack Admin',
            'sidebarMenu' => $sidebarMenu,
            'modules' => $modules,
            'currentPage' => 'modules'
        ], 'admin');
    }

    /**
     * Page des paramètres
     * 
     * @return string
     */
    public function settings(): string
    {
        $sidebarMenu = $this->menuItemModel->getSidebarMenu();
        
        return $this->render('admin/settings', [
            'pageTitle' => 'Paramètres - EcoTrack Admin',
            'sidebarMenu' => $sidebarMenu,
            'currentPage' => 'settings'
        ], 'admin');
    }
}
