/* УкрАвтоІмпорт — Партнерська програма / dealer landing JS */

(function () {
    'use strict';

    /* ---------- Mobile menu ---------- */
    const burger = document.getElementById('burger');
    const nav = document.querySelector('.nav');
    if (burger && nav) {
        burger.addEventListener('click', () => {
            const isOpen = nav.classList.toggle('is-open');
            burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
        nav.querySelectorAll('a').forEach(link =>
            link.addEventListener('click', () => {
                nav.classList.remove('is-open');
                burger.setAttribute('aria-expanded', 'false');
            })
        );
    }

    /* ---------- Smooth scroll for anchor links ---------- */
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const id = link.getAttribute('href');
            if (id.length <= 1) return;
            const target = document.querySelector(id);
            if (!target) return;
            e.preventDefault();
            const headerH = document.getElementById('header')?.offsetHeight || 0;
            const top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 12;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    /* ---------- Reveal on scroll ---------- */
    const revealEls = document.querySelectorAll('.card, .model, .step, .car, .quote, .compare__col, .faq__item');
    revealEls.forEach(el => el.classList.add('reveal'));

    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
        );
        revealEls.forEach(el => io.observe(el));
    } else {
        revealEls.forEach(el => el.classList.add('is-visible'));
    }

    /* ---------- Forms (no-backend demo: capture, validate, show success) ---------- */
    const forms = document.querySelectorAll('form[data-form]');
    forms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            const data = Object.fromEntries(new FormData(form).entries());

            const phone = (data.phone || '').replace(/\D/g, '');
            if (phone.length < 9) {
                alert('Будь ласка, вкажіть коректний номер телефону.');
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Надсилаємо…';
            }

            window.setTimeout(() => {
                form.classList.add('is-success');
                const success = document.createElement('div');
                success.className = 'form__success';
                success.innerHTML = `
                    <p style="margin:0 0 8px;font-size:1.1rem;">Дякуємо, ${escapeHtml(data.name || data.company || 'партнере')}!</p>
                    <p style="margin:0;">Менеджер для дилерів зателефонує упродовж 30 хвилин у робочий час (Пн–Нд, 10:00–19:00).</p>
                `;
                form.appendChild(success);
            }, 700);
        });
    });

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, c => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
        }[c]));
    }

    /* ---------- Header shadow on scroll ---------- */
    const header = document.getElementById('header');
    if (header) {
        const onScroll = () => {
            if (window.scrollY > 8) header.style.boxShadow = '0 4px 14px rgba(13,27,42,.06)';
            else header.style.boxShadow = 'none';
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }
})();
