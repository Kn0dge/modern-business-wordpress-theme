/**
 * Main JavaScript file for Modern Business WordPress theme
 */
(function($) {
    'use strict';

    /**
     * Hero Slider
     */
    class HeroSlider {
        constructor() {
            this.slider = document.querySelector('.hero-slider');
            if (!this.slider) return;
            
            this.slides = this.slider.querySelectorAll('.hero-slide');
            if (this.slides.length <= 1) return;
            
            this.currentSlide = 0;
            this.isAnimating = false;
            this.transitions = ['fade', 'slide', 'zoom', 'flip'];
            this.randomTransitions = this.slider.dataset.randomTransitions === 'true';
            this.currentTransition = this.slider.dataset.transition || 'fade';
            
            this.init();
        }
        
        init() {
            // Hide all slides except first
            this.slides.forEach((slide, index) => {
                if (index !== 0) {
                    slide.style.opacity = '0';
                    slide.style.visibility = 'hidden';
                }
            });
            
            // Start autoplay
            this.startAutoplay();
            
            // Add navigation if more than one slide
            if (this.slides.length > 1) {
                this.createNavigation();
            }
        }
        
        createNavigation() {
            const nav = document.createElement('div');
            nav.className = 'hero-slider-nav';
            
            // Create dots
            this.slides.forEach((_, index) => {
                const dot = document.createElement('button');
                dot.className = 'hero-slider-dot' + (index === 0 ? ' active' : '');
                dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
                dot.addEventListener('click', () => this.goToSlide(index));
                nav.appendChild(dot);
            });
            
            // Create arrows
            const prevBtn = document.createElement('button');
            prevBtn.className = 'hero-slider-arrow hero-slider-prev';
            prevBtn.innerHTML = '<i class="fas fa-chevron-left"></i>';
            prevBtn.setAttribute('aria-label', 'Previous slide');
            prevBtn.addEventListener('click', () => this.prevSlide());
            
            const nextBtn = document.createElement('button');
            nextBtn.className = 'hero-slider-arrow hero-slider-next';
            nextBtn.innerHTML = '<i class="fas fa-chevron-right"></i>';
            nextBtn.setAttribute('aria-label', 'Next slide');
            nextBtn.addEventListener('click', () => this.nextSlide());
            
            this.slider.appendChild(prevBtn);
            this.slider.appendChild(nextBtn);
            this.slider.appendChild(nav);
        }
        
        startAutoplay() {
            setInterval(() => this.nextSlide(), 5000);
        }
        
        getTransition() {
            if (this.randomTransitions) {
                return this.transitions[Math.floor(Math.random() * this.transitions.length)];
            }
            return this.currentTransition;
        }
        
        async animateTransition(currentSlide, nextSlide, transition) {
            this.isAnimating = true;
            
            // Reset any previous transforms
            nextSlide.style.transform = '';
            currentSlide.style.transform = '';
            
            switch (transition) {
                case 'slide':
                    nextSlide.style.transform = 'translateX(100%)';
                    nextSlide.style.opacity = '1';
                    nextSlide.style.visibility = 'visible';
                    
                    await Promise.all([
                        currentSlide.animate([
                            { transform: 'translateX(0)' },
                            { transform: 'translateX(-100%)' }
                        ], { duration: 600, easing: 'ease-in-out' }).finished,
                        nextSlide.animate([
                            { transform: 'translateX(100%)' },
                            { transform: 'translateX(0)' }
                        ], { duration: 600, easing: 'ease-in-out' }).finished
                    ]);
                    break;
                    
                case 'zoom':
                    nextSlide.style.transform = 'scale(1.2)';
                    nextSlide.style.opacity = '0';
                    nextSlide.style.visibility = 'visible';
                    
                    await Promise.all([
                        currentSlide.animate([
                            { opacity: 1, transform: 'scale(1)' },
                            { opacity: 0, transform: 'scale(0.8)' }
                        ], { duration: 600, easing: 'ease-in-out' }).finished,
                        nextSlide.animate([
                            { opacity: 0, transform: 'scale(1.2)' },
                            { opacity: 1, transform: 'scale(1)' }
                        ], { duration: 600, easing: 'ease-in-out' }).finished
                    ]);
                    break;
                    
                case 'flip':
                    nextSlide.style.transform = 'rotateY(-90deg)';
                    nextSlide.style.opacity = '0';
                    nextSlide.style.visibility = 'visible';
                    
                    await Promise.all([
                        currentSlide.animate([
                            { transform: 'rotateY(0deg)', opacity: 1 },
                            { transform: 'rotateY(90deg)', opacity: 0 }
                        ], { duration: 600, easing: 'ease-in-out' }).finished,
                        nextSlide.animate([
                            { transform: 'rotateY(-90deg)', opacity: 0 },
                            { transform: 'rotateY(0deg)', opacity: 1 }
                        ], { duration: 600, easing: 'ease-in-out' }).finished
                    ]);
                    break;
                    
                default: // fade
                    nextSlide.style.opacity = '0';
                    nextSlide.style.visibility = 'visible';
                    
                    await Promise.all([
                        currentSlide.animate([
                            { opacity: 1 },
                            { opacity: 0 }
                        ], { duration: 600, easing: 'ease-in-out' }).finished,
                        nextSlide.animate([
                            { opacity: 0 },
                            { opacity: 1 }
                        ], { duration: 600, easing: 'ease-in-out' }).finished
                    ]);
                    break;
            }
            
            currentSlide.style.opacity = '0';
            currentSlide.style.visibility = 'hidden';
            nextSlide.style.opacity = '1';
            nextSlide.style.visibility = 'visible';
            
            // Update dots
            const dots = this.slider.querySelectorAll('.hero-slider-dot');
            dots.forEach(dot => dot.classList.remove('active'));
            dots[this.currentSlide].classList.add('active');
            
            this.isAnimating = false;
        }
        
        async goToSlide(index) {
            if (this.isAnimating || index === this.currentSlide) return;
            
            const currentSlide = this.slides[this.currentSlide];
            const nextSlide = this.slides[index];
            const transition = this.getTransition();
            
            await this.animateTransition(currentSlide, nextSlide, transition);
            this.currentSlide = index;
        }
        
        async nextSlide() {
            if (this.isAnimating) return;
            const nextIndex = (this.currentSlide + 1) % this.slides.length;
            await this.goToSlide(nextIndex);
        }
        
        async prevSlide() {
            if (this.isAnimating) return;
            const prevIndex = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            await this.goToSlide(prevIndex);
        }
    }

    /**
     * Handle the sticky header
     */
    const header = document.querySelector('.site-header');
    
    function toggleStickyHeader() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }
    
    // Initial check
    toggleStickyHeader();
    
    // Add event listener for scroll
    window.addEventListener('scroll', toggleStickyHeader);

    /**
     * Mobile menu toggle
     */
    const menuToggle = document.querySelector('.menu-toggle');
    const mainMenu = document.querySelector('.main-menu');
    
    if (menuToggle && mainMenu) {
        menuToggle.addEventListener('click', function() {
            mainMenu.classList.toggle('open');
            this.setAttribute('aria-expanded', mainMenu.classList.contains('open'));
        });
    }

    /**
     * Animate elements on scroll
     */
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    
    function checkScroll() {
        const triggerBottom = window.innerHeight * 0.8;
        
        animateElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            
            if (elementTop < triggerBottom) {
                element.classList.add('animated');
            }
        });
    }
    
    // Check elements on load
    window.addEventListener('load', checkScroll);
    
    // Check elements on scroll
    window.addEventListener('scroll', checkScroll);

    /**
     * Portfolio filtering
     */
    if (document.querySelector('.portfolio-filter')) {
        // Wait for document to be ready
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const portfolioItems = document.querySelectorAll('.portfolio-item');
            
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    const filter = this.getAttribute('data-filter');
                    
                    // Show/hide portfolio items based on filter
                    portfolioItems.forEach(item => {
                        if (filter === '*') {
                            item.style.display = 'block';
                        } else if (item.classList.contains(filter.substring(1))) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    }

    /**
     * Testimonials slider
     */
    if (document.querySelector('.testimonials-slider')) {
        // Initialize a simple slider if multiple testimonials exist
        const testimonials = document.querySelectorAll('.testimonial');
        
        if (testimonials.length > 1) {
            let currentSlide = 0;
            
            // Hide all testimonials except the first one
            for (let i = 1; i < testimonials.length; i++) {
                testimonials[i].style.display = 'none';
            }
            
            // Function to show the next testimonial
            function showNextTestimonial() {
                testimonials[currentSlide].style.display = 'none';
                currentSlide = (currentSlide + 1) % testimonials.length;
                testimonials[currentSlide].style.display = 'block';
            }
            
            // Function to show the previous testimonial
            function showPrevTestimonial() {
                testimonials[currentSlide].style.display = 'none';
                currentSlide = (currentSlide - 1 + testimonials.length) % testimonials.length;
                testimonials[currentSlide].style.display = 'block';
            }
            
            // Create and append navigation buttons
            const sliderContainer = document.querySelector('.testimonials-slider');
            
            const prevButton = document.createElement('button');
            prevButton.className = 'slider-prev';
            prevButton.innerHTML = '<i class="fas fa-arrow-left"></i>';
            prevButton.setAttribute('aria-label', 'Previous testimonial');
            
            const nextButton = document.createElement('button');
            nextButton.className = 'slider-next';
            nextButton.innerHTML = '<i class="fas fa-arrow-right"></i>';
            nextButton.setAttribute('aria-label', 'Next testimonial');
            
            sliderContainer.appendChild(prevButton);
            sliderContainer.appendChild(nextButton);
            
            // Add event listeners to buttons
            prevButton.addEventListener('click', showPrevTestimonial);
            nextButton.addEventListener('click', showNextTestimonial);
            
            // Auto slide every 5 seconds
            setInterval(showNextTestimonial, 5000);
        }
    }

    /**
     * Smooth scroll to section when clicking on navigation links
     */
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            // Only proceed if the href is a valid section ID
            if (targetId !== '#' && document.querySelector(targetId)) {
                e.preventDefault();
                
                // Close mobile menu if open
                if (mainMenu && mainMenu.classList.contains('open')) {
                    mainMenu.classList.remove('open');
                    menuToggle.setAttribute('aria-expanded', 'false');
                }
                
                // Scroll to the target section
                document.querySelector(targetId).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Initialize hero slider
    document.addEventListener('DOMContentLoaded', () => {
        new HeroSlider();
    });

})(jQuery);