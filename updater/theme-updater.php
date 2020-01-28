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
		'version'        => '8.55', // The current version of this theme
		'author'         => 'Anfisa Breus', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Ключ обновления', 'inspiration' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'inspiration' ),
		'license-key'               => __( 'License Key', 'inspiration' ),
		'license-action'            => __( 'License Action', 'inspiration' ),
		'deactivate-license'        => __( 'Deactivate License', 'inspiration' ),
		'activate-license'          => __( 'Activate License', 'inspiration' ),
		'status-unknown'            => __( 'License status is unknown.', 'inspiration' ),
		'renew'                     => __( 'Renew?', 'inspiration' ),
		'unlimited'                 => __( 'unlimited', 'inspiration' ),
		'license-key-is-active'     => __( 'License key is active.', 'inspiration' ),
		'expires%s'                 => __( 'Expires %s.', 'inspiration' ),
		'expires-never'             => __( 'Lifetime License.', 'inspiration' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'inspiration' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'inspiration' ),
		'license-key-expired'       => __( 'License key has expired.', 'inspiration' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'inspiration' ),
		'license-is-inactive'       => __( 'License is inactive.', 'inspiration' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'inspiration' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'inspiration' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'inspiration' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'inspiration' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'inspiration' ),
	)

);
