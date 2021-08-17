<?php
/**
 * Template Name: Входная страница
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
  __( 'Входная страница', 'inspiration' );

get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<?php function hp_level1() { ?><div class="uroven"> <?php
global $homepage; 	
if  ($homepage['hp_content_one1'] == 1) {
$postid = $homepage['hp_page_id1p1'] ;
$postid2 = $homepage['hp_page_id1p2'] ;
$postid3 = $homepage['hp_page_id1p3'] ;	
if ($homepage['hp_layout1'] == 1) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout1'] == 2) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}
if  ($homepage['hp_content_one1'] == 2) {
$postid = $homepage['hp_post_id1p1'] ;
$postid2 = $homepage['hp_post_id1p2'] ;
$postid3 = $homepage['hp_post_id1p3'] ;	
if ($homepage['hp_layout1'] == 1) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout1'] == 2) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}

if ($homepage['hp_content_one1'] == 4){ 
$cat = $homepage['hp_category1'];
if ($homepage['hp_layout1'] == 1) {
$featured_posts1 = new WP_Query(  'posts_per_page=1&cat='.$cat );
}
elseif ($homepage['hp_layout1'] == 2)
{$featured_posts1 = new WP_Query(  'posts_per_page=2&cat='.$cat );}
else{$featured_posts1 = new WP_Query(  'posts_per_page=3&cat='.$cat );}
} 

if ($homepage['hp_content_one1'] == 1 || $homepage['hp_content_one1'] == 2 || $homepage['hp_content_one1'] == 4) {
if ( $featured_posts1->have_posts() ) : while ( $featured_posts1->have_posts() ) : $featured_posts1->the_post();
 ?>
<div class="block_home1">
<?php if ($homepage['hp_show_header1'] == 1 && $homepage['hp_heading_pos1'] == 1) {?>
<h3 class="entry-title1" style="padding-bottom:20px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title() ; ?>"><?php  the_title() ; ?></a></h3>
<?php } ?>
<?php if( has_post_thumbnail( $post_id ) &&  $homepage['hp_show_image1'] == 1): ?>
<a href="<?php the_permalink(); ?>"><div class="homepage-image1" style="background-image: url(<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
</div></a><?php endif; ?>
<?php if ($homepage['hp_show_header1'] == 1 && $homepage['hp_heading_pos1'] == 2) {?>
<h3 class="entry-title1" style="padding-bottom:0px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title(); ?>"><?php the_title(); ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc1'] == 1) {?>
<div class="post-font1" style="width:100%;"  itemprop="description">
<?php 
$limit = $homepage['hp_desc_limit1'];
$page_data = get_page( $page_id );
$content = $page_data->post_content;
$trimmed_content = mb_substr( strip_tags( get_the_content() ), 0, $limit ); 
echo $trimmed_content; ?>...</div>
<?php } ?>
<?php if ($homepage['hp_show_readmore1'] == 1 && $homepage['hp_show_readmore_custom1'] == 0) {?>
<a href="<?php the_permalink(); ?>" class="more-link1"><div class="readmore1"><?php echo $homepage['hp_readmore_id1']; ?></div></a>
<?php } ?></div>
<?php endwhile; endif; ?></div>
<?php if ($homepage['hp_show_readmore1'] == 1 && $homepage['hp_show_readmore_custom1'] == 1) {?>
<div  class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom1']; ?>" class="more-link1"><div class="readmore1 readmorecustom"><?php echo $homepage['hp_readmore_id1']; ?></div></a></div>
<?php } ?><?php }

//Начало произвольного контента первого уровня

else {
$image1 = $homepage['custom_bg1p1'] ;
$image2 = $homepage['custom_bg1p2'] ;
$image3 = $homepage['custom_bg1p3'] ;
$header1 = stripslashes($homepage['hp_header_id1p1']) ;
$header2 = stripslashes($homepage['hp_header_id1p2']) ;
$header3 = stripslashes($homepage['hp_header_id1p3']) ;
$desc1 = do_shortcode(stripslashes($homepage['hp_desc_id1p1'])) ;
$desc2 = do_shortcode(stripslashes($homepage['hp_desc_id1p2'])) ;
$desc3 = do_shortcode(stripslashes($homepage['hp_desc_id1p3'])) ;
$readmore1 = $homepage['hp_readmore_id1p1'] ;
$readmore2 = $homepage['hp_readmore_id1p2'] ;
$readmore3 = $homepage['hp_readmore_id1p3'] ;
$readmorelink1 = $homepage['hp_readmorelink_id1p1'] ;
$readmorelink2 = $homepage['hp_readmorelink_id1p2'] ;
$readmorelink3 = $homepage['hp_readmorelink_id1p3'] ;
$icon1 = $homepage['ab_homepage_icon1p1'] ;
$icon2 = $homepage['ab_homepage_icon1p2'] ;
$icon3 = $homepage['ab_homepage_icon1p3'] ;

if  ($homepage['hp_layout1'] == 1) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1));
}
elseif  ($homepage['hp_layout1'] == 2) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2));
}
else {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2), '3' => array($header3,$desc3,$readmore3,$readmorelink3,$image3,$icon3));
}
foreach ( $hp_idpages as $id => $page) {	
?>
<div class="block_home1">
<?php if ($homepage['hp_show_header1'] == 1 && $homepage['hp_heading_pos1'] == 1) {?>
<h3 class="entry-title1" style="padding-bottom:20px;" itemprop="name"><a href="<?php echo $page[3]; ?>" title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_image1'] == 1){?>
<a href="<?php echo $page[3]; ?>">
<div class="homepage-image1" style="background-image: url(<?php echo $page[4]; ?>);">
</div></a>
<?php } ?>

<?php if ($homepage['hp_show_icon1'] == 1){?>
<div class="homepage-icon1"  data-animation-delay="1s">
<span class="<?php echo $page[5]; ?>"></span>
</div>
<?php } ?>


<?php if ($homepage['hp_show_header1'] == 1 && $homepage['hp_heading_pos1'] == 2) {?>
<h3 class="entry-title1" style="padding-bottom:0px;" itemprop="name"><a href="<?php echo $page[3]; ?>" title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc1'] == 1) {?>
<div class="post-font1" style="width:100%;" itemprop="description">
<?php 
echo $page[1]; ?></div>
<?php } ?>
<?php if ($homepage['hp_show_readmore1'] == 1 && $homepage['hp_show_readmore_custom1'] == 0) {?>
<a href="<?php echo $page[3]; ?>" class="more-link1"><div class="readmore1"><?php echo $homepage['hp_readmore_id1']; ?></div></a>
<?php } ?></div>
<?php  } ?>
</div>
<?php if ($homepage['hp_show_readmore1'] == 1 && $homepage['hp_show_readmore_custom1'] == 1) {?>
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom1']; ?>" class="more-link1"><div class="readmore1 readmorecustom"><?php echo $homepage['hp_readmore_id1']; ?></div></a>
</div>
<?php } ?>
<?php } }?>

<?php function hp_level2() { ?>
<div class="uroven"> <?php global $homepage; 	
if  ($homepage['hp_content_one2'] == 1) {
$postid = $homepage['hp_page_id2p1'] ;
$postid2 = $homepage['hp_page_id2p2'] ;
$postid3 = $homepage['hp_page_id2p3'] ;	
if ($homepage['hp_layout2'] == 1) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout2'] == 2) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}
if  ($homepage['hp_content_one2'] == 2) {
$postid = $homepage['hp_post_id2p1'] ;
$postid2 = $homepage['hp_post_id2p2'] ;
$postid3 = $homepage['hp_post_id2p3'] ;	
if ($homepage['hp_layout2'] == 1) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout2'] == 2) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}

if ($homepage['hp_content_one2'] == 4){ 
$cat = $homepage['hp_category2'];
if ($homepage['hp_layout2'] == 1) {
$featured_posts1 = new WP_Query(  'posts_per_page=1&cat='.$cat );
}
elseif ($homepage['hp_layout2'] == 2)
{$featured_posts1 = new WP_Query(  'posts_per_page=2&cat='.$cat );}
else{$featured_posts1 = new WP_Query(  'posts_per_page=3&cat='.$cat );}
} 

if ($homepage['hp_content_one2'] == 1 || $homepage['hp_content_one2'] == 2 || $homepage['hp_content_one2'] == 4) {
if ( $featured_posts1->have_posts() ) : while ( $featured_posts1->have_posts() ) : $featured_posts1->the_post();
?>
<div class="block_home2">
<?php if ($homepage['hp_show_header2'] == 1 && $homepage['hp_heading_pos2'] == 1) {?>
<h3 class="entry-title2" style="padding-bottom:20px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title() ; ?>"><?php  the_title() ; ?></a></h3>
<?php } ?>
<?php if( has_post_thumbnail( $post_id ) &&  $homepage['hp_show_image2'] == 1): ?>
<a href="<?php the_permalink(); ?>"><div class="homepage-image2" style="background-image: url(<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
</div></a><?php endif; ?>
<?php if ($homepage['hp_show_header2'] == 1 && $homepage['hp_heading_pos2'] == 2) {?>
<h3 class="entry-title2" style="padding-bottom:0px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title() ; ?>"><?php  the_title() ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc2'] == 1) {?>
<div class="post-font2" style="width:100%;" itemprop="description">
<?php 
$limit = $homepage['hp_desc_limit2'];
$page_data = get_page( $page_id );
$content = $page_data->post_content;
$trimmed_content = mb_substr( strip_tags( get_the_content() ), 0, $limit ); 
echo $trimmed_content; ?>...</div>
<?php } ?>
<?php if ($homepage['hp_show_readmore2'] == 1 && $homepage['hp_show_readmore_custom2'] == 0) {?>
<a href="<?php the_permalink(); ?>" class="more-link2"><div class="readmore2"><?php echo $homepage['hp_readmore_id2']; ?></div></a>
<?php } ?></div>
<?php endwhile; endif; ?>
</div>
<?php if ($homepage['hp_show_readmore2'] == 1 && $homepage['hp_show_readmore_custom2'] == 1) {?>
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom2']; ?>" class="more-link2"><div class="readmore2 readmorecustom"><?php echo $homepage['hp_readmore_id2']; ?></div></a>
</div>
<?php } ?>
<?php }

else {
$image1 = $homepage['custom_bg2p1'] ;
$image2 = $homepage['custom_bg2p2'] ;
$image3 = $homepage['custom_bg2p3'] ;
$header1 = stripslashes($homepage['hp_header_id2p1']) ;
$header2 = stripslashes($homepage['hp_header_id2p2']) ;
$header3 = stripslashes($homepage['hp_header_id2p3']) ;
$desc1 = do_shortcode(stripslashes($homepage['hp_desc_id2p1'])) ;
$desc2 = do_shortcode(stripslashes($homepage['hp_desc_id2p2'])) ;
$desc3 = do_shortcode(stripslashes($homepage['hp_desc_id2p3'])) ;
$readmore1 = $homepage['hp_readmore_id2p1'] ;
$readmore2 = $homepage['hp_readmore_id2p2'] ;
$readmore3 = $homepage['hp_readmore_id2p3'] ;
$readmorelink1 = $homepage['hp_readmorelink_id2p1'] ;
$readmorelink2 = $homepage['hp_readmorelink_id2p2'] ;
$readmorelink3 = $homepage['hp_readmorelink_id2p3'] ;
$icon1 = $homepage['ab_homepage_icon2p1'] ;
$icon2 = $homepage['ab_homepage_icon2p2'] ;
$icon3 = $homepage['ab_homepage_icon2p3'] ;
if  ($homepage['hp_layout2'] == 1) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1));
}
elseif  ($homepage['hp_layout2'] == 2) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2));
}
else {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2), '3' => array($header3,$desc3,$readmore3,$readmorelink3,$image3,$icon3));
}
foreach ( $hp_idpages as $id => $page) {	
?>
<div class="block_home2">
<?php if ($homepage['hp_show_header2'] == 1 && $homepage['hp_heading_pos2'] == 1) {?>
<h3 class="entry-title2" style="padding-bottom:20px;" itemprop="name"><a href="<?php echo $page[3]; ?>" title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_image2'] == 1){?>
<a href="<?php echo $page[3]; ?>">
<div class="homepage-image2" style="background-image: url(<?php echo $page[4]; ?>);">
</div></a>
<?php } ?>

<?php if ($homepage['hp_show_icon2'] == 1){?>
<div class="homepage-icon2"   data-animation-delay="1s">
<span class="<?php echo $page[5]; ?>"></span>
</div>
<?php } ?>

<?php if ($homepage['hp_show_header2'] == 1 && $homepage['hp_heading_pos2'] == 2) {?>
<h3 class="entry-title2" style="padding-bottom:0px;" itemprop="name"><a href="<?php echo $page[3]; ?>"  title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc2'] == 1) {?>
<div class="post-font2" style="width:100%;" itemprop="description">
<?php 
echo $page[1]; ?></div>
<?php } ?>
<?php if ($homepage['hp_show_readmore2'] == 1 && $homepage['hp_show_readmore_custom2'] == 0) {?>
<a href="<?php echo $page[3]; ?>" class="more-link2"><div class="readmore2"><?php echo $homepage['hp_readmore_id2']; ?></div></a>
<?php } ?></div>
<?php  } ?>
</div>
<?php if ($homepage['hp_show_readmore2'] == 1 && $homepage['hp_show_readmore_custom2'] == 1) {?>
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom2']; ?>" class="more-link2"><div class="readmore2 readmorecustom"><?php echo $homepage['hp_readmore_id2']; ?></div></a>
</div>
<?php } ?>
<?php } }?>
<?php function hp_level3() { ?>
<div class="uroven"> <?php global $homepage; 	
if  ($homepage['hp_content_one3'] == 1) {
$postid = $homepage['hp_page_id3p1'] ;
$postid2 = $homepage['hp_page_id3p2'] ;
$postid3 = $homepage['hp_page_id3p3'] ;	
if ($homepage['hp_layout3'] == 1) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout3'] == 2) {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'post_type' => 'page', 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}
if  ($homepage['hp_content_one3'] == 2) {
$postid = $homepage['hp_post_id3p1'] ;
$postid2 = $homepage['hp_post_id3p2'] ;
$postid3 = $homepage['hp_post_id3p3'] ;	
if ($homepage['hp_layout3'] == 1) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid ) ));
}
elseif ($homepage['hp_layout3'] == 2) {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2 ) ));
}
else  {
$featured_posts1 = new WP_Query( array( 'orderby' =>'post__in', 'post__in' => array( $postid,$postid2,$postid3 ) ));
}
}
if ($homepage['hp_content_one3'] == 4){ 
$cat = $homepage['hp_category3'];
if ($homepage['hp_layout3'] == 1) {
$featured_posts1 = new WP_Query(  'posts_per_page=1&cat='.$cat );
}
elseif ($homepage['hp_layout3'] == 2)
{$featured_posts1 = new WP_Query(  'posts_per_page=2&cat='.$cat );}
else{$featured_posts1 = new WP_Query(  'posts_per_page=3&cat='.$cat );}
} 
if ($homepage['hp_content_one3'] == 1 || $homepage['hp_content_one3'] == 2 || $homepage['hp_content_one3'] == 4) {
if ( $featured_posts1->have_posts() ) : while ( $featured_posts1->have_posts() ) : $featured_posts1->the_post();
?>
<div class="block_home3">
<?php if ($homepage['hp_show_header3'] == 1 && $homepage['hp_heading_pos3'] == 1) {?>
<h3 class="entry-title3" style="padding-bottom:20px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title() ; ?>"><?php  the_title() ; ?></a></h3>
<?php } ?>
<?php if( has_post_thumbnail( $post_id ) &&  $homepage['hp_show_image3'] == 1): ?>
<a href="<?php the_permalink(); ?>"><div class="homepage-image3" style="background-image: url(<?=wp_get_attachment_url( get_post_thumbnail_id() ); ?>);">
</div></a><?php endif; ?>
<?php if ($homepage['hp_show_header3'] == 1 && $homepage['hp_heading_pos3'] == 2) {?>
<h3 class="entry-title3" style="padding-bottom:0px;" itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php  the_title() ; ?>"><?php  the_title() ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc3'] == 1) {?>
<div class="post-font3" style="width:100%;" itemprop="description">
<?php 
$limit = $homepage['hp_desc_limit3'];
$page_data = get_page( $page_id );
$content = $page_data->post_content;
$trimmed_content = mb_substr( strip_tags( get_the_content() ), 0, $limit ); 
echo $trimmed_content; ?>...</div>
<?php } ?>
<?php if ($homepage['hp_show_readmore3'] == 1 && $homepage['hp_show_readmore_custom3'] == 0) {?>
<a href="<?php the_permalink(); ?>" class="more-link3"><div class="readmore3"><?php echo $homepage['hp_readmore_id3']; ?></div></a>
<?php } ?></div>
<?php endwhile; endif; ?>
</div>
<?php if ($homepage['hp_show_readmore3'] == 1 && $homepage['hp_show_readmore_custom3'] == 1) {?>
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom3']; ?>" class="more-link3"><div class="readmore3 readmorecustom"><?php echo $homepage['hp_readmore_id3']; ?></div></a>
</div>
<?php } ?><?php }

else {
$image1 = $homepage['custom_bg3p1'] ;
$image2 = $homepage['custom_bg3p2'] ;
$image3 = $homepage['custom_bg3p3'] ;
$header1 = stripslashes($homepage['hp_header_id3p1']) ;
$header2 = stripslashes($homepage['hp_header_id3p2']) ;
$header3 = stripslashes($homepage['hp_header_id3p3']) ;
$desc1 = do_shortcode(stripslashes($homepage['hp_desc_id3p1'])) ;
$desc2 = do_shortcode(stripslashes($homepage['hp_desc_id3p2'])) ;
$desc3 = do_shortcode(stripslashes($homepage['hp_desc_id3p3'])) ;
$readmore1 = $homepage['hp_readmore_id3p1'] ;
$readmore2 = $homepage['hp_readmore_id3p2'] ;
$readmore3 = $homepage['hp_readmore_id3p3'] ;
$readmorelink1 = $homepage['hp_readmorelink_id3p1'] ;
$readmorelink2 = $homepage['hp_readmorelink_id3p2'] ;
$readmorelink3 = $homepage['hp_readmorelink_id3p3'] ;
$icon1 = $homepage['ab_homepage_icon3p1'] ;
$icon2 = $homepage['ab_homepage_icon3p2'] ;
$icon3 = $homepage['ab_homepage_icon3p3'] ;
if  ($homepage['hp_layout3'] == 1) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1));
}
elseif  ($homepage['hp_layout3'] == 2) {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2));
}
else {
$hp_idpages = array( '1' => array($header1,$desc1,$readmore1,$readmorelink1,$image1,$icon1), '2' => array($header2,$desc2,$readmore2,$readmorelink2,$image2,$icon2), '3' => array($header3,$desc3,$readmore3,$readmorelink3,$image3,$icon3));
}
foreach ( $hp_idpages as $id => $page) {	

?>
<div class="block_home3">
<?php if ($homepage['hp_show_header3'] == 1 && $homepage['hp_heading_pos3'] == 1) {?>
<h3 class="entry-title3" style="padding-bottom:20px;" itemprop="name"><a href="<?php echo $page[3]; ?>" title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_image3'] == 1){?>
<a href="<?php echo $page[3]; ?>">
<div class="homepage-image3" style="background-image: url(<?php echo $page[4]; ?>);">
</div></a>
<?php } ?>

<?php if ($homepage['hp_show_icon3'] == 1){?>
<div class="homepage-icon3"   data-animation-delay="1s">
<span class="<?php echo $page[5]; ?> <?php echo $homepage['hp_icon_width3']; ?>"></span>
</div>
<?php } ?>
<?php if ($homepage['hp_show_header3'] == 1 && $homepage['hp_heading_pos3'] == 2) {?>
<h3 class="entry-title3" style="padding-bottom:20px;" itemprop="name"><a href="<?php echo $page[3]; ?>" title="<?php echo $page[0] ; ?>"><?php  echo $page[0] ; ?></a></h3>
<?php } ?>
<?php if ($homepage['hp_show_desc3'] == 1) {?>
<div class="post-font3" style="width:100%;" itemprop="description">
<?php 

echo $page[1]; ?></div>
<?php } ?>
<?php if ($homepage['hp_show_readmore3'] == 1 && $homepage['hp_show_readmore_custom3'] == 0) {?>
<a href="<?php echo $page[3]; ?>" class="more-link3"><div class="readmore3"><?php echo $homepage['hp_readmore_id3']; ?></div></a>
<?php } ?></div><?php  } ?>
</div>

<?php if ($homepage['hp_show_readmore3'] == 1 && $homepage['hp_show_readmore_custom3'] == 1) {?>
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom3']; ?>" class="more-link3"><div class="readmore3 readmorecustom"><?php echo $homepage['hp_readmore_id3']; ?></div></a>
</div>
<?php } ?>
<?php  } }?>

<?php function hp_level4() { global $homepage; ?>
<div class="uroven"><div class="block_home4">

<?php if( $homepage['testimonial_style'] == 1) { ?>
 <div id="grid-container3" class="cbp cbp-slider-edge">
<?php
$exclude = $homepage['excludeotzyv'];
$excludeotzyv = explode(" ", $exclude);

$type = 'testimonial';
$args=array(
  'post_type' => 'testimonial',
  'post_status' => 'publish',
  'posts_per_page' => 7,
  'post__not_in' => array($excludeotzyv[0], $excludeotzyv[1], $excludeotzyv[2], $excludeotzyv[3], $excludeotzyv[4], $excludeotzyv[5], $excludeotzyv[6], $excludeotzyv[7], $excludeotzyv[8], $excludeotzyv[9], $excludeotzyv[10], $excludeotzyv[11], $excludeotzyv[12], $excludeotzyv[13], $excludeotzyv[14], $excludeotzyv[15], $excludeotzyv[16], $excludeotzyv[17], $excludeotzyv[18], $excludeotzyv[19], $excludeotzyv[20])
  );

$my_query = null;
$my_query = new WP_Query($args);
	
if( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php $otzyvtext = get_post_meta(get_the_ID() , "client_name", true);
$excludepro = explode(",", $otzyvtext); ?>



<div class="cbp-item <?php 	if ($homepage['hp_text_animation'] == 1) { ?> testimonials-animation <?php } ?>">	
<div class="cbp-l-grid-slider-testimonials-body" style="line-height:26px;">
<?php if( has_post_thumbnail( $post_id )): ?>
<div style="width:<?php echo $homepage['hp_image_otzyvy_size']; ?>px ; height: <?php echo $homepage['hp_image_otzyvy_size']; ?>px; margin:0 auto; margin-bottom:10px !important;">
<?php echo the_post_thumbnail( array(150, 150), array("class" => "post_thumbnail homepage-image4 image-otzyv", "itemprop" => "image")); ?></div><?php endif; ?>


<div class="otzyvy-text"><?php my_excerpt('otzyvy');  ?> </div>
<div class="otzyvy-name"> <?php echo $excludepro[0]; ?> </div>
</div>
</div>

<?php endwhile; } ?> </div> <?php }  
else  { ?>
<div id="grid-container3" class="cbp cbp-slider-edge">
<?php
$exclude = $homepage['excludeotzyv'];
$excludeotzyv = explode(" ", $exclude);

$type = 'testimonial';
$args=array(
  'post_type' => 'testimonial',
  'post_status' => 'publish',
  'posts_per_page' => 7,
  'post__not_in' => array($excludeotzyv[0], $excludeotzyv[1], $excludeotzyv[2], $excludeotzyv[3], $excludeotzyv[4], $excludeotzyv[5], $excludeotzyv[6], $excludeotzyv[7], $excludeotzyv[8], $excludeotzyv[9], $excludeotzyv[10], $excludeotzyv[11], $excludeotzyv[12], $excludeotzyv[13], $excludeotzyv[14], $excludeotzyv[15], $excludeotzyv[16], $excludeotzyv[17], $excludeotzyv[18], $excludeotzyv[19], $excludeotzyv[20])
  );

$my_query = null;
$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); ?>
	
<?php $otzyvtext = get_post_meta(get_the_ID() , "client_name", true);
$excludepro = explode(",", $otzyvtext); ?>

<div class="cbp-item <?php 	if ($homepage['hp_text_animation'] == 1) { ?> testimonials-animation <?php } ?>">	

<div class="cbp-l-grid-slider-testimonials-body post-font4" style="line-height:26px; padding-left:30px;">
<?php if( has_post_thumbnail( $post_id )): ?>
<div class="otzyv-photo" style="width:90px; height: 90px; margin:0 auto; margin-bottom:0px !important; float:left; margin-right:15px; margin-top:5px;">
<?php echo the_post_thumbnail( array(80, 80), array("class" => "post_thumbnail image-otzyv", "itemprop" => "image")); ?>
</div><?php endif; ?>
<div class="otzyvy-text"><?php  my_excerpt('otzyvy');  ?> </div>
<div class="otzyvy-name"> <?php echo $excludepro[0]; ?> </div>
</div>
</div>
<?php endwhile; } ?> </div> <?php } ?>


</div></div>

<?php if ($homepage['hp_show_readmore4'] == 1) { ?> 
<div class="custom-read-more">
<a href="<?php echo $homepage['hp_readmore_link_custom4']; ?>" class="more-link4"><div class="readmore4" style="float:right;margin-right:0px;"><?php echo $homepage['hp_readmore_id4']; ?></div></a></div>
<?php }  else { ?> <div style="clear:both; padding-bottom:30px;margin-bottom:30px;"></div> <?php } ?>
<?php wp_reset_query(); } ?>
<?php function hp_level5() {  
global $homepage; ?> 
<style scoped>
.firstpost{float:left;width:45%;}
.firstpost img{float:none !important;}
.secondpost{float:right;width:50%;margin-bottom:30px;}
div.secondpost div.entry-title  a:link {font-size:20px !important;}
.secondpost img{margin-right:20px;}</style>
<div class="uroven">
<div class="block_home5">
<?php



if  ($homepage['hp_show_recent'] == 'recent')
{

$featured_posts1 = new WP_Query( array( 'showposts' => 4 )); }

elseif ($homepage['hp_show_recent'] == 'popular')
 { $featured_posts1 = new WP_Query( array( 'showposts' => 4, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num' )); }
else {$featured_posts1 = new WP_Query( array( 'showposts' => 4, 'orderby' => 'comment_count' ));}


?> <div>
<?php if ( $featured_posts1->have_posts() ) : while ( $featured_posts1->have_posts() ) : $featured_posts1->the_post(); ?>
<div class="<?php if($counter==0) { echo  'firstpost'; $counter++; } else { echo 'secondpost';}  ?>"> 
<div><a href="<?php the_permalink(); ?>"><?php 
$count++;
if( $count <= 1 ) { ?><div class="homepage-image5" style="background-image:url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>);background-repeat:none; background-position:top center; background-size:cover; width:100%; height:300px;"></div><?php
 }
else
{ ?>
<div class="homepage-image5" style="background-image:url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>);background-repeat:none; background-position:top center; background-size:cover; width:200px; float:left; height:100px; margin-right:15px !important; margin-bottom:10px !important "></div><?php
 }
?>
</a>
</div>
<div class="entry-title5"  itemprop="name"><a href="<?php the_permalink(); ?>" title="<?php the_title() ; ?>"><?php the_title() ; ?></a></div>
<div class="post-text">
<?php $page_data = get_page( $page_id );
$content = $page_data->post_content;
$trimmed_content = wp_trim_words( $content, '20', '...' );
$trimmed_content_first = wp_trim_words( $content, '40', '...' );
$countpost++;
if( $countpost <= 1 ) { echo $trimmed_content_first; } else { echo $trimmed_content;} ?></div></div>
<?php endwhile; endif; ?> </div><div style="clear:both"></div>



<?php if ($homepage['hp_readmore_id5'] !== "") { ?> <a href="<?php echo $homepage['hp_readmore_link_custom5']; ?>" class="more-link5"><div class="readmore5" style="float:right"><?php echo $homepage['hp_readmore_id5']; ?></div></a> <?php } ?>



</div></div>
<?php }?>



<?php function hp_level6() { global $homepage, $ab_catalog; ?> 
<style scoped><?php if ($ab_catalog['image_shape'] == 2) { ?>
.heightimage{ height: 0px;padding-top:67% !important}
<?php }
else { ?>
.heightimage{ height: 0px;padding-top:120% !important}
<?php } ?></style>
<div class="uroven"><div class="block_home6">
<div id="grid-container2" class="cbp">
<?php
$type = 'catalog';
$args=array(
  'post_type' => $type,
  'post_status' => 'publish',
  'posts_per_page' => 20,
  'orderby' => 'id'
  );
global $post;
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) { while ($my_query->have_posts()) : $my_query->the_post(); ?>





<div class="cbp-item">
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
                                        <a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog'); ?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>" rel="nofollow"><?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?> </a>
                                        
                                        
                                  <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['2'] == 'three') {echo '';} else  { ?>      
                                        
                                        <a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog'); ?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft buy button-show-buy"  target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>

                                       </div>
    
                            </div><!-- cbp-l-caption-body -->
                        </div><!-- cbp-l-caption-alignCenter -->
                    </div><!-- cbp-caption-activeWrap -->
                </div><!-- cbp-caption -->
                <div class="cbp-l-grid-projects-title"> <div class="entry-title" style="margin-bottom:0px !important"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></div>                 
                <div class="cbp-l-grid-projects-desc katalog-font" style="color:#333; overflow:hidden"><?php echo my_excerpt('long');  ?></div>

<?php } ?>
<?php if ($ab_catalog['caption_enable'] == 'no')  { ?> 
<div class="katalog-enterpage heightimage" style="width:99%; background: url(<?php 
if ( has_post_thumbnail() ) { $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); echo  $large_image_url[0] ; } ?>) center center no-repeat; background-size:contain;">
                         </div>


                
                   <div class="cbp-l-grid-projects-title"> <div class="entry-title" style="margin-bottom:0px !important"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></div>               
                  <div class="cbp-l-grid-projects-desc katalog-font" style="color:#333; overflow:hidden"><?php echo my_excerpt('long');  ?></div>
                
                 
                  <div class="katalog-buttons" style="padding:10px 0px">
	                             <a href="<?php the_permalink(); ?>" style="font-family: <?php echo of_get_option('fonts_blog'); ?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft <?php if (get_post_meta(get_the_ID(), 'dbt_readmorecheck', true)=='') {echo 'button-show';} ?>" rel="nofollow"> <?php echo get_post_meta(get_the_ID(), 'dbt_readmore', true); ?> </a>
	                             
	                              <?php $buyexclude = get_post_meta(get_the_ID(), 'dbt_buyexclude', true); 
if ($buyexclude['2'] == 'three') {echo '';} else  { ?>   
                                        <a href="<?php echo get_post_meta($post->ID, "dbt_salelink", true); ?>" style="font-family:  <?php echo of_get_option('fonts_blog'); ?>; float:none; margin-top:0px !important" class="cbp-s-caption-buttonLeft buy button-show-buy" target="_blank" rel="nofollow"> <?php echo get_post_meta($post->ID, "dbt_buybutton", true); ?></a> <?php } ?>
	                             </div>
 <?php } ?></div><!-- cbp-item -->
<?php endwhile; } ?> </div> <!-- cbp -->
<?php if ($homepage['hp_show_readmore6'] == 1) { ?> 
<div style="clear:both"></div><a href="<?php echo $homepage['hp_readmore_link_custom6']; ?>" class="more-link6"><div class="readmore6" style="float:right"><?php echo $homepage['hp_readmore_id6']; ?></div></a><?php } ?>
</div></div><?php wp_reset_query(); }?>

<?php function hp_level7() { global $homepage, $ab_catalog; ?> 

<div class="uroven"><div class="block_home7">


<?php add_action( 'enter', 'abinspiration_product_categories',	10 ); 
do_action( 'enter' ); ?>
</div></div>

<?php } ?>

<?php the_content(); ?>




<?php 
$license = get_option( 'edd_homepage_license_key' );
$status = get_option( 'edd_homepage_license_status' );
if ($status !== false && $status == 'valid' ) { ?> 
<?php $levelsortable2  = $homepage['levelsortablenew'];
$number_level = explode(',', $levelsortable2);
foreach ( $number_level as $num ) { 
$func = 'hp_level'. $num; ?>
<style>#content-main {background:transparent !important;}</style>
<div id="container-full" class="one-column">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  style="margin-bottom:0px !important">
<div class="vhodnoaya<?php echo $num; ?>" <?php if ($homepage['show_level'. $num] == 0)
{ echo 'style="display:none"'; } ?>>
<?php if ($homepage['hp_show_header_level'. $num] == 1) { ?>
<div class="heading-title<?php echo $num; ?>"><?php echo do_shortcode(stripslashes($homepage['hp_heading_level'. $num])); ?></div>
<?php }  ?><div><?php $func();  ?></div>				
</div></div><!-- #post-## -->
<?php endwhile; ?>


</div><!-- #container --><?php   } }  ?> 

<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>