<?php 
global $sub_form_footer;
$license 	= get_option( 'edd_form_footer_license_key' );
$status 	= get_option( 'edd_form_footer_license_status' );
if ($status !== false && $status == 'valid' ) { 
if ($sub_form_footer['ab_show_widget'] == '0' ) { ?> 
<div class="footer-form">
<?php if (function_exists('ab_sub_form_footer'))  ab_sub_form_footer();  ?>
</div>
<?php } } ?>
<div class="footer-widget-box">
<?php get_sidebar('footer'); ?>
</div>
<?php 
	if(isset($sub_form_footer['ab_show_widget'])){
	
	if ($sub_form_footer['ab_show_widget'] == '1' ) { ?> 
<div class="footer-form">
<?php if (function_exists('ab_sub_form_footer'))  ab_sub_form_footer();  ?>
</div>
<?php } } ?>
<div id="footer" role="contentinfo">
<div class="footer">
<div class="footer-mid">
<div style="clear:both;"></div>
<div style="text-align:right;margin-right:10px;vertical-align:top;"><a href="#" class="scrollupinsight"></a></div>
<div id="footermenu">
<?php if ( has_nav_menu( 'footer' ) ) { wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer') ); } ?></div>


<div class="copyright">
	
	<?php if ( !of_get_option('footer_text_copyright') ||  of_get_option('footer_text_copyright') == '') { ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &copy; <?php echo date_i18n('Y', time()); ?> &nbsp;·&nbsp; <?php _e( 'Все права защищены', 'inspiration' ); ?> &nbsp;·&nbsp; <span class="themepowered" style="padding-top:10px;font-size:14px;"><?php _e( 'Создан на ', 'inspiration' ); ?> <a href="<?php echo of_get_option('promotion', ''); ?>" target="_blank" rel="nofollow"><?php _e( 'AB-Inspiration ', 'inspiration' ); ?></a></span><?php } else { echo of_get_option('footer_text_copyright'); }   ?>






</div>
</div>
<div class="custom-footer-text"><?php echo of_get_option('footer_text'); ?></div>
</div>
</div>
</div>

<?php wp_footer(); ?>


</body>
</html>