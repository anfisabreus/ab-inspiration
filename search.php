<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

get_header(); ?>

		<div id="container">
<div id="content" role="main">
<?php if ( have_posts() ) : ?>
				<div class="archiv-title">					<?php printf( __( 'Результат поиска: %s', 'inspiration' ), '<span>' . get_search_query() . '</span>' ); ?></div><div style="clear:both !important;width:100%"></div>
				<?php
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="entry-box no-results not-found">
					<h2 class="entry-title entry-title-single"><?php _e( 'Ничего не найдено', 'inspiration' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Извините, по Вашему запросу на блоге ничего не найдено. Попробуйте использовать другие ключевые слова.', 'inspiration' ); ?></p>
						
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
<?php endif; ?>
</div></div>
		
		
		
		

<?php get_sidebar(); ?>
<?php get_footer(); ?>