<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package EDD Sample Theme
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://ab-inspiration.com', // Site where EDD is hosted
		'item_name'      => 'AB Inspiration', // Name of theme
		'theme_slug'     => 'edd_inspiration_theme', // Theme slug
		'version'        => '8.72', // The current version of this theme
		'author'         => 'Anfisa Breus', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Ключ обновления', 'inspiration' ),
		'enter-key'                 => __( 'Введите ваш ключ.', 'inspiration' ),
		'license-key'               => __( 'Лицензионный ключ', 'inspiration' ),
		'license-action'            => __( 'Действия с лицензией', 'inspiration' ),
		'deactivate-license'        => __( 'Деактивировать лицензию', 'inspiration' ),
		'activate-license'          => __( 'Активировать лицензию', 'inspiration' ),
		'status-unknown'            => __( 'Статус лицензии неизвестен.', 'inspiration' ),
		'renew'                     => __( 'Обновить?', 'inspiration' ),
		'unlimited'                 => __( 'неограничено', 'inspiration' ),
		'license-key-is-active'     => __( 'Ключ лицензии активный.', 'inspiration' ),
		'expires%s'                 => __( 'Истекает %s.', 'inspiration' ),
		'expires-never'             => __( 'Пожизненная лицензия.', 'inspiration' ),
		'%1$s/%2$-sites'            => __( 'У вас %1$s / %2$s сайтов активированы.', 'inspiration' ),
		'license-key-expired-%s'    => __( 'Ключ лицензии истекает %s.', 'inspiration' ),
		'license-key-expired'       => __( 'Ключ лицензии истек.', 'inspiration' ),
		'license-keys-do-not-match' => __( 'Ключ лицензии не подходит.', 'inspiration' ),
		'license-is-inactive'       => __( 'Лицензия неактивна.', 'inspiration' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'inspiration' ),
		'site-is-inactive'          => __( 'Сайт неактивен.', 'inspiration' ),
		'license-status-unknown'    => __( 'Статус лицензии неизвестен.', 'inspiration' ),
		'update-notice'             => __( "Обновление этого шаблона приведет к потере изменений, которые вы сделали в коде. 'Отменить' чтобы остановить, 'OK' чтобы обновить.", 'inspiration' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> доступен. <a href="%3$s" class="thickbox" title="%4s">узнайте что нового</a> или <a href="%5$s"%6$s>обновите сейчас</a>.', 'inspiration' ),
	)

);
