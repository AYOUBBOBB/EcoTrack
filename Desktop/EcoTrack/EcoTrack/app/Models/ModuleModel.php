<?php
/**
 * ============================================================================
 * EcoTrack - Module Model
 * ============================================================================
 * 
 * Fichier: Models/ModuleModel.php
 * Rôle: Gestion des données des modules EcoTrack
 *       (Transport, Eco, Événements, Dons)
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Models;

use App\Core\BaseModel;

class ModuleModel extends BaseModel
{
    /** @var string Nom de la table */
    protected string $table = 'modules';
    
    /** @var array Colonnes modifiables */
    protected array $fillable = [
        'name',
        'description',
        'icon',
        'color',
        'route',
        'is_active',
        'order_position'
    ];

    /**
     * Récupère tous les modules actifs pour le menu
     * 
     * @return array
     */
    public function getActiveModules(): array
    {
        return $this->query(
            "SELECT * FROM {$this->table} WHERE is_active = 1 ORDER BY order_position ASC"
        );
    }

    /**
     * Récupère les modules avec leurs statistiques
     * 
     * @return array
     */
    public function getModulesWithStats(): array
    {
        // Données statiques pour démonstration
        // En production, ces données proviendraient de la base de données
        return [
            [
                'id' => 1,
                'name' => 'Transport Écologique',
                'slug' => 'transport',
                'description' => 'Gérez vos trajets et trouvez des bornes de recharge',
                'icon' => 'fa-car-side',
                'color' => '#3498db',
                'gradient' => 'linear-gradient(135deg, #3498db, #2980b9)',
                'stats' => ['bornes' => 150, 'trajets' => 1200],
                'route' => '/modules/transport',
                'image' => 'transport.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Gestion Éco',
                'slug' => 'eco',
                'description' => 'Suivez votre empreinte carbone et consommation',
                'icon' => 'fa-leaf',
                'color' => '#27ae60',
                'gradient' => 'linear-gradient(135deg, #27ae60, #2ecc71)',
                'stats' => ['co2_economise' => '2.5T', 'actions' => 850],
                'route' => '/modules/eco',
                'image' => 'eco.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Événements',
                'slug' => 'evenements',
                'description' => 'Participez aux événements écologiques',
                'icon' => 'fa-calendar-alt',
                'color' => '#e67e22',
                'gradient' => 'linear-gradient(135deg, #e67e22, #f39c12)',
                'stats' => ['events' => 45, 'participants' => 3200],
                'route' => '/modules/evenements',
                'image' => 'events.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Dons & Solidarité',
                'slug' => 'dons',
                'description' => 'Contribuez aux projets environnementaux',
                'icon' => 'fa-hand-holding-heart',
                'color' => '#9b59b6',
                'gradient' => 'linear-gradient(135deg, #9b59b6, #8e44ad)',
                'stats' => ['montant' => '15K€', 'projets' => 28],
                'route' => '/modules/dons',
                'image' => 'donations.jpg'
            ]
        ];
    }

    /**
     * Contenu éditorial premium par module (pédagogie, impact, actions)
     *
     * NOTE: données statiques pour démo. En production, à stocker en DB/CMS.
     *
     * @param string $slug
     * @return array|null
     */
    public function getModuleMeta(string $slug): ?array
    {
        $meta = [
            'transport' => [
                'tagline' => "Réduisez l’empreinte de vos trajets, sans complexité.",
                'impact' => "Optimisez vos déplacements et facilitez l’accès aux bornes pour diminuer les émissions liées au transport.",
                'context' => "Le transport représente une part significative des émissions. Ce module vous aide à prendre de meilleures décisions, au bon moment, avec des informations utiles et actionnables.",
                'level' => ['label' => 'Intermédiaire', 'value' => 0.62],
                'badges' => ['Itinéraires optimisés', 'Bornes à proximité', 'Temps estimé', 'Réservations'],
                'actions' => [
                    ['icon' => 'fa-route', 'label' => "Planifier un trajet à faible impact"],
                    ['icon' => 'fa-charging-station', 'label' => "Trouver une borne disponible autour de moi"],
                    ['icon' => 'fa-clock', 'label' => "Estimer le temps de recharge"],
                    ['icon' => 'fa-bookmark', 'label' => "Réserver une borne en avance"],
                ],
            ],
            'eco' => [
                'tagline' => "Comprenez votre impact, puis améliorez-le étape par étape.",
                'impact' => "Suivez vos indicateurs (CO₂, énergie, habitudes) et recevez des recommandations concrètes pour réduire votre empreinte.",
                'context' => "Les gestes du quotidien ont un effet cumulatif. Le module Éco rend la progression visible, motivante et mesurable — même pour les débutants.",
                'level' => ['label' => 'Débutant', 'value' => 0.42],
                'badges' => ['Score éco', 'Recommandations', 'Suivi mensuel', 'Objectifs'],
                'actions' => [
                    ['icon' => 'fa-bullseye', 'label' => "Définir un objectif CO₂ mensuel"],
                    ['icon' => 'fa-chart-line', 'label' => "Analyser mon score et mes tendances"],
                    ['icon' => 'fa-list-check', 'label' => "Appliquer 3 actions à fort impact"],
                    ['icon' => 'fa-award', 'label' => "Débloquer des niveaux de progression"],
                ],
            ],
            'evenements' => [
                'tagline' => "Passez à l’action avec la communauté, localement.",
                'impact' => "Participez à des événements écologiques et amplifiez votre impact via des actions collectives.",
                'context' => "L’engagement devient plus simple quand il est partagé. Ce module vous propose des événements utiles, accessibles, et adaptés à votre rythme.",
                'level' => ['label' => 'Tous niveaux', 'value' => 0.55],
                'badges' => ['Événements locaux', 'Inscription rapide', 'Communauté', 'Suivi participation'],
                'actions' => [
                    ['icon' => 'fa-calendar-check', 'label' => "S’inscrire à un événement proche"],
                    ['icon' => 'fa-users', 'label' => "Inviter des amis / collègues"],
                    ['icon' => 'fa-location-dot', 'label' => "Découvrir les actions près de chez moi"],
                    ['icon' => 'fa-handshake', 'label' => "Créer un événement (organisateurs)"],
                ],
            ],
            'dons' => [
                'tagline' => "Soutenez des projets à impact, en toute transparence.",
                'impact' => "Contribuez à des initiatives environnementales et suivez l’impact concret de votre soutien.",
                'context' => "Donner est plus rassurant quand c’est clair. Ce module met en avant la transparence, la traçabilité et des projets à impact réel.",
                'level' => ['label' => 'Avancé', 'value' => 0.72],
                'badges' => ['Traçabilité', 'Projets vérifiés', 'Impact mesuré', 'Reçus'],
                'actions' => [
                    ['icon' => 'fa-hand-holding-heart', 'label' => "Faire un don à un projet vérifié"],
                    ['icon' => 'fa-receipt', 'label' => "Télécharger un reçu"],
                    ['icon' => 'fa-seedling', 'label' => "Suivre l’impact des contributions"],
                    ['icon' => 'fa-circle-nodes', 'label' => "Soutenir une campagne récurrente"],
                ],
            ],
        ];

        return $meta[$slug] ?? null;
    }

    /**
     * Récupère un module par son slug
     * 
     * @param string $slug Slug du module
     * @return array|null
     */
    public function findBySlug(string $slug): ?array
    {
        $modules = $this->getModulesWithStats();
        
        foreach ($modules as $module) {
            if ($module['slug'] === $slug) {
                return $module;
            }
        }
        
        return null;
    }
}
