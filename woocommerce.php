<?php
/**
 * The template for displaying all pages.
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
 
get_header(); 

echo ab_inspiration_header();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

// check for plugin using plugin name
if ( is_plugin_active( 'ab-woocommerce/ab-woocommerce.php' ) ) {

global $license, $status;
$license 	= get_option( 'edd_woocommerce_license_key' );
$status 	= get_option( 'edd_woocommerce_license_status' );
if ($status !== false && $status == 'valid' ) {  ?>


		<div id="container" class="ab-inspiration-woocommerce-container" style="float:right !important;<?php 
if (is_singular('product')) { ?> width:100% !important <?php } ?>">
			<div id="content" role="main" class="ab-inspiration-woocommerce-content">	<div class="entry-box ab-inspiration-woocommerce-entry">
	<?php  if ( $ab_woocommerce['items_number'] == '2')   $item_number = "2"; elseif ( $ab_woocommerce['items_number'] == '3') $item_number = "3"; elseif ( $ab_woocommerce['items_number'] == '4') $item_number = "4"; elseif ( $ab_woocommerce['items_number'] == '5') $item_number = "5"; else $item_number = "6"; ?>
	<div class="woocommerce columns-<?php echo $item_number; ?>">		
	<?php
	$args = array(
			'delimiter' => ' / ',
			
	);
 woocommerce_breadcrumb( $args ); 
 woocommerce_content(); ?>
	</div>
	</div>
			</div><!-- #content --> 
		</div><!-- #container -->
<?php 
if (!is_singular('product')) { 
global $ab_woocommerce;

if ( $ab_woocommerce['sidebar'] == '1') { get_sidebar('shop'); } else { echo ''; } } } else { echo 'Пожалуйста, загрузите и активируйте лицензию плагина AB-Inspiration Woocommerce'; } }  else { echo 'Пожалуйста, загрузите и активируйте плагин интеграции AB-Woocommerce'; } ?>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer();  ?>