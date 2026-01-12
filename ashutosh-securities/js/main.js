/**
 * Main JavaScript for Ashutosh Brokerage Theme
 * Inspired by Sharekhan.com interactions with smooth animations
 */

(function() {
    'use strict';

    // ========================================
    // ANIMATION ON SCROLL (Sharekhan-style)
    // ========================================
    
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll, .section-content, .research-card, .service-card-item, .promo-banner, .two-column-section > div, .lead-form-card, .orange-club-box');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    // Add delay for staggered animation
                    setTimeout(() => {
                        entry.target.classList.add('animated');
                    }, index * 100); // 100ms delay between each element
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        elements.forEach((el, index) => {
            el.classList.add('animate-on-scroll');
            observer.observe(el);
        });
    };

    // ========================================
    // NUMBER COUNTER ANIMATION
    // ========================================
    
    const animateCounters = () => {
        const counters = document.querySelectorAll('[data-counter]');
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const endValue = parseInt(target.getAttribute('data-counter'));
                    const duration = 2000; // 2 seconds
                    const startTime = performance.now();
                    
                    const updateCounter = (currentTime) => {
                        const elapsed = currentTime - startTime;
                        const progress = Math.min(elapsed / duration, 1);
                        
                        // Easing function for smooth animation
                        const easeOutQuad = progress * (2 - progress);
                        const currentValue = Math.floor(easeOutQuad * endValue);
                        
                        target.textContent = currentValue.toLocaleString();
                        
                        if (progress < 1) {
                            requestAnimationFrame(updateCounter);
                        } else {
                            target.textContent = endValue.toLocaleString();
                        }
                    };
                    
                    requestAnimationFrame(updateCounter);
                    counterObserver.unobserve(target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => counterObserver.observe(counter));
    };

    // ========================================
    // PARALLAX EFFECT
    // ========================================
    
    const parallaxEffect = () => {
        const parallaxElements = document.querySelectorAll('.section-image img');
        
        window.addEventListener('scroll', () => {
            parallaxElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                const scrolled = window.pageYOffset;
                const rate = scrolled * 0.05; // Parallax speed
                
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    el.style.transform = `translateY(${rate}px)`;
                }
            });
        });
    };

    // ========================================
    // MOBILE MENU TOGGLE
    // ========================================
    
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    const navCta = document.querySelector('.nav-cta');

    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            if (navMenu) {
                navMenu.classList.toggle('active');
            }
            if (navCta) {
                navCta.classList.toggle('active');
            }
            
            // Update aria-expanded
            const expanded = this.classList.contains('active');
            this.setAttribute('aria-expanded', expanded);
            
            // Animate hamburger icon
            const spans = this.querySelectorAll('.hamburger-icon span');
            if (expanded) {
                spans[0].style.transform = 'rotate(45deg) translateY(8px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translateY(-8px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });
    }

    // ========================================
    // STICKY HEADER WITH ANIMATION
    // ========================================
    
    const siteHeader = document.querySelector('.site-header');
    let lastScroll = 0;

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;

        if (siteHeader) {
            if (currentScroll > 100) {
                siteHeader.style.boxShadow = '0 4px 20px rgba(0,0,0,0.15)';
                siteHeader.style.padding = '10px 0';
                siteHeader.classList.add('scrolled');
            } else {
                siteHeader.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
                siteHeader.style.padding = '15px 0';
                siteHeader.classList.remove('scrolled');
            }
        }

        lastScroll = currentScroll;
    });

    // ========================================
    // STICKY BOTTOM BANNER
    // ========================================
    
    const stickyBanner = document.getElementById('stickyBanner');
    let lastScrollPosition = 0;
    let ticking = false;

    function updateStickyBanner() {
        const currentScrollPosition = window.pageYOffset;
        
        if (stickyBanner) {
            // Show banner when scrolling up or at top
            if (currentScrollPosition < lastScrollPosition || currentScrollPosition < 100) {
                stickyBanner.style.transform = 'translateY(0)';
            } else {
                // Hide when scrolling down
                stickyBanner.style.transform = 'translateY(100%)';
            }
        }

        lastScrollPosition = currentScrollPosition;
        ticking = false;
    }

    window.addEventListener('scroll', function() {
        if (!ticking) {
            window.requestAnimationFrame(updateStickyBanner);
            ticking = true;
        }
    });

    // ========================================
    // FLOATING CTA BUTTON WITH BOUNCE
    // ========================================
    
    const floatingCta = document.querySelector('.floating-cta');
    
    window.addEventListener('scroll', function() {
        if (floatingCta) {
            if (window.pageYOffset > 500) {
                floatingCta.style.opacity = '1';
                floatingCta.style.visibility = 'visible';
                floatingCta.style.transform = 'scale(1)';
            } else {
                floatingCta.style.opacity = '0';
                floatingCta.style.visibility = 'hidden';
                floatingCta.style.transform = 'scale(0.8)';
            }
        }
    });

    // Add pulse animation to floating CTA
    if (floatingCta) {
        floatingCta.style.transition = 'all 0.3s ease, transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
        
        // Periodic pulse effect
        setInterval(() => {
            if (window.pageYOffset > 500) {
                floatingCta.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    floatingCta.style.transform = 'scale(1)';
                }, 300);
            }
        }, 5000); // Pulse every 5 seconds
    }

    // ========================================
    // SMOOTH SCROLLING
    // ========================================
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            
            // Only prevent default if it's a valid anchor (not just #)
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Form Interactions (if Contact Form 7 is not available)
    const leadFormInputs = document.querySelectorAll('.lead-form-card input[type="text"], .lead-form-card input[type="tel"], .lead-form-card input[type="email"]');
    
    leadFormInputs.forEach(input => {
        // Add focus class to parent for styling
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            if (!this.value) {
                this.parentElement.classList.remove('focused');
            }
        });

        // Keep focused class if input has value
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });

    // Dropdown Menu Keyboard Navigation
    const menuItems = document.querySelectorAll('.nav-menu li.menu-item-has-children');
    
    menuItems.forEach(item => {
        const link = item.querySelector('a');
        const submenu = item.querySelector('.sub-menu');
        
        if (link && submenu) {
            // Keyboard navigation
            link.addEventListener('keydown', function(e) {
                // Open submenu on Enter or Space
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    submenu.style.opacity = '1';
                    submenu.style.visibility = 'visible';
                    submenu.style.transform = 'translateY(0)';
                }
                
                // Close submenu on Escape
                if (e.key === 'Escape') {
                    submenu.style.opacity = '0';
                    submenu.style.visibility = 'hidden';
                    submenu.style.transform = 'translateY(10px)';
                }
            });

            // Mobile touch support - toggle submenu on touch/click
            if (window.innerWidth <= 992) {
                link.addEventListener('click', function(e) {
                    // Only prevent default if it has a submenu
                    if (submenu) {
                        e.preventDefault();
                        item.classList.toggle('active');
                        
                        // Close other open submenus
                        menuItems.forEach(otherItem => {
                            if (otherItem !== item) {
                                otherItem.classList.remove('active');
                            }
                        });
                    }
                });
            }
        }
    });

    // Close submenu when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.menu-item-has-children')) {
            menuItems.forEach(item => {
                const submenu = item.querySelector('.sub-menu');
                if (submenu) {
                    submenu.style.opacity = '0';
                    submenu.style.visibility = 'hidden';
                    submenu.style.transform = 'translateY(10px)';
                }
            });
        }
    });

    // Lazy Loading Images (if native lazy loading is not supported)
    if ('loading' in HTMLImageElement.prototype) {
        // Native lazy loading supported
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
            img.src = img.dataset.src || img.src;
        });
    } else {
        // Fallback for browsers that don't support lazy loading
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.remove('lazy');
                    observer.unobserve(img);
                }
            });
        });

        const lazyImages = document.querySelectorAll('img.lazy');
        lazyImages.forEach(img => imageObserver.observe(img));
    }

    // ========================================
    // ENHANCED CARD HOVER EFFECTS
    // ========================================
    
    const cards = document.querySelectorAll('.research-card, .service-card-item, .promo-banner');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease';
        });
        
        // Add shine effect on hover
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            this.style.setProperty('--mouse-x', `${x}px`);
            this.style.setProperty('--mouse-y', `${y}px`);
        });
    });

    // ========================================
    // INITIALIZE ALL ANIMATIONS
    // ========================================
    
    // Wait for DOM to be fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    function init() {
        animateOnScroll();
        animateCounters();
        parallaxEffect();
        
        // Add entrance animation to hero section
        const heroSection = document.querySelector('.hero-section-sharekhan');
        if (heroSection) {
            heroSection.classList.add('fade-in');
        }
        
        // Animate buttons on hover
        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px) scale(1.02)';
            });
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    }

    // ========================================
    // CUSTOM SLIDER FUNCTIONALITY
    // ========================================
    
    function initializeSliders() {
        const sliders = document.querySelectorAll('.ashutosh-slider-wrapper');
        
        sliders.forEach(sliderWrapper => {
            const slides = sliderWrapper.querySelectorAll('.ashutosh-slider-slide');
            const prevBtn = sliderWrapper.querySelector('.ashutosh-slider-prev');
            const nextBtn = sliderWrapper.querySelector('.ashutosh-slider-next');
            const dots = sliderWrapper.querySelectorAll('.ashutosh-slider-dot');
            
            const autoplay = sliderWrapper.dataset.autoplay === 'true';
            const interval = parseInt(sliderWrapper.dataset.interval) || 5000;
            
            let currentSlide = 0;
            let autoplayTimer = null;
            
            // Show specific slide
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));
                
                if (index >= slides.length) {
                    currentSlide = 0;
                } else if (index < 0) {
                    currentSlide = slides.length - 1;
                } else {
                    currentSlide = index;
                }
                
                slides[currentSlide].classList.add('active');
                if (dots[currentSlide]) {
                    dots[currentSlide].classList.add('active');
                }
            }
            
            // Next slide
            function nextSlide() {
                showSlide(currentSlide + 1);
            }
            
            // Previous slide
            function prevSlide() {
                showSlide(currentSlide - 1);
            }
            
            // Start autoplay
            function startAutoplay() {
                if (autoplay && slides.length > 1) {
                    autoplayTimer = setInterval(nextSlide, interval);
                }
            }
            
            // Stop autoplay
            function stopAutoplay() {
                if (autoplayTimer) {
                    clearInterval(autoplayTimer);
                }
            }
            
            // Event Listeners
            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    prevSlide();
                    stopAutoplay();
                    startAutoplay(); // Restart autoplay after manual interaction
                });
            }
            
            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                });
            }
            
            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    showSlide(index);
                    stopAutoplay();
                    startAutoplay();
                });
            });
            
            // Keyboard navigation
            sliderWrapper.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                }
            });
            
            // Pause on hover
            sliderWrapper.addEventListener('mouseenter', stopAutoplay);
            sliderWrapper.addEventListener('mouseleave', startAutoplay);
            
            // Touch/Swipe support
            let touchStartX = 0;
            let touchEndX = 0;
            
            sliderWrapper.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            });
            
            sliderWrapper.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            });
            
            function handleSwipe() {
                const swipeThreshold = 50; // minimum distance for swipe
                
                if (touchEndX < touchStartX - swipeThreshold) {
                    // Swipe left - next slide
                    nextSlide();
                    stopAutoplay();
                    startAutoplay();
                }
                
                if (touchEndX > touchStartX + swipeThreshold) {
                    // Swipe right - previous slide
                    prevSlide();
                    stopAutoplay();
                    startAutoplay();
                }
            }
            
            // Initialize
            startAutoplay();
        });
    }
    
    // Initialize sliders when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSliders);
    } else {
        initializeSliders();
    }

    // Console Welcome Message
    console.log('%cAshutosh Brokerage & Securities', 'font-size: 20px; font-weight: bold; color: #F58220;');
    console.log('%cWelcome to your investment journey!', 'font-size: 14px; color: #666;');

    // Performance Monitoring (optional)
    if ('PerformanceObserver' in window) {
        try {
            const perfObserver = new PerformanceObserver((list) => {
                for (const entry of list.getEntries()) {
                    if (entry.duration > 100) {
                        console.log('Long Task detected:', entry);
                    }
                }
            });
            perfObserver.observe({ entryTypes: ['longtask'] });
        } catch (e) {
            // PerformanceObserver not fully supported
        }
    }

})();

// Backup for jQuery if WordPress uses it
if (typeof jQuery !== 'undefined') {
    jQuery(document).ready(function($) {
        // Additional jQuery-dependent code can go here
        console.log('jQuery loaded and ready');
    });
}
