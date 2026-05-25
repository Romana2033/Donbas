/* УкрАвтоІмпорт — Партнерська програма / dealer landing JS
 * Підключається через wp_enqueue_script у functions.php дочірньої теми.
 * Очікує, що PHP-скрипт визначає глобальний uaiDealers = { ajaxUrl, restUrl, nonce }
 */
(function () {
    'use strict';

    const root = document.getElementById('uai-dealers');
    if (!root) return;

    /* ---------- Smooth scroll for anchor links inside the section ---------- */
    root.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
            const id = link.getAttribute('href');
            if (id.length <= 1) return;
            const target = document.querySelector(id);
            if (!target) return;
            e.preventDefault();
            const header = document.querySelector('header, .site-header, #masthead, .vehica-header');
            const headerH = header ? header.offsetHeight : 0;
            const top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 12;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });

    /* ---------- Reveal on scroll ---------- */
    const revealEls = root.querySelectorAll('.uai-card, .uai-model, .uai-step, .uai-car, .uai-quote, .uai-compare__col, .uai-faq__item');
    revealEls.forEach(el => el.classList.add('uai-reveal'));

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

    /* ---------- Forms ----------
     * Send via WP AJAX (action=uai_dealer_lead). Backend hook реєструється у functions.snippet.php.
     * Якщо AJAX недоступний — fallback: показати success-блок як демо.
     */
    const forms = root.querySelectorAll('form[data-form]');
    forms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();

            const formData = new FormData(form);
            const phone = (formData.get('phone') || '').toString().replace(/\D/g, '');
            if (phone.length < 9) {
                alert('Будь ласка, вкажіть коректний номер телефону.');
                return;
            }

            const submitBtn = form.querySelector('button[type="submit"]');
            const submitText = submitBtn ? submitBtn.innerHTML : '';
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.textContent = 'Надсилаємо…';
            }

            const cfg = window.uaiDealers || {};
            const url = cfg.ajaxUrl || '';
            const data = formData;
            data.append('_uai_action', 'uai_dealer_lead');
            if (cfg.nonce) data.append('_uai_nonce', cfg.nonce);

            const onDone = (success, message) => {
                if (submitBtn) submitBtn.innerHTML = submitText;
                if (success) {
                    form.classList.add('is-success');
                    const okEl = document.createElement('div');
                    okEl.className = 'uai-form__success';
                    okEl.innerHTML = `
                        <p style="margin:0 0 8px;font-size:1.1rem;">Дякуємо, ${escapeHtml(formData.get('name') || formData.get('company') || 'партнере')}!</p>
                        <p style="margin:0;">${escapeHtml(message || 'Менеджер для дилерів зателефонує упродовж 15 хвилин у робочий час (Пн–Нд, 10:00–19:00).')}</p>
                    `;
                    form.appendChild(okEl);
                } else {
                    if (submitBtn) submitBtn.disabled = false;
                    alert(message || 'Не вдалось надіслати заявку. Спробуйте, будь ласка, ще раз або зателефонуйте.');
                }
            };

            if (!url) {
                window.setTimeout(() => onDone(true), 700);
                return;
            }

            fetch(url, { method: 'POST', body: data, credentials: 'same-origin' })
                .then(r => r.json().catch(() => ({ success: false })))
                .then(res => onDone(!!res.success, res && res.data && res.data.message))
                .catch(() => onDone(false));
        });
    });

    function escapeHtml(s) {
        return String(s).replace(/[&<>"']/g, c => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;'
        }[c]));
    }
})();
