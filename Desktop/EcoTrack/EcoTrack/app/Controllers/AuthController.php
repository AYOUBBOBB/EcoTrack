<?php
/**
 * ============================================================================
 * EcoTrack - Authentication Controller
 * ============================================================================
 * 
 * Fichier: Controllers/AuthController.php
 * Rôle: Contrôleur pour la gestion de l'authentification
 *       Connexion, déconnexion, inscription
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Controllers;

use App\Core\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    /** @var UserModel */
    private UserModel $userModel;

    /**
     * Constructeur - initialise le modèle utilisateur
     */
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel();
    }

    /**
     * Affiche le formulaire de connexion
     * 
     * @return string
     */
    public function showLogin(): string
    {
        // Si déjà connecté, rediriger vers l'accueil
        if ($this->isLoggedIn()) {
            $this->redirect('/');
        }
        
        return $this->render('auth/login', [
            'pageTitle' => 'Connexion - EcoTrack'
        ], null);
    }

    /**
     * Traite la soumission du formulaire de connexion
     * 
     * @return string
     */
    public function login(): string
    {
        $email = $this->postParam('email');
        $password = $this->postParam('password');
        
        // Validation basique
        if (empty($email) || empty($password)) {
            return $this->render('auth/login', [
                'pageTitle' => 'Connexion - EcoTrack',
                'error' => 'Veuillez remplir tous les champs',
                'email' => $email
            ], null);
        }
        
        // Tentative d'authentification
        $user = $this->userModel->authenticate($email, $password);
        
        if ($user) {
            // Démarrer la session
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            
            $_SESSION['user'] = $user;
            $_SESSION['logged_in'] = true;
            
            $this->setFlash('success', 'Connexion réussie !');
            $this->redirect('/');
        }
        
        return $this->render('auth/login', [
            'pageTitle' => 'Connexion - EcoTrack',
            'error' => 'Email ou mot de passe incorrect',
            'email' => $email
        ], null);
    }

    /**
     * Affiche le formulaire d'inscription
     * 
     * @return string
     */
    public function showRegister(): string
    {
        if ($this->isLoggedIn()) {
            $this->redirect('/');
        }
        
        return $this->render('auth/register', [
            'pageTitle' => 'Inscription - EcoTrack'
        ], null);
    }

    /**
     * Traite l'inscription d'un nouvel utilisateur
     * 
     * @return string
     */
    public function register(): string
    {
        $data = [
            'first_name' => $this->postParam('first_name'),
            'last_name' => $this->postParam('last_name'),
            'email' => $this->postParam('email'),
            'password' => $this->postParam('password'),
            'password_confirm' => $this->postParam('password_confirm')
        ];
        
        $errors = $this->validateRegistration($data);
        
        if (!empty($errors)) {
            return $this->render('auth/register', [
                'pageTitle' => 'Inscription - EcoTrack',
                'errors' => $errors,
                'data' => $data
            ], null);
        }
        
        // Créer l'utilisateur
        try {
            $userId = $this->userModel->createUser($data);
            $this->setFlash('success', 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.');
            $this->redirect('/login');
        } catch (\Exception $e) {
            return $this->render('auth/register', [
                'pageTitle' => 'Inscription - EcoTrack',
                'error' => 'Une erreur est survenue lors de la création du compte',
                'data' => $data
            ], null);
        }
        
        return '';
    }

    /**
     * Déconnecte l'utilisateur
     * 
     * @return void
     */
    public function logout(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Détruire la session
        $_SESSION = [];
        session_destroy();
        
        $this->redirect('/');
    }

    /**
     * Vérifie si l'utilisateur est connecté
     * 
     * @return bool
     */
    private function isLoggedIn(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }

    /**
     * Valide les données d'inscription
     * 
     * @param array $data Données du formulaire
     * @return array Erreurs de validation
     */
    private function validateRegistration(array $data): array
    {
        $errors = [];
        
        if (empty($data['first_name'])) {
            $errors['first_name'] = 'Le prénom est requis';
        }
        
        if (empty($data['last_name'])) {
            $errors['last_name'] = 'Le nom est requis';
        }
        
        if (empty($data['email'])) {
            $errors['email'] = 'L\'email est requis';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'L\'email n\'est pas valide';
        } elseif ($this->userModel->findByEmail($data['email'])) {
            $errors['email'] = 'Cet email est déjà utilisé';
        }
        
        if (empty($data['password'])) {
            $errors['password'] = 'Le mot de passe est requis';
        } elseif (strlen($data['password']) < 8) {
            $errors['password'] = 'Le mot de passe doit contenir au moins 8 caractères';
        }
        
        if ($data['password'] !== $data['password_confirm']) {
            $errors['password_confirm'] = 'Les mots de passe ne correspondent pas';
        }
        
        return $errors;
    }
}
