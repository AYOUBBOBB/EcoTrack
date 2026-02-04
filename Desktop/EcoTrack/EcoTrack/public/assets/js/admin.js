/**
 * ============================================================================
 * EcoTrack - Admin Dashboard JavaScript (Premium SaaS)
 * ============================================================================
 * 
 * Interactions et animations premium pour le panneau d'administration
 * - Animations d'apparition (reveal)
 * - Compteurs animés
 * - Barres de progression animées
 * - Micro-interactions soignées
 * 
 * @author  EcoTrack Team
 * @version 2.0.0
 */

'use strict';

const AdminApp = {
    /**
     * Configuration
     */
    config: {
        animationDelay: 100,
        counterDuration: 1500,
        progressDuration: 1000,
    },

    /**
     * Initialisation principale
     */
    init() {
        this.initSidebar();
        this.initSubmenus();
        this.initDropdowns();
        this.initAnimations();
        this.initCounters();
        this.initProgressBars();
        this.initTooltips();
        
        console.log('🌿 EcoTrack Admin Dashboard initialized');
    },

    /**
     * =========================================================================
     * Sidebar Management
     * =========================================================================
     */
    initSidebar() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebar-toggle');
        const sidebarClose = document.getElementById('sidebar-close');

        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        if (sidebarClose && sidebar) {
            sidebarClose.addEventListener('click', () => {
                this.closeSidebar(sidebar);
            });
        }

        // Fermer sur clic extérieur
        document.addEventListener('click', (e) => {
            if (sidebar && sidebar.classList.contains('active')) {
                if (!sidebar.contains(e.target) && !sidebarToggle?.contains(e.target)) {
                    this.closeSidebar(sidebar);
                }
            }
        });

        // Fermer avec Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar?.classList.contains('active')) {
                this.closeSidebar(sidebar);
            }
        });
    },

    closeSidebar(sidebar) {
        sidebar.classList.remove('active');
        document.body.style.overflow = '';
    },

    /**
     * =========================================================================
     * Submenus Management
     * =========================================================================
     */
    initSubmenus() {
        const toggles = document.querySelectorAll('.nav-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const item = toggle.closest('.nav-item');
                const isActive = item.classList.contains('active');

                // Fermer tous les autres
                document.querySelectorAll('.nav-item.has-submenu').forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });

                // Toggle actuel
                item.classList.toggle('active');
            });
        });
    },

    /**
     * =========================================================================
     * Dropdowns Management
     * =========================================================================
     */
    initDropdowns() {
        const userDropdown = document.querySelector('.user-dropdown');
        
        if (userDropdown) {
            const btn = userDropdown.querySelector('.user-btn');
            const menu = userDropdown.querySelector('.dropdown-menu');
            
            btn?.addEventListener('click', (e) => {
                e.stopPropagation();
                menu?.classList.toggle('show');
            });
            
            document.addEventListener('click', () => {
                menu?.classList.remove('show');
            });

            // Keyboard navigation
            btn?.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    menu?.classList.toggle('show');
                }
            });
        }
    },

    /**
     * =========================================================================
     * Animations - Reveal on load
     * =========================================================================
     */
    initAnimations() {
        const animatedElements = document.querySelectorAll('[data-animate]');
        
        if (animatedElements.length === 0) return;

        // Check for reduced motion preference
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        
        if (prefersReducedMotion) {
            // Just show elements without animation
            animatedElements.forEach(el => {
                el.style.opacity = '1';
            });
            return;
        }

        // Use Intersection Observer for scroll-based animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const delay = el.dataset.delay || 0;
                    
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.classList.add('animated');
                    }, delay * this.config.animationDelay);
                    
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        animatedElements.forEach(el => {
            observer.observe(el);
        });
    },

    /**
     * =========================================================================
     * Animated Counters
     * =========================================================================
     */
    initCounters() {
        const counters = document.querySelectorAll('[data-counter]');
        
        if (counters.length === 0) return;

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.counter, 10);
                    
                    if (!isNaN(target) && !prefersReducedMotion) {
                        this.animateCounter(el, target);
                    }
                    
                    observer.unobserve(el);
                }
            });
        }, {
            threshold: 0.5
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    },

    animateCounter(element, target) {
        const duration = this.config.counterDuration;
        const start = 0;
        const startTime = performance.now();
        const originalText = element.textContent;
        const prefix = originalText.match(/^[^0-9]*/)?.[0] || '';
        const suffix = originalText.match(/[^0-9]*$/)?.[0] || '';

        const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);

        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutQuart(progress);
            const current = Math.floor(start + (target - start) * easedProgress);
            
            element.textContent = prefix + current.toLocaleString('fr-FR') + suffix;
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                element.textContent = originalText;
            }
        };

        requestAnimationFrame(animate);
    },

    /**
     * =========================================================================
     * Animated Progress Bars
     * =========================================================================
     */
    initProgressBars() {
        const progressBars = document.querySelectorAll('[data-progress]');
        
        if (progressBars.length === 0) return;

        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const bar = entry.target;
                    const targetWidth = bar.dataset.progress + '%';
                    
                    if (!prefersReducedMotion) {
                        // Start from 0 and animate to target
                        bar.style.width = '0%';
                        bar.style.transition = `width ${this.config.progressDuration}ms ease-out`;
                        
                        requestAnimationFrame(() => {
                            bar.style.width = targetWidth;
                        });
                    } else {
                        bar.style.width = targetWidth;
                    }
                    
                    observer.unobserve(bar);
                }
            });
        }, {
            threshold: 0.5
        });

        progressBars.forEach(bar => {
            observer.observe(bar);
        });
    },

    /**
     * =========================================================================
     * Tooltips (simple native approach)
     * =========================================================================
     */
    initTooltips() {
        const tooltipElements = document.querySelectorAll('[title]');
        
        tooltipElements.forEach(el => {
            const title = el.getAttribute('title');
            if (title) {
                el.setAttribute('data-tooltip', title);
                // Keep native title for accessibility
            }
        });
    },

    /**
     * =========================================================================
     * Utility: Show Toast Notification
     * =========================================================================
     */
    showToast(message, type = 'info') {
        const toast = document.createElement('div');
        toast.className = `toast toast-${type}`;
        toast.innerHTML = `
            <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        // Add toast styles if not present
        if (!document.getElementById('toast-styles')) {
            const styles = document.createElement('style');
            styles.id = 'toast-styles';
            styles.textContent = `
                .toast {
                    position: fixed;
                    bottom: 24px;
                    right: 24px;
                    display: flex;
                    align-items: center;
                    gap: 12px;
                    padding: 16px 20px;
                    background: #1f2937;
                    color: white;
                    border-radius: 12px;
                    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
                    font-size: 14px;
                    font-weight: 500;
                    z-index: 9999;
                    animation: toastIn 0.3s ease, toastOut 0.3s ease 2.7s forwards;
                }
                .toast-success { background: #059669; }
                .toast-error { background: #dc2626; }
                .toast-warning { background: #d97706; }
                @keyframes toastIn {
                    from { opacity: 0; transform: translateY(20px) scale(0.95); }
                    to { opacity: 1; transform: translateY(0) scale(1); }
                }
                @keyframes toastOut {
                    from { opacity: 1; transform: translateY(0) scale(1); }
                    to { opacity: 0; transform: translateY(-10px) scale(0.95); }
                }
            `;
            document.head.appendChild(styles);
        }
        
        document.body.appendChild(toast);
        
        // Remove after animation
        setTimeout(() => {
            toast.remove();
        }, 3000);
    },

    /**
     * =========================================================================
     * Utility: Confirm Dialog
     * =========================================================================
     */
    async confirm(message, title = 'Confirmation') {
        return new Promise((resolve) => {
            const result = window.confirm(`${title}\n\n${message}`);
            resolve(result);
        });
    }
};

// ============================================================================
// Initialize on DOM Ready
// ============================================================================
document.addEventListener('DOMContentLoaded', () => {
    AdminApp.init();
});

// Expose to global scope for external use
window.AdminApp = AdminApp;
