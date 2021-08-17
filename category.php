<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
get_header(); ?>
<?php echo ab_inspiration_header(); ?>
		<div id="container">
			<div id="content" role="main">

				
								
			<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';
				get_template_part( 'loop', 'category' );
				?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>