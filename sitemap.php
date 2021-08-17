<?php
/*
Template Name: Карта сайта
*/
  __( 'Карта сайта', 'inspiration' );

?>
<?php get_header(); ?>
<?php echo ab_inspiration_header(); ?>
<?php $imageurl =  get_bloginfo('url') .'/wp-content/themes/ab-inspiration/images/'; ?>
		<div id="container">
			<div id="content" role="main">
        <div  class="entry-box sitemap">				
		<h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
        <style>
        .sitemap ul {list-style-position: outside !important;}
        .sitemap ul li:before {content: none}
        .sitemap ul li {font-size:<?php echo of_get_option('post_font_size' ); ?>px; padding:5px 0px}
        .sitemap ul li a:link, .sitemap ul li a:visited {color:#333;}
        .sitemap ul li a:hover {color:<?php echo of_get_option('linkshover_colorpicker' ); ?> } 
        .ui-state-focus { outline: none; }
        .ui-accordion-header {outline: none;}
        .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {background: <?php echo of_get_option('button_color');?>!important; color:<?php echo of_get_option('button_color_text');?>!important; font-weight:normal;}
        ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all{background: <?php echo of_get_option('button_color');?>!important; color:<?php echo of_get_option('button_color_text');?>!important; font-weight:normal !important;}
        .ui-accordion .ui-accordion-content {padding:0px;}
        .ui-widget-content {border:none}
        .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {border:none}

        </style>   
        
         
          <div class="entry-content">   
          <div class="post-font sitemap">                
      <h3 style="font-size: 22px;"><?php _e( 'Записи', 'inspiration' ); ?></h3>
      <div id="accordion">
        <?php
$cats1 = get_categories('exclude=');
foreach ($cats1 as $cat1) {
  echo "<p style=\"font-size: 18px; 
    padding-bottom:10px;padding-top:10px;\"> ".$cat1->cat_name."</p>";
  echo "<div><ul>";
  query_posts('posts_per_page=-1&cat='.$cat1->cat_ID);
  while(have_posts()) {
    the_post();
    
      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    
  }
  echo "</ul></div>";

}
?>
      </div>

<!-- Display Categories -->
      <h3 style="font-size: 22px; margin-top:50px;"><?php _e( 'Рубрики', 'inspiration' ); ?></h3>
<ul>
<?php wp_list_categories('show_count=1&title_li='); ?>
</ul>

<!-- Display Pages -->
      <h3 style="font-size: 22px;"><?php _e( 'Страницы', 'inspiration' ); ?></h3>
      <ul>
      
      
 <?php 
$sep = '';
	global $wpdb;
	$sitemap = $wpdb->get_results("
    SELECT meta_id, post_id
    FROM $wpdb->postmeta
    WHERE meta_key = 'sitemap_exclude_page' 
    AND meta_value = '1' 
");
	
foreach ( $sitemap as $sitema ) 
{
	$excludesitemap .=  $sep .  $sitema->post_id;
	$sep = ',';
}
?> 
      
        <?php
// Add pages seprated with comma[,] that you'd like to hide to display on sitemap
wp_list_pages(
  array(
    'exclude' => $excludesitemap,
    'title_li' => '',
  )
);
?>
      </ul></div></div></div><!-- .entry-content -->
      
      

</div><!-- #content --> 
		</div><!-- #container -->
		
	<?php get_sidebar(); ?>	
		<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>