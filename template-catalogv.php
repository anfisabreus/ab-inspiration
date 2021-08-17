<?php
/**
 * Template Name: Каталог 
 *
 */
 

  __( 'Каталог', 'inspiration' );
get_header(); ?>

<?php echo ab_inspiration_header(); ?>


<div class="container">
<div class="site-main portfolio entry-box">
<?php the_excerpt();?>
<div class="fusion-portfolio wrapper-portfolio cbp-<?php echo $ab_catalog['porfolio_cols']; ?>-col cbp-caption-<?php echo $ab_catalog['porfolio_cols']; ?>-col">
<?php $terms = get_terms('catalog_tags', 'orderby=date');
$count = count($terms);
echo '<div id="filters-container" class="cbp-l-filters-alignLeft">';
echo '<div class="cbp-filter-item-active cbp-filter-item" data-filter="*">'. __($ab_catalog['alltabname'], 'inspiration') .'</div>';
if ( $count > 0 )
{   
foreach ( $terms as $term ) {
$termname = mb_strtolower($term->name, 'UTF8');
$termname = str_replace(' ', '-', $termname);
echo '<div class="cbp-filter-item" data-filter=".'.$termname.'">'.$term->name.'</div> ';
}
}
echo "</div>"; ?>





<?php 
$catalog_items_amount = $ab_catalog['catalog_items_amount'];
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$wp_query = new WP_Query( array( 'post_type' => 'catalog', 'paged' => $paged, 'orderby' => 'date', 'posts_per_page' =>  $catalog_items_amount ) ); ?>
<?php if ( $wp_query->have_posts() ) : ?>
<?php if ($ab_catalog['porfolio_cols'] == 1) { ?> 
<?php add_shortcode( 'gallery', '__return_false' ); ?>
<div id="grid-container" class="cbp-l-grid-blog">
<ul class="cbp-wrapper">
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
<?php $terms = get_the_terms( $post->ID, 'catalog_tags' );
if ( $terms && ! is_wp_error( $terms ) ) : 
$links = array();
foreach ( $terms as $term ) 
{ $links[] = $term->name; }
$links = str_replace(' ', '-', $links); 
$tax = join( " ", $links );     
else :  
$tax = '';  
endif; ?>
<li class="cbp-item <?php echo mb_strtolower($tax, 'UTF8'); ?> showloadimg catalogborder">
<div class="cbp-caption-one">
<div class="cbp-caption-defaultWrap">
<div class="katalog-enterpage heightimage" style="width:99%; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
</div></div></div>
<div class="post-font" style="float:left">
<div class="cbp-l-grid-projects-title"><h2 class="entry-title entry-title-single"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2></div>
<?php echo the_excerpt(''); ?>
<div style="text-align:right; margin-bottom: 20px;"><a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important;" class="<?php echo $ab_catalog['button_size']; ?> <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>" target="_blank"> <?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?></a>

<?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['0'] == 'one') {echo '';} else  { ?> 
<a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog');?>; color:#fff;  float:none; margin-top:0px !important; <?php if (get_post_meta(get_the_ID(), 'dbt_buybutton')=='') {echo 'padding:0px !important';} ?>" class="<?php echo $ab_catalog['button_size']; ?> buy button-show-buy" target="_blank"  rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>


</div>
</div>
</li>
<?php endwhile; ?>
</ul></div><!-- end of the loop -->
<?php }  else { ?>  
<div id="grid-container" class="cbp-l-grid-blog">
<ul class="cbp-wrapper">
<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 		                
$terms = get_the_terms( $post->ID, 'catalog_tags' );
if ( $terms && ! is_wp_error( $terms ) ) : 
$links = array();
foreach ( $terms as $term ) { $links[] = $term->name; }
$links = str_replace(' ', '-', $links); 
$tax = join( " ", $links );     
else :  
$tax = '';  
endif; ?>
<li class="cbp-item <?php echo  mb_strtolower($tax, 'UTF8'); ?> showloadimg"   style="display:none;">
<?php if ($ab_catalog['caption_enable'] == 'yes')  { ?> 
<div class="cbp-caption">
<div class="cbp-caption-defaultWrap" >
<style scoped><?php if ($ab_catalog['image_shape'] == 2) { ?> .heightimage{ height: 0px;padding-top:67%} <?php }
else { ?> .heightimage{ height: 0px;padding-top:120%} <?php } ?></style>
<div class="katalog-enterpage heightimage" style="width:auto; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
</div>
</div>
<div class="cbp-caption-activeWrap">
<div class="cbp-l-caption-alignCenter">
<div class="cbp-l-caption-body">
<div class="cbp-l-caption-icon">
<a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="<?php echo $ab_catalog['button_size']; ?> <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>"> <?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?></a>



<?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['0'] == 'one') {echo '';} else  { ?> 
<a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="<?php echo $ab_catalog['button_size']; ?> buy button-show-buy"  target="_blank"  rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a><?php } ?>
</div>
</div>
</div>
</div>
</div>
<div class="post-font">
<div class="cbp-l-grid-projects-title"><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2></div>
<div class="cbp-l-grid-blog-desc" style="font-family: <?php echo of_get_option('fonts_blog');?>; overflow:hidden"><?php echo my_excerpt('long');  ?></div></div>
<?php } ?>
<?php if ($ab_catalog['caption_enable'] == 'no') { ?>
<div>
<div class="cbp-caption-defaultWrap" >
<a href="<?php the_permalink(); ?>">
<div class="katalog-enterpage heightimage" style="width:auto; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
</div>
</a>
</div>   
</div>                  
<div class="post-font">
<div class="cbp-l-grid-projects-title"><h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h2></div>
<div class="cbp-l-grid-blog-desc" style="font-family: <?php echo of_get_option('fonts_blog');?>; overflow:hidden"><?php echo my_excerpt('long');  ?></div>
<div class="katalog-buttons" style="padding:10px 0;text-align:left;">
<a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="<?php echo $ab_catalog['button_size']; ?> <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>"> <?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?></a>

<?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['0'] == 'one') {echo '';} else  { ?> 
<a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="<?php echo $ab_catalog['button_size']; ?> buy button-show-buy" target="_blank"  rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>
</div></div><?php } ?>
<div style="height:20px;"></div>
</li>
<?php endwhile; ?>

</ul>

</div><!-- end of the loop -->


<?php if (  $wp_query->max_num_pages > 1 ) : ?>
<div id="nav-below" class="pagenavi" style="margin-top:20px;">
<?php pagenavi();  ?></div>
<?php endif; ?>

<?php } ?> 

 
<div style="clear:both"></div>





<?php else : ?>
<p><?php _e( 'Извините, ничего не найдено по вашему запросу.', 'inspiration' ); ?></p>
<?php endif; ?>

</div>
</div><!-- #main -->
</div>
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>