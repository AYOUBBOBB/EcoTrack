<?php
/**
 * ============================================================================
 * EcoTrack - User Model
 * ============================================================================
 * 
 * Fichier: Models/UserModel.php
 * Rôle: Gestion des données utilisateurs
 *       Authentification, profil, préférences
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Models;

use App\Core\BaseModel;

class UserModel extends BaseModel
{
    /** @var string Nom de la table */
    protected string $table = 'users';
    
    /** @var array Colonnes modifiables */
    protected array $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'avatar',
        'role',
        'is_active',
        'created_at',
        'updated_at'
    ];

    /**
     * Trouve un utilisateur par email
     * 
     * @param string $email Email de l'utilisateur
     * @return array|null
     */
    public function findByEmail(string $email): ?array
    {
        $result = $this->findBy(['email' => $email]);
        return $result[0] ?? null;
    }

    /**
     * Vérifie les identifiants de connexion
     * 
     * @param string $email    Email
     * @param string $password Mot de passe
     * @return array|null Données utilisateur si authentifié
     */
    public function authenticate(string $email, string $password): ?array
    {
        $user = $this->findByEmail($email);
        
        if ($user && password_verify($password, $user['password'])) {
            // Ne pas retourner le mot de passe
            unset($user['password']);
            return $user;
        }
        
        return null;
    }

    /**
     * Crée un nouvel utilisateur avec hash du mot de passe
     * 
     * @param array $data Données utilisateur
     * @return int ID du nouvel utilisateur
     */
    public function createUser(array $data): int
    {
        // Hash du mot de passe
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['is_active'] = $data['is_active'] ?? 1;
        $data['role'] = $data['role'] ?? 'user';
        
        return $this->create($data);
    }

    /**
     * Met à jour le mot de passe d'un utilisateur
     * 
     * @param int    $userId      ID utilisateur
     * @param string $newPassword Nouveau mot de passe
     * @return bool
     */
    public function updatePassword(int $userId, string $newPassword): bool
    {
        return $this->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Récupère les statistiques utilisateur pour le dashboard
     * 
     * @param int $userId ID utilisateur
     * @return array
     */
    public function getUserStats(int $userId): array
    {
        // Données de démonstration
        return [
            'eco_points' => 1250,
            'carbon_saved' => '125 kg',
            'events_attended' => 8,
            'donations_made' => 3,
            'rank' => 'Éco-Héros',
            'progress' => 75
        ];
    }
}
