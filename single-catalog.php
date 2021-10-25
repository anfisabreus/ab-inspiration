<?php
get_header(); 
?>
<?php echo ab_inspiration_header(); ?>

		<div id="container-full" class="one-column">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div  class="entry-box">	
				
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-content">
	
	<?php if ($ab_catalog['catalog_link'] == !'') { ?><div style="float:left; clear:both;"><a href="<?php echo $ab_catalog['catalog_link']; ?> " style="text-decoration:none"  rel="nofollow"><i class="fa fa-long-arrow-left"></i> <?php _e( $ab_catalog['linkbacktext'], 'inspiration' ); ?></a></div> <?php } ?>
	

	  <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['1'] == 'two') {echo '';} else  { ?>    <div style="float:right"><a href="<?php echo get_post_meta(get_the_ID(), "dbt_salelink", true); ?>" style="margin-top:10px !important; padding: 3px 15px !important; font-size:20px;" class="cbp-l-caption-buttonRight" target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a></div> <?php } ?>

<div style="clear:both"> </div>
	
	
	



					    <?php $dbt_galerywidth = get_post_meta(get_the_ID(), 'dbt_galerywidth', true);?>
						<?php $dbt_galeryheight = get_post_meta(get_the_ID(), 'dbt_galeryheight', true);?>
						<?php $dbt_youtibelink = get_post_meta(get_the_ID(), 'dbt_youtibelink', true);?>

<div></div>
<?php if ($dbt_galerywidth == '100%') { ?> <h1 class="entry-title katalog-title" style="padding-bottom:20px; <?php if ('5' == get_post_meta(get_the_ID(), 'dbt_slides', true)) { ?>display:none <?php } ?>"><?php echo the_title();?></h1> <?php } ?>
	
	<?php $gallery = get_post_gallery( get_the_ID(), false );
	 if ('1' == get_post_meta(get_the_ID(), 'dbt_slides', true))  { ?>
<div style="text-align:center; width:<?php echo $dbt_galerywidth;?>;"  class="slider-background">


   
    
    <div class="flexslider flexslider-gallery">
  <ul class="slides">
  
  <?php 
            
            
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            {
                ?>
                <li data-thumb="<?php echo $src; ?>">
                <div style="background: url(<?php echo $src; ?>) no-repeat top center; width: 100%; padding-top: <?php echo $dbt_galeryheight;?>%; background-size: contain;"></div>
                </li>
                <?php
            }
        ?>
  
  
  
     </ul>
</div>
</div>
    
    <?php } elseif ('2' == get_post_meta(get_the_ID(), 'dbt_slides', true)) { ?>
    <div style="text-align:center; width:<?php echo $dbt_galerywidth;?>;" class="slider-background">

						
						
<div id="slider" class="flexslider">
  <ul class="slides">
  
  <?php 
            
            
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            {
                ?>
                <li data-thumb="<?php echo $src; ?>">
               <div style="background: url(<?php echo $src; ?>) no-repeat top center; width: 100%; padding-top: <?php echo $dbt_galeryheight;?>%; background-size: contain;"></div>
                </li>
                <?php
            }
      ?>
  
  
  
     </ul>
</div>

<div id="carousel" class="flexslider">
  <ul class="slides">
 <?php 
          
            
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            {
                ?>
                <li data-thumb="<?php echo $src; ?>">
               <div style="background: url(<?php echo $src; ?>) no-repeat center center; width: 100%; padding-top: 100%; background-size: cover;"></div>

                </li>
                <?php
            }
        ?>
  
 </ul>
</div>
			
    </div>					
						
						
						
 <?php } elseif ('3' == get_post_meta(get_the_ID(), 'dbt_slides', true)) {  ?>
 
 <div style="text-align:center;  width:<?php echo $dbt_galerywidth;?>;" class="slider-background">

 
 
						
						
<!-- Place somewhere in the <body> of your page -->
<div class="flexslider" style="  margin-bottom:40px;">
  <ul class="slides">
  
  <?php 
          
            
            /* Loop through all the image and output them one by one */
            foreach( $gallery['src'] AS $src )
            {
                ?>
                <li>
                <div style="background: url(<?php echo $src; ?>) no-repeat top center; width: 100%; padding-top: <?php echo $dbt_galeryheight;?>%; background-size: contain;"></div>
                </li>
                <?php
            }
        ?>
  
  
  
     </ul>
</div>
 </div>				
 
 <?php } elseif ('4' == get_post_meta(get_the_ID(), 'dbt_slides', true)) {  ?>
 
  <div class="video-katalog" style="width:<?php echo $dbt_galerywidth;?>; float:left">
 <div class="video-container">
 <iframe width="640" height="315" src="https://www.youtube.com/embed/<?php echo $dbt_youtibelink; ?>" frameborder="0" allowfullscreen></iframe>  </div>
  </div><?php } else  { $thumbwidth = get_post_meta(get_the_ID(), 'dbt_thumbwidth', true);
echo the_post_thumbnail(array($thumbwidth, $thumbwidth), array("class" => "alignleft thumb-size", "itemprop" => "image"));  
 }  ?>		
						
					
							
	<div class="post-font catalog-single">

