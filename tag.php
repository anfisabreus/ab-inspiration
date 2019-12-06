<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

				<div class="archive-entry">					<div class="archiv-title"><?php
					printf( __( 'Архив метки: %s', 'inspiration' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></div><div style="clear:both !important; width:100%"></div></div>

<?php
 get_template_part( 'loop', 'tag' );
?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>