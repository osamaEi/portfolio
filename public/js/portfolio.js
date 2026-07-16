// Theme toggle (dark / light) with persistence
const themeToggle = document.getElementById('themeToggle');
if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const root = document.documentElement;
        const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        root.setAttribute('data-theme', next);
        try { localStorage.setItem('theme', next); } catch (e) {}
    });
}
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('mainNav');
    const navToggle = document.getElementById('navToggle');
    const navLinks = document.getElementById('navLinks');

    // navbar background on scroll
    const onScroll = () => {
        nav.classList.toggle('scrolled', window.scrollY > 30);
    };
    onScroll();
    window.addEventListener('scroll', onScroll);

    // mobile menu toggle
    navToggle.addEventListener('click', () => {
        navToggle.classList.toggle('open');
        navLinks.classList.toggle('open');
    });

    // close mobile menu on link click
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navToggle.classList.remove('open');
            navLinks.classList.remove('open');
        });
    });

    // highlight active section link on scroll
    const sections = document.querySelectorAll('section[id]');
    const links = document.querySelectorAll('.nav-link');
    const spy = () => {
        let current = '';
        sections.forEach(sec => {
            if (window.scrollY >= sec.offsetTop - 120) current = sec.id;
        });
        links.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === `#${current}`);
        });
    };
    window.addEventListener('scroll', spy);
});

// Mobile menu
const toggle = document.querySelector('.nav-toggle');
const links = document.querySelector('.nav-links');
if (toggle) {
    toggle.addEventListener('click', () => links.classList.toggle('open'));
    links.querySelectorAll('a').forEach(a => a.addEventListener('click', () => links.classList.remove('open')));
}

// Scroll-reveal
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('in');
            // Animate skill bars inside this element
            e.target.querySelectorAll('.bar > i').forEach(bar => {
                bar.style.width = bar.dataset.level + '%';
            });
            revealObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// Projects carousel
(function () {
    const root = document.querySelector('[data-carousel]');
    if (!root) return;

    const track = root.querySelector('[data-track]');
    const slides = track.children;
    const dots = Array.from(root.querySelectorAll('[data-dot]'));
    const total = slides.length;
    let index = 0;
    let autoplay;

    function go(i) {
        index = (i + total) % total;
        track.style.transform = 'translateX(' + (-index * 100) + '%)';
        dots.forEach((d, di) => d.classList.toggle('active', di === index));
    }

    function next() { go(index + 1); }
    function prev() { go(index - 1); }

    function startAuto() {
        stopAuto();
        autoplay = setInterval(next, 6000);
    }
    function stopAuto() { if (autoplay) clearInterval(autoplay); }

    root.querySelector('[data-next]').addEventListener('click', () => { next(); startAuto(); });
    root.querySelector('[data-prev]').addEventListener('click', () => { prev(); startAuto(); });
    dots.forEach((d, di) => d.addEventListener('click', () => { go(di); startAuto(); }));

    // Pause on hover
    root.addEventListener('mouseenter', stopAuto);
    root.addEventListener('mouseleave', startAuto);

    // Touch swipe
    let startX = 0, dx = 0;
    track.addEventListener('touchstart', e => { startX = e.touches[0].clientX; stopAuto(); }, { passive: true });
    track.addEventListener('touchmove', e => { dx = e.touches[0].clientX - startX; }, { passive: true });
    track.addEventListener('touchend', () => {
        if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); }
        dx = 0; startAuto();
    });

    // Keyboard
    document.addEventListener('keydown', e => {
        if (e.key === 'ArrowRight') next();
        if (e.key === 'ArrowLeft') prev();
    });

    go(0);
    startAuto();
})();

// Active nav link on scroll
const sections = document.querySelectorAll('section[id]');
const navAnchors = document.querySelectorAll('.nav-links a[href^="#"]');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => {
        if (window.scrollY >= s.offsetTop - 120) current = s.id;
    });
    navAnchors.forEach(a => {
        a.style.color = a.getAttribute('href') === '#' + current ? 'var(--text)' : '';
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bars = entry.target.querySelectorAll('.skill-bar');
                bars.forEach(bar => {
                    const level = bar.dataset.level;
                    bar.style.width = level + '%';
                });
            }
        });
    }, { threshold: 0.3 });

    // راقب كل skill-group
    document.querySelectorAll('.skill-group').forEach(group => {
        observer.observe(group);
    });
});
