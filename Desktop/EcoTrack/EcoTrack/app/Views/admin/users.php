<!-- ============================================================================
     EcoTrack - Admin Users Management
     ============================================================================
     Gestion des utilisateurs
============================================================================ -->

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Utilisateurs</h1>
        <p class="page-subtitle">Gérez les comptes utilisateurs de la plateforme</p>
    </div>
    <div class="page-actions">
        <button class="btn btn-primary">
            <i class="fas fa-plus"></i>
            <span>Ajouter un utilisateur</span>
        </button>
    </div>
</div>

<!-- Filters -->
<div class="card" style="margin-bottom: var(--space-6);">
    <div class="card-body" style="padding: var(--space-4) var(--space-6);">
        <div class="filters-row">
            <div class="filter-group">
                <input type="text" class="filter-input" placeholder="Rechercher un utilisateur...">
            </div>
            <div class="filter-group">
                <select class="filter-select">
                    <option value="">Tous les rôles</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">Modérateur</option>
                    <option value="user">Utilisateur</option>
                </select>
            </div>
            <div class="filter-group">
                <select class="filter-select">
                    <option value="">Tous les statuts</option>
                    <option value="active">Actif</option>
                    <option value="inactive">Inactif</option>
                </select>
            </div>
            <button class="btn btn-outline">
                <i class="fas fa-filter"></i>
                Filtrer
            </button>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="card">
    <div class="card-body" style="padding: 0;">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Statut</th>
                        <th>Date d'inscription</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td>
                                    <div class="user-cell">
                                        <div class="user-avatar-sm">
                                            <?= strtoupper(substr($user['name'], 0, 1)) ?>
                                        </div>
                                        <span><?= htmlspecialchars($user['name']) ?></span>
                                    </div>
                                </td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td>
                                    <span class="role-badge <?= strtolower($user['role']) ?>">
                                        <?= htmlspecialchars($user['role']) ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge <?= $user['status'] ?>">
                                        <?= $user['status'] === 'active' ? 'Actif' : 'Inactif' ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y', strtotime($user['joined'])) ?></td>
                                <td>
                                    <div class="action-btns">
                                        <button class="action-btn" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="action-btn" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn danger" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="pagination-wrapper">
    <div class="pagination-info">
        Affichage de 1 à 5 sur 2547 utilisateurs
    </div>
    <div class="pagination">
        <button class="pagination-btn" disabled>
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="pagination-btn active">1</button>
        <button class="pagination-btn">2</button>
        <button class="pagination-btn">3</button>
        <span class="pagination-dots">...</span>
        <button class="pagination-btn">510</button>
        <button class="pagination-btn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

<style>
/* Filters */
.filters-row {
    display: flex;
    gap: var(--space-4);
    align-items: center;
    flex-wrap: wrap;
}

.filter-group {
    flex: 1;
    min-width: 180px;
}

.filter-input,
.filter-select {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    font-family: var(--font-primary);
    font-size: 0.875rem;
    color: var(--color-gray-800);
    background: var(--color-gray-50);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-lg);
    outline: none;
    transition: all var(--transition-fast);
}

.filter-input:focus,
.filter-select:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

/* User Cell */
.user-cell {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.user-avatar-sm {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary));
    border-radius: var(--radius-full);
    color: white;
    font-size: 0.8125rem;
    font-weight: 600;
}

/* Role Badge */
.role-badge {
    display: inline-flex;
    padding: var(--space-1) var(--space-3);
    font-size: 0.75rem;
    font-weight: 600;
    border-radius: var(--radius-full);
}

.role-badge.admin {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
}

.role-badge.moderator {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
}

.role-badge.user {
    background: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
}

/* Pagination */
.pagination-wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: var(--space-6);
    padding: var(--space-4) 0;
}

.pagination-info {
    font-size: 0.875rem;
    color: var(--color-gray-500);
}

.pagination {
    display: flex;
    gap: var(--space-2);
}

.pagination-btn {
    min-width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 var(--space-3);
    font-family: var(--font-primary);
    font-size: 0.875rem;
    color: var(--color-gray-600);
    background: white;
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    cursor: pointer;
    transition: all var(--transition-fast);
}

.pagination-btn:hover:not(:disabled) {
    border-color: var(--color-primary);
    color: var(--color-primary);
}

.pagination-btn.active {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-dots {
    display: flex;
    align-items: center;
    padding: 0 var(--space-2);
    color: var(--color-gray-400);
}

@media (max-width: 768px) {
    .filters-row {
        flex-direction: column;
    }
    
    .filter-group {
        width: 100%;
    }
    
    .pagination-wrapper {
        flex-direction: column;
        gap: var(--space-4);
    }
}
</style>
