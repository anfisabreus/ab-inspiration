<?php
/**
 * Template Name: Страница Курса
 * Template Post Type: wpcw_course
  * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 
  __( 'Страница курса', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<style>tr.wpcw_fe_module.wpcw_fe_module_toggle_hide td+td:after, tr.wpcw_fe_module.wpcw_fe_module_toggle_show td+td:after {padding-right:20px}#wpcw_fe_course {margin-top:20px}.wpcw_widget_progress #wpcw_fe_course .wpcw_fe_unit_progress span {display:block} </style>
<?php global $course;

$payments_type = $course->get_payments_type();	
if ( ! $course->can_user_access( get_current_user_id() ) ) { ?>

<div id="container" class="course-page" style="float:left; width:60%;"> <?php } else { ?> <div id="container" class="course-page" style="float:left; width:100% !important; margin: 0 auto">  <?php }  ?>
<div id="content" role="main"  >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>



<?php global $course;
$payments_type = $course->get_payments_type();	
if ( ! $course->can_user_access( get_current_user_id() ) ) { ?>


<div class="entry-box" itemscope itemtype="http://schema.org/BlogPosting"><?php } else { ?><div class="entry-box" style="width:100%; margin: 0 auto"  itemscope itemtype="http://schema.org/BlogPosting"> <?php }  ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
<?php if ( has_post_thumbnail() ) : ?><div itemprop="image" itemscope itemtype="https://schema.org/ImageObject" class="image-bg" style="background-image:url(<?php the_post_thumbnail_url(); ?>); ">
	    
	
</div><?php endif; ?>


<div class="post-content">
	
	
<div class="entry-utility" style="margin-bottom:5px;">
<span style="float:left"></span><div class="cat-meta"> 




</div></div><!-- .entry-utility -->


   <h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>


</div>
<div class="entry-content">
<div class="post-font" itemprop="articleBody">
<?php global $course;
$payments_type = $course->get_payments_type();	
if ( ! $course->can_user_access( get_current_user_id() ) ) { ?>
	
	
<div class="wpcw_widget_progress" style="padding:0px !important">


 <?php the_content();  ?> </div> <?php } else { ?> <div class="wpcw_widget_progress"> <?php echo do_shortcode('[wpcourse_progress_bar course="' . $course->get_course_id() . '" /][wpcourse course="' . $course->get_course_id() . '" /]'); ?></div><?php } ?>


</div>
</div><!-- .entry-content --></div><!-- #post-## -->		
</div>
</div> <!-- entry-box --></div><!-- #content -->
<?php global $course;
$payments_type = $course->get_payments_type();	

if ( ! $course->can_user_access( get_current_user_id() ) ) {
if ( $payments_type !== 'free') {

?>

<div class="widget-for-course">
	
	<img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>" style="width:100%">
	<h3 style="text-align:center; padding-top:20px; padding-bottom:15px"><?php echo the_title(); ?></h3>
<?php if (function_exists('abwpwoo_price_wpcourseware_woocommerce')  && isset($ab_wpcourseware['id_courses_courses']) && isset($ab_wpcourseware['id_courses_product']) ) { 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);
$key =  get_the_ID();
$value = $array[$key];														  
echo do_shortcode('[add_to_cart id="'.$value.'"]'); }  else { echo $course->get_payments_price() .' '. wpcw_get_currency_symbol() .' '. $course->get_enrollment_button(); } 

}  else {  ?> <div class="widget-for-course "><img src="<?php if ( has_post_thumbnail() ) : ?><?php the_post_thumbnail_url(); ?><?php endif; ?>" style="width:100%">	<h3 style="text-align:center; padding-top:20px; padding-bottom:15px"><?php echo the_title(); ?></h3> <?php echo $course->get_enrollment_button(); ?> </div> <?php } ?>




</div> <?php }   ?>
<?php endwhile; // end of the loop. ?>


</div><!-- #container -->

	<?php echo ab_inspiration_footer(); ?>	

<?php get_footer(); ?>