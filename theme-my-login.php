<?php

  __( 'На всю ширину', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>
<style>.post-content, #content .entry-content {width:430px; margin:0 auto;}#content .entry-box .image-bg {width: 100%; padding-top:50%;
    background-size: cover; margin-bottom:30px !important; background-repeat:no-repeat;}   .leavecomment {margin-top:20px}.post-content, #content .entry-content {width:430px; margin:0 auto;}.cat-meta, .entry-title.entry-title-single {text-align:center}.date-comments{    margin: 0 auto; display:table}.entry-title.entry-title-single {font-size:38px !important; margin-bottom: 20px !important;} div.date-comments, #content .post div.meta-comment a:link, #content div.entry-box .post .entry-utility a, .entry-utility, .meta-comment {color:#999 !important; font-size:16px !important;} .post-font {font-size:20px !important; padding-top:20px;}.social-buttons-no-widget {display:table; margin:0 auto;} @media only screen and (max-width: 690px) { .author-info .author-description {width:100%; float:none !important; text-align:center;} .author-info .author-avatar {text-align:center; float:none !important; margin-right: 0px !important; } #container, #container.single-no-sidebar, #container.single-no-sidebar #content {width:100%}.post-content, #content .entry-content {width:90%}.entry-box .image-bg {width:100%} .entry-title.entry-title-single {font-size:30px !important; margin-bottom: 20px !important;} div.date-comments, .social-buttons-no-widget {display:none} .cat-meta {margin-top: 20px;}}</style>
<div id="container" class="one-column">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php wpb_set_post_views(get_the_ID()); ?>
<div class="entry-box" itemscope itemtype="//schema.org/BlogPosting">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
<?php if ( has_post_thumbnail() ) : ?><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="image-bg" style="background-image:url(<?php the_post_thumbnail_url(); ?>); position:relative ">
			
	
	
</div><?php endif; ?>


<div class="post-content">
	
<h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>


 <?php $custom = get_post_custom($post->ID);
if($custom['post_button_top'][0] == 0): ?>  
<div style="clear:both;"></div>
	<div class="social-buttons-no-widget">
		
	
<?php if (of_get_option('share_display') ['2'] == '1' ) { echo social_likes(); } ?></div>
<div style="clear:both"></div>
<?php endif; ?>


</div>
<div class="entry-content">



		
	


<div class="post-font" itemprop="articleBody">





<?php the_content(); ?>







<?php comments_post(); ?>

</div><!-- .entry-content --></div><!-- #post-## -->		





</div>

</div> <!-- entry-box --></div><!-- #content -->
<?php endwhile; // end of the loop. ?></div><!-- #container -->	
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>