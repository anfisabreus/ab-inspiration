<?php

/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package AB-Inspiration
 * @subpackage AB-Inspiration
 * @since AB-Inspiration 1.0
 */
?>

<?php
	/* When we call the dynamic_sidebar() function, it'll spit out
	 * the widgets for that widget area. If it instead returns false,
	 * then the sidebar simply doesn't exist, so we'll hard-code in
	 * some default sidebar stuff just in case.
	 */
	
	
	 if ( is_active_sidebar( 'basic-widget-area' ) ) : ?>
				<div id="primary" class="widget-area" role="complementary">
<ul class="xoxo">
						<?php dynamic_sidebar( 'basic-widget-area' ); ?>
					</ul>
				</div><!-- #basic .widget-area -->
<?php endif; ?>
	
	

			