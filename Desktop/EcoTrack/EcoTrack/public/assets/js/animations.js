/**
 * ============================================================================
 * EcoTrack - Professional Animations System
 * ============================================================================
 * 
 * Système d'animations premium utilisant GSAP et ScrollTrigger
 * Features: Fade, Slide, Scale, Parallax, Stagger, Scroll-triggered
 * 
 * @requires GSAP 3.x
 * @requires ScrollTrigger
 * @author  EcoTrack Team
 * @version 2.0.0
 */

'use strict';

/**
 * EcoTrack Animation Engine
 * Gère toutes les animations du site
 */
const EcoAnimations = {
    // Configuration globale
    config: {
        // Durées par défaut
        duration: {
            fast: 0.4,
            normal: 0.6,
            slow: 0.8,
            verySlow: 1.2
        },
        // Easing customs
        ease: {
            smooth: 'power2.out',
            bounce: 'back.out(1.4)',
            elastic: 'elastic.out(1, 0.5)',
            expo: 'expo.out',
            circ: 'circ.out',
            smooth_inout: 'power2.inOut'
        },
        // Seuils de déclenchement
        triggers: {
            start: 'top 85%',
            end: 'bottom 15%',
            startEarly: 'top 95%',
            startLate: 'top 60%'
        },
        // Respect des préférences utilisateur
        reducedMotion: window.matchMedia('(prefers-reduced-motion: reduce)').matches
    },

    /**
     * Initialisation principale
     */
    init() {
        // Vérifier si GSAP est disponible
        if (typeof gsap === 'undefined') {
            console.warn('⚠️ GSAP not loaded. Animations disabled.');
            return;
        }

        // Enregistrer ScrollTrigger
        if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        // Si reduced motion, animations minimales
        if (this.config.reducedMotion) {
            console.log('♿ Reduced motion detected. Using minimal animations.');
            this.initMinimalAnimations();
            return;
        }

        // Initialiser tous les modules
        this.initPageLoader();
        this.initHeroAnimations();
        this.initScrollAnimations();
        this.initParallax();
        this.initStaggerAnimations();
        this.initHoverEffects();
        this.initCounterAnimations();
        this.initNavbarAnimations();
        this.initTextAnimations();
        this.initCardAnimations();
        this.initSectionTransitions();
        this.initMagneticButtons();
        this.initSmoothReveal();

        console.log('✨ EcoAnimations initialized');
    },

    /**
     * Animations minimales pour accessibilité
     */
    initMinimalAnimations() {
        // Révéler tous les éléments immédiatement
        gsap.set('[data-animate], [data-stagger], [data-parallax]', {
            opacity: 1,
            y: 0,
            x: 0,
            scale: 1
        });
    },

    /**
     * Animation du loader de page
     */
    initPageLoader() {
        const loader = document.getElementById('page-loader');
        if (!loader) return;

        const tl = gsap.timeline();
        
        tl.to('.loader-spinner', {
            duration: 0.3,
            scale: 0.8,
            opacity: 0,
            ease: this.config.ease.smooth
        })
        .to('.loader-logo', {
            duration: 0.4,
            y: -20,
            opacity: 0,
            ease: this.config.ease.smooth
        }, '-=0.2')
        .to(loader, {
            duration: 0.6,
            opacity: 0,
            ease: this.config.ease.smooth,
            onComplete: () => {
                loader.classList.add('loaded');
                document.body.style.overflow = '';
                // Déclencher les animations hero
                this.playHeroEntrance();
            }
        }, '-=0.2');
    },

    /**
     * Animations de la Hero Section
     */
    initHeroAnimations() {
        // Créer timeline pour l'entrée
        this.heroTimeline = gsap.timeline({ paused: true });
        
        const hero = document.querySelector('.hero');
        if (!hero) return;

        // Animation des shapes de fond
        gsap.to('.hero-shapes .shape', {
            y: 'random(-30, 30)',
            x: 'random(-20, 20)',
            duration: 'random(4, 6)',
            ease: 'sine.inOut',
            repeat: -1,
            yoyo: true,
            stagger: {
                each: 0.5,
                from: 'random'
            }
        });

        // Floating cards animation
        gsap.to('.floating-card', {
            y: 'random(-15, 15)',
            duration: 'random(2, 4)',
            ease: 'sine.inOut',
            repeat: -1,
            yoyo: true,
            stagger: {
                each: 0.3,
                from: 'random'
            }
        });
    },

    /**
     * Jouer l'animation d'entrée du hero
     */
    playHeroEntrance() {
        const hero = document.querySelector('.hero');
        if (!hero) return;

        const tl = gsap.timeline();

        // Badge
        tl.from('.hero-badge', {
            duration: this.config.duration.normal,
            y: 30,
            opacity: 0,
            ease: this.config.ease.smooth
        })
        // Titre avec effet de split
        .from('.hero-title', {
            duration: this.config.duration.slow,
            y: 60,
            opacity: 0,
            ease: this.config.ease.expo
        }, '-=0.3')
        // Sous-titre
        .from('.hero-subtitle', {
            duration: this.config.duration.normal,
            y: 40,
            opacity: 0,
            ease: this.config.ease.smooth
        }, '-=0.4')
        // Actions
        .from('.hero-actions .btn', {
            duration: this.config.duration.normal,
            y: 30,
            opacity: 0,
            stagger: 0.15,
            ease: this.config.ease.smooth
        }, '-=0.3')
        // Stats
        .from('.hero-stats .stat-item', {
            duration: this.config.duration.normal,
            y: 30,
            opacity: 0,
            stagger: 0.1,
            ease: this.config.ease.smooth
        }, '-=0.3')
        // Visual (côté droit)
        .from('.hero-visual', {
            duration: this.config.duration.slow,
            x: 80,
            opacity: 0,
            ease: this.config.ease.expo
        }, '-=0.6')
        // Floating cards
        .from('.floating-card', {
            duration: this.config.duration.normal,
            scale: 0,
            opacity: 0,
            stagger: 0.15,
            ease: this.config.ease.bounce
        }, '-=0.4')
        // Scroll indicator
        .from('.scroll-indicator', {
            duration: this.config.duration.normal,
            y: 20,
            opacity: 0,
            ease: this.config.ease.smooth
        }, '-=0.2');
    },

    /**
     * Animations déclenchées au scroll
     */
    initScrollAnimations() {
        // Sélecteurs pour les éléments à animer
        const animateSelectors = [
            '[data-animate="fade-up"]',
            '[data-animate="fade-down"]',
            '[data-animate="fade-left"]',
            '[data-animate="fade-right"]',
            '[data-animate="scale-up"]',
            '[data-animate="scale-down"]',
            '[data-animate="rotate-in"]',
            '[data-animate="blur-in"]'
        ];

        // Appliquer les animations selon le type
        animateSelectors.forEach(selector => {
            const elements = document.querySelectorAll(selector);
            if (!elements.length) return;

            const animType = selector.match(/data-animate="([^"]+)"/)[1];
            
            elements.forEach(el => {
                const delay = parseFloat(el.dataset.delay) || 0;
                const duration = parseFloat(el.dataset.duration) || this.config.duration.normal;
                
                // État initial selon le type
                const fromVars = this.getAnimationFromVars(animType);
                gsap.set(el, fromVars);

                // Animation au scroll
                ScrollTrigger.create({
                    trigger: el,
                    start: el.dataset.start || this.config.triggers.start,
                    onEnter: () => {
                        gsap.to(el, {
                            ...this.getAnimationToVars(animType),
                            duration: duration,
                            delay: delay,
                            ease: this.config.ease.smooth,
                            overwrite: 'auto'
                        });
                    },
                    once: true
                });
            });
        });

        // Animation automatique pour les éléments sans data-animate
        this.initAutoAnimations();
    },

    /**
     * Obtenir les propriétés initiales selon le type d'animation
     */
    getAnimationFromVars(type) {
        const variants = {
            'fade-up': { opacity: 0, y: 60 },
            'fade-down': { opacity: 0, y: -60 },
            'fade-left': { opacity: 0, x: -60 },
            'fade-right': { opacity: 0, x: 60 },
            'scale-up': { opacity: 0, scale: 0.8 },
            'scale-down': { opacity: 0, scale: 1.2 },
            'rotate-in': { opacity: 0, rotation: -10, y: 40 },
            'blur-in': { opacity: 0, filter: 'blur(10px)', y: 30 }
        };
        return variants[type] || { opacity: 0, y: 40 };
    },

    /**
     * Obtenir les propriétés finales selon le type d'animation
     */
    getAnimationToVars(type) {
        const variants = {
            'fade-up': { opacity: 1, y: 0 },
            'fade-down': { opacity: 1, y: 0 },
            'fade-left': { opacity: 1, x: 0 },
            'fade-right': { opacity: 1, x: 0 },
            'scale-up': { opacity: 1, scale: 1 },
            'scale-down': { opacity: 1, scale: 1 },
            'rotate-in': { opacity: 1, rotation: 0, y: 0 },
            'blur-in': { opacity: 1, filter: 'blur(0px)', y: 0 }
        };
        return variants[type] || { opacity: 1, y: 0 };
    },

    /**
     * Animations automatiques pour éléments courants
     */
    initAutoAnimations() {
        // Section headers
        gsap.utils.toArray('.section-header').forEach(header => {
            gsap.from(header.children, {
                scrollTrigger: {
                    trigger: header,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 40,
                opacity: 0,
                stagger: 0.15,
                duration: this.config.duration.normal,
                ease: this.config.ease.smooth
            });
        });
    },

    /**
     * Effets parallax
     */
    initParallax() {
        // Parallax sur les fonds
        gsap.utils.toArray('[data-parallax]').forEach(element => {
            const speed = parseFloat(element.dataset.parallax) || 0.5;
            const direction = element.dataset.parallaxDir || 'y';
            
            gsap.to(element, {
                [direction]: () => `${speed * 100}`,
                ease: 'none',
                scrollTrigger: {
                    trigger: element.closest('section') || element,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });
        });

        // Parallax automatique sur les shapes de fond
        gsap.utils.toArray('.hero-shapes .shape, .page-hero-shapes .shape').forEach((shape, i) => {
            gsap.to(shape, {
                y: (i + 1) * 100,
                ease: 'none',
                scrollTrigger: {
                    trigger: shape.closest('section'),
                    start: 'top top',
                    end: 'bottom top',
                    scrub: 1.5
                }
            });
        });

        // Parallax sur les images
        gsap.utils.toArray('.parallax-image').forEach(img => {
            gsap.to(img, {
                y: -80,
                ease: 'none',
                scrollTrigger: {
                    trigger: img.parentElement,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 1
                }
            });
        });
    },

    /**
     * Animations stagger (en cascade)
     */
    initStaggerAnimations() {
        // Grilles de cards
        gsap.utils.toArray('[data-stagger-parent]').forEach(parent => {
            const children = parent.querySelectorAll('[data-stagger-child]');
            if (!children.length) return;

            const staggerAmount = parseFloat(parent.dataset.staggerAmount) || 0.1;
            const staggerFrom = parent.dataset.staggerFrom || 'start';

            gsap.from(children, {
                scrollTrigger: {
                    trigger: parent,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 60,
                opacity: 0,
                stagger: {
                    amount: staggerAmount * children.length,
                    from: staggerFrom
                },
                duration: this.config.duration.normal,
                ease: this.config.ease.smooth
            });
        });

        // Module cards
        const moduleGrids = document.querySelectorAll('.modules-grid, .modules-grid-large');
        moduleGrids.forEach(grid => {
            const cards = grid.querySelectorAll('.module-card, .module-card-large');
            
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: grid,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 80,
                opacity: 0,
                stagger: 0.15,
                duration: this.config.duration.slow,
                ease: this.config.ease.expo
            });
        });

        // Feature cards
        const featureGrids = document.querySelectorAll('.features-grid, .features-grid-large');
        featureGrids.forEach(grid => {
            const cards = grid.querySelectorAll('.feature-card, .feature-item');
            
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: grid,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 50,
                opacity: 0,
                scale: 0.95,
                stagger: 0.12,
                duration: this.config.duration.normal,
                ease: this.config.ease.smooth
            });
        });

        // Advantage cards
        const advantageGrids = document.querySelectorAll('.advantages-grid');
        advantageGrids.forEach(grid => {
            const cards = grid.querySelectorAll('.advantage-card');
            
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: grid,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 40,
                opacity: 0,
                stagger: 0.1,
                duration: this.config.duration.normal,
                ease: this.config.ease.smooth
            });
        });
    },

    /**
     * Effets hover avancés
     */
    initHoverEffects() {
        // Cards avec effet 3D tilt
        document.querySelectorAll('.module-card, .feature-card, .advantage-card').forEach(card => {
            card.addEventListener('mouseenter', function(e) {
                gsap.to(this, {
                    scale: 1.02,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            card.addEventListener('mouseleave', function(e) {
                gsap.to(this, {
                    scale: 1,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            // Effet de parallax interne sur hover
            card.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;

                gsap.to(this, {
                    rotateX: rotateX,
                    rotateY: rotateY,
                    duration: 0.5,
                    ease: 'power2.out',
                    transformPerspective: 1000
                });
            });

            card.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    rotateX: 0,
                    rotateY: 0,
                    duration: 0.5,
                    ease: 'power2.out'
                });
            });
        });
    },

    /**
     * Animation des compteurs
     */
    initCounterAnimations() {
        const counters = document.querySelectorAll('[data-count]');
        
        counters.forEach(counter => {
            const target = parseInt(counter.dataset.count, 10);
            const duration = parseFloat(counter.dataset.countDuration) || 2;
            const suffix = counter.dataset.countSuffix || '';
            const prefix = counter.dataset.countPrefix || '';

            ScrollTrigger.create({
                trigger: counter,
                start: 'top 80%',
                once: true,
                onEnter: () => {
                    const obj = { value: 0 };
                    gsap.to(obj, {
                        value: target,
                        duration: duration,
                        ease: 'power2.out',
                        onUpdate: () => {
                            counter.textContent = prefix + Math.floor(obj.value).toLocaleString('fr-FR') + suffix;
                        }
                    });
                }
            });
        });
    },

    /**
     * Animation de la navbar
     */
    initNavbarAnimations() {
        const navbar = document.getElementById('navbar');
        if (!navbar) return;

        // Animation d'entrée
        gsap.from(navbar, {
            y: -100,
            opacity: 0,
            duration: this.config.duration.slow,
            ease: this.config.ease.expo,
            delay: 0.2
        });

        // Animation sur scroll avec hide/show
        let lastScrollY = 0;
        
        ScrollTrigger.create({
            start: 'top -80',
            end: 99999,
            onUpdate: (self) => {
                const scrollY = window.pageYOffset;
                const direction = scrollY > lastScrollY ? 'down' : 'up';
                
                if (direction === 'down' && scrollY > 200) {
                    gsap.to(navbar, {
                        y: -100,
                        duration: 0.3,
                        ease: 'power2.inOut'
                    });
                } else {
                    gsap.to(navbar, {
                        y: 0,
                        duration: 0.3,
                        ease: 'power2.inOut'
                    });
                }
                
                lastScrollY = scrollY;
            }
        });
    },

    /**
     * Animations de texte avancées
     */
    initTextAnimations() {
        // Split text animation pour les titres importants
        document.querySelectorAll('[data-split-text]').forEach(el => {
            const text = el.textContent;
            const words = text.split(' ');
            el.innerHTML = words.map(word => 
                `<span class="word"><span class="word-inner">${word}</span></span>`
            ).join(' ');

            gsap.from(el.querySelectorAll('.word-inner'), {
                scrollTrigger: {
                    trigger: el,
                    start: this.config.triggers.start,
                    once: true
                },
                y: '100%',
                opacity: 0,
                stagger: 0.05,
                duration: this.config.duration.normal,
                ease: this.config.ease.expo
            });
        });

        // Typewriter effect
        document.querySelectorAll('[data-typewriter]').forEach(el => {
            const text = el.textContent;
            el.textContent = '';
            
            ScrollTrigger.create({
                trigger: el,
                start: this.config.triggers.start,
                once: true,
                onEnter: () => {
                    gsap.to(el, {
                        duration: text.length * 0.05,
                        text: {
                            value: text,
                            delimiter: ''
                        },
                        ease: 'none'
                    });
                }
            });
        });
    },

    /**
     * Animations spécifiques aux cards
     */
    initCardAnimations() {
        // Card glow effect on hover
        document.querySelectorAll('.card-glow').forEach(glow => {
            const card = glow.closest('.module-card, .feature-card');
            if (!card) return;

            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                gsap.to(glow, {
                    x: x - rect.width / 2,
                    y: y - rect.height / 2,
                    opacity: 1,
                    duration: 0.3
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(glow, {
                    opacity: 0,
                    duration: 0.3
                });
            });
        });
    },

    /**
     * Transitions entre sections
     */
    initSectionTransitions() {
        // Fade entre les sections
        gsap.utils.toArray('section').forEach((section, i) => {
            if (i === 0) return; // Skip hero

            gsap.from(section, {
                scrollTrigger: {
                    trigger: section,
                    start: 'top 90%',
                    once: true
                },
                opacity: 0.5,
                duration: this.config.duration.slow,
                ease: this.config.ease.smooth
            });
        });

        // CTA section special animation
        const ctaSection = document.querySelector('.cta-section');
        if (ctaSection) {
            gsap.from('.cta-content', {
                scrollTrigger: {
                    trigger: ctaSection,
                    start: this.config.triggers.start,
                    once: true
                },
                y: 60,
                opacity: 0,
                scale: 0.95,
                duration: this.config.duration.slow,
                ease: this.config.ease.expo
            });
        }
    },

    /**
     * Boutons magnétiques
     */
    initMagneticButtons() {
        document.querySelectorAll('.btn-magnetic, .btn-lg').forEach(btn => {
            btn.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                gsap.to(this, {
                    x: x * 0.3,
                    y: y * 0.3,
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });

            btn.addEventListener('mouseleave', function() {
                gsap.to(this, {
                    x: 0,
                    y: 0,
                    duration: 0.5,
                    ease: 'elastic.out(1, 0.5)'
                });
            });
        });
    },

    /**
     * Reveal smooth pour les images et médias
     */
    initSmoothReveal() {
        // Images avec reveal
        gsap.utils.toArray('img[data-reveal], .reveal-image').forEach(img => {
            const wrapper = document.createElement('div');
            wrapper.className = 'reveal-wrapper';
            wrapper.style.cssText = 'overflow: hidden; position: relative;';
            img.parentNode.insertBefore(wrapper, img);
            wrapper.appendChild(img);

            const overlay = document.createElement('div');
            overlay.className = 'reveal-overlay';
            overlay.style.cssText = `
                position: absolute;
                inset: 0;
                background: var(--gradient-primary);
                transform-origin: left;
                z-index: 1;
            `;
            wrapper.appendChild(overlay);

            gsap.set(img, { scale: 1.3 });

            ScrollTrigger.create({
                trigger: wrapper,
                start: this.config.triggers.start,
                once: true,
                onEnter: () => {
                    gsap.timeline()
                        .to(overlay, {
                            scaleX: 0,
                            transformOrigin: 'right',
                            duration: this.config.duration.slow,
                            ease: this.config.ease.expo
                        })
                        .to(img, {
                            scale: 1,
                            duration: this.config.duration.verySlow,
                            ease: this.config.ease.smooth
                        }, '-=0.4');
                }
            });
        });
    },

    /**
     * Refresh ScrollTrigger (utile après chargement dynamique)
     */
    refresh() {
        ScrollTrigger.refresh();
    },

    /**
     * Destroy all animations (cleanup)
     */
    destroy() {
        ScrollTrigger.getAll().forEach(st => st.kill());
        gsap.killTweensOf('*');
    }
};

/**
 * Classes CSS utilitaires pour animations
 * Ajoutées dynamiquement pour éviter le flash de contenu
 */
const addAnimationStyles = () => {
    const style = document.createElement('style');
    style.id = 'eco-animation-styles';
    style.textContent = `
        /* États initiaux pour éviter le flash */
        [data-animate] {
            opacity: 0;
        }
        
        [data-animate="fade-up"] { transform: translateY(60px); }
        [data-animate="fade-down"] { transform: translateY(-60px); }
        [data-animate="fade-left"] { transform: translateX(-60px); }
        [data-animate="fade-right"] { transform: translateX(60px); }
        [data-animate="scale-up"] { transform: scale(0.8); }
        [data-animate="scale-down"] { transform: scale(1.2); }
        [data-animate="rotate-in"] { transform: rotate(-10deg) translateY(40px); }
        [data-animate="blur-in"] { filter: blur(10px); transform: translateY(30px); }
        
        /* Word animation styles */
        .word {
            display: inline-block;
            overflow: hidden;
        }
        
        .word-inner {
            display: inline-block;
        }
        
        /* Reveal wrapper */
        .reveal-wrapper {
            overflow: hidden;
            position: relative;
        }
        
        /* Smooth transitions globales */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Perspective pour effets 3D */
        .module-card,
        .feature-card,
        .advantage-card {
            transform-style: preserve-3d;
            will-change: transform;
        }
        
        /* Performance optimizations */
        [data-animate],
        [data-parallax],
        [data-stagger-child] {
            will-change: transform, opacity;
            backface-visibility: hidden;
        }
        
        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            [data-animate],
            [data-parallax],
            [data-stagger-child] {
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
                animation: none !important;
                transition: none !important;
            }
        }
    `;
    document.head.appendChild(style);
};

/**
 * Initialisation au chargement
 */
document.addEventListener('DOMContentLoaded', () => {
    addAnimationStyles();
    
    // Attendre que GSAP soit chargé
    if (typeof gsap !== 'undefined') {
        EcoAnimations.init();
    } else {
        // Retry après un court délai (CDN peut être lent)
        setTimeout(() => {
            if (typeof gsap !== 'undefined') {
                EcoAnimations.init();
            }
        }, 100);
    }
});

/**
 * Exposer globalement
 */
window.EcoAnimations = EcoAnimations;
