<?php
/**
 * Functions
 *
 * @package AB-Inspiration
 * @subpackage AB-Inspiration
 * @since AB-Inspiration 1.0
 */
 

 
/**
 * Load theme updater functions.
 * Action is used so that child themes can easily disable.
 */

function INSPIRATION_theme_updater() {
    require( get_template_directory() . '/updater/theme-updater.php' );
}
add_action( 'after_setup_theme', 'INSPIRATION_theme_updater' );



if ( ! isset( $content_width ) )
	$content_width = 800;
add_action( 'after_setup_theme', 'inspiration_setup' );
if ( ! function_exists( 'inspiration_setup' ) ):

function inspiration_setup() {
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script' );
remove_action('admin_print_styles', 'print_emoji_styles' );
remove_action('admin_menu', 'twentyeleven_theme_options_add_page' );
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_shortlink_wp_head', 10);
remove_action( 'template_redirect', 'wp_shortlink_header', 11);

add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'gallery', 'caption' ) );
// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
load_theme_textdomain( 'inspiration', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	register_nav_menus( array(
		'primary' => __( 'Основное меню', 'inspiration' ),
		'headermenu' => __( 'Меню в шапке', 'inspiration' ),
		'floatmenu' =>  __( 'Плавающее меню', 'inspiration' ),
		'footer' => __( 'Меню в footer', 'inspiration' ),
		'footerlanding' => __( 'Меню на "Целевой Странице"', 'inspiration' ),
		'mobile' => __( 'Меню в мобильной версии', 'inspiration' )
		
		
	) );
	}

endif;

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

if ( ! function_exists( 'inspiration_admin_header_style' ) ) :

function inspiration_admin_header_style() {

?>

<style type="text/css">

/* Shows the same border as on front end */

#headimg {

	border-bottom: 1px solid #000;

	border-top: 4px solid #000;

}

/* If NO_HEADER_TEXT is false, you would style the text with these selectors:

	#headimg #name { }

	#headimg #desc { }

*/

</style>

<?php

}

endif;



// размер анонсов
class Excerpt {

  public static $length = 55;

  // So you can call: my_excerpt('short');
  public static $types = array(
      'otzyvy' => 27,
      'katalog' => 15,
      'short' => 8,
      'regular' => 55,
      'long' => 90,
      'desc' => 50,
      'post' => 40,
      'courses' => 4
    );

  
   public static $more = true;

    /**
    * Sets the length for the excerpt,
    * then it adds the WP filter
    * And automatically calls the_excerpt();
    *
    * @param string $new_length
    * @return void
    * @author Baylor Rae'
    */
    public static function length($new_length = 55, $more = true) {
        Excerpt::$length = $new_length;
        Excerpt::$more = $more;

        add_filter( 'excerpt_more', 'Excerpt::auto_excerpt_more' );

        add_filter('excerpt_length', 'Excerpt::new_length');

        Excerpt::output();
    }

    // Tells WP the new length
    public static function new_length() {
        if( isset(Excerpt::$types[Excerpt::$length]) )
            return Excerpt::$types[Excerpt::$length];
        else
            return Excerpt::$length;
    }

    // Echoes out the excerpt
    public static function output() {
        the_excerpt();
    }

    public static function continue_reading_link() {

        return '<p class="readmore"><a href="'.get_permalink().'">'. __( 'Читать далее', 'inspiration' ) .' </a></p>';
    }

    public static function auto_excerpt_more( ) {
        if (Excerpt::$more) :
            return ' &hellip;' . Excerpt::continue_reading_link();
        else :
            return ' &hellip;';
        endif;
    }

}

// An alias to the class
function my_excerpt($length = 55, $more=true) {
    Excerpt::length($length, $more);
}


function inspiration_filter_wp_title( $title, $separator ) {

	// Don't affect wp_title() calls in feeds.

	if ( is_feed() )

		return $title;
		

	global $paged, $page;
	if ( is_search() ) {

		// If we're a search, let's start over:

		$title = sprintf( __( 'Результат поиска по запросу - %s', 'inspiration' ), '"' . get_search_query() . '"' );

		// Add a page number if we're on page 2 or more:

		if ( $paged >= 2 )

			$title .= " $separator " . sprintf( __( 'Страница %s', 'inspiration' ), $paged );

		// Add the site name to the end:

		$title .= " $separator " . get_bloginfo( 'name', 'display' );

		// We're done. Let's send the new title back to wp_title():

		return $title;

	}

	// Otherwise, let's start by adding the site name to the end:

	$title .= get_bloginfo( 'name', 'display' );



	// If we have a site description and we're on the home/front page, add the description:

	$site_description = get_bloginfo( 'description', 'display' );

	if ( $site_description && ( is_home() || is_front_page() ) )

		$title .= " $separator " . $site_description;



	// Add a page number if necessary:

	if ( $paged >= 2 || $page >= 2 )

		$title .= " $separator " . sprintf( __( 'Страница %s', 'inspiration' ), max( $paged, $page ) );



	// Return the new title to wp_title():

	return $title;

}

//add_filter( 'wp_title', 'inspiration_filter_wp_title', 10, 2 );
function inspiration_page_menu_args( $args ) {

	$args['show_home'] = true;

	return $args;

}

add_filter( 'wp_page_menu_args', 'inspiration_page_menu_args' );

function inspiration_excerpt_length( $length ) {

	return 55;

}

add_filter( 'excerpt_length', 'inspiration_excerpt_length' );




function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function inspiration_remove_gallery_css( $css ) {

	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );

}

add_filter( 'gallery_style', 'inspiration_remove_gallery_css' );



if ( ! function_exists( 'inspiration_comment' ) ) :

