<?php 
/**
 * The template for displaying Archive pages.
 *
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */


get_header(); ?>
<?php echo ab_inspiration_header(); ?>




		<div id="container-full" class="one-full-common one-column  container wp-courseware-calogue">

			<div id="content" role="main" class="row">



<?php
global $ab_wpcourseware;

$values =  $ab_wpcourseware['id_courses'] ;
$abc = '';
foreach((array) $values as $k=>$value) {
        if ($k) $abc .=', ';
        $abc .= $value;

    }

$arr = explode(',', $abc);

$args = array(
 'posts_per_page'      => 60,
 'post_type'     => 'wpcw_course',
 'key' => 'views',
 'orderby' => 'meta_value_num',
 'order'    => 'ASC',
 'post_status' => 'publish',
 get_query_var( 'taxonomy' ) => get_query_var( 'term' ),
 'post__not_in' => $arr
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post(); ?>

<div style="padding-bottom:20px !important" class="entry-box <?php if($ab_wpcourseware['checkbox_example'] == true) { ?>course-horisontal<?php } else { ?>col-lg-4<?php } ?>">

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




<div class="post-font">

<?php if (function_exists('abwpwoo_headline_link') && isset($ab_wpcourseware['id_courses_courses_pages']) && isset($ab_wpcourseware['id_courses_pages'])) {
$array1 = $ab_wpcourseware['id_courses_courses_pages'];
$array2 = $ab_wpcourseware['id_courses_pages'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];

?>
	
<div class="entry-content">

<?php if ( !$course->can_user_access( get_current_user_id() ) ) { ?>
<a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } else { ?> 

<a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

<?php }  


} else { ?> <a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>"></a>

<h2 class="entry-title" itemprop="name headline"><a href="<?php the_permalink();  ?>" title="<?php printf( esc_attr__( ' %s', 'inspiration' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2> <?php } ?>
	
<?php if($ab_wpcourseware['checkbox_example'] == true) {  } else { ?> <div style="clear:both;"></div> <?php } ?>
<?php if($ab_wpcourseware['checkbox_example'] == true) { ?> <div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } else { ?> <div class="desc-course" itemprop="description"><?php the_excerpt(); ?></div><?php } ?>
<?php if($ab_wpcourseware['checkbox_example'] == true) {  } else { ?> <div style="clear:both;"></div> <?php } ?>

</div> 



	 <?php 
	
	if ( $course->can_user_access( get_current_user_id() ) ) { ?>
	
	<div class="progress_under_course">
		<?php
	$fe = new WPCW_UnitFrontend( $post );

	echo do_shortcode( ' [wpcourse_progress_bar course="' . $course->get_course_id() . '"]' ); ?>
	<a href="<?php echo the_permalink(); ?> " title="<?php echo the_permalink(); ?>" rel="bookmark" class="more-link" style="margin-top: 0px;float: right; margin-bottom:15px; margin-left: 15px;

    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 16px !important;
    padding: 5px 10px;
    text-decoration: none;"><?php _e( 'Открыть курс', 'inspiration' ); ?>
	</a>
</div>
	<?php } ?>
	
	<?php 
		$payments_type = $course->get_payments_type();	
		
	if ( !$course->can_user_access( get_current_user_id() ) ) { 	
		
		
		if ( $payments_type !== 'free') {

if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value1 = $array[$key];	

?>
 
<div style="margin-left:15px"><?php echo do_shortcode(' [tag_for_short_code_price id="'.$value1.'"]'); ?> </div>

<?php }    }  } else { echo ''; } ?>


	
	

	
	<?php if($ab_wpcourseware['checkbox_example'] == true) { ?> <div style="float:right; font-size:20px; margin-right:20px; font-weight:normal; width:100%;"> <?php } else { ?> <div style="margin-right:15px"> <?php } ?>
	
	
<?php 
															  
															  
														  
															  
															  
															  
															 
$payments_type = $course->get_payments_type();	
if ( ! $course->can_user_access( get_current_user_id() ) ) { ?> <a href="<?php if ($value !== '') { echo get_site_url().'/?p='. $value; } else { the_permalink()  ; } ?>" title="<?php echo the_permalink(); ?>" rel="bookmark"  style="margin-top: 0px; margin-bottom: 0px;padding: 0px; float:right; margin-left: 15px;
    background: #ffffff !important;
    color: #000000 !important;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    font-size: 16px !important;
    padding: 4px 10px;
    text-decoration: none; border:1px solid #000"><?php _e( 'Подробнее', 'inspiration' ); ?>
	</a>
 <?php

if ( $payments_type !== 'free') {

if (function_exists('abwpwoo_price_wpcourseware_woocommerce') && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) 
{ 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];	




?> <div class="price-for-course"> <?php
echo do_shortcode('[add_to_cart id="'.$value.'"]'); ?> </div> <?php }
else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else { echo $course->get_enrollment_button(); } }  ?></div>	
</div>

	



	

</div><!-- .entry-content -->
					
</div><!-- #post-## -->

				
<?php } } ?>




			</div><!-- #content --> 
		</div><!-- #container -->
		<?php echo ab_inspiration_footer(); ?>
<?php get_footer(); ?>