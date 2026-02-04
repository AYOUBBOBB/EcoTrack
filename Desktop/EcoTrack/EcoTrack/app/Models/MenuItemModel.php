<?php
/**
 * ============================================================================
 * EcoTrack - Menu Item Model
 * ============================================================================
 * 
 * Fichier: Models/MenuItemModel.php
 * Rôle: Gestion des éléments de navigation du menu
 * 
 * @package EcoTrack
 * @author  EcoTrack Team
 * @version 1.0.0
 */

namespace App\Models;

use App\Core\BaseModel;

class MenuItemModel extends BaseModel
{
    /** @var string Nom de la table */
    protected string $table = 'menu_items';
    
    /** @var array Colonnes modifiables */
    protected array $fillable = [
        'label',
        'url',
        'icon',
        'parent_id',
        'order_position',
        'is_active',
        'target'
    ];

    /**
     * Récupère le menu principal structuré
     * 
     * @return array Menu avec sous-menus
     */
    public function getMainMenu(): array
    {
        return [
            [
                'id' => 1,
                'label' => 'Accueil',
                'url' => '/',
                'icon' => 'fa-home',
                'active' => true
            ],
            [
                'id' => 2,
                'label' => 'À propos',
                'url' => '/about',
                'icon' => 'fa-info-circle',
                'active' => false
            ],
            [
                'id' => 3,
                'label' => 'Services',
                'url' => '/services',
                'icon' => 'fa-cogs',
                'active' => false
            ],
            [
                'id' => 4,
                'label' => 'Modules',
                'url' => '#',
                'icon' => 'fa-th-large',
                'active' => false,
                'children' => [
                    [
                        'label' => 'Transport Écologique',
                        'url' => '/modules/transport',
                        'icon' => 'fa-car-side',
                        'description' => 'Bornes de recharge & trajets'
                    ],
                    [
                        'label' => 'Gestion Éco',
                        'url' => '/modules/eco',
                        'icon' => 'fa-leaf',
                        'description' => 'Empreinte carbone & consommation'
                    ],
                    [
                        'label' => 'Événements',
                        'url' => '/modules/evenements',
                        'icon' => 'fa-calendar-alt',
                        'description' => 'Activités & rencontres'
                    ],
                    [
                        'label' => 'Dons & Solidarité',
                        'url' => '/modules/dons',
                        'icon' => 'fa-hand-holding-heart',
                        'description' => 'Projets environnementaux'
                    ]
                ]
            ],
            [
                'id' => 5,
                'label' => 'Contact',
                'url' => '/contact',
                'icon' => 'fa-envelope',
                'active' => false
            ]
        ];
    }

    /**
     * Récupère le menu du sidebar (BackOffice)
     * 
     * @return array
     */
    public function getSidebarMenu(): array
    {
        return [
            [
                'section' => 'Principal',
                'items' => [
                    ['label' => 'Dashboard', 'url' => '/admin', 'icon' => 'fa-tachometer-alt'],
                    ['label' => 'Statistiques', 'url' => '/admin/stats', 'icon' => 'fa-chart-line']
                ]
            ],
            [
                'section' => 'Gestion',
                'items' => [
                    [
                        'label' => 'Utilisateurs',
                        'url' => '/admin/users',
                        'icon' => 'fa-users',
                        'badge' => ['count' => 12, 'type' => 'primary']
                    ],
                    [
                        'label' => 'Transport',
                        'url' => '#',
                        'icon' => 'fa-car',
                        'children' => [
                            ['label' => 'Bornes', 'url' => '/admin/transport/bornes'],
                            ['label' => 'Réservations', 'url' => '/admin/transport/reservations']
                        ]
                    ],
                    [
                        'label' => 'Éco',
                        'url' => '#',
                        'icon' => 'fa-leaf',
                        'children' => [
                            ['label' => 'Actions', 'url' => '/admin/eco/actions'],
                            ['label' => 'Rapports', 'url' => '/admin/eco/reports']
                        ]
                    ],
                    [
                        'label' => 'Événements',
                        'url' => '#',
                        'icon' => 'fa-calendar',
                        'children' => [
                            ['label' => 'Liste', 'url' => '/admin/events'],
                            ['label' => 'Participants', 'url' => '/admin/events/participants']
                        ]
                    ],
                    [
                        'label' => 'Dons',
                        'url' => '#',
                        'icon' => 'fa-heart',
                        'children' => [
                            ['label' => 'Campagnes', 'url' => '/admin/donations/campaigns'],
                            ['label' => 'Transactions', 'url' => '/admin/donations/transactions']
                        ]
                    ]
                ]
            ],
            [
                'section' => 'Système',
                'items' => [
                    ['label' => 'Paramètres', 'url' => '/admin/settings', 'icon' => 'fa-cog'],
                    ['label' => 'Logs', 'url' => '/admin/logs', 'icon' => 'fa-file-alt']
                ]
            ]
        ];
    }
}
