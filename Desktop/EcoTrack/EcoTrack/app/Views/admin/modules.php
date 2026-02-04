<!-- ============================================================================
     EcoTrack - Admin Modules Management
     ============================================================================
============================================================================ -->

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Modules</h1>
        <p class="page-subtitle">Gérez les modules de la plateforme EcoTrack</p>
    </div>
</div>

<!-- Modules Grid -->
<div class="admin-modules-grid">
    <?php if (isset($modules)): ?>
        <?php foreach ($modules as $module): ?>
            <div class="admin-module-card">
                <div class="module-card-header" style="background: <?= $module['gradient'] ?>;">
                    <div class="module-icon-large">
                        <i class="fas <?= $module['icon'] ?>"></i>
                    </div>
                    <div class="module-status active">
                        <i class="fas fa-check-circle"></i>
                        Actif
                    </div>
                </div>
                <div class="module-card-body">
                    <h3 class="module-name"><?= htmlspecialchars($module['name']) ?></h3>
                    <p class="module-description"><?= htmlspecialchars($module['description']) ?></p>
                    
                    <div class="module-stats-row">
                        <?php foreach ($module['stats'] as $key => $value): ?>
                            <div class="module-mini-stat">
                                <span class="mini-stat-value"><?= $value ?></span>
                                <span class="mini-stat-label"><?= ucfirst(str_replace('_', ' ', $key)) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="module-card-footer">
                    <button class="btn btn-outline btn-sm">
                        <i class="fas fa-cog"></i>
                        Configurer
                    </button>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-external-link-alt"></i>
                        Accéder
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<style>
.admin-modules-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: var(--space-6);
}

.admin-module-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-base);
}

.admin-module-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.module-card-header {
    position: relative;
    padding: var(--space-8);
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.module-icon-large {
    width: 64px;
    height: 64px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-xl);
    color: white;
    font-size: 1.75rem;
    backdrop-filter: blur(10px);
}

.module-status {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-3);
    background: rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    backdrop-filter: blur(10px);
}

.module-card-body {
    padding: var(--space-6);
}

.module-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--space-2);
}

.module-description {
    font-size: 0.875rem;
    color: var(--color-gray-500);
    margin-bottom: var(--space-5);
    line-height: 1.6;
}

.module-stats-row {
    display: flex;
    gap: var(--space-6);
    padding-top: var(--space-4);
    border-top: 1px solid var(--color-gray-100);
}

.module-mini-stat {
    text-align: center;
}

.mini-stat-value {
    display: block;
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-gray-900);
}

.mini-stat-label {
    display: block;
    font-size: 0.6875rem;
    color: var(--color-gray-400);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 2px;
}

.module-card-footer {
    display: flex;
    gap: var(--space-3);
    padding: var(--space-4) var(--space-6);
    background: var(--color-gray-50);
    border-top: 1px solid var(--color-gray-100);
}

.module-card-footer .btn {
    flex: 1;
}

.btn-sm {
    padding: var(--space-2) var(--space-4);
    font-size: 0.8125rem;
}
</style>