<?php if ($dbt_galerywidth == '50%' ||  '5' == get_post_meta(get_the_ID(), 'dbt_slides', true)){ ?> <h1 class="entry-title catalog-title" style="padding-bottom:20px;"><?php echo the_title();?></h1> <?php } ?>


<?php 
the_content();
remove_filter('the_content', 'post_share_buttons');


?>


<?php if ($ab_catalog['goodsshare'] == '1') { ?> 
<style>.social-likes {padding-top:0px !important}</style>
<div style=" float:left"><?php social_likes(); ?></div> <?php }  ?>   


       <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['1'] == 'two') {echo '';} else  { ?>    <div style="float:right"><a href="<?php echo get_post_meta(get_the_ID(), "dbt_salelink", true); ?>" style="margin-top:10px !important; padding: 3px 15px !important; font-size:20px;" class="cbp-l-caption-buttonRight" target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a></div> <?php } ?>




<div style="clear:both"></div>

 



<!-- begin custom related loop, isa -->

<style scoped><?php if ($ab_catalog['image_shape'] == 2) { ?> .heightimage{ height: 0px;padding-top:67%} <?php }
elseif ($ab_catalog['image_shape'] == 3) { ?> .heightimage{ height: 0px;padding-top:120% } <?php } else { ?> .heightimage { height: 0px;padding-top:98.5% } <?php } ?></style>

<?php

// get the custom post type's taxonomy terms

$custom_taxterms = wp_get_object_terms( $post->ID, 'catalog_tags', array('fields' => 'ids') );
// arguments
$args = array(
'post_type' => 'catalog',
'post_status' => 'publish',
'posts_per_page' => 20, // you may edit this number
'orderby' => 'rand',
'tax_query' => array(
    array(
        'taxonomy' => 'catalog_tags',
        'field' => 'id',
        'terms' => $custom_taxterms
    )
),
'post__not_in' => array ($post->ID),
);


global $post;

$related_items = null;
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts() && $ab_catalog['goodsrelated'] == '1' ) :
echo '<div style="clear:both; padding-top:40px;  border-bottom:1px solid #eaeaea"></div>		

<div style="font-size:20px; padding-bottom:5px; padding-top:30px;">'. $ab_catalog['related_text'].'</div><div id="grid-container2" class="cbp related-katalog">';
while ( $related_items->have_posts() ) : $related_items->the_post();
?>


 <div class="cbp-item" style="padding-bottom:20px">
 <?php if ($ab_catalog['caption_enable'] == 'yes')  { ?> 
       
            
           
                <div class="cbp-caption">
                    <div class="cbp-caption-defaultWrap">
                       
                         <div class="katalog-enterpage heightimage" style="width:99%; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
                         </div>

                       </div> <!-- cbp-caption-defaultWrap -->
                    <div class="cbp-caption-activeWrap">
                        <div class="cbp-l-caption-alignCenter">
                            <div class="cbp-l-caption-body">
                            
                            
                               <div class="cbp-l-caption-icon">
                                        <a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>" rel="nofollow"><?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?> </a>
                                        
                                        
                                  <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['2'] == 'three') {echo '';} else  { ?>      
                                        
                                        <a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft buy button-show-buy"  target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>

                                       </div>
    
                            </div><!-- cbp-l-caption-body -->
                        </div><!-- cbp-l-caption-alignCenter -->
                    </div><!-- cbp-caption-activeWrap -->
                </div><!-- cbp-caption -->
                <div class="cbp-l-grid-projects-title"> <h2 class="entry-title" style="margin-bottom:0px !important"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>                 
                <div class="cbp-l-grid-projects-desc katalog-font" style="color:#333; overflow:hidden"><?php echo my_excerpt('long');  ?></div>

           
                <?php } ?>
                
                
                <?php if ($ab_catalog['caption_enable'] == 'no')  { ?> 
               

                       
                         <div class="katalog-enterpage heightimage" style="width:99%; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
                         </div>


                
                   <div class="cbp-l-grid-projects-title"> <h2 class="entry-title" style="margin-bottom:0px !important"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>               
                  <div class="cbp-l-grid-projects-desc katalog-font" style="color:#333; overflow:hidden"><?php echo my_excerpt('long');  ?></div>
              
                 
             
                  
                  
                  
                  <div class="katalog-buttons" style="padding:10px 0px">
	                             <a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>" rel="nofollow"> <?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?> </a>
	                             
	                              <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['2'] == 'three') {echo '';} else  { ?>   
                                        <a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog');?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft buy button-show-buy" target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>
	                             </div>
            
                <?php } ?>
                 

                </div><!-- cbp-item -->








  
<?php
endwhile;
echo '</div>';
endif;
// Reset Post Data
wp_reset_postdata();
?>


<!-- end custom related loop, isa -->



						
					</div>
            <?php edit_post_link( __( 'Изменить', 'inspiration' ), '<span class="edit-link">', '</span>' ); ?>

					</div><!-- .entry-content -->

				</div><!-- #post-## -->
			
</div>
				
<?php endwhile; ?>

			</div><!-- #content --> 
		
		</div><!-- #container -->
	
<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>