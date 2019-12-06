<?php get_header(); ?>

<?php if (of_get_option('blog_layout') == "classic") { ?>
<div id="container">
<div id="content" role="main">
<?php get_template_part( 'loop', 'index' );?></div></div>
<?php get_sidebar(); ?>


<?php } elseif (of_get_option('blog_layout') == "grid") { ?>
	
	
<div id="container-full" class="one-full-common one-column container">
<div id="content" role="main" class="row">
	<style>
	

.container {
    max-width: 1200px; padding:0px !important}
.one-full-common.one-column #content {
    margin: 0 auto;
    max-width: 1200px;
    width: 1200px;
   }
   
   
      
      @media (min-width: 992px) {
.col-lg-4 {padding: 0;
    margin: 0px 40px 40px 0px;
  

    border: 1px solid #eaeaea;
    width: 31.11%;
    max-width: 31.11%;     background: #ffffff;}
      .col-lg-4:nth-child(3n+4){margin-right:0;}  
        
      }
      
       

.col-lg-4 .entry-title, .col-lg-4 h2.entry-title {padding:0px 40px}
.col-lg-4 .entry-title a, .col-lg-4 h2.entry-title  {font-size:22px !important; }
.entry-title, h2.entry-title  a:hover {text-decoration:none !important}

#main {padding-left:0px !important; padding-right:0px !important; }
#content-main { background:transparent}
.entry-content {padding:0px 40px}
	</style>
	
	

	
	<?php function ab_image_new() { ?>
<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" style="background-image:url(<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url('large'); ?>); width: 100%; height: 200px; margin-bottom:20px;
    background-size: cover;

<?php endif; ?>">
</div>
<?php } ?>
	
<?php function ab_content_new() { ?> <div class="post-font"  itemprop="description"><?php echo my_excerpt('otzyvy'); ?></div>
<div style="clear:both;"></div> <?php }
 ?>
	
		<?php remove_action( 'ab_title_action', 'ab_utilities', 20 );
		remove_action( 'ab_title_action', 'ab_solial', 30 );
		remove_action( 'ab_title_action', 'ab_image', 50 );
	remove_action( 'ab_title_action', 'ab_content', 60 );
		add_action( 'ab_title_action', 'ab_image_new', 5 );
	add_action( 'ab_title_action', 'ab_content_new', 60 );
	
 ?>
	
<?php 
global $paged;
	$args = array(
	    'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged
);

$wp_query = new WP_Query( $args );

// Цикл
if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) :
		$wp_query->the_post(); ?>
	<div class="col-lg-4">
     
		<?php do_action ('ab_title_action');  ?>
		
	</div>	 
<?php endwhile ?>
       
    <?php endif ?>
  

</div>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="pagenavi" style="margin-top:10px;">
<?php pagenavi();  ?></div>
<?php endif;  ?></div>

<?php
	
	

} 

else { ?>
	
	
<div id="container-full" class="one-full-common one-column container post-only">
<div id="content" role="main" class="row">
	<style>


.post-only .entry-content{width:47%; float:left; clear:none;}
.post-only, #content {width:900px !important; margin-top:30px;}
.entry-title a, .post-only .readmore a {text-decoration:none}
.image-blog-all{float:left; width:47%; margin-right:40px;}
		.post-all {margin-bottom:40px; padding-bottom:20px; border-bottom:1px solid #eaeaea}
.post-only .readmore {clear:top;}
@media only screen and (max-width: 690px){.post-only, #content {width:100% !important; margin-top:30px;}
		.image-blog-all{float:none; width:100%; margin-right:0px;}
		.post-only .entry-content{width:100% !important;}
		.post-all {padding:0 30px}
	#content-main {margin-top:0px}}		

	</style>
	
	


	

	
	<?php function ab_image_new() { ?>
<div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" style="background-image:url(<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?>); width: 100%; height: 270px; margin-bottom:20px;
    background-size: cover; <?php endif; ?> " class="image-blog-all">
</div>
<?php } ?>
	
<?php function ab_content_new() { ?> <div class="post-font"  itemprop="description"><?php echo my_excerpt('post'); ?></div>
<div style="clear:both;"></div> <?php }
 ?>
	
		<?php remove_action( 'ab_title_action', 'ab_utilities', 20 );
		remove_action( 'ab_title_action', 'ab_solial', 30 );
		remove_action( 'ab_title_action', 'ab_image', 50 );
	remove_action( 'ab_title_action', 'ab_content', 60 );
		add_action( 'ab_title_action', 'ab_image_new', 5 );
	add_action( 'ab_title_action', 'ab_content_new', 60 );
	
 ?>
	
<?php 
global $paged;
	$args = array(
	    'post_type' => 'post',
        'post_status' => 'publish',

        'paged' => $paged
);

$wp_query = new WP_Query( $args );

// Цикл
if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) :
		$wp_query->the_post(); ?>
	<div  class="post-all">
		<?php do_action ('ab_title_action');  ?>
		
	</div>	 
<?php endwhile ?>
       
    <?php endif ?>
   <?php if (  $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="pagenavi" style="margin:0 auto;">
<?php pagenavi();  ?></div>
<?php endif; ?>

</div></div>


	<?php 
	
	

} ?>




<?php get_footer(); ?>
