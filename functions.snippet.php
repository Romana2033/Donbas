<?php
/**
 * УкрАвтоІмпорт — снipet для functions.php дочірньої теми Vehica.
 *
 * Що робить:
 *  1) Реєструє стилі та скрипти для шаблону page-dealers.php.
 *  2) Підключає шрифти Inter + Montserrat (відповідно до основного сайту).
 *  3) Обробляє AJAX-заявку дилера: збереження в БД (post type uai_lead),
 *     відправка email менеджеру, опційно — у Telegram.
 *
 * Як використати:
 *   – Скопіюйте вміст цього файлу у functions.php дочірньої теми
 *     (wp-content/themes/vehica-child/functions.php).
 *   – Покладіть теку assets/ у дочірню тему: vehica-child/assets/{css,js}/...
 *   – Створіть сторінку «Дилерам» і призначте шаблон «Партнерська програма (B2B / B2D)».
 *
 * @package vehica-child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* ---------------------------------------------------------
 * 1. Enqueue assets only on dealers page template
 * ------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', function () {

	if ( ! is_page_template( 'page-dealers.php' ) ) {
		return;
	}

	// Fonts (синхронно з основним сайтом ukravtoimport.ua).
	wp_enqueue_style(
		'uai-dealers-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@600;700;800&display=swap',
		array(),
		null
	);

	// Стилі лендингу дилерів.
	wp_enqueue_style(
		'uai-dealers',
		get_stylesheet_directory_uri() . '/assets/css/dealers.css',
		array(),
		'1.0.0'
	);

	// JS лендингу.
	wp_enqueue_script(
		'uai-dealers',
		get_stylesheet_directory_uri() . '/assets/js/dealers.js',
		array(),
		'1.0.0',
		true
	);

	wp_localize_script( 'uai-dealers', 'uaiDealers', array(
		'ajaxUrl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'uai_dealer_lead' ),
	) );
}, 20 );


/* ---------------------------------------------------------
 * 2. Custom post type for dealer leads
 * ------------------------------------------------------- */
add_action( 'init', function () {
	register_post_type( 'uai_lead', array(
		'label'        => 'Заявки дилерів',
		'public'       => false,
		'show_ui'      => true,
		'show_in_menu' => true,
		'menu_icon'    => 'dashicons-businessperson',
		'supports'     => array( 'title', 'editor', 'custom-fields' ),
		'capability_type' => 'post',
	) );
} );


/* ---------------------------------------------------------
 * 3. AJAX handler — приймає заявку дилера
 * ------------------------------------------------------- */
add_action( 'wp_ajax_uai_dealer_lead',        'uai_handle_dealer_lead' );
add_action( 'wp_ajax_nopriv_uai_dealer_lead', 'uai_handle_dealer_lead' );

function uai_handle_dealer_lead() {

	// nonce (надсилається з JS як _uai_nonce, або з PHP-форми як uai_lead_nonce*).
	$nonce = isset( $_POST['_uai_nonce'] ) ? $_POST['_uai_nonce'] : ( $_POST['uai_lead_nonce'] ?? $_POST['uai_lead_nonce_main'] ?? '' );
	if ( ! wp_verify_nonce( $nonce, 'uai_dealer_lead' ) ) {
		wp_send_json_error( array( 'message' => 'Помилка безпеки. Перезавантажте сторінку.' ), 403 );
	}

	$fields = array(
		'company' => sanitize_text_field( $_POST['company'] ?? '' ),
		'name'    => sanitize_text_field( $_POST['name']    ?? '' ),
		'role'    => sanitize_text_field( $_POST['role']    ?? '' ),
		'phone'   => sanitize_text_field( $_POST['phone']   ?? '' ),
		'email'   => sanitize_email(     $_POST['email']    ?? '' ),
		'model'   => sanitize_text_field( $_POST['model']   ?? '' ),
		'volume'  => sanitize_text_field( $_POST['volume']  ?? '' ),
		'message' => sanitize_textarea_field( $_POST['message'] ?? '' ),
		'source'  => sanitize_text_field( $_POST['source']  ?? 'dealers-page' ),
	);

	if ( empty( $fields['phone'] ) || empty( $fields['company'] ) || empty( $fields['name'] ) ) {
		wp_send_json_error( array( 'message' => 'Заповніть обовʼязкові поля.' ), 400 );
	}

	$digits = preg_replace( '/\D/', '', $fields['phone'] );
	if ( strlen( $digits ) < 9 ) {
		wp_send_json_error( array( 'message' => 'Невірний номер телефону.' ), 400 );
	}

	// Зберігаємо як CPT.
	$post_id = wp_insert_post( array(
		'post_type'   => 'uai_lead',
		'post_status' => 'publish',
		'post_title'  => sprintf( '%s — %s', $fields['company'], $fields['name'] ),
		'post_content'=> $fields['message'],
	) );

	if ( $post_id && ! is_wp_error( $post_id ) ) {
		foreach ( $fields as $key => $value ) {
			update_post_meta( $post_id, 'uai_' . $key, $value );
		}
		update_post_meta( $post_id, 'uai_ip', $_SERVER['REMOTE_ADDR'] ?? '' );
		update_post_meta( $post_id, 'uai_ua', substr( $_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255 ) );
	}

	// Email менеджеру.
	$to      = apply_filters( 'uai_dealer_lead_recipient', get_option( 'admin_email' ) );
	$subject = sprintf( '[B2B/B2D] Заявка від %s', $fields['company'] );
	$body    = sprintf(
		"Нова заявка з лендингу для дилерів:\n\nКомпанія: %s\nКонтакт: %s (%s)\nТелефон: %s\nEmail: %s\nФормат: %s\nОбсяг: %s\nКоментар: %s\nДжерело: %s",
		$fields['company'], $fields['name'], $fields['role'], $fields['phone'],
		$fields['email'], $fields['model'], $fields['volume'], $fields['message'], $fields['source']
	);
	wp_mail( $to, $subject, $body, array( 'Content-Type: text/plain; charset=UTF-8' ) );

	/**
	 * Сторонні інтеграції — Telegram, CRM, тощо.
	 * Підключити через хук:
	 *
	 * add_action( 'uai_dealer_lead_saved', function ( $post_id, $fields ) {
	 *     wp_remote_post( 'https://api.telegram.org/bot<TOKEN>/sendMessage', array(
	 *         'body' => array( 'chat_id' => '<CHAT_ID>', 'text' => print_r( $fields, true ) ),
	 *     ) );
	 * }, 10, 2 );
	 */
	do_action( 'uai_dealer_lead_saved', $post_id, $fields );

	wp_send_json_success( array(
		'message' => 'Менеджер для дилерів зателефонує упродовж 15 хвилин у робочий час.',
		'id'      => $post_id,
	) );
}
