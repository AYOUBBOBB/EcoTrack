<!-- ============================================================================
     EcoTrack - Admin Settings
     ============================================================================
============================================================================ -->

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1 class="page-title">Paramètres</h1>
        <p class="page-subtitle">Configurez les paramètres de votre plateforme</p>
    </div>
</div>

<div class="settings-layout">
    
    <!-- Settings Navigation -->
    <div class="settings-nav">
        <a href="#general" class="settings-nav-item active">
            <i class="fas fa-cog"></i>
            <span>Général</span>
        </a>
        <a href="#appearance" class="settings-nav-item">
            <i class="fas fa-palette"></i>
            <span>Apparence</span>
        </a>
        <a href="#notifications" class="settings-nav-item">
            <i class="fas fa-bell"></i>
            <span>Notifications</span>
        </a>
        <a href="#security" class="settings-nav-item">
            <i class="fas fa-shield-alt"></i>
            <span>Sécurité</span>
        </a>
        <a href="#integrations" class="settings-nav-item">
            <i class="fas fa-plug"></i>
            <span>Intégrations</span>
        </a>
    </div>
    
    <!-- Settings Content -->
    <div class="settings-content">
        
        <!-- General Settings -->
        <div class="card" id="general">
            <div class="card-header">
                <h3 class="card-title">Paramètres généraux</h3>
            </div>
            <div class="card-body">
                <form class="settings-form">
                    <div class="form-group">
                        <label class="form-label">Nom du site</label>
                        <input type="text" class="form-input" value="EcoTrack">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-input form-textarea" rows="3">Plateforme de gestion environnementale</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email de contact</label>
                        <input type="email" class="form-input" value="contact@ecotrack.tn">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Langue par défaut</label>
                        <select class="form-input form-select">
                            <option value="fr" selected>Français</option>
                            <option value="en">English</option>
                            <option value="ar">العربية</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Fuseau horaire</label>
                        <select class="form-input form-select">
                            <option value="Africa/Tunis" selected>Africa/Tunis (GMT+1)</option>
                            <option value="Europe/Paris">Europe/Paris (GMT+1)</option>
                        </select>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Notifications Settings -->
        <div class="card" id="notifications" style="margin-top: var(--space-6);">
            <div class="card-header">
                <h3 class="card-title">Notifications</h3>
            </div>
            <div class="card-body">
                <div class="settings-toggles">
                    <div class="toggle-item">
                        <div class="toggle-info">
                            <span class="toggle-label">Notifications par email</span>
                            <span class="toggle-desc">Recevoir les alertes importantes par email</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-item">
                        <div class="toggle-info">
                            <span class="toggle-label">Notifications push</span>
                            <span class="toggle-desc">Recevoir des notifications en temps réel</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-item">
                        <div class="toggle-info">
                            <span class="toggle-label">Résumé hebdomadaire</span>
                            <span class="toggle-desc">Recevoir un rapport chaque semaine</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    
                    <div class="toggle-item">
                        <div class="toggle-info">
                            <span class="toggle-label">Alertes de sécurité</span>
                            <span class="toggle-desc">Être notifié des connexions suspectes</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<style>
.settings-layout {
    display: grid;
    grid-template-columns: 250px 1fr;
    gap: var(--space-6);
}

.settings-nav {
    background: white;
    border-radius: var(--radius-xl);
    padding: var(--space-4);
    box-shadow: var(--shadow-sm);
    height: fit-content;
    position: sticky;
    top: calc(var(--header-height) + var(--space-6));
}

.settings-nav-item {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) var(--space-4);
    font-size: 0.875rem;
    color: var(--color-gray-600);
    text-decoration: none;
    border-radius: var(--radius-lg);
    transition: all var(--transition-fast);
}

.settings-nav-item:hover {
    background: var(--color-gray-50);
    color: var(--color-gray-900);
}

.settings-nav-item.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--color-primary);
}

.settings-nav-item i {
    width: 20px;
    text-align: center;
}

/* Form Styles */
.settings-form {
    max-width: 500px;
}

.form-group {
    margin-bottom: var(--space-5);
}

.form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-gray-700);
    margin-bottom: var(--space-2);
}

.form-input {
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

.form-input:focus {
    background: white;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 100px;
}

.form-select {
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 40px;
}

.form-actions {
    padding-top: var(--space-4);
    border-top: 1px solid var(--color-gray-100);
}

/* Toggle Switch */
.settings-toggles {
    display: flex;
    flex-direction: column;
    gap: var(--space-4);
}

.toggle-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-4);
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
}

.toggle-info {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.toggle-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--color-gray-800);
}

.toggle-desc {
    font-size: 0.75rem;
    color: var(--color-gray-500);
}

.toggle-switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 26px;
}

.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.toggle-slider {
    position: absolute;
    cursor: pointer;
    inset: 0;
    background: var(--color-gray-300);
    border-radius: var(--radius-full);
    transition: all var(--transition-fast);
}

.toggle-slider::before {
    content: '';
    position: absolute;
    width: 20px;
    height: 20px;
    left: 3px;
    bottom: 3px;
    background: white;
    border-radius: 50%;
    transition: all var(--transition-fast);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.toggle-switch input:checked + .toggle-slider {
    background: var(--color-primary);
}

.toggle-switch input:checked + .toggle-slider::before {
    transform: translateX(22px);
}

@media (max-width: 1024px) {
    .settings-layout {
        grid-template-columns: 1fr;
    }
    
    .settings-nav {
        position: static;
        display: flex;
        flex-wrap: wrap;
        gap: var(--space-2);
    }
}
</style>
