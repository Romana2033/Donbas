<?php
/**
 * Template Name: Партнерська програма (B2B / B2D)
 * Description: Лендинг для дилерів, автопарків та лізингових компаній. УкрАвтоІмпорт.
 *
 * Покласти у каталог теми (рекомендовано child-теми Vehica):
 *   wp-content/themes/vehica-child/page-dealers.php
 *
 * Потім у WP-адмінці створити сторінку «Дилерам», у блоці «Атрибути сторінки»
 * вибрати шаблон «Партнерська програма (B2B / B2D)» та опублікувати.
 *
 * Стилі та скрипти підключаються через wp_enqueue_*. Реєстрація — у functions.php
 * child-теми (приклад див. у файлі functions.snippet.php з репозиторію).
 *
 * @package vehica-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="uai-dealers" id="uai-dealers">

	<!-- HERO -->
	<section class="uai-hero">
		<div class="uai-hero__bg" aria-hidden="true"></div>
		<div class="uai-container uai-hero__inner">
			<div class="uai-hero__content">
				<div class="uai-badge">B2B · B2D напрям співпраці</div>
				<h1 class="uai-h1">Партнерська програма для&nbsp;дилерів та&nbsp;автопарків</h1>
				<p class="uai-hero__lead">
					Постачаємо електромобілі та гібриди з&nbsp;Китаю партіями для автосалонів,
					автопарків і&nbsp;лізингових компаній. Прямі контракти, повна логістика,
					розмитнення та&nbsp;сервісна підтримка — під&nbsp;ключ.
				</p>

				<div class="uai-hero__cta">
					<a href="#contact" class="uai-btn uai-btn--primary uai-btn--lg">Залишити заявку</a>
					<a href="tel:+380960010016" class="uai-btn uai-btn--ghost uai-btn--lg">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
						+380 960 010 0016
					</a>
				</div>

				<ul class="uai-hero__points" role="list">
					<li>
						<span class="uai-hero__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						Дилерські ціни на партії авто
					</li>
					<li>
						<span class="uai-hero__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						Доставка під ключ до 3.5 місяців
					</li>
					<li>
						<span class="uai-hero__check" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
						</span>
						Гарантія до 3 років та сервіс по Україні
					</li>
				</ul>
			</div>

			<aside class="uai-hero__form" id="quick-form">
				<h2 class="uai-hero__form-title">Швидкий запит для бізнесу</h2>
				<p class="uai-hero__form-sub">Менеджер для дилерів передзвонить упродовж 15 хвилин у робочий час.</p>
				<form class="uai-form" data-form="hero" method="post" action="">
					<?php wp_nonce_field( 'uai_dealer_lead', 'uai_lead_nonce' ); ?>
					<input type="hidden" name="action" value="uai_dealer_lead">
					<input type="hidden" name="source" value="hero">
					<label class="uai-field">
						<span class="uai-field__label">Назва компанії / ФОП</span>
						<input type="text" name="company" placeholder="ТОВ «АвтоПартнер»" required>
					</label>
					<label class="uai-field">
						<span class="uai-field__label">Контактна особа</span>
						<input type="text" name="name" placeholder="Імʼя" required>
					</label>
					<label class="uai-field">
						<span class="uai-field__label">Телефон</span>
						<input type="tel" name="phone" placeholder="+380 ___ ___ __ __" required>
					</label>
					<label class="uai-field">
						<span class="uai-field__label">Формат співпраці</span>
						<select name="model" required>
							<option value="">— Оберіть —</option>
							<option>Автосалон / дилер</option>
							<option>Автопарк / таксі</option>
							<option>Лізингова компанія</option>
							<option>Регіональний реселлер</option>
							<option>Інше</option>
						</select>
					</label>
					<button type="submit" class="uai-btn uai-btn--primary uai-btn--block">Надіслати заявку</button>
					<p class="uai-form__note">Натискаючи кнопку, ви погоджуєтесь з обробкою персональних даних.</p>
				</form>
			</aside>
		</div>

		<div class="uai-metrics">
			<div class="uai-container uai-metrics__inner">
				<div><strong>5500+</strong><span>задоволених клієнтів з 2014 року</span></div>
				<div><strong>1000+</strong><span>авто привезено за 2025 рік</span></div>
				<div><strong>12+</strong><span>років досвіду на ринку</span></div>
				<div><strong>15–20%</strong><span>вигода від ринкових цін</span></div>
			</div>
		</div>
	</section>

	<!-- BENEFITS -->
	<section class="uai-section" id="benefits">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Чому дилери обирають нас</span>
				<h2>Усе для того, щоб ви заробляли на&nbsp;кожній партії</h2>
				<p class="uai-section__sub">Ми беремо на себе складну частину імпорту — пошук, перевірку, доставку та документи. Ви отримуєте готові до продажу авто з прозорою маржею.</p>
			</header>

			<div class="uai-grid uai-grid--3">

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
					</div>
					<h3>Прямі контракти у Китаї</h3>
					<p>Працюємо безпосередньо з виробниками та перевіреними дилерами в Китаї. Власний офіс і склад у Китаї — авто можна оглянути перед купівлею.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
					</div>
					<h3>Дилерські ціни на партії</h3>
					<p>Вигода 15–20% від ринкових цін. Фіксована знижка на партію залежно від обсягу та моделей — оголошуємо після підписання NDA.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
					</div>
					<h3>Власна логістика морем і сушею</h3>
					<p>Контроль кожного етапу: страхування, відстеження, групова доставка для зменшення вартості. Термін — до 3.5 місяців з Китаю в Україну.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="15" x2="15" y2="15"/></svg>
					</div>
					<h3>Повне розмитнення «під ключ»</h3>
					<p>Власні брокери. Мито 10%, акциз, ПДВ 20% — рахуємо одразу, у комерційній пропозиції фіксуємо повну вартість без сюрпризів.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 12l2 2 4-4"/><path d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9c2.5 0 4.78 1.02 6.41 2.66"/></svg>
					</div>
					<h3>Гарантія до 3 років</h3>
					<p>Зберігається офіційна гарантія виробника + наш сервісний супровід. Мережа СТО по всій Україні, постачання запчастин.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
					</div>
					<h3>Кредит від 0.01% та лізинг</h3>
					<p>Працюємо з банками-партнерами України. Бронювання партії — від 10% вартості, передоплата за договором — 10%, решта по прибутті.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
					</div>
					<h3>Менеджер на звʼязку 15 хв</h3>
					<p>Працюємо Пн–Нд, 10:00–19:00 без вихідних. Час відповіді персонального менеджера для дилерів — до 15 хвилин.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
					</div>
					<h3>Прозорість угоди</h3>
					<p>Офіційний договір з фіксованою ціною, повна юридична чистота. Допомога з реєстрацією у РСЦ / МРЕВ після отримання.</p>
				</article>

				<article class="uai-card">
					<div class="uai-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
					</div>
					<h3>Зарядна інфраструктура</h3>
					<p>Постачання AC/DC станцій до автосалонів, готелів, паркінгів. Підбір по потужності, проєктування, інсталяція та сервіс.</p>
				</article>

			</div>
		</div>
	</section>

	<!-- COOPERATION MODELS -->
	<section class="uai-section uai-section--alt" id="models">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Формати співпраці</span>
				<h2>Оберіть модель, що працює для&nbsp;вашого бізнесу</h2>
			</header>

			<div class="uai-grid uai-grid--models">

				<article class="uai-model">
					<header class="uai-model__head">
						<span class="uai-model__tag">B2D · для дилерів</span>
						<h3>Дилерський контракт</h3>
					</header>
					<p>Для автосалонів, які хочуть розширити модельний ряд електрокарами та гібридами з Китаю.</p>
					<ul class="uai-model__list">
						<li>Дилерські ціни на партії авто</li>
						<li>Резервування авто у дорозі та на складі</li>
						<li>Ексклюзивність по регіону (за обсягом)</li>
						<li>Передоплата 10% за договором</li>
						<li>Фото- та відеоконтент на партію</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--ghost">Обговорити умови</a>
				</article>

				<article class="uai-model uai-model--accent">
					<header class="uai-model__head">
						<span class="uai-model__tag">B2B · для автопарків</span>
						<h3>Постачання автопарків</h3>
					</header>
					<p>Для таксі, служб доставки, корпоративних автопарків та операторів каршерингу. Партії під ваші потреби.</p>
					<ul class="uai-model__list">
						<li>Знижка від обсягу партії</li>
						<li>Однакова комплектація та колір партії</li>
						<li>Адаптація під український ринок</li>
						<li>Корпоративний сервіс та виїзний ремонт</li>
						<li>Запчастини зі складу в Україні</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--primary">Запросити прайс</a>
				</article>

				<article class="uai-model">
					<header class="uai-model__head">
						<span class="uai-model__tag">Лізинг · фінсектор</span>
						<h3>Партнерство з лізингом</h3>
					</header>
					<p>Для лізингових і фінансових компаній, що формують пул авто для надання у лізинг кінцевим клієнтам.</p>
					<ul class="uai-model__list">
						<li>Контрактні ціни під лізингові програми</li>
						<li>Спецумови по гарантії та зворотному викупу</li>
						<li>Документообіг під ваші стандарти</li>
						<li>Спільні маркетингові акції</li>
						<li>White-label каталог авто</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--ghost">Стати партнером</a>
				</article>

				<article class="uai-model">
					<header class="uai-model__head">
						<span class="uai-model__tag">Trade-in fleet</span>
						<h3>Викуп та оновлення парку</h3>
					</header>
					<p>Викупимо вашу нинішню техніку та поставимо новий електропарк. Оцінка партії — за 1 робочий день.</p>
					<ul class="uai-model__list">
						<li>Оцінка партії онлайн та виїздом</li>
						<li>Залік вартості у наступну партію</li>
						<li>Програма «обмін з доплатою»</li>
						<li>Реалізація викупленого парку через комісію</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--ghost">Розрахувати Trade-in</a>
				</article>

				<article class="uai-model">
					<header class="uai-model__head">
						<span class="uai-model__tag">Реселлер · регіональні майданчики</span>
						<h3>Регіональне партнерство</h3>
					</header>
					<p>Для майданчиків у малих містах, які працюють під замовлення без власного складу. Підбір та доставка під клієнта.</p>
					<ul class="uai-model__list">
						<li>Без передоплати — комісія з угоди</li>
						<li>Доступ до закритого B2B-каталогу</li>
						<li>Підбір з наявних авто та з-під замовлення</li>
						<li>Навчання та сертифікація менеджерів</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--ghost">Залишити заявку</a>
				</article>

				<article class="uai-model">
					<header class="uai-model__head">
						<span class="uai-model__tag">EV-charging</span>
						<h3>Зарядні станції оптом</h3>
					</header>
					<p>Для АЗС, готелів, ТРЦ, паркінгів, девелоперів. Постачання та інтеграція AC/DC станцій провідних виробників.</p>
					<ul class="uai-model__list">
						<li>Підбір по потужності та трафіку</li>
						<li>Проєктування та узгодження з ОЕС</li>
						<li>Інсталяція та пуско-налагодження</li>
						<li>Інтеграція з білінгом та операторами</li>
					</ul>
					<a href="#contact" class="uai-btn uai-btn--ghost">Замовити проєкт</a>
				</article>

			</div>
		</div>
	</section>

	<!-- PROCESS -->
	<section class="uai-section" id="process">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Як ми працюємо</span>
				<h2>Шлях від&nbsp;заявки до&nbsp;авто на&nbsp;вашому майданчику</h2>
				<p class="uai-section__sub">Прозорий процес у 6 кроках — той самий, що для роздрібу, але адаптований під дилерську партію.</p>
			</header>

			<ol class="uai-steps">
				<li class="uai-step">
					<div class="uai-step__num">01</div>
					<h3>Консультація</h3>
					<p>Зʼясовуємо ваші потреби, обсяг партії, бюджет і моделі. Відповідаємо на питання про імпорт. Підписуємо NDA.</p>
				</li>
				<li class="uai-step">
					<div class="uai-step__num">02</div>
					<h3>Розрахунок</h3>
					<p>Готуємо персональну пропозицію з фіксованою ціною, включно з митними зборами (мито 10%, акциз, ПДВ 20%) та доставкою.</p>
				</li>
				<li class="uai-step">
					<div class="uai-step__num">03</div>
					<h3>Пошук і перевірка</h3>
					<p>Підбираємо авто зі складу в Україні, з тих, що в дорозі, або по території Китаю. Власна команда перевіряє стан.</p>
				</li>
				<li class="uai-step">
					<div class="uai-step__num">04</div>
					<h3>Договір</h3>
					<p>Офіційний договір з фіксованою ціною. Бронювання — від 10% вартості, передоплата — 10%, решта по прибутті в Україну.</p>
				</li>
				<li class="uai-step">
					<div class="uai-step__num">05</div>
					<h3>Доставка</h3>
					<p>Організовуємо логістику морем/сушею та митне оформлення. Термін — до 105 днів. Страхування на всіх етапах.</p>
				</li>
				<li class="uai-step">
					<div class="uai-step__num">06</div>
					<h3>Отримання</h3>
					<p>Сплата залишку після прибуття в Україну, передача авто на ваш майданчик, допомога з реєстрацією в РСЦ.</p>
				</li>
			</ol>

			<div class="uai-process__cta">
				<p>Готові обговорити вашу першу партію?</p>
				<a href="#contact" class="uai-btn uai-btn--primary uai-btn--lg">Поговорити з менеджером</a>
			</div>
		</div>
	</section>

	<!-- FLEET -->
	<section class="uai-section uai-section--alt" id="fleet">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Модельний ряд</span>
				<h2>Електромобілі та гібриди, що&nbsp;продаються</h2>
				<p class="uai-section__sub">253 позиції гібридів та десятки моделей електрокарів у нашому B2B-каталозі. Нижче — найпопулярніше серед дилерів.</p>
			</header>

			<div class="uai-grid uai-grid--cars">

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--byd">
						<span class="uai-car__badge">93 авто в каталозі</span>
						<span class="uai-car__type">BEV / PHEV</span>
					</div>
					<div class="uai-car__body">
						<h3>BYD Song Plus / Yuan Plus / Han</h3>
						<p class="uai-car__meta">До 510 км запасу · масовий бестселер</p>
						<p>Найбільш універсальний бренд для роздрібу. Гарантія батареї до 8 років.</p>
					</div>
				</article>

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--zeekr">
						<span class="uai-car__badge">34 авто в каталозі</span>
						<span class="uai-car__type">BEV</span>
					</div>
					<div class="uai-car__body">
						<h3>Zeekr 001 / 007 / X</h3>
						<p class="uai-car__meta">800 В · преміум-сегмент</p>
						<p>Технологічний прем’єр-клас для дилерів, що хочуть зайти у вищий цінник.</p>
					</div>
				</article>

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--li">
						<span class="uai-car__badge">EREV-лідер</span>
						<span class="uai-car__type">Гібрид</span>
					</div>
					<div class="uai-car__body">
						<h3>Li Auto L6 / L7 / L9</h3>
						<p class="uai-car__meta">До 1400 км запасу · сімейний преміум</p>
						<p>Сімейні кросовери, які впевнено продаються в українському преміумі.</p>
					</div>
				</article>

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--voyah">
						<span class="uai-car__badge">PHEV</span>
						<span class="uai-car__type">Гібрид</span>
					</div>
					<div class="uai-car__body">
						<h3>Voyah Free / Dream</h3>
						<p class="uai-car__meta">PHEV · повний привід</p>
						<p>Преміум-альтернатива європейським брендам з нижчою ціною входу.</p>
					</div>
				</article>

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--xpeng">
						<span class="uai-car__badge">800 В</span>
						<span class="uai-car__type">BEV</span>
					</div>
					<div class="uai-car__body">
						<h3>Xpeng G6 / G9 / P7</h3>
						<p class="uai-car__meta">Електро · автопілот XNGP</p>
						<p>Технологічний бренд №1 серед молодшої аудиторії покупців EV.</p>
					</div>
				</article>

				<article class="uai-car">
					<div class="uai-car__media uai-car__media--geely">
						<span class="uai-car__badge">Масовий сегмент</span>
						<span class="uai-car__type">BEV / HEV</span>
					</div>
					<div class="uai-car__body">
						<h3>Geely Galaxy / Geometry</h3>
						<p class="uai-car__meta">Електро та гібрид · ідеально для B2B</p>
						<p>Робочий вибір для таксопарків і служб доставки.</p>
					</div>
				</article>

			</div>

			<div class="uai-fleet__cta">
				<a href="#contact" class="uai-btn uai-btn--primary">Отримати повний B2B-каталог з цінами</a>
			</div>
		</div>
	</section>

	<!-- COMPARISON -->
	<section class="uai-section" id="why">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">УкрАвтоІмпорт vs прямий імпорт</span>
				<h2>Чому дилеру вигідніше працювати з&nbsp;нами, ніж&nbsp;везти самому</h2>
			</header>

			<div class="uai-compare">
				<div class="uai-compare__col uai-compare__col--us">
					<header><h3>З УкрАвтоІмпорт</h3><span>Рекомендовано</span></header>
					<ul>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Прямі контракти, офіс і склад у Китаї</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Перевірка кожного авто перед відправкою</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Фіксована вартість, без сюрпризів на митниці</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Власні брокери та склад в Україні</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Гарантія до 3 років + сервіс по Україні</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Кредит від 0.01% та лізинг для клієнтів</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Контент та навчання менеджерів</li>
					</ul>
				</div>

				<div class="uai-compare__col uai-compare__col--diy">
					<header><h3>Самостійний імпорт</h3><span>Високі ризики</span></header>
					<ul>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Робота через невідомих посередників</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Ризик отримати «сіре» або биті авто</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Коливання логістики ±2000 $/авто</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Самостійна сертифікація та документи</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Гарантійні випадки — головний біль</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Складно знайти кредитування</li>
						<li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg> Самостійна підготовка контенту</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- TESTIMONIALS -->
	<section class="uai-section uai-section--alt" id="testimonials">
		<div class="uai-container">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Партнери, які вже з нами</span>
				<h2>Дилери та автопарки про&nbsp;співпрацю</h2>
				<p class="uai-section__sub">Рейтинг УкрАвтоІмпорт на Google — 4.8 на основі 87 відгуків. Нижче — слово партнерів-дилерів.</p>
			</header>

			<div class="uai-grid uai-grid--3">

				<blockquote class="uai-quote">
					<p>«Поставили нам першу партію Geely Galaxy менш ніж за 3 місяці. Усі авто прийшли в ідеалі, з повною документацією. Допомогли з фотосесією для сайту — це наш основний партнер по EV-напряму.»</p>
					<footer><strong>Андрій К.</strong><span>директор автосалону, Львів</span></footer>
				</blockquote>

				<blockquote class="uai-quote">
					<p>«Маємо таксопарк на 60 авто. УкрАвтоІмпорт допоміг закрити заміну на електрику. Окремий менеджер, спецумови по запчастинам, виїзний сервіс — це те, чого нам бракувало роками.»</p>
					<footer><strong>ТОВ «БлекТакс»</strong><span>оператор перевезень, Київ</span></footer>
				</blockquote>

				<blockquote class="uai-quote">
					<p>«Працюємо як лізингова компанія. Прозорий прайс, кредитування під 0.01%, програма зворотного викупу. Завдяки партнерству ми запустили новий продукт “EV-лізинг”.»</p>
					<footer><strong>Олена М.</strong><span>фінансова компанія, Дніпро</span></footer>
				</blockquote>

			</div>
		</div>
	</section>

	<!-- FAQ -->
	<section class="uai-section" id="faq">
		<div class="uai-container uai-container--narrow">
			<header class="uai-section__head">
				<span class="uai-eyebrow">Часті питання</span>
				<h2>Все, що дилери питають у&nbsp;першу чергу</h2>
			</header>

			<div class="uai-faq">
				<details class="uai-faq__item" open>
					<summary>Який мінімальний обсяг для входу в дилерську програму?</summary>
					<div class="uai-faq__body">
						<p>Працюємо з партіями авто — мінімальний обсяг та глибина знижки залежать від моделей та регіону. Деталі обговорюємо індивідуально на брифінгу після підписання NDA.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Скільки часу займає поставка партії авто з Китаю?</summary>
					<div class="uai-faq__body">
						<p>Стандартний термін — до 105 днів (до 3.5 місяців) від підписання договору до видачі на ваш майданчик. Точний термін залежить від наявності на заводі, маршруту логістики та комплекту документів.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Чи можна забронювати ексклюзивність по регіону або моделі?</summary>
					<div class="uai-faq__body">
						<p>Так. При сталому обсязі ми надаємо регіональну ексклюзивність на конкретні моделі. Умови фіксуються у дилерському контракті.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Які умови оплати та бронювання?</summary>
					<div class="uai-faq__body">
						<p>Бронювання партії — від 10% вартості. Передоплата за договором — 10%, решта — після прибуття авто в Україну. Для постійних партнерів можливі індивідуальні умови.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Чи беретесь ви за розмитнення та сертифікацію?</summary>
					<div class="uai-faq__body">
						<p>Так, повний цикл. Власні брокери, прозорий розрахунок (мито 10%, акциз, ПДВ 20%). Дилер отримує авто з повним пакетом документів для постановки на облік у РСЦ / МРЕВ.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Що з гарантією та сервісом для клієнтів?</summary>
					<div class="uai-faq__body">
						<p>Зберігається офіційна гарантія виробника — до 3 років, для деяких компонентів (батареї BYD) — до 8 років. Сервісна мережа СТО по всій Україні, постачання запчастин зі складу.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Чи допомагаєте з фінансуванням клієнтів дилера?</summary>
					<div class="uai-faq__body">
						<p>Так — пропонуємо кредит від банків-партнерів від 0.01% річних, лізинг, відтермінування платежів. Це інструменти, які дилер може запропонувати кінцевим клієнтам, аби пришвидшити продаж партії.</p>
					</div>
				</details>

				<details class="uai-faq__item">
					<summary>Чи можна оглянути авто в Китаї перед купівлею?</summary>
					<div class="uai-faq__body">
						<p>Так. Маємо власний офіс і склад у Китаї, тому для великих партій можливий фізичний огляд або відеотрансляція кожного авто перед відправкою.</p>
					</div>
				</details>
			</div>
		</div>
	</section>

	<!-- CONTACT -->
	<section class="uai-section uai-section--contact" id="contact">
		<div class="uai-container">
			<div class="uai-contact">
				<div class="uai-contact__info">
					<span class="uai-eyebrow uai-eyebrow--light">Стати партнером</span>
					<h2>Залишіть заявку — менеджер для&nbsp;дилерів зателефонує за&nbsp;15&nbsp;хвилин</h2>
					<p>Розкажемо про умови, надішлемо B2B-прайс, підготуємо персональну пропозицію під ваш формат бізнесу.</p>

					<ul class="uai-contact__list">
						<li>
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
							<a href="tel:+380960010016">+380 960 010 0016</a>
						</li>
						<li>
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
							<a href="mailto:ukravtoimport@gmail.com">ukravtoimport@gmail.com</a>
						</li>
						<li>
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
							Пн–Нд · 10:00–19:00, без вихідних
						</li>
						<li>
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
							Офіси: Дніпро · Київ · склад у Китаї
						</li>
					</ul>

					<div class="uai-contact__socials">
						<a href="https://t.me/UkrAvtoImportUA" target="_blank" rel="noopener">Telegram</a>
						<a href="https://instagram.com/ukravtoimport.ua" target="_blank" rel="noopener">Instagram</a>
						<a href="https://www.facebook.com/ukraut0import" target="_blank" rel="noopener">Facebook</a>
						<a href="https://www.tiktok.com/@ukravtoimport.ua" target="_blank" rel="noopener">TikTok</a>
					</div>
				</div>

				<form class="uai-form uai-form--card" data-form="contact" method="post" action="">
					<?php wp_nonce_field( 'uai_dealer_lead', 'uai_lead_nonce_main' ); ?>
					<input type="hidden" name="action" value="uai_dealer_lead">
					<input type="hidden" name="source" value="contact">
					<h3 class="uai-form__title">Заявка для дилера / автопарку</h3>

					<label class="uai-field">
						<span class="uai-field__label">Назва компанії *</span>
						<input type="text" name="company" placeholder="ТОВ / ФОП / Назва автосалону" required>
					</label>

					<div class="uai-field-row">
						<label class="uai-field">
							<span class="uai-field__label">Контактна особа *</span>
							<input type="text" name="name" placeholder="Імʼя та прізвище" required>
						</label>
						<label class="uai-field">
							<span class="uai-field__label">Посада</span>
							<input type="text" name="role" placeholder="Директор, керівник відділу...">
						</label>
					</div>

					<div class="uai-field-row">
						<label class="uai-field">
							<span class="uai-field__label">Телефон *</span>
							<input type="tel" name="phone" placeholder="+380 ___ ___ __ __" required>
						</label>
						<label class="uai-field">
							<span class="uai-field__label">Email</span>
							<input type="email" name="email" placeholder="name@company.ua">
						</label>
					</div>

					<div class="uai-field-row">
						<label class="uai-field">
							<span class="uai-field__label">Формат співпраці *</span>
							<select name="model" required>
								<option value="">— Оберіть —</option>
								<option>Дилерський контракт (B2D)</option>
								<option>Постачання автопарку (B2B)</option>
								<option>Лізингова компанія</option>
								<option>Регіональний реселлер</option>
								<option>Trade-in / викуп парку</option>
								<option>Зарядні станції оптом</option>
								<option>Інше</option>
							</select>
						</label>
						<label class="uai-field">
							<span class="uai-field__label">Очікуваний обсяг партії</span>
							<select name="volume">
								<option value="">— Не визначено —</option>
								<option>До 5 авто</option>
								<option>5–10 авто</option>
								<option>10–25 авто</option>
								<option>25+ авто</option>
							</select>
						</label>
					</div>

					<label class="uai-field">
						<span class="uai-field__label">Коментар</span>
						<textarea name="message" rows="3" placeholder="Розкажіть коротко про ваш формат бізнесу, моделі, які цікавлять, та терміни."></textarea>
					</label>

					<label class="uai-checkbox">
						<input type="checkbox" name="consent" required>
						<span>Погоджуюсь з обробкою персональних даних та політикою конфіденційності.</span>
					</label>

					<button type="submit" class="uai-btn uai-btn--primary uai-btn--block uai-btn--lg">Надіслати заявку</button>

					<p class="uai-form__note">Відповідаємо упродовж 15 хвилин у робочий час. Усі дані конфіденційні.</p>
				</form>
			</div>
		</div>
	</section>

	<a href="#contact" class="uai-floating-cta" aria-label="Залишити заявку">
		<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
		<span>Заявка дилера</span>
	</a>

</main>

<?php
get_footer();
