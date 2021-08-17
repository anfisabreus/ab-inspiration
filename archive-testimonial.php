<?php
/**
 * Template Name: Отзывы
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
get_header(); 

?>
<?php echo ab_inspiration_header(); ?>
		<div id="container" class="testimonial-container">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div  class="entry-box">				
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					
					
				<span class="date updated" style="display:none;"><?php echo get_the_date(); ?></span>	
				<span class="vcard author" style="display:none;"><span class="fn"><?php the_author(); ?></span></span>
<?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0): ?>  
<?php if (of_get_option('share_display') ['3'] == '1' ) { echo social_likes(); }   ?>
<?php endif; ?>
<div class="entry-content">
					<div class="post-font">

						<?php echo do_shortcode('[full-testimonials]'); ?>
					</div>

						
						<?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-content -->

				</div><!-- #post-## -->
			
</div>
				
<?php endwhile; ?>
</div><!-- #container -->
		</div>
		<div class="widget-testimonial widget-container">
<div class="widget-title"><?php _e( 'Оставьте свой отзыв', 'inspiration' ); ?></div>
	<div id="testimonials-float">  <?php echo do_shortcode('[testimonial-form]'); ?></div>
</div>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>