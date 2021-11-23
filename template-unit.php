<?php
/**
 * Unit Template Name: Страница с заданием
 * Template Post Type: course_unit
 * @package WordPress
 * @subpackage Inspiration
 * @since Inspiration 1.0
 */
 __( 'Страница с заданием', 'inspiration' );
get_header(); ?>
<?php echo ab_inspiration_header(); ?>

<style>
	.tabbernav, #qips_smiles {display:none}
	textarea#comment {height:100px}
.navbar-6 {display:none }
	.wpcw_fe_unit_progress.wpcw_fe_unit_progress_complete .wpcw_checkmark {display:block !important;font-family: "FontAwesome"; content: "\f058"; float:right; font-size:30px;  font-weight:normal; height:15px; width:15px}
.wpcw_fe_unit_progress.wpcw_fe_unit_progress_incomplete:after {font-family: "FontAwesome"; font-weight: 900; content: "\f1db"; float:right; font-size:18px; color:#d8d8d8; font-weight:normal}
.wpcw_widget_progress #wpcw_fe_course {background:#fff} .single-course_unit #primary {float:left;}.single-course_unit #container{float:right !important; width:100%}.single-course_unit #content{width:100%} .single-course_unit #primary {float:left}
#container, #content, .entry-box {width:100%} .content-unit {width:100%; float:right} .single-course_unit #respond {margin-top:60px;} 
@media only screen and (max-width: 1024px) {
  #primary {display:none}
.navbar-6 {display:block; width:100%}
	.navbar.navbar-6 button, .navbar.navbar-6 button:hover {background:transparent !important}
	#body {background:#fff !important}	
.content-unit {width:100%; float:none}
	
.single-unit .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(61, 61, 61)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E") !important; font-size:24px;
}

.single-unit.navbar-toggler {
  border:none;
} 


#container {width:100% !important}


	.navbar .widget.wpcw_course_progress {margin-top:10px}
	.navbar-6 {padding:0px; text-align:left;
}
	
.entry-title.entry-title-single {padding-top:20px}
	
}
	.mobile-second-menu {display;none}
@media only screen and (max-width: 690px) {
	.wpcw_course_progress {max-height: 300px;overflow: scroll; scroll-behavior: smooth;border: 1px solid #eaeaea;}
	.collapse.show {margin:20px}
.navbar.navbar-6 button {	 margin-left:20px }
	.mobile-second-menu {}
	 }


</style>

<?php 
global $post, $course;

$parentData = WPCW_units_getAssociatedParentData( $post->ID );
$courseDetails = WPCW_courses_getCourseDetails( $parentData->parent_course_id );
$key = $parentData->parent_course_id;
$key2 = wpcw_course_get_post_id( $key );

if ( !is_user_logged_in() ) {

if (function_exists('abwpwoo_price_wpcourseware_woocommerce')) { 
$array1 = $ab_wpcourseware['id_courses_courses'];
$array2 = $ab_wpcourseware['id_courses_product'];
$array = array_combine($array1, $array2);


$value = $array[$key2];	



echo '<div style="padding: 20px 20px 30px; margin-bottom:30px;border:1px solid #eaeaea; clear:both; background:#FFFACD;">'. do_shortcode('[add_to_cart id="'.$value.'"]') .'<div style="clear: right; padding-top: 10px;padding-left: 20px;display: table;"> '. __( 'или', 'inspiration' ) .' <a href="'. get_permalink( wc_get_page_id( 'myaccount' ) ) .'">'. __( 'Войти в личный кабинет', 'inspiration' ) .'</a></div></div>';

}  
	
	else { echo  '<div style="padding: 20px 20px 30px; margin-bottom:30px;border:1px solid #eaeaea; clear:both; background:#FFFACD;"><p class="button-on-unit">'. do_shortcode('[wpcourse_enroll courses="'. $key .'"]') .'</p><div style="clear: right; padding-top: 10px;padding-left: 20px;display: table;"> '. __( 'или', 'inspiration' ) .' <a href="'. get_permalink( wpcw_get_page_id( 'account' ) ) .'">'. __( 'Войти в личный кабинет', 'inspiration' ) .'</a></div></div>'; }
}     ?>


<div id="container">
<div id="content" role="main" >
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="mobile-second-menu">
	<nav class="navbar navbar-6 navbar-light">
 
  <button class="navbar-toggler single-unit" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"> </span> Содержание курса
      </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php the_widget('\\WPCW\\Widgets\\Widget_Course_Progress'); ?>
    
  </div>
</nav>
	</div>
<div class="entry-box" itemscope itemtype="http://schema.org/BlogPosting">
<div class="content-unit" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>





<h1 class="entry-title entry-title-single" itemprop="headline"><?php the_title(); ?></h1>

<div class="entry-content">

<div class="post-font" itemprop="articleBody">

<?php the_content(); ?>

</div>
  <?php if ( !is_user_logged_in() ) { ?>
   <div style="clear:both; padding-top:40px;"><?php comments_template('', true); ?></div> 
   <?php } ?>

</div><!-- .entry-content -->
	
	
 
	
	</div><!-- #post-## -->	
	
	
	
<div style="clear:both;">
	
	
	
	</div>
	


</div> <!-- entry-box --></div><!-- #content -->
<?php endwhile; // end of the loop. ?></div><!-- #container -->	

<?php get_sidebar('kurs'); ?>





<?php echo ab_inspiration_footer(); ?>

<?php get_footer(); ?>