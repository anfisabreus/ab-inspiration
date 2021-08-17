<?php
/**
 * Template Name: На всю ширину
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
  __( 'На всю ширину', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>


		<div id="container-full" class="one-column">

			<div id="content" role="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


	<div class="entry-box">				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
					<div class="date-comments" style="display:none">
<time datetime="<?php echo get_the_time('c');  ?>" class="post-date updated" itemprop="datePublished"><?php the_time(apply_filters('themify_loop_date', 'M j, Y H:i')) ?></time><span class="vcard author" itemprop="author">
<span class="fn"><?php the_author(); ?></span>
</span></div>
<?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0 ) : ?>



<?php if (of_get_option('share_display') ['3'] == '1') { echo social_likes(); } ?>
<?php endif; ?>

					<div class="entry-content">
					<div class="post-font">

						<?php the_content(); ?>
					</div>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Страницы:', 'inspiration' ), 'after' => '</div>' ) ); ?>
						
						<?php $custom = get_post_custom(get_the_ID(),'post_share_bottom', true);
if($custom['post_share_bottom'][0] == 0 ) : ?>
<div style="clear:both"></div>
<?php 

if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {



if (of_get_option('share_display_bottom') ['3'] == '1'  && !is_checkout()) { echo social_likes_bottom(); } } else { if (of_get_option('share_display_bottom') ['3'] == '1'  ) { echo social_likes_bottom(); }} ?>
<div style="clear:both"></div>
<?php endif; ?>


						<?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-content -->
					
					

				</div><!-- #post-## -->
	<?php comments_post(); ?>
				
<?php endwhile; ?>

			</div><!-- #content --> </div>
		</div><!-- #container -->
		<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>