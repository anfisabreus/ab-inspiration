<?php 
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

get_header(); ?>
<?php echo ab_inspiration_header(); ?>
		<div id="container">
			<div id="content" role="main">
<?php if ( have_posts() ) the_post(); ?>


<?php rewind_posts();
	 get_template_part( 'loop', 'archive' );
?>
			</div><!-- #content -->
		</div><!-- #container -->
<?php get_sidebar(); ?>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>