function inspiration_comment( $comment, $args, $depth ) {

	

	?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

		<div id="comment-<?php comment_ID(); ?>">

		<div class="comment-author novcard">

			<?php echo get_avatar($comment,$size='60'); ?>

			<?php printf( __( '%s ', 'inspiration' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>

		</div><!-- .comment-author .vcard -->

		<?php if ( $comment->comment_approved == '0' ) : ?>

			<em><?php _e( 'Ваш комментарий ожидает проверки.', 'inspiration' ); ?></em>

			<br />

		<?php endif; ?>



		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" rel="nofollow"><?php printf( __( '%1$s', 'inspiration' ), get_comment_date() ); ?></a><?php edit_comment_link( __( '(Изменить)', 'inspiration' ), ' ' ); ?></div>
<div class="comment-body"> <?php comment_text(); ?></div>



		<div class="reply">

			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

		</div><!-- .reply -->

	</div><!-- #comment-##  -->





	<?php
}

endif;

function inspiration_widgets_init() {

	// Area 1, located at the top of the sidebar.
	
	
	register_sidebar( array(
		'name' => __( 'Боковая колонка', 'inspiration' ),
		'id' => 'basic-widget-area',
		'description' => __( 'Боковая колонка блога', 'inspiration' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>'
	) );
	
	

register_sidebar( array(
         'name' => __( 'Виджет в шапке', 'inspiration' ),
         'id' => 'hd-widget-area',
         'description' => __( 'Этот блок ТОЛЬКО для виджета 0 - AB - Виджет в шапке!!! Перетащите в этот блок виджет 0 - AB - Виджет в шапке.', 'inspiration' )) );
		
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );		
if ( is_plugin_active( 'ab-woocommerce/ab-woocommerce.php' ) ) {
	register_sidebar( array(
        'name' => __( 'Боковая колонка в магазине', 'inspiration' ),
        'id' => 'woocommenrce-shop',
        'description' => __( 'Этот блок ТОЛЬКО магазина WooCommerce.', 'inspiration' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>') );
}


if ( is_plugin_active( 'wp-courseware/wp-courseware.php' ) ) {
	register_sidebar( array(
        'name' => __( 'Боковая колонка на странице курса', 'inspiration' ),
        'id' => 'kurs-widget',
        'description' => __( 'Этот блок ТОЛЬКО плагина WP-CourseWare.', 'inspiration' ),
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>') );
}
		
		
		
		
		

register_sidebar( array(
'name' => __( 'Виджет в футер', 'inspiration' ),
'id' => 'first-footer-widget-area',
'description' => __( 'Перетащите в этот блок виджеты для нижней части блога', 'inspiration' ),'before_title' => '<div class="widget-title">',
'after_title' => '</div>') );

}

/** Register sidebars by running inspiration_widgets_init() on the widgets_init hook. */

add_action( 'widgets_init', 'inspiration_widgets_init' );

function inspiration_remove_recent_comments_style() {

	global $wp_widget_factory;

	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );


}

add_action( 'widgets_init', 'inspiration_remove_recent_comments_style' );




if ( ! function_exists( 'inspiration_posted_in' ) ) :

function inspiration_posted_in() { ?>

<div class="date-comments" style="margin-bottom:10px;">
<div class="meta-date" <?php if (function_exists('false_in_category'))  false_in_category(get_the_ID()); ?> <?php if (function_exists('ab_delete_false_in_category'))  ab_delete_false_in_category(get_the_ID()); ?> ><i class="fa fa-calendar-o" style="color:#888; padding-left:2px; padding-right:5px;  font-size:14px !important"></i>
	
<script language="javascript" type="text/javascript">document.write("<?php the_time('j F Y') ?>");</script>	</div> 
 <div class="meta-author">&nbsp; <i class="fa fa-user-o" style="color:#888;padding-right:5px;  font-size:14px !important"></i> <?php _e( 'Автор:', 'inspiration' ); ?> <span class="vcard author" itemprop="author">
<span class="fn"><?php the_author(); ?></span>
</span></div> 
 <div class="meta-comment"> &nbsp; <i class="fa fa-comments-o" style="color:#888;padding-right:5px; font-size:16px !important"></i><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></div>
 
 <div class="meta-comment view-counts" style="margin-left:10px;"> &nbsp; <i class="fa fa-eye" style="color:#888;padding-right:2px; font-size:16px !important"></i> <span style="vertical-align: top;"> <?php $key_1_value = get_post_meta( get_the_ID(), 'wpb_post_views_count', true );
// Check if the custom field has a value.
if ( ! empty( $key_1_value ) ) {
    echo $key_1_value;
}
?></span></div>
 
 
 </div>

<?php }

endif;

$functions_path = TEMPLATEPATH;
$styles_path = TEMPLATEPATH;


//Additional function
	require_once $functions_path . '/theme-functions.php';
	require_once $functions_path . '/theme-widgets.php';

	require_once $styles_path . '/custom-style.php';


if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
	require_once dirname( __FILE__ ) . '/admin/options-framework.php';
}

if (get_option('optionsframework' )){ }
else {
// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile, true); }

/* 
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>
<?php
}



/**
 * get a short/tiny url
 * @author: René Ade
 * @link: //www.rene-ade.de/inhalte/
php-code-zum-erstellen-einer-tinyurl-ueber-tinyurl-com-api.html
 */
if ( !function_exists('fb_gettinyurl') ) {
	function fb_gettinyurl( $url ) {

$fp = fopen( '//tinyurl.com/api-create.php?url=' . $url, 'r' );
		if ( $fp ) {
			$tinyurl = fgets( $fp );
			if( $tinyurl && !empty($tinyurl) )
				$url = $tinyurl;
			fclose( $fp );
		}

		return $url;
	}
}


//последние комментарии
function kama_recent_comments($limit=10, $ex=55, $cat=0, $echo=1, $gravatar=''){
global $wpdb;
if($cat){
$IN = (strpos($cat,'-')===false)?"IN ($cat)":"NOT IN (".str_replace('-','',$cat).")";
$join = "LEFT JOIN $wpdb->term_relationships rel ON (p.ID = rel.object_id)
LEFT JOIN $wpdb->term_taxonomy tax ON (rel.term_taxonomy_id = tax.term_taxonomy_id)";
$and = "AND tax.taxonomy = 'category'
AND tax.term_id $IN";
}
$sql = "SELECT comment_ID, comment_post_ID, comment_content, post_title, guid, comment_author, comment_author_email
FROM $wpdb->comments com
LEFT JOIN $wpdb->posts p ON (com.comment_post_ID = p.ID) {$join}
WHERE comment_approved = '1'
AND comment_type = '' {$and}
ORDER BY comment_date DESC
LIMIT $limit"; 
$results = $wpdb->get_results($sql);
$out = '';
foreach ($results as $comment){
if($gravatar)
$grava = '<img src="//www.gravatar.com/avatar/'. md5($comment->comment_author_email) .'" width="'. $gravatar .'" height="'. $gravatar.'" style="float:left; margin-right:10px; border:1px solid #ddd;">';
$comtext = strip_tags($comment->comment_content);
$leight = (int) iconv_strlen( $comtext, 'utf-8' );
if($leight > $ex) $comtext =  iconv_substr($comtext,0,$ex, 'UTF-8').' …';
$out .= "\n<li>$grava<b>".strip_tags($comment->comment_author). ": </b><a href='". get_comment_link($comment->comment_ID) ."' title='к записи: {$comment->post_title}'>{$comtext}</a></li>";
}
if ($echo) echo $out;
else return $out;
}
//end последние комментарии


	
add_action("admin_init", "post_admin_init");
add_action('save_post', 'post_save_details');
 
/**
 * Add the meta boxes to the admin UI
 */
function post_admin_init() {
$post_types = array( 'post', 'page_selling' );
foreach( $post_types as $post_type) {
	add_meta_box("post_extra", __( 'Исключение дополнительных блоков в статье', 'inspiration' ), "post_extra", $post_type, "side", "low");
}
}
 
/**
 * Callback function to echo the meta box to dictate the mask on the h2
 **/
function post_extra() {		
	global $post;
  	$custom = get_post_custom($post->ID);
  	
	$post_button_top = $custom["post_button_top"][0];
	$post_share_bottom = $custom["post_share_bottom"][0];
	$post_form = $custom["post_form"][0];
	$post_related = $custom["post_related"][0];
	
	
  	?>
  	<input type="checkbox" name="post_button_top" id="post_button_top" value="1" <?php if( $post_button_top == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Кнопки "Поделиться" в начале статьи', 'inspiration' ); ?><br>
  	
  	<input type="checkbox" name="post_share_bottom" id="post_share_bottom" value="1" <?php if( $post_share_bottom == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Кнопки "Поделиться" в конце статьи', 'inspiration' ); ?><br>
  	
  	<input type="checkbox" name="post_form" id="post_form" value="1" <?php if( $post_form == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Форма подписки в конце статьи', 'inspiration' ); ?><br>
  	
  	<input type="checkbox" name="post_related" id="post_related" value="1" <?php if( $post_related == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Блок "Похожие записи по рубрикам"', 'inspiration' ); ?><br>
  	

  	<?php
}
 
/**
 * Save the meta box details
 **/
function post_save_details() {
	global $post;		
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;	
		
		// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
		
		
	};
	
	

	update_post_meta($post->ID, "post_button_top", $_POST["post_button_top"]);
    update_post_meta($post->ID, "post_share_bottom", $_POST["post_share_bottom"]);
    update_post_meta($post->ID, "post_form", $_POST["post_form"]);
    update_post_meta($post->ID, "post_related", $_POST["post_related"]);

}


//facebook pixel posts


add_action("admin_init", "facebook_pixel_init");
add_action('save_post', 'facebook_pixel_details');
 
/**
 * Add the meta boxes to the admin UI
 */
function facebook_pixel_init() {
$post_types = array( 'post', 'page_selling' );
foreach( $post_types as $post_type) {
	add_meta_box("post_extra_facebook_pixel", __( 'Фейсбук пиксель', 'inspiration' ), "post_extra_facebook_pixel", $post_type, "normal", "low");
}
}
 
/**
 * Callback function to echo the meta box to dictate the mask on the h2
 **/
function post_extra_facebook_pixel($object) {		
	global $post;
  	$custom = get_post_custom($post->ID);
  	
	$ViewContent = $custom["ViewContent"][0];
	$Search = $custom["Search"][0];
	$AddToCart = $custom["AddToCart"][0];
	$AddToWishlist = $custom["AddToWishlist"][0];
	
	$InitiateCheckout = $custom["InitiateCheckout"][0];
	$AddPaymentInfo = $custom["AddPaymentInfo"][0];
	$Purchase = $custom["Purchase"][0];
	$Lead = $custom["Lead"][0];
	$CompleteRegistration = $custom["CompleteRegistration"][0];
	
  	?>
  	 <input type="checkbox" name="ViewContent" id="ViewContent" value="1" <?php if( $ViewContent == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Просмотре контента - ViewContent', 'inspiration' ); ?><br>
  	
  	 <input type="checkbox" name="Search" id="Search" value="1" <?php if( $Search == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Поиск - Search', 'inspiration' ); ?><br>
  	
 	<input type="checkbox" name="AddToCart" id="AddToCart" value="1" <?php if( $AddToCart == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Добавить в корзину - AddToCart', 'inspiration' ); ?><br>
  
 <input type="checkbox" name="InitiateCheckout" id="InitiateCheckout" value="1" <?php if( $InitiateCheckout == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Страница Чекаут - InitiateCheckout', 'inspiration' ); ?><br>
  		
  			<input type="checkbox" name="AddPaymentInfo" id="AddPaymentInfo" value="1" <?php if( $AddPaymentInfo == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'AddPaymentInfo', 'inspiration' ); ?><br>
  			
  				<input type="checkbox" name="Purchase" id="Purchase" value="1" <?php if( $Purchase == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Покупка - Purchase', 'inspiration' ); ?><br>
  				
  				
  				
  				<input type="checkbox" name="Lead" id="Lead" value="1" <?php if( $Lead == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Лид - Lead', 'inspiration' ); ?><br>
  				
  				<input type="checkbox" name="CompleteRegistration" id="CompleteRegistration" value="1" <?php if( $CompleteRegistration == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Завершенная регистрация - CompleteRegistration', 'inspiration' ); ?>
  	
  	
  	

  	
  	
  	<?php
}
 
/**
 * Save the meta box details
 **/
function facebook_pixel_details($post_id) {
	global $post;
	if( !is_object($post) ) 
        return;		
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;	
		
		// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
		
		
	};
	
	
    update_post_meta($post->ID, "ViewContent", $_POST["ViewContent"]);
    update_post_meta($post->ID, "Search", $_POST["Search"]);
    update_post_meta($post->ID, "AddToCart", $_POST["AddToCart"]);
    update_post_meta($post->ID, "AddToWishlist", $_POST["AddToWishlist"]);
    
    update_post_meta($post->ID, "InitiateCheckout", $_POST["InitiateCheckout"]);
    update_post_meta($post->ID, "AddPaymentInfo", $_POST["AddPaymentInfo"]);
    update_post_meta($post->ID, "Purchase", $_POST["Purchase"]);
    update_post_meta($post->ID, "Lead", $_POST["Lead"]);
    update_post_meta($post->ID, "CompleteRegistration", $_POST["CompleteRegistration"]);
    
	

}


//end facebook pixel posts


//facebook pixel pages


add_action("admin_init", "page_facebook_pixel_init");
add_action('save_post', 'page_facebook_pixel_details');
 
/**
 * Add the meta boxes to the admin UI
 */
function page_facebook_pixel_init() {
$post_types = array( 'page' );
foreach( $post_types as $post_type) {
	add_meta_box("page_extra_facebook_pixel", __( 'Фейсбук пиксель', 'inspiration' ), "page_extra_facebook_pixel", $post_type, "normal", "low");
}
}
 
/**
 * Callback function to echo the meta box to dictate the mask on the h2
 **/
function page_extra_facebook_pixel($object) {		
	global $post;
  	$custom = get_post_custom($post->ID);
  	
	$ViewContent = $custom["ViewContent"][0];
	$Search = $custom["Search"][0];
	$AddToCart = $custom["AddToCart"][0];
	$AddToWishlist = $custom["AddToWishlist"][0];
	
	$InitiateCheckout = $custom["InitiateCheckout"][0];
	$AddPaymentInfo = $custom["AddPaymentInfo"][0];
	$Purchase = $custom["Purchase"][0];
	$Lead = $custom["Lead"][0];
	$CompleteRegistration = $custom["CompleteRegistration"][0];
	
  	?>
  	 <input type="checkbox" name="ViewContent" id="ViewContent" value="1" <?php if( $ViewContent == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Просмотре контента - ViewContent', 'inspiration' ); ?><br>
  	
  	 <input type="checkbox" name="Search" id="Search" value="1" <?php if( $Search == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Поиск - Search', 'inspiration' ); ?><br>
  	
 	<input type="checkbox" name="AddToCart" id="AddToCart" value="1" <?php if( $AddToCart == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Добавить в корзину - AddToCart', 'inspiration' ); ?><br>
  
 <input type="checkbox" name="InitiateCheckout" id="InitiateCheckout" value="1" <?php if( $InitiateCheckout == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Страница Чекаут - InitiateCheckout', 'inspiration' ); ?><br>
  		
  			<input type="checkbox" name="AddPaymentInfo" id="AddPaymentInfo" value="1" <?php if( $AddPaymentInfo == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'AddPaymentInfo', 'inspiration' ); ?><br>
  			
  				<input type="checkbox" name="Purchase" id="Purchase" value="1" <?php if( $Purchase == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Покупка - Purchase', 'inspiration' ); ?><br>
  				
  				
  				
  				<input type="checkbox" name="Lead" id="Lead" value="1" <?php if( $Lead == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Лид - Lead', 'inspiration' ); ?><br>
  				
  				<input type="checkbox" name="CompleteRegistration" id="CompleteRegistration" value="1" <?php if( $CompleteRegistration == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Завершенная регистрация - CompleteRegistration', 'inspiration' ); ?>
  	
  	
  	

  	
  	
  	<?php
}
 
/**
 * Save the meta box details
 **/
function page_facebook_pixel_details() {
	global $post;
	if( !is_object($post) ) 
        return;		
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;	
		
		// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
		
		
	};
	
	
    update_post_meta($post->ID, "ViewContent", $_POST["ViewContent"]);
    update_post_meta($post->ID, "Search", $_POST["Search"]);
    update_post_meta($post->ID, "AddToCart", $_POST["AddToCart"]);
    update_post_meta($post->ID, "AddToWishlist", $_POST["AddToWishlist"]);
    
    update_post_meta($post->ID, "InitiateCheckout", $_POST["InitiateCheckout"]);
    update_post_meta($post->ID, "AddPaymentInfo", $_POST["AddPaymentInfo"]);
    update_post_meta($post->ID, "Purchase", $_POST["Purchase"]);
    update_post_meta($post->ID, "Lead", $_POST["Lead"]);
    update_post_meta($post->ID, "CompleteRegistration", $_POST["CompleteRegistration"]);
    
	

}


//end facebook pixel pages


add_action("admin_init", "page_admin_init");
add_action('save_post', 'page_save_details');

function page_admin_init() {
$post_types = array( 'page');
foreach( $post_types as $post_type) {
	add_meta_box("page_extra", __( 'Исключение дополнительных блоков на странице', 'inspiration' ), "page_extra", $post_type, "side", "low");
}
}
 
/**
 * Callback function to echo the meta box to dictate the mask on the h2
 **/
function page_extra() {		
	global $post;
	if( !is_object($post) ) 
        return;	
  	$custom = get_post_custom($post->ID);
  	$post_button_top = $custom["post_button_top"][0];
	$post_share_bottom = $custom["post_share_bottom"][0];
	
  	?>
  	<input type="checkbox" name="post_button_top" id="post_button_top" value="1" <?php if( $post_button_top == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Кнопки "Поделиться" в начале страницы', 'inspiration' ); ?><br>
  	
  	<input type="checkbox" name="post_share_bottom" id="post_share_bottom" value="1" <?php if( $post_share_bottom == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Кнопки "Поделиться" в конце страницы', 'inspiration' ); ?><br>

  	
  	
  	<?php
}

function page_save_details() {
	global $post;
	if( !is_object($post) ) 
        return;			
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;	
		
		// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
		
		
	};
	update_post_meta($post->ID, "post_button_top", $_POST["post_button_top"]);
    update_post_meta($post->ID, "post_share_bottom", $_POST["post_share_bottom"]);

}

// Био автора начало

function autor_bio() {

?>

<div class="author-info" style="display: table;width: 100%;">
	
	<div class="author-avatar" style="float:left; margin-right:30px;">
		<?php
		/**
		 * Filter the author bio avatar size.
		 *
		 * @since Twenty Fifteen 1.0
		 *
		 * @param int $size The avatar height and width size in pixels.
		 */
		$author_bio_avatar_size = apply_filters( 'twentyfifteen_author_bio_avatar_size', 56 );
		$args = array(
   'class' => 'avatar-autor-block'
 );

		echo get_avatar( get_the_author_meta( 'user_email' ), 130, null, null, $args );
		?>
	</div><!-- .author-avatar -->

	<div class="author-description" style="float:left">
		<h3 class="author-title"><?php echo get_the_author(); ?></h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
			
		</p><!-- .author-bio -->

	</div><!-- .author-description -->
</div><!-- .author-info -->
<?php } 
	
	
	add_action( 'add_meta_boxes', 'sitemap_exclude_page' );
function sitemap_exclude_page()
{                                      // --- Parameters: ---
    add_meta_box( 'sitemap-meta-box-id', // ID attribute of metabox
                  __( 'Исключить из карты сайта ', 'inspiration' ),       // Title of metabox visible to user
                  'meta_box_callback', // Function that prints box in wp-admin
                  'page',              // Show box for posts, pages, custom, etc.
                  'normal',            // Where on the page to show the box
                  'high' );            // Priority of box in display order
}

function meta_box_callback( $post )
{
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['sitemap_exclude_page'] ) ? $values['sitemap_exclude_page'][0] : '';

    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    <p>
        
        <input type="checkbox" name="sitemap_exclude_page" id="sitemap_exclude_page" value="1" <?php if( $selected == 1 ) { ?>checked="checked"<?php } ?> /> <?php _e( 'Исключить страницу из карты сайта', 'inspiration' ); ?><br>
        
        
      
    </p>

    <?php   
}



add_action( 'save_post', 'sitemap_exclude_page_save' );
function sitemap_exclude_page_save( $post_id ) {
global $post;
if( !is_object($post) ) 
        return;	
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;	
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
		};
		

        // Probably a good idea to make sure your data is set


        update_post_meta( $post_id, 'sitemap_exclude_page', $_POST['sitemap_exclude_page'] );

}
  
  //конец мета бокса


function ispireme_fix_category_tag ($ispireme_cat_output) {
$ispireme_cat_output = str_replace(array('rel="category tag"','rel="category"'),'', $ispireme_cat_output);

return $ispireme_cat_output;
}
add_filter( 'the_category', 'ispireme_fix_category_tag' );


function mycustom_embed_defaults($embed_size){
    $embed_size['width'] = 640;
    $embed_size['height'] = 500;
    return $embed_size; 
}
add_filter('embed_defaults', 'mycustom_embed_defaults');

/*  Add responsive container to embeds
/* ------------------------------------ */ 
function inspiration_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'inspiration_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'inspiration_embed_html' ); // Jetpack




function add_dashboard_widget()
{
    wp_add_dashboard_widget("rss-feed", "Новости AB-Inspiration", "display_rss_dashboard_widget");
}

function display_rss_dashboard_widget()
{

	include_once( ABSPATH . WPINC . "/feed.php");

	$rss = fetch_feed("https://anfisabreus.ru/category/shablon-ab-inspiration-dlya-wordpress/feed");
    $maxitems = $rss->get_item_quantity(9); 
    $rss_items = $rss->get_items(0, $maxitems);
	
	?>

	<ul>
		<?php
			if($maxitems == 0)
			{
				echo "<li>No items</li>";
			}
			else
			{
				foreach($rss_items as $item)
				{
					?>
						<li>
			                <a href="<?php echo esc_url($item->get_permalink()); ?>" target="_blank" style="font-size:14px">
			                    <?php echo esc_html($item->get_title()); ?>
			                </a>
			               <?php echo $item->get_date('j.m.Y'); ?>
			            </li>
					<?php
				}
			}
		?>
	</ul>

	<?php
}

add_action("wp_dashboard_setup", "add_dashboard_widget");





class EDD_Theme_Updater_Admin {
	

	/**
	 * Variables required for the theme updater
	 *
	 * @since 1.0.0
	 * @type string
	 */
	 protected $remote_api_url = null;
	 protected $theme_slug = null;
	 protected $version = null;
	 protected $author = null;
	 protected $download_id = null;
	 protected $renew_url = null;
	 protected $strings = null;

	/**
	 * Initialize the class.
	 *
	 * @since 1.0.0
	 */
	function __construct( $config = array(), $strings = array() ) {
		
		$license = trim( get_option( 'edd_inspiration_theme_license_key' ) );

		$config = wp_parse_args( $config, array(
			'remote_api_url' => 'https://ab-inspiration.com',

			'item_name' => 'AB Inspiration',
			'license' => $license,
			'version' => '8.65',
			'author' => 'Anfisa Breus',
			'download_id' => '',
			'renew_url' => '',
			'beta' => false,
		) );

		/**
		 * Fires after the theme $config is setup.
		 *
		 * @since x.x.x
		 *
		 * @param array $config Array of EDD SL theme data.
		 */
		do_action( 'post_edd_sl_theme_updater_setup', $config );

		// Set config arguments
		$this->remote_api_url = $config['remote_api_url'];
		$this->item_name = $config['item_name'];
		$this->theme_slug = sanitize_key( $config['theme_slug'] );
		$this->version = $config['version'];
		$this->author = $config['author'];
		$this->download_id = $config['download_id'];
		$this->renew_url = $config['renew_url'];
		$this->beta = $config['beta'];

		// Populate version fallback
		if ( '' == $config['version'] ) {
			$theme = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}

		// Strings passed in from the updater config
		$this->strings = $strings;

		add_action( 'init', array( $this, 'updater' ) );
		add_action( 'admin_init', array( $this, 'register_option' ) );
		add_action( 'admin_init', array( $this, 'license_action' ) );
		add_action( 'admin_menu', array( $this, 'license_menu' ) );
		add_action( 'update_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 10, 2 );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );

	}

	/**
	 * Creates the updater class.
	 *
	 * since 1.0.0
	 */
	function updater() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		/* If there is no valid license key status, don't allow updates. */
		if ( get_option( $this->theme_slug . '_license_key_status', false) != 'valid' ) {
			return;
		}

		if ( !class_exists( 'EDD_Theme_Updater' ) ) {
			// Load our custom theme updater
			include( dirname( __FILE__ ) . '/updater/theme-updater-class.php' );
		}

		new EDD_Theme_Updater(
			array(
				'remote_api_url' 	=> $this->remote_api_url,
				'version' 			=> $this->version,
				'license' 			=> trim( get_option( $this->theme_slug . '_license_key' ) ),
				'item_name' 		=> $this->item_name,
				'author'			=> $this->author,
				'beta'              => $this->beta
			),
			$this->strings
		);
	}

	/**
	 * Adds a menu item for the theme license under the appearance menu.
	 *
	 * since 1.0.0
	 */
	function license_menu() {

		$strings = $this->strings;

		add_theme_page(
			$strings['theme-license'],
			$strings['theme-license'],
			'manage_options',
			$this->theme_slug . '-license',
			array( $this, 'license_page' )
		);
	}

	/**
	 * Outputs the markup used on the theme license page.
	 *
	 * since 1.0.0
	 */
	function license_page() {

		$strings = $this->strings;

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$status = get_option( $this->theme_slug . '_license_key_status', false );

		// Checks license status to display under license key
		if ( ! $license ) {
			$message    = $strings['enter-key'];
		} else {
			// delete_transient( $this->theme_slug . '_license_message' );
			if ( ! get_transient( $this->theme_slug . '_license_message', false ) ) {
				set_transient( $this->theme_slug . '_license_message', $this->check_license(), ( 60 * 60 * 24 ) );
			}
			$message = get_transient( $this->theme_slug . '_license_message' );
		}
		?>
		<div class="wrap">
			<h2><?php echo $strings['theme-license'] ?></h2>
			<form method="post" action="options.php">

				<?php settings_fields( $this->theme_slug . '-license' ); ?>

				<table class="form-table">
					<tbody>

						<tr valign="top">
							<th scope="row" valign="top">
								<?php echo $strings['license-key']; ?>
							</th>
							<td>
								<input id="<?php echo $this->theme_slug; ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key" type="text" class="regular-text" value="<?php echo esc_attr( $license ); ?>" />
								<p class="description">
									<?php echo $message; ?>
								</p>
							</td>
						</tr>

						<?php if ( $license ) { ?>
						<tr valign="top">
							<th scope="row" valign="top">
								<?php echo $strings['license-action']; ?>
							</th>
							<td>
								<?php
								wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' );
								if ( 'valid' == $status ) { ?>
									<input type="submit" class="button-secondary" name="<?php echo $this->theme_slug; ?>_license_deactivate" value="<?php esc_attr_e( $strings['deactivate-license'] ); ?>"/>
								<?php } else { ?>
									<input type="submit" class="button-secondary" name="<?php echo $this->theme_slug; ?>_license_activate" value="<?php esc_attr_e( $strings['activate-license'] ); ?>"/>
								<?php }
								?>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
				<?php submit_button(); ?>
			</form>
		<?php
	}

	/**
	 * Registers the option used to store the license key in the options table.
	 *
	 * since 1.0.0
	 */
	function register_option() {
		register_setting(
			$this->theme_slug . '-license',
			$this->theme_slug . '_license_key',
			array( $this, 'sanitize_license' )
		);
	}

	/**
	 * Sanitizes the license key.
	 *
	 * since 1.0.0
	 *
	 * @param string $new License key that was submitted.
	 * @return string $new Sanitized license key.
	 */
	function sanitize_license( $new ) {

		$old = get_option( $this->theme_slug . '_license_key' );

		if ( $old && $old != $new ) {
			// New license has been entered, so must reactivate
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		return $new;
	}

	/**
	 * Makes a call to the API.
	 *
	 * @since 1.0.0
	 *
	 * @param array $api_params to be used for wp_remote_get.
	 * @return array $response decoded JSON response.
	 */
	 function get_api_response( $api_params ) {

		// Call the custom API.
		$verify_ssl = (bool) apply_filters( 'edd_sl_api_request_verify_ssl', true );
		$response   = wp_remote_post( $this->remote_api_url, array( 'timeout' => 15, 'sslverify' => $verify_ssl, 'body' => $api_params ) );

		return $response;
	 }

	/**
	 * Activates the license key.
	 *
	 * @since 1.0.0
	 */
	function activate_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url()
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch( $license_data->error ) {

					case 'expired' :

						$message = sprintf(
							__( 'Your license key expired on %s.' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'disabled':
					case 'revoked' :

						$message = __( 'Your license key has been disabled.' );
						break;

					case 'missing' :

						$message = __( 'Invalid license.' );
						break;

					case 'invalid' :
					case 'site_inactive' :

						$message = __( 'Your license is not active for this URL.' );
						break;

					case 'item_name_mismatch' :

						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), $this->item_name );
						break;

					case 'no_activations_left':

						$message = __( 'Your license key has reached its activation limit.' );
						break;

					default :

						$message = __( 'An error occurred, please try again.' );
						break;
				}

				if ( ! empty( $message ) ) {
					$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
					$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

					wp_redirect( $redirect );
					exit();
				}

			}

		}

		// $response->license will be either "active" or "inactive"
		if ( $license_data && isset( $license_data->license ) ) {
			update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '-license' ) );
		exit();

	}

	/**
	 * Deactivates the license key.
	 *
	 * @since 1.0.0
	 */
	function deactivate_license() {

		// Retrieve the license from the database.
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		// Data to send in our API request.
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url()
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// $license_data->license will be either "deactivated" or "failed"
			if ( $license_data && ( $license_data->license == 'deactivated' ) ) {
				delete_option( $this->theme_slug . '_license_key_status' );
				delete_transient( $this->theme_slug . '_license_message' );
			}

		}

		if ( ! empty( $message ) ) {
			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		wp_redirect( admin_url( 'themes.php?page=' . $this->theme_slug . '-license' ) );
		exit();

	}

	/**
	 * Constructs a renewal link
	 *
	 * @since 1.0.0
	 */
	function get_renewal_link() {

		// If a renewal link was passed in the config, use that
		if ( '' != $this->renew_url ) {
			return $this->renew_url;
		}

		// If download_id was passed in the config, a renewal link can be constructed
		$license_key = trim( get_option( $this->theme_slug . '_license_key', false ) );
		if ( '' != $this->download_id && $license_key ) {
			$url = esc_url( $this->remote_api_url );
			$url .= '/checkout/?edd_license_key=' . $license_key . '&download_id=' . $this->download_id;
			return $url;
		}

		// Otherwise return the remote_api_url
		return $this->remote_api_url;

	}



	/**
	 * Checks if a license action was submitted.
	 *
	 * @since 1.0.0
	 */
	function license_action() {

		if ( isset( $_POST[ $this->theme_slug . '_license_activate' ] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->activate_license();
			}
		}

		if ( isset( $_POST[$this->theme_slug . '_license_deactivate'] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->deactivate_license();
			}
		}

	}

	/**
	 * Checks if license is valid and gets expire date.
	 *
	 * @since 1.0.0
	 *
	 * @return string $message License status message.
	 */
	function check_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;

		$api_params = array(
			'edd_action' => 'check_license',
			'license'    => $license,
			'item_name'  => urlencode( $this->item_name ),
			'url'        => home_url()
		);

		$response = $this->get_api_response( $api_params );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = $strings['license-status-unknown'];
			}

			$base_url = admin_url( 'themes.php?page=' . $this->theme_slug . '-license' );
			$redirect = add_query_arg( array( 'sl_theme_activation' => 'false', 'message' => urlencode( $message ) ), $base_url );

			wp_redirect( $redirect );
			exit();

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			// If response doesn't include license data, return
			if ( !isset( $license_data->license ) ) {
				$message = $strings['license-status-unknown'];
				return $message;
			}

			// We need to update the license status at the same time the message is updated
			if ( $license_data && isset( $license_data->license ) ) {
				update_option( $this->theme_slug . '_license_key_status', $license_data->license );
			}

			// Get expire date
			$expires = false;
			if ( isset( $license_data->expires ) && 'lifetime' != $license_data->expires ) {
				$expires = date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) );
				$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
			} elseif ( isset( $license_data->expires ) && 'lifetime' == $license_data->expires ) {
				$expires = 'lifetime';
			}

			// Get site counts
			$site_count = $license_data->site_count;
			$license_limit = $license_data->license_limit;

			// If unlimited
			if ( 0 == $license_limit ) {
				$license_limit = $strings['unlimited'];
			}

			if ( $license_data->license == 'valid' ) {
				$message = $strings['license-key-is-active'] . ' ';
				if ( isset( $expires ) && 'lifetime' != $expires ) {
					$message .= sprintf( $strings['expires%s'], $expires ) . ' ';
				}
				if ( isset( $expires ) && 'lifetime' == $expires ) {
					$message .= $strings['expires-never'];
				}
				if ( $site_count && $license_limit ) {
					$message .= sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
				}
			} else if ( $license_data->license == 'expired' ) {
				if ( $expires ) {
					$message = sprintf( $strings['license-key-expired-%s'], $expires );
				} else {
					$message = $strings['license-key-expired'];
				}
				if ( $renew_link ) {
					$message .= ' ' . $renew_link;
				}
			} else if ( $license_data->license == 'invalid' ) {
				$message = $strings['license-keys-do-not-match'];
			} else if ( $license_data->license == 'inactive' ) {
				$message = $strings['license-is-inactive'];
			} else if ( $license_data->license == 'disabled' ) {
				$message = $strings['license-key-is-disabled'];
			} else if ( $license_data->license == 'site_inactive' ) {
				// Site is inactive
				$message = $strings['site-is-inactive'];
			} else {
				$message = $strings['license-status-unknown'];
			}

		}

		return $message;
	}

	/**
	 * Disable requests to wp.org repository for this theme.
	 *
	 * @since 1.0.0
	 */
	function disable_wporg_request( $r, $url ) {

		// If it's not a theme update request, bail.
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
 			return $r;
 		}

 		// Decode the JSON response
 		$themes = json_decode( $r['body']['themes'] );

 		// Remove the active parent and child themes from the check
 		$parent = get_option( 'template' );
 		$child = get_option( 'stylesheet' );
 		unset( $themes->themes->$parent );
 		unset( $themes->themes->$child );

 		// Encode the updated JSON response
 		$r['body']['themes'] = json_encode( $themes );

 		return $r;
	}

}

/**
 * This is a means of catching errors from the activation method above and displyaing it to the customer
 */
function edd_sample_theme_admin_notices() {
	if ( isset( $_GET['sl_theme_activation'] ) && ! empty( $_GET['message'] ) ) {

		switch( $_GET['sl_theme_activation'] ) {

			case 'false':
				$message = urldecode( $_GET['message'] );
				?>
				<div class="error">
					<p><?php echo $message; ?></p>
				</div>
				<?php
				break;

			case 'true':
			default:

				break;

		}
	}
}
add_action( 'admin_notices', 'edd_sample_theme_admin_notices' );



add_filter('aioseop_prev_link', '__return_empty_string' );
add_filter('aioseop_next_link', '__return_empty_string' );

function hex2rgba($color, $opacity = false) {

	$default = '';

	//Return default if no color provided
	if(empty($color))
          return $default; 

	//Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

add_filter('aioseop_prev_link', '__return_empty_string' );
add_filter('aioseop_next_link', '__return_empty_string' );

class CSS_Menu_Maker_Walker extends Walker {

  var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
  
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul>\n";
  }
  
  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }
  
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = ''; 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    /* Add active class */
    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'active';
      unset($classes['current-menu-item']);
    }
    
    /* Check for children */
    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = 'has-sub';
    }
    
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'><span>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;
    
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
  
  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}


function style_ab_catalog()  {
global $homepage;
 if ( of_get_option('share_skin') == '1')   $skin = "classic"; elseif ( of_get_option('share_skin') == '2') $skin = "flat"; else $skin = "birman";
wp_enqueue_style( 'ab-complete-styles', get_template_directory_uri() . '/inc/css/bootstrap.min.css', array(), null, 'all' );
wp_enqueue_style( 'ab-complete-styles', get_template_directory_uri() . '/inc/css/fontawesome-all.css', array(), null, 'all' );

wp_enqueue_style( 'ab-complete-style', get_stylesheet_uri() );

if (!is_page_template('enterpage.php')) {
wp_enqueue_style( 'social-likes', get_template_directory_uri() . '/inc/css/social-likes_'.  $skin .'.css', array(), null, 'all' );
}



if (is_singular('catalog')) {
wp_enqueue_style( 'flexslider-css', get_template_directory_uri() . '/inc/css/flexslider.css', array(), null, 'all' );
}
}

add_action( 'wp_enqueue_scripts', 'style_ab_catalog', 10 );


function script_ab_catalog()  {
if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );

wp_enqueue_script( 'jquery-ui-core' );
wp_enqueue_script( 'jquery-ui-tabs' );
wp_enqueue_script( 'custom', get_template_directory_uri() . '/inc/js/custom.js', array('jquery'), null, true );
wp_enqueue_script( 'ab-complete-js', get_template_directory_uri() . '/inc/js/bootstrap.bundle.min.js', array('jquery'), null, true );
wp_enqueue_script('cycle', get_template_directory_uri() . '/inc/wpform/js/jquery.cycle2.js', array('jquery'), null, true);
wp_enqueue_script('cycle-easing', get_template_directory_uri() . '/inc/wpform/js/jquery.easing.1.3.js', array('jquery'), null, true);	
wp_enqueue_script('social-likes-js', get_template_directory_uri() . '/inc/js/social-likes.min.js', array('jquery'), null, true);			
wp_enqueue_script( 'cube-js', get_template_directory_uri() . '/inc/js/cubeportfolio/js/jquery.cubeportfolio.min.js', array('jquery'), null, true );
wp_enqueue_script('fonts', get_template_directory_uri() . '/inc/wpform/js/form-script.js', array('jquery'), null, true);


if (is_page_template('sitemap.php')) {
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-accordion' );
	wp_enqueue_style( 'style-accordion',  '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
wp_enqueue_script( 'sitemap', get_template_directory_uri() . '/inc/js/sitemap.js', array('jquery'), null, true );   
	
}



if (is_page_template('blog-page.php')) {


	
}
    
} 
add_action( 'wp_enqueue_scripts', 'script_ab_catalog' );


function custom_theme_js() {
	wp_register_script(
		'infinite_scroll',
		get_template_directory_uri() . '/inc/js/infinite-scroll.js',
		array('jquery'),
		null,
		true
	);

	
		wp_enqueue_script( 'infinite_scroll' );
	
}
add_action( 'wp_enqueue_scripts', 'custom_theme_js' );



add_image_size( 'gallery2', 320, 320, true );         
         
         //* Add new image sizes to post or page editor
add_filter( 'image_size_names_choose', 'mytheme_image_sizes' );
function mytheme_image_sizes( $sizes ) {
$mythemesizes = array(
'gallery2' 		=> __( 'Фото для галереи', 'inspiration' ), 
    );
    $sizes = array_merge( $sizes, $mythemesizes );
    return $sizes;
}


if (is_page_template('testimonials.php') || is_page_template('contact.php') || is_page_template('template-catalogv.php')){
	remove_filter('the_content', 'float_buttons');
}

add_filter('wp_list_categories', 'cat_count_span_inline');
function cat_count_span_inline($output) {
$output = str_replace('</a> (','<span style="float:right;"> (',$output);
$output = str_replace(')',')</span></a> ',$output);
return $output;
}

add_filter( 'wp_mail_from_name', 'custom_wp_mail_from_name' );

function custom_wp_mail_from_name($nameabinspiration){
    if($nameabinspiration === "WordPress")
        return __( 'Сообщение с контактной формы', 'inspiration' );
    else
        return $nameabinspiration;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
function add_defer_attribute($tag, $handle) {
    if ( 'custom' !== $handle  && 'cycle' !== $handle   && 'cycle-easing' !== $handle && 'social-likes-js' !== $handle && 'ab-complete-js' !== $handle && 'fonts' !== $handle  )
        return $tag;
    return str_replace( ' src', ' defer="defer" src', $tag );
}


//Navigation
require get_template_directory() . '/inc/js/bootstrap-walker.php';

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_action('init', 'stop_heartbeat', 1);
function stop_heartbeat() {
 wp_deregister_script('heartbeat');
 }
 
 add_filter('widget_text', 'do_shortcode');
 
 
 function homepage_background() {
?>
<div id="homepage">
<div style="background: <?php echo of_get_option('homepage_fon_opacity_color'); ?>;
    opacity: <?php echo of_get_option('homepage_fon_opacity'); ?> ; 
    position: absolute;
    z-index: 1;
    text-align: center;
    margin: 0%; height:100%; width:100%"></div>
<?php $background = of_get_option('homepage_body_background'); 
if (of_get_option('homepage_videomp4') == 0) {}
	
elseif (of_get_option('homepage_videomp4') == 1) {
?>

	
<video preload autoplay loop muted poster="<?php if ($background) { if ($background['image']) {
echo $background['image']; } }?>" style="width:100% !important;   
z-index:-100;" class="videoform-mobile">

<source src="<?php echo of_get_option('homepage_videofon_mp4', 'no entry' ); ?>" type="video/mp4">
<source src="<?php echo of_get_option('homepage_videofon_webm', 'no entry' ); ?>" type="video/webm">
</video>
<?php } else { ?>


<div style="position: relative;
	padding-bottom: 56.25%;
	height: 0;">
	
	
 <!-- 1. The <div> tag will contain the <iframe> (and video player) -->
    <div id="videobgyoutube"></div>
<script>      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');
      tag.src = "//www.youtube.com/player_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubePlayerAPIReady() {
        player = new YT.Player('videobgyoutube', {
        height: '100%',
      width: '100%',
          playerVars: { 'autoplay': 1, 'controls': 0,'autohide':1, 'modestbranding': 1, 'loop': 1, 'playlist': '<?php echo of_get_option("homepage_videofon_youtube", "no entry" ); ?>', 'showinfo': 0, 'iv_load_policy': 3, 'version': 3, 'rel': 0},
          videoId: '<?php echo of_get_option('homepage_videofon_youtube', 'no entry' ); ?>',
          events: {
            'onReady': onPlayerReady
            }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.mute();
      }
</script>
  
 
</div>

<?php }  ?>
</div>



<?php }



function rel_next_prev(){
    global $paged;

    if ( get_previous_posts_link() ) { ?>
        <link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>" /><?php
    }

    if ( get_next_posts_link() ) { ?>
        <link rel="next" href="<?php echo get_pagenum_link( $paged +1 ); ?>" /><?php
    }

}
add_action( 'wp_head', 'rel_next_prev' );


function header_css_style() { 
global $ab_woocommerce;

echo ('<style type="text/css">'); 
if (is_page_template('template-homepage.php'))  
{ 
echo ('#content-main { padding:0 20px !important; -moz-border-radius:'. $ab_woocommerce['homepage_border_round'].'px !important; -webkit-border-radius:'. $ab_woocommerce['homepage_border_round'].'px !important; border-radius:'. $ab_woocommerce['homepage_border_round'].'px !important;'); 
if ($ab_woocommerce['homepage_border'] == 1) { echo ('border:1px solid '. $ab_woocommerce['homepage_border_color'].' !important;'); } 
else { echo ('border:none !important; '); } echo ('overflow:hidden;margin-top: '. $ab_woocommerce['margin_top'].'px !important; margin-bottom: '. $ab_woocommerce['margin_bottom'].'px !important; 

');
if (of_get_option('wrapper_width') == '1') { echo 'width: '. $ab_woocommerce['homepage_width'].'!important';} 
if (of_get_option('wrapper_width') == '0') { echo 'width: 100% !important;';} echo ('}







#main {width: 100% !important;margin: 0 auto !important;padding-top: 0px !important;}'); }  else { echo ('#content-main { -moz-border-radius:3px;}');} 
if (is_page_template('template-homepage.php') && of_get_option('layout') == '2') {  echo '#content-main {padding: 0px 25px !important;  } .abinspiration-product-form-input {padding-left:15px}';}


if (is_page_template('template-homepage.php') && of_get_option('layout') == '1') {  $css .= '#main {width:100% !important;  }';}

if (is_page_template( 'onecolumn-page.php' )) { 
echo '#content img, #content .attachment img {max-width: 100%;  height: auto;}';} elseif (is_page_template( 'landing.php' )) { 
echo '#content img, #content .attachment img {max-width: 900px;  height: auto;}';} else { 
echo '#content img, #content .attachment img {max-width: 100%;  height: auto;}';} 

if (is_page_template( 'enterpage.php' )) { 
echo '#homepage {position:absolute; margin-left: auto;margin-right: auto;left: 0;right: 0; height:100%; '; 
if (of_get_option('wrapper_width') == '1') { echo 'width: 100% !important;';} 
if (of_get_option('wrapper_width') == '0') { echo 'width: 1200px;';} 
$background = of_get_option('homepage_body_background'); 
if ($background) { if ($background['image']) {
echo 'background:url('.$background['image']. ') '.$background['repeat']. ' '.$background['position']. ' '.$background['attachment']. ' '.$background['color']. ' !important;'; } elseif ($background['color'] == !'')  { 
echo 'background:'.$background['color']. '!important;'; } else {echo '';} } else { echo 'no entry'; };  
echo 'background-size: '. of_get_option('homepage_background_size').'!important;}'; }

echo ('</style>');



} 

add_action( 'wp_head', 'header_css_style' );

 function prefix_reset_cache_ell_new() {
    update_option( 'prefix-has-cached-new', false );
}
// update your classes/framework.class.php because this filter i added now.
add_action( 'optionsframework_option_name', 'prefix_reset_cache_ell_new' ); 

function remove_more_link_scroll( $link ) {
$link = preg_replace( '|#more-[0-9]+|', '', $link );
return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );