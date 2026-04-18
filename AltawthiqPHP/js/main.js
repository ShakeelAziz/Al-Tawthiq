/*landing page - main scripts */

// AOS init (Animate on Scroll )
document.addEventListener('DOMContentLoaded', function () {
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

// Improve generic image alt text for SEO/accessibility
(function () {
  const isArabic = (document.documentElement.lang || '').toLowerCase().startsWith('ar');
  const partnerAlt = isArabic
    ? 'شعار جهة عميلة - التوثيق الوطني للتدريب في الرياض'
    : 'Client organization logo - Altawthiq corporate training Riyadh';

  const genericPatterns = [
    /^شعار شريك\s*\d*$/i,
    /^partner logo\s*\d*$/i,
    /^logo$/i,
    /^al tawthiq$/i
  ];

  document.querySelectorAll('img[alt]').forEach((img) => {
    const alt = (img.getAttribute('alt') || '').trim();
    const src = (img.getAttribute('src') || '').toLowerCase();
    const isPartnerLogo = src.includes('/assets/partners/') || src.includes('\\assets\\partners\\');
    const isGenericAlt = genericPatterns.some((pattern) => pattern.test(alt));

    if (isPartnerLogo && (isGenericAlt || alt === '')) {
      img.setAttribute('alt', partnerAlt);
      return;
    }

    if (isGenericAlt && src.includes('/assets/images/')) {
      img.setAttribute(
        'alt',
        isArabic
          ? 'التوثيق الوطني للتدريب - دورات وبرامج تدريبية معتمدة'
          : 'Altawthiq National Training - certified courses and corporate programs'
      );
    }
  });
})();

// Navbar scroll effect 
const navbar = document.getElementById('navbar');
if (navbar) {
  window.addEventListener('scroll', function () {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
}

// Achievement number counters (animate from 0 to target)
(function () {
  const counters = document.querySelectorAll('.stat-number, .achiev-section .number .primary');
  if (!counters.length) return;

  function animateCounter(el) {
    const explicitTarget = parseInt(el.getAttribute('data-target'), 10);
    const textTarget = parseInt((el.textContent || '').replace(/[^0-9]/g, ''), 10);
    const target = Number.isNaN(explicitTarget) ? textTarget : explicitTarget;
    if (isNaN(target)) return;
    if (el.dataset.counterAnimated === '1') return;
    el.dataset.counterAnimated = '1';

    const duration = 2000;
    const startTime = performance.now();
    const locale = document.documentElement.lang === 'ar' ? 'ar-SA' : 'en-US';

    function update(now) {
      const progress = Math.min((now - startTime) / duration, 1);
      const current = Math.floor(progress * target);
      el.textContent = current.toLocaleString(locale);
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


function toggleMenu() {
  document.getElementById("navMenu").classList.toggle("active");
}



