<?php
/**
 * Template Name: Запись без боковой колонки
 * Template Post Type: page, wpcw_course, post, el_events
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
  __( 'Запись без боковой колонки', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<div id="container" class="single-no-sidebar">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php wpb_set_post_views(get_the_ID()); ?>
<div class="entry-box" itemscope itemtype="http://schema.org/BlogPosting" <?php if ( !has_post_thumbnail() ) { ?>style=" padding:40px 0 !important"<?php } else { ?> style=" padding:0px 0 40px 0!important"<?php }   ?>>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
<?php if ( has_post_thumbnail() ) : ?><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="image-bg" style="background-image:url(<?php the_post_thumbnail_url(); ?>); ">
	    
	
</div><?php endif; ?>


<div class="post-content" style="padding:0 20px">
	
	
<div class="entry-utility" style="margin-bottom:5px;">
<span style="float:left"></span><div class="cat-meta"> 


<?php if (function_exists('kama_breadcrumbs')) kama_breadcrumbs(); ?>

</div></div><!-- .entry-utility -->


   <h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>

<?php if (of_get_option('utilities') == '1') { echo inspiration_posted_in(); } ?>
</div>
<div class="entry-content" style="padding:0 20px">

<?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0): ?>  
<div style="clear:both;"></div>
	<div class="social-buttons-no-widget">
		
	
<?php if (of_get_option('share_display') ['2'] == '1' ) { echo social_likes(); } ?></div>
<div style="clear:both"></div>
<?php endif; ?>

<div class="post-font" itemprop="articleBody">





<?php the_content(); ?>

<?php echo get_post_meta($post->ID, 'banner', true); ?>
</div>

<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Страницы:', 'inspiration' ), 'after' => '</div>' ) ); ?>
<?php
if(get_the_tag_list() && of_get_option('tags') == 1) { ?>

<div class="tagcloud tagssingle">
 <?php echo get_the_tag_list('  '); ?>     
</div>
<?php } ?>

<?php $custom = get_post_custom(get_the_ID(),'post_share_bottom', true);
if($custom['post_share_bottom'][0] == 0 && is_single() && !is_singular('catalog') ) : ?>
<div style="clear:both"></div>
<?php if (of_get_option('share_display_bottom') ['2'] == '1' ) { echo social_likes_bottom(); } ?>
<div style="clear:both"></div>
<?php endif; ?>



<?php if (of_get_option('author')  == 1 ) { echo autor_bio(); } ?>


<?php $custom = get_post_custom($post->ID);
if($custom['post_form'][0] == 0 && of_get_option('form_bottom_embed') == true): ?> 
<?php form_post_bottom();  ?>
<?php endif; ?>


<?php 

$custom = get_post_custom($post->ID);
if($custom['post_related'][0] == 0): ?> 

 
 <?php if (of_get_option('related_posts') == 'categories') {  echo related_posts_thumbnails_tags_one(); } 

else {  echo related_posts_thumbnails_tags(); }
 ?> 
 
 
 
<?php endif; ?>


 <br> <br>

<?php comments_post(); ?>

</div><!-- .entry-content --></div><!-- #post-## -->		
 <!-- Comment #4: Plugin Code -->
  <div class="fb-quote"></div>



</div>

</div> <!-- entry-box --></div><!-- #content -->
<?php endwhile; // end of the loop. ?></div><!-- #container -->			
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>