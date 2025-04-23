/**
 * Main JavaScript file for Modern Business WordPress theme
 */
(function($) {
    'use strict';

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

})(jQuery);