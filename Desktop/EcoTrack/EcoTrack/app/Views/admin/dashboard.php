<!-- ============================================================================
     EcoTrack - Admin Dashboard (Premium SaaS)
     ============================================================================
     Panneau d'administration avec KPIs, activités et aperçu modules
     Design premium avec micro-interactions soignées
============================================================================ -->

<?php
// Génère le message de bienvenue selon l'heure
$hour = (int) date('H');
if ($hour < 12) {
    $greeting = 'Bonjour';
    $greetingIcon = 'fa-sun';
} elseif ($hour < 18) {
    $greeting = 'Bon après-midi';
    $greetingIcon = 'fa-cloud-sun';
} else {
    $greeting = 'Bonsoir';
    $greetingIcon = 'fa-moon';
}
$weekdayNames = [
    1 => 'lundi',
    2 => 'mardi',
    3 => 'mercredi',
    4 => 'jeudi',
    5 => 'vendredi',
    6 => 'samedi',
    7 => 'dimanche',
];
$monthNames = [
    1 => 'janvier',
    2 => 'fevrier',
    3 => 'mars',
    4 => 'avril',
    5 => 'mai',
    6 => 'juin',
    7 => 'juillet',
    8 => 'aout',
    9 => 'septembre',
    10 => 'octobre',
    11 => 'novembre',
    12 => 'decembre',
];
$weekday = $weekdayNames[(int) date('N')] ?? '';
$month = $monthNames[(int) date('n')] ?? '';
$currentDate = sprintf('%s %s %s %s', $weekday, date('d'), $month, date('Y'));
?>

<!-- System Status Bar -->
<div class="system-status" data-animate="fade-up">
    <div class="status-item">
        <span class="status-dot online"></span>
        <span>Système opérationnel</span>
    </div>
    <div class="status-item">
        <i class="fas fa-database"></i>
        <span>Base de données connectée</span>
    </div>
    <div class="status-item">
        <i class="fas fa-clock"></i>
        <span>Dernière sync: il y a 2 min</span>
    </div>
    <div class="status-item" style="margin-left: auto;">
        <i class="fas fa-calendar-alt"></i>
        <span><?= ucfirst($currentDate) ?></span>
    </div>
</div>

<!-- Page Header -->
<div class="page-header" data-animate="fade-up" data-delay="1">
    <div class="page-header-content">
        <p class="page-greeting">
            <i class="fas <?= $greetingIcon ?>"></i>
            <?= $greeting ?>, Admin
        </p>
        <h1 class="page-title">Tableau de bord</h1>
        <p class="page-subtitle">Vue d'ensemble de votre plateforme EcoTrack</p>
    </div>
    <div class="page-actions">
        <button class="btn btn-outline">
            <i class="fas fa-download"></i>
            <span>Exporter</span>
        </button>
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
            <span>Nouvelle action</span>
        </button>
    </div>
</div>

<!-- Stats Grid - Premium KPIs -->
<div class="stats-grid">
    <?php 
    // Données KPI avec informations enrichies
    $kpis = [
        'users' => [
            'label' => 'Utilisateurs',
            'value' => $stats['users']['count'] ?? '1,248',
            'trend' => '+12%',
            'trendDir' => 'up',
            'period' => 'vs mois dernier',
            'icon' => 'fa-users',
            'color' => 'users'
        ],
        'dons' => [
            'label' => 'Donations',
            'value' => $stats['dons']['count'] ?? '€15,420',
            'trend' => '+8%',
            'trendDir' => 'up',
            'period' => 'ce mois',
            'icon' => 'fa-hand-holding-heart',
            'color' => 'dons'
        ],
        'events' => [
            'label' => 'Événements',
            'value' => $stats['events']['count'] ?? '45',
            'trend' => '+3',
            'trendDir' => 'up',
            'period' => 'actifs',
            'icon' => 'fa-calendar-check',
            'color' => 'events'
        ],
        'bornes' => [
            'label' => 'Bornes',
            'value' => $stats['bornes']['count'] ?? '156',
            'trend' => '98%',
            'trendDir' => 'up',
            'period' => 'disponibles',
            'icon' => 'fa-charging-station',
            'color' => 'bornes'
        ],
    ];
    
    $delay = 2;
    foreach ($kpis as $key => $kpi): 
    ?>
        <div class="stat-card" data-animate="fade-up" data-delay="<?= $delay++ ?>">
            <div class="stat-icon <?= $kpi['color'] ?>">
                <i class="fas <?= $kpi['icon'] ?>"></i>
            </div>
            <div class="stat-content">
                <span class="stat-label"><?= $kpi['label'] ?></span>
                <span class="stat-value" data-counter="<?= preg_replace('/[^0-9]/', '', $kpi['value']) ?>">
                    <?= $kpi['value'] ?>
                </span>
                <div class="stat-footer">
                    <span class="stat-trend <?= $kpi['trendDir'] ?>">
                        <i class="fas fa-arrow-<?= $kpi['trendDir'] ?>"></i>
                        <?= $kpi['trend'] ?>
                    </span>
                    <span class="stat-period"><?= $kpi['period'] ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Content Grid -->
