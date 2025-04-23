(function($) {
    $(document).ready(function() {
        var $slider = $('.hero-slider');
        var $slides = $slider.find('.hero-slide');
        var currentIndex = 0;
        var slideCount = $slides.length;
        var slideInterval = 4000; // 4 seconds
        var fadeDuration = 1000; // 1 second fade transition
        var timer;

        var transition = $slider.data('transition') || 'fade';
        var randomTransitions = $slider.data('random') === 'true';

        var transitions = ['fade', 'slide', 'zoom', 'flip'];

        function applyTransition($current, $next, effect) {
            switch(effect) {
                case 'slide':
                    $current.animate({left: '-100%'}, fadeDuration, function() {
                        $(this).hide().css({left: 0});
                    });
                    $next.css({left: '100%', display: 'block'}).animate({left: '0%'}, fadeDuration);
                    break;
                case 'zoom':
                    $current.fadeOut(fadeDuration);
                    $next.css({transform: 'scale(1.2)', opacity: 0, display: 'block'}).animate({opacity: 1}, {
                        duration: fadeDuration,
                        step: function(now, fx) {
                            $(this).css('transform', 'scale(' + (1.2 - 0.2 * now) + ')');
                        }
                    });
                    break;
                case 'flip':
                    $current.fadeOut(fadeDuration);
                    $next.css({transform: 'rotateY(90deg)', opacity: 0, display: 'block'}).animate({opacity: 1}, {
                        duration: fadeDuration,
                        step: function(now, fx) {
                            $(this).css('transform', 'rotateY(' + (90 - 90 * now) + 'deg)');
                        }
                    });
                    break;
                case 'fade':
                default:
                    $current.fadeOut(fadeDuration);
                    $next.fadeIn(fadeDuration);
                    break;
            }
        }

        function showSlide(index) {
            var $current = $slides.eq(currentIndex);
            var $next = $slides.eq(index);
            var effect = transition;

            if (randomTransitions) {
                effect = transitions[Math.floor(Math.random() * transitions.length)];
            }

            applyTransition($current, $next, effect);
            currentIndex = index;
        }

        function startSlider() {
            timer = setInterval(function() {
                var nextIndex = (currentIndex + 1) % slideCount;
                showSlide(nextIndex);
            }, slideInterval);
        }

        function stopSlider() {
            clearInterval(timer);
        }

        if (slideCount > 1) {
            $slides.hide().css({position: 'absolute', top: 0, left: 0, width: '100%'});
            $slides.eq(currentIndex).show();
            startSlider();
        }
    });
})(jQuery);
