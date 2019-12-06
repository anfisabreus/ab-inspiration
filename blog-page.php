<?php
/**
 * Template Name: Блог на всю ширину
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

  __( 'Блог на всю ширину', 'inspiration' );

get_header(); ?>

<div id="container-full" class="one-full-common one-column container">
<div id="content" role="main" class="row">
	<style>
	.loader-ellips {
  font-size: 20px; /* change size here */
  position: relative;
  width: 4em;
  height: 1em;
  margin: 10px auto;
}

.loader-ellips__dot {
  display: block;
  width: 1em;
  height: 1em;
  border-radius: 0.5em;
  background: #555; /* change color here */
  position: absolute;
  animation-duration: 0.5s;
  animation-timing-function: ease;
  animation-iteration-count: infinite;
}

.loader-ellips__dot:nth-child(1),
.loader-ellips__dot:nth-child(2) {
  left: 0;
}
.loader-ellips__dot:nth-child(3) { left: 1.5em; }
.loader-ellips__dot:nth-child(4) { left: 3em; }

@keyframes reveal {
  from { transform: scale(0.001); }
  to { transform: scale(1); }
}

@keyframes slide {
  to { transform: translateX(1.5em) }
}

.loader-ellips__dot:nth-child(1) {
  animation-name: reveal;
}

.loader-ellips__dot:nth-child(2),
.loader-ellips__dot:nth-child(3) {
  animation-name: slide;
}

.loader-ellips__dot:nth-child(4) {
  animation-name: reveal;
  animation-direction: reverse;
}

	</style>
	<script type="text/javascript">
   jQuery(function(){ jQuery('.wpcw-course').addClass('col-lg-4');
					jQuery('.wpcw-courses').addClass('row');}); 
					
					</script>
	

<?php
/**
 * Load javascripts used by the theme
 */
/**
 * Infinite Scroll
 */
function custom_infinite_scroll_js() {
	 ?>
	<script>
	var infinite_scroll = {
		loading: {
			img: "<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif",

		},
		"path":".navigation a.styled-button",
		"navSelector":".navigation",
		"append":".col-lg-4",
		"contentSelector":"#content",
		"hideNav": '.navigation',
status: '.page-load-status'
		
	};
	jQuery( infinite_scroll.contentSelector ).infiniteScroll( infinite_scroll );
	</script>
	<?php
	
}
add_action( 'wp_footer', 'custom_infinite_scroll_js', 100 ); ?>
	
<?php	function posts_link_attributes() {
    return 'class="styled-button"';
}

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');
	?>
	
	<?php function ab_image_new() { ?>
<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" style="background-image:url(<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?>); width: 100%; height: 200px; margin-bottom:20px;
    background-size: cover;

<?php endif; ?>">
</div>
<?php } ?>
	
<?php function ab_content_new() { ?> <div class="post-font"  itemprop="description"><?php echo my_excerpt('otzyvy'); ?></div>
<div style="clear:both;"></div> <?php }
 ?>
	
		<?php remove_action( 'ab_title_action', 'ab_utilities', 20 );
		remove_action( 'ab_title_action', 'ab_solial', 30 );
		remove_action( 'ab_title_action', 'ab_image', 50 );
	remove_action( 'ab_title_action', 'ab_content', 60 );
		add_action( 'ab_title_action', 'ab_image_new', 5 );
	add_action( 'ab_title_action', 'ab_content_new', 60 );
	
 ?>
	
<?php 
global $paged;
	$args = array(
	    'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => '6',
        'paged' => $paged,
);

$wp_query = new WP_Query( $args );

// Цикл
if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) :
		$wp_query->the_post(); ?>
	<div class="col-lg-4" style="margin-bottom:40px;">
		<?php do_action ('ab_title_action');  ?>
		
	</div>	 
<?php endwhile ?>
       
    <?php endif ?>
   

</div></div>

<div class="navigation"><p><?php posts_nav_link(); ?></p></div>

<div class="page-load-status">
  <div class="loader-ellips infinite-scroll-request">
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
    <span class="loader-ellips__dot"></span>
  </div>
  <p class="infinite-scroll-last"></p>
  <p class="infinite-scroll-error">Больше нет страниц</p>
</div>

	<?php wp_reset_query(); ?>

<?php get_footer(); ?>

