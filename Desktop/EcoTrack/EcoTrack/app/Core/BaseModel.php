<?php
/**
 * ============================================================================
 * EcoTrack - Base Model Class
 * ============================================================================
 * 
 * Fichier: Core/BaseModel.php
 * Rôle: Classe de base pour tous les modèles
 *       Fournit les méthodes CRUD communes
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Core;

use PDO;

abstract class BaseModel
{
    /** @var PDO|null Instance de connexion PDO (lazy) */
    protected ?PDO $db = null;
    
    /** @var string Nom de la table (à définir dans les classes enfants) */
    protected string $table = '';
    
    /** @var string Clé primaire de la table */
    protected string $primaryKey = 'id';
    
    /** @var array Colonnes autorisées pour les insertions/mises à jour */
    protected array $fillable = [];

    /**
     * Constructeur - initialise la connexion à la base de données
     */
    public function __construct()
    {
        // Connexion lazy: évite une tentative DB quand elle n'est pas nécessaire
    }

    /**
     * Retourne la connexion PDO (initialisation lazy)
     *
     * @return PDO
     */
    protected function db(): PDO
    {
        if ($this->db === null) {
            $this->db = Database::getInstance()->getConnection();
        }
        return $this->db;
    }

    /**
     * Récupère tous les enregistrements
     * 
     * @param string|null $orderBy Colonne de tri
     * @param string      $order   Direction du tri (ASC/DESC)
     * @return array
     */
    public function findAll(?string $orderBy = null, string $order = 'ASC'): array
    {
        $sql = "SELECT * FROM {$this->table}";
        
        if ($orderBy) {
            $sql .= " ORDER BY {$orderBy} {$order}";
        }
        
        $stmt = $this->db()->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Récupère un enregistrement par son ID
     * 
     * @param int $id Identifiant
     * @return array|null
     */
    public function findById(int $id): ?array
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute(['id' => $id]);
        
        $result = $stmt->fetch();
        return $result ?: null;
    }

    /**
     * Récupère des enregistrements selon des critères
     * 
     * @param array  $criteria Critères de recherche [colonne => valeur]
     * @param string $operator Opérateur logique (AND/OR)
     * @return array
     */
    public function findBy(array $criteria, string $operator = 'AND'): array
    {
        $conditions = [];
        $params = [];
        
        foreach ($criteria as $column => $value) {
            $conditions[] = "{$column} = :{$column}";
            $params[$column] = $value;
        }
        
        $sql = "SELECT * FROM {$this->table} WHERE " . implode(" {$operator} ", $conditions);
        $stmt = $this->db()->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
    }

    /**
     * Crée un nouvel enregistrement
     * 
     * @param array $data Données à insérer
     * @return int ID de l'enregistrement créé
     */
    public function create(array $data): int
    {
        // Filtre les données selon les colonnes autorisées
        $data = $this->filterData($data);
        
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db()->prepare($sql);
        $stmt->execute($data);

        return (int) $this->db()->lastInsertId();
    }

    /**
     * Met à jour un enregistrement
     * 
     * @param int   $id   Identifiant de l'enregistrement
     * @param array $data Données à mettre à jour
     * @return bool
     */
    public function update(int $id, array $data): bool
    {
        // Filtre les données selon les colonnes autorisées
        $data = $this->filterData($data);
        
        $sets = [];
        foreach (array_keys($data) as $column) {
            $sets[] = "{$column} = :{$column}";
        }
        
        $data['id'] = $id;
        
        $sql = "UPDATE {$this->table} SET " . implode(', ', $sets) . " WHERE {$this->primaryKey} = :id";
        $stmt = $this->db()->prepare($sql);
        
        return $stmt->execute($data);
    }

    /**
     * Supprime un enregistrement
     * 
     * @param int $id Identifiant de l'enregistrement
     * @return bool
     */
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->db()->prepare($sql);
        
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Compte le nombre d'enregistrements
     * 
     * @param array $criteria Critères de filtre optionnels
     * @return int
     */
    public function count(array $criteria = []): int
    {
        $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        
        if (!empty($criteria)) {
            $conditions = [];
            foreach (array_keys($criteria) as $column) {
                $conditions[] = "{$column} = :{$column}";
            }
            $sql .= " WHERE " . implode(' AND ', $conditions);
        }
        
        $stmt = $this->db()->prepare($sql);
        $stmt->execute($criteria);
        
        return (int) $stmt->fetch()['total'];
    }

    /**
     * Exécute une requête SQL personnalisée
     * 
     * @param string $sql    Requête SQL
     * @param array  $params Paramètres
     * @return array
     */
    public function query(string $sql, array $params = []): array
    {
        $stmt = $this->db()->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
    }

    /**
     * Filtre les données selon les colonnes autorisées
     * 
     * @param array $data Données à filtrer
     * @return array
     */
    private function filterData(array $data): array
    {
        if (empty($this->fillable)) {
            return $data;
        }
        
        return array_intersect_key($data, array_flip($this->fillable));
    }

    /**
     * Démarre une transaction
     * 
     * @return bool
     */
    public function beginTransaction(): bool
    {
        return $this->db()->beginTransaction();
    }

    /**
     * Valide une transaction
     * 
     * @return bool
     */
    public function commit(): bool
    {
        return $this->db()->commit();
    }

    /**
     * Annule une transaction
     * 
     * @return bool
     */
    public function rollBack(): bool
    {
        return $this->db()->rollBack();
    }
}
