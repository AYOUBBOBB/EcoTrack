/**
 * ============================================================================
 * EcoTrack - Main JavaScript
 * ============================================================================
 * 
 * Gestion des interactions utilisateur, animations et composants dynamiques
 * 
 * @author  EcoTrack Team
 * @version 1.0.0
 */

'use strict';

/**
 * Application EcoTrack
 * Namespace principal pour toutes les fonctionnalités
 */
const EcoTrack = {
    /**
     * Initialisation de l'application
     */
    init() {
        this.initLoader();
        this.initNavbar();
        this.initMobileMenu();
        this.initDropdowns();
        this.initBackToTop();
        this.initAnimations();
        this.initCounters();
        this.initSmoothScroll();
        
        console.log('🌿 EcoTrack initialized');
    },

    /**
     * Gestion du loader de page
     */
    initLoader() {
        const loader = document.getElementById('page-loader');
        if (!loader) return;

        // Masquer le loader une fois la page chargée
        window.addEventListener('load', () => {
            setTimeout(() => {
                loader.classList.add('loaded');
                document.body.style.overflow = '';
            }, 500);
        });

        // Sécurité : masquer après 3s max
        setTimeout(() => {
            loader.classList.add('loaded');
            document.body.style.overflow = '';
        }, 3000);
    },

    /**
     * Gestion de la navbar (scroll effects)
     */
    initNavbar() {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        let lastScroll = 0;
        const scrollThreshold = 100;

        const handleScroll = () => {
            const currentScroll = window.pageYOffset;

            // Ajouter/retirer la classe scrolled
            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }

            // Masquer/afficher sur scroll (optionnel)
            if (currentScroll > lastScroll && currentScroll > scrollThreshold) {
                navbar.style.transform = 'translateY(-100%)';
            } else {
                navbar.style.transform = 'translateY(0)';
            }

            lastScroll = currentScroll;
        };

        // Throttle pour performance
        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    },

    /**
     * Gestion du menu mobile
     */
    initMobileMenu() {
        const toggle = document.getElementById('mobile-toggle');
        const mobileNav = document.getElementById('mobile-nav');
        
        if (!toggle || !mobileNav) return;

        toggle.addEventListener('click', () => {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
            
            toggle.setAttribute('aria-expanded', !isExpanded);
            mobileNav.classList.toggle('active');
            mobileNav.setAttribute('aria-hidden', isExpanded);
            
            // Bloquer le scroll du body
            document.body.style.overflow = isExpanded ? '' : 'hidden';
        });

        // Fermer au clic sur un lien
        mobileNav.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                toggle.setAttribute('aria-expanded', 'false');
                mobileNav.classList.remove('active');
                mobileNav.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            });
        });

        // Gestion des sous-menus mobile
        const mobileGroups = mobileNav.querySelectorAll('.mobile-nav-group');
        mobileGroups.forEach(group => {
            const toggleBtn = group.querySelector('.mobile-nav-toggle');
            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    group.classList.toggle('active');
                    const icon = toggleBtn.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-plus');
                        icon.classList.toggle('fa-minus');
                    }
                });
            }
        });
    },

    /**
     * Gestion des dropdowns de navigation
     */
    initDropdowns() {
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        
        dropdownToggles.forEach(toggle => {
            // Pour desktop : hover
            const parent = toggle.closest('.has-dropdown');
            if (parent) {
                parent.addEventListener('mouseenter', () => {
                    toggle.setAttribute('aria-expanded', 'true');
                });
                
                parent.addEventListener('mouseleave', () => {
                    toggle.setAttribute('aria-expanded', 'false');
                });
            }
            
            // Pour mobile/touch : click
            toggle.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                    toggle.setAttribute('aria-expanded', !isExpanded);
                }
            });
        });

        // User menu dropdown
        const userToggle = document.querySelector('.user-toggle');
        if (userToggle) {
            userToggle.addEventListener('click', () => {
                const isExpanded = userToggle.getAttribute('aria-expanded') === 'true';
                userToggle.setAttribute('aria-expanded', !isExpanded);
                userToggle.closest('.user-menu').classList.toggle('active');
            });

            // Fermer au clic extérieur
            document.addEventListener('click', (e) => {
                if (!e.target.closest('.user-menu')) {
                    userToggle.setAttribute('aria-expanded', 'false');
                    userToggle.closest('.user-menu')?.classList.remove('active');
                }
            });
        }
    },

    /**
     * Bouton retour en haut
     */
    initBackToTop() {
        const btn = document.getElementById('back-to-top');
        if (!btn) return;

        // Afficher/masquer selon le scroll
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                btn.classList.add('visible');
            } else {
                btn.classList.remove('visible');
            }
        });

        // Action au clic
        btn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    },

    /**
     * Animations au scroll (Intersection Observer)
     */
    initAnimations() {
        const animatedElements = document.querySelectorAll(
            '.module-card, .feature-card, .section-header, [data-animate]'
        );

        if (!animatedElements.length) return;

        const observerOptions = {
            root: null,
            rootMargin: '0px 0px -50px 0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(el => {
            el.classList.add('will-animate');
            observer.observe(el);
        });

        // Ajouter les styles pour les animations
        const style = document.createElement('style');
        style.textContent = `
            .will-animate {
                opacity: 0;
                transform: translateY(30px);
                transition: opacity 0.6s ease, transform 0.6s ease;
            }
            .will-animate.animated {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    },

    /**
     * Compteurs animés
     */
    initCounters() {
        const counters = document.querySelectorAll('[data-count]');
        if (!counters.length) return;

        const animateCounter = (counter) => {
            const target = parseInt(counter.dataset.count, 10);
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.textContent = Math.floor(current).toLocaleString();
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target.toLocaleString();
                }
            };

            updateCounter();
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    },

    /**
     * Smooth scroll pour les ancres
     */
    initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href === '#') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.getBoundingClientRect().top + window.pageYOffset - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    },

    /**
     * Utilitaires
     */
    utils: {
        /**
         * Debounce function
         */
        debounce(func, wait = 100) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        },

        /**
         * Throttle function
         */
        throttle(func, limit = 100) {
            let inThrottle;
            return function(...args) {
                if (!inThrottle) {
                    func.apply(this, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        },

        /**
         * Format number with locale
         */
        formatNumber(num) {
            return new Intl.NumberFormat('fr-FR').format(num);
        }
    }
};

/**
 * Initialisation au chargement du DOM
 */
document.addEventListener('DOMContentLoaded', () => {
    EcoTrack.init();
});

/**
 * Exposer EcoTrack globalement
 */
window.EcoTrack = EcoTrack;
