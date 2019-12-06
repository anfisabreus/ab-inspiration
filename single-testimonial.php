<?php
get_header(); 
?>
		<div id="container" class="testimonial-container">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div  class="entry-box">				
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<h1 class="entry-title entry-title-single"><?php
$taxonomy = 'testimonial-category';
$terms = get_the_terms($post->ID, $taxonomy);
if ( $terms && !is_wp_error( $terms ) ) {
	$str = "";
	foreach ($terms as $term) {
		$str = $str .$term->name . ', ';
	}
	?>
	<div><?php echo trim($str, ', '); ?></div>
<?php } ?>

</h1>

<span class="date updated" style="display:none;"><?php echo get_the_date(); ?></span>	
				<span class="vcard author" style="display:none;"><span class="fn"><?php the_author(); ?></span></span>

<?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0): ?>  
<div style="clear:both"></div>
<?php if (of_get_option('share_display') ['2'] == '1' ) { echo social_likes(); }  ?>
<div style="clear:both"></div>
<?php endif; ?>
<div class="entry-content">
					<div class="post-font">

						<?php echo do_shortcode('[single-testimonial]'); ?>
						
					</div>
            <?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-content -->

				</div><!-- #post-## -->
			
</div>
				
<?php endwhile; ?>

			</div><!-- #content --> 
		
		</div><!-- #container -->
		<div id="primary">
		<div class="widget-testimonial widget-container">
<div class="widget-title"><?php _e( 'Оставьте свой отзыв', 'inspiration' ); ?></div>
	<div id="testimonials-float">  <?php echo do_shortcode('[testimonial-form]'); ?></div>
</div>
		</div>

<?php get_footer(); ?>