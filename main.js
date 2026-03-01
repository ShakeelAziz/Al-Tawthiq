/*landing page - main scripts */

// AOS init (Animate on Scroll )
document.addEventListener('DOMContentLoaded', function() {
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 600,
      offset: 80,
      once: true,
      easing: 'ease-out-cubic'
    });
  }
});

// Solutions carousel
let currentSlide = 0;
const slides = document.querySelectorAll('.solution-slide');
const dots = document.querySelectorAll('.carousel-dot');
let carouselInterval;

function showSlide(n) {
  if (!slides.length) return;
  currentSlide = (n + slides.length) % slides.length;
  slides.forEach((s, i) => s.classList.toggle('active', i === currentSlide));
  dots.forEach((d, i) => d.classList.toggle('active', i === currentSlide));
  resetCarouselInterval();
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

function goSlide(n) {
  showSlide(n);
}

function resetCarouselInterval() {
  if (carouselInterval) clearInterval(carouselInterval);
  carouselInterval = setInterval(nextSlide, 5000);
}

// Start carousel auto-play
if (slides.length) {
  resetCarouselInterval();
}

// Navbar scroll effect 
const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

// Achievement number counters (animate from 0 to target)
(function() {
  const counters = document.querySelectorAll('.stat-number');
  if (!counters.length) return;

  function animateCounter(el) {
    const target = parseInt(el.getAttribute('data-target'), 10);
    if (isNaN(target)) return;

    const duration = 2000;
    const startTime = performance.now();

    function update(now) {
      const progress = Math.min((now - startTime) / duration, 1);
      const current = Math.floor(progress * target);
      el.textContent = current.toLocaleString('en-US');
      if (progress < 1) {
        requestAnimationFrame(update);
      }
    }

    requestAnimationFrame(update);
  }

  // Animate when the counters first enter the viewport
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.4
  });

  counters.forEach(counter => observer.observe(counter));
})();



