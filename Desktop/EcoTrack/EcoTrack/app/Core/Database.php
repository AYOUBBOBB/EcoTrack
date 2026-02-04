<?php
/**
 * ============================================================================
 * EcoTrack - Database Connection Class (Singleton Pattern)
 * ============================================================================
 * 
 * Fichier: Core/Database.php
 * Rôle: Gestion centralisée de la connexion à la base de données
 * Pattern: Singleton - garantit une seule instance de connexion
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    /** @var Database|null Instance unique de la classe */
    private static ?Database $instance = null;
    
    /** @var PDO Connexion PDO */
    private PDO $connection;
    
    /** @var array Configuration de la base de données */
    private array $config = [
        'host'     => 'localhost',
        'dbname'   => 'ecotrack',
        'username' => 'root',
        'password' => '',
        'charset'  => 'utf8mb4'
    ];

    /**
     * Constructeur privé - empêche l'instanciation directe
     * Établit la connexion à la base de données
     */
    private function __construct()
    {
        try {
            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=%s",
                $this->config['host'],
                $this->config['dbname'],
                $this->config['charset']
            );
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            
            $this->connection = new PDO(
                $dsn,
                $this->config['username'],
                $this->config['password'],
                $options
            );
            
        } catch (PDOException $e) {
            throw new PDOException(
                "Erreur de connexion à la base de données: " . $e->getMessage()
            );
        }
    }

    /**
     * Récupère l'instance unique de Database (Singleton)
     * 
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Récupère la connexion PDO
     * 
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * Exécute une requête préparée
     * 
     * @param string $sql    Requête SQL
     * @param array  $params Paramètres de la requête
     * @return \PDOStatement
     */
    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Empêche le clonage de l'instance
     */
    private function __clone() {}

    /**
     * Empêche la désérialisation
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }
}