<div class="grid-2">
    
    <!-- Recent Activities -->
    <div class="card" data-animate="fade-up" data-delay="5">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-stream"></i>
                Activités récentes
            </h3>
            <span class="card-badge">Live</span>
        </div>
        <div class="card-body card-body--flush">
            <ul class="activity-list">
                <?php 
                // Données d'activités enrichies
                $activities = $recentActivities ?? [
                    ['type' => 'user', 'message' => 'Nouvel utilisateur inscrit', 'user' => 'Marie Dupont', 'time' => 'Il y a 5 min'],
                    ['type' => 'donation', 'message' => 'Don reçu', 'amount' => '€50', 'time' => 'Il y a 12 min'],
                    ['type' => 'event', 'message' => 'Événement créé', 'name' => 'Nettoyage Plage Nord', 'time' => 'Il y a 25 min'],
                    ['type' => 'borne', 'message' => 'Borne activée', 'borne' => 'Station Gare #42', 'time' => 'Il y a 1h'],
                    ['type' => 'user', 'message' => 'Profil mis à jour', 'user' => 'Jean Martin', 'time' => 'Il y a 2h'],
                ];
                
                $icons = [
                    'user' => 'fa-user',
                    'donation' => 'fa-heart',
                    'event' => 'fa-calendar',
                    'borne' => 'fa-charging-station'
                ];
                
                foreach ($activities as $activity): 
                ?>
                    <li class="activity-item">
                        <div class="activity-icon <?= $activity['type'] ?>">
                            <i class="fas <?= $icons[$activity['type']] ?? 'fa-circle' ?>"></i>
                        </div>
                        <div class="activity-content">
                            <p class="activity-message">
                                <?= htmlspecialchars($activity['message']) ?>
                                <?php if (isset($activity['user'])): ?>
                                    — <strong><?= htmlspecialchars($activity['user']) ?></strong>
                                <?php elseif (isset($activity['amount'])): ?>
                                    — <strong><?= htmlspecialchars($activity['amount']) ?></strong>
                                <?php elseif (isset($activity['name'])): ?>
                                    — <strong><?= htmlspecialchars($activity['name']) ?></strong>
                                <?php elseif (isset($activity['borne'])): ?>
                                    — <strong><?= htmlspecialchars($activity['borne']) ?></strong>
                                <?php endif; ?>
                            </p>
                            <span class="activity-time"><?= htmlspecialchars($activity['time']) ?></span>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <!-- Modules Overview -->
    <div class="card" data-animate="fade-up" data-delay="5">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-th-large"></i>
                Aperçu des modules
            </h3>
            <a href="/admin/modules" class="btn btn-sm btn-ghost">
                Gérer <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="modules-overview">
                
                <!-- Transport -->
                <div class="module-stat-item">
                    <div class="module-stat-icon transport">
                        <i class="fas fa-car-side"></i>
                    </div>
                    <div class="module-stat-info">
                        <span class="module-stat-name">Transport Écologique</span>
                        <span class="module-stat-value">156 bornes • 1,200 trajets/mois</span>
                    </div>
                    <div class="module-stat-progress">
                        <div class="progress-bar transport" style="width: 78%;" data-progress="78"></div>
                    </div>
                </div>
                
                <!-- Eco -->
                <div class="module-stat-item">
                    <div class="module-stat-icon eco">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <div class="module-stat-info">
                        <span class="module-stat-name">Gestion Éco</span>
                        <span class="module-stat-value">850 actions • 2.5T CO₂ économisé</span>
                    </div>
                    <div class="module-stat-progress">
                        <div class="progress-bar eco" style="width: 65%;" data-progress="65"></div>
                    </div>
                </div>
                
                <!-- Events -->
                <div class="module-stat-item">
                    <div class="module-stat-icon events">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="module-stat-info">
                        <span class="module-stat-name">Événements</span>
                        <span class="module-stat-value">45 actifs • 3,200 participants</span>
                    </div>
                    <div class="module-stat-progress">
                        <div class="progress-bar events" style="width: 52%;" data-progress="52"></div>
                    </div>
                </div>
                
                <!-- Dons -->
                <div class="module-stat-item">
                    <div class="module-stat-icon dons">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <div class="module-stat-info">
                        <span class="module-stat-name">Dons & Solidarité</span>
                        <span class="module-stat-value">€15,420 collectés • 28 projets</span>
                    </div>
                    <div class="module-stat-progress">
                        <div class="progress-bar dons" style="width: 89%;" data-progress="89"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
</div>

<!-- Quick Actions -->
<div class="card" style="margin-top: var(--space-6);" data-animate="fade-up" data-delay="6">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bolt"></i>
            Actions rapides
        </h3>
    </div>
    <div class="card-body">
        <div class="quick-actions">
            <a href="/admin/users" class="quick-action">
                <div class="quick-action-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div class="quick-action-content">
                    <span class="quick-action-title">Ajouter un utilisateur</span>
                    <span class="quick-action-desc">Créer un nouveau compte</span>
                </div>
            </a>
            
            <a href="/admin/modules" class="quick-action">
                <div class="quick-action-icon">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="quick-action-content">
                    <span class="quick-action-title">Configurer les modules</span>
                    <span class="quick-action-desc">Gérer les paramètres</span>
                </div>
            </a>
            
            <a href="#" class="quick-action">
                <div class="quick-action-icon">
                    <i class="fas fa-file-export"></i>
                </div>
                <div class="quick-action-content">
                    <span class="quick-action-title">Exporter les données</span>
                    <span class="quick-action-desc">Télécharger un rapport</span>
                </div>
            </a>
            
            <a href="/admin/settings" class="quick-action">
                <div class="quick-action-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="quick-action-content">
                    <span class="quick-action-title">Paramètres système</span>
                    <span class="quick-action-desc">Sécurité et configuration</span>
                </div>
            </a>
        </div>
    </div>
</div>